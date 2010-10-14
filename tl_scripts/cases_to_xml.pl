#!/usr/bin/perl
# zapus_info.cgi
# displays information on a test result or test case
#
# bklaas 06.00
# rewrite 06.05

$| = 1;  # make sure output is unbuffered

use strict;
#print "Content-type: text/html\n\n";
use CGI qw/:param/; # cgi.pm module
use DBI;   # perl DBI module
use vars qw/ $dbh /;
use XML::Generator ':pretty';
use Text::CSV;
use Data::Dumper;


do "zapus_globals.pl";
 
connect_to_db();

my %PARAMS;


if (1) {
	$PARAMS{'display'} = 'testcase';
} else {
	$PARAMS{'display'} = 'results';
}

for (param()) {
	$PARAMS{$_} = param("$_");
}

my $CONFIG = zapus_config();
# retrieve the most recent record entered or passed parameter bug_id
my $sql;
my $testcase_attachments; my $results_attachments;


#CREATE XML SCHEMA

my $gen = XML::Generator->new(':pretty');

my @testcase_ids;

#####Slurp in the input file and setup the testcase_id array

#print "Input File is " . $PARAMS{'file'} . "\n";
open(MYINPUTFILE, "<" . $PARAMS{'file'} ); # open for input

my(@lines) = <MYINPUTFILE>; # read file into list
my %testcase_hash;

##Test Case ID	Summary	Definition	Keywords	Platforms	Mandatory	Random	Full	Sanity	Automation	Flag for rewrite	Notes for rewrite

 my $csv = Text::CSV->new();              # create a new object
my @columns;
 foreach my $line (@lines){
  my $status  = $csv->parse($line);        # parse a CSV string into fields
  @columns = $csv->fields();            # get the parsed fields
  if($columns[0] =~ /^[0-9]+$/){
  $testcase_hash{$columns[0]}{'summary'} = $columns[1];
  $testcase_hash{$columns[0]}{'definitions'} = $columns[2];
  $testcase_hash{$columns[0]}{'keywords'} = $columns[3];
  $testcase_hash{$columns[0]}{'platforms'} = $columns[4];
  $testcase_hash{$columns[0]}{'mandatory'} = $columns[5];
  $testcase_hash{$columns[0]}{'random'} = $columns[6];
  $testcase_hash{$columns[0]}{'full'} = $columns[7];
  $testcase_hash{$columns[0]}{'sanity'} = $columns[8];
  $testcase_hash{$columns[0]}{'automation'} = $columns[9];
  $testcase_hash{$columns[0]}{'rewrite'} = $columns[10];
  $testcase_hash{$columns[0]}{'notes'} = $columns[11];
  }
}

#for my $key ( keys %testcase_hash ) {
#        my $value = $testcase_hash{$key}{'summary'};
#        print "$key => $value\n";
#    }
#my $testcase;



print "<testcases>\n";

for my $key (keys %testcase_hash)  {
  $PARAMS{'test_case_id'} = $key;

if ($PARAMS{'display'} eq "testcase") {
	if ($PARAMS{'test_case_id'} > 0) {
       	 $sql = "select * from testcases where test_case_id = \"$PARAMS{'test_case_id'}\"";
	} else {
       	 $sql = "select * from testcases order by test_case_id desc limit 1";
	}

	my $hash_ref = single_row_query($sql);
	for my $key (keys %$hash_ref) {
	        $PARAMS{$key} = $hash_ref->{$key};
	}
	$PARAMS{'test_plan_array'} = split_test_plan($PARAMS{'test_plan'});
	$testcase_attachments = get_attachments($PARAMS{'test_case_id'}, 'testcases');
} else {
	
	if ($PARAMS{'results_id'} > 0) {
		$sql = "select testcases.*, results.test_case_id from testcases, results where results_id = \"$PARAMS{'results_id'}\" and testcases.test_case_id = results.test_case_id";
	} else {
		$sql = "select testcases.*, results.test_case_id from testcases, results where testcases.test_case_id = results.test_case_id order by results_id desc limit 1";
	}
	
	my $hash_ref = single_row_query($sql);
	
	# just the testcase fields
	for my $key ('test_time', 'test_plan','test_case_id', 'date_created', 'author', 'feature', 'subfeature', 'summary', 'description', 'equipment_needed') {
		$PARAMS{$key} = $hash_ref->{$key};
	}
	$testcase_attachments = get_attachments($PARAMS{'test_case_id'}, 'testcases');
	$PARAMS{'tc_group_name'} = $hash_ref->{group_name};
	my $test_plan_string1 = split_test_plan($PARAMS{'test_plan'});
	if ($PARAMS{'results_id'} > 0) {
		$sql = "select results.*, testcases.test_case_id from testcases, results where results_id = \"$PARAMS{'results_id'}\" and testcases.test_case_id = results.test_case_id";
	} else {
		$sql = "select results.*, testcases.test_case_id from testcases, results where testcases.test_case_id = results.test_case_id order by results_id desc limit 1";
	}
	
	my $hash_ref = single_row_query($sql);
	
	# now the results fields
	for my $key ('results_id', 'group_name', 'tester', 'test_plan', 'build', 'current_test_build','status', 'results_summary', 'results', 'bugs_opened', 'actual_time') {
		$PARAMS{$key} = $hash_ref->{$key};
	}
	$PARAMS{'test_plan_array'} = $test_plan_string1;
	$results_attachments = get_attachments($PARAMS{'results_id'}, 'results');
	$PARAMS{'results_for_display'} = format_for_web($PARAMS{'results'});
	my @bug_list = make_links_for_bugs($PARAMS{'bugs_opened'});
	$PARAMS{'bug_list'} = \@bug_list;
	$PARAMS{'formatted_actual_time'} = format_test_time($PARAMS{'actual_time'});
}

  my @keywords = split(/,/, $testcase_hash{$key}{'keywords'});
  
  
  #my $xml_case =$gen->testcase({ internalid => "SQA_$key", name=> $testcase_hash{$key}{'summary'}},
   
   print "\t<testcase internalid=\"$key\" name=\"$testcase_hash{$key}{'summary'}\">" . "\n\t\t";
   print   $gen->node_order(3) . "\n\t\t";
   print   $gen->externalid("![CDATA[$key]]"). "\n\t\t";
   if($testcase_hash{$key}{'rewrite'} ){
	print   $gen->summary( "Tips for rewrite: " . $testcase_hash{$key}{'notes'}  . "&lt;br&gt;&lt;br&gt;" . format_for_web($PARAMS{'description'})  ) . "\n\t\t";
   }
   print   $gen->summary( format_for_web($PARAMS{'description'})  ) . "\n\t\t";
   print   $gen->preconditions($PARAMS{'equipment_needed'}) . "\n\t\t";
   print   $gen->executiontype(1) . "\n\t\t";
   print   $gen->importance(2) . "\n\t\t";
   print "\t\t<keywords>";
   if($testcase_hash{$key}{'mandatory'}){
	push(@keywords,"Mandatory" );
   }
     if($testcase_hash{$key}{'random'}){
        push(@keywords,"Random" );
   }   
  if($testcase_hash{$key}{'full'}){
        push(@keywords,"Full" );
   }   
  if($testcase_hash{$key}{'sanity'}){
        push(@keywords,"Sanity" );
   }    
   if($testcase_hash{$key}{'rewrite'}){
        push(@keywords,"Rewrite" );
   }



   foreach my $keyword (@keywords){
        print $gen->keyword({ name => $keyword}, $gen->notes($keyword)) . "\n\t\t";    
    
        }      
   print "\t\t</keywords>\n";
   print "\t\t<custom_fields>\n\t\t\t<custom_field>\n\t\t\t\t<name>ZAPUS_ID</name>\n\t\t\t\t<value>$key</value>\n\t\t\t</custom_field>\n\t\t</custom_fields>\n";
   print "\t</testcase>\n";

	#$gen->keywords($gen->keyword({ name => $PARAMS{'feature' }}, $gen->notes($PARAMS{'feature' })))
		#	) . "\n";

#print $xml_case;

#print  $PARAMS{'test_case_id'} . "\t" . $PARAMS{'summary'} . "\t3\t" . $PARAMS{'test_case_id'} . "\t" . $PARAMS{'description'} . "\t<br>Equipment Needed:<br>" . $PARAMS{'equipment_needed'} . "\t1\t2\n";



}

print "</testcases>\n";

exit;


