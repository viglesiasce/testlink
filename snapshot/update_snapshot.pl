#!/usr/bin/perl
$| = 1;  # make sure output is unbuffered

use strict;
#print "Content-type: text/html\n\n";
use CGI qw/:param/; # cgi.pm module
use DBI;   # perl DBI module
use Data::Dumper;

use vars qw/ $dbh /;

do "./snapshot_globals.pl";
 

#Load in params from command line or HTTP POST
my %PARAMS;
for (param()) {
	$PARAMS{$_} = param("$_");
}

get_bug_data($PARAMS{'ozilla_file'});
get_zapus_data();
exit;

sub get_bug_data{
        my $filename = shift;
        my %products;
        open( PRODUCTS, "<$filename") or die;
        
        my(@lines) = <PRODUCTS>; 

        for my $line (@lines){
                my @prod_ver = split(/ /, $line );
                $products{$prod_ver[0]}{trim($prod_ver[1])}= ();
        }
        my %fields;
        my @status_fields = ("NEW", "ASSIGNED", "RESOLVED", "REOPENED", "CLOSED");
        my @severity_fields = ("blocker", "critical", "major", "normal", "minor", "trivial", "enhancement");
        my $ozilla = connect_to_ozilla();
	my $snapshot = connect_to_snapshot();
	
########GO THROUGH EACH PRODUCT TYPE	
	foreach my $product (keys %products){
########GO THROUGH EACH VERSION
		foreach  my $version (keys  %{$products{$product}} ) {
			##################################################################################
			###########		GET SEVERITIES FOR TODAY		##################
			##################################################################################			
			for my $severity (@severity_fields){
				my $severity_query = "SELECT count(*) as count FROM bugs b where b.product=\"$product\" and b.version=\"$version\" and b.bug_severity=\"$severity\" and (b.bug_status=\"new\" or b.bug_status =\"reopened\" or b.bug_status=\"assigned\")";
				my %sev_count = single_row_query($severity_query,$ozilla);
				#print "Product: $product Version: $version Severity: $severity Count: " . $sev_count{'count'} . "\n";
				 $products{$product}{$version}{$severity} = $sev_count{'count'};
			}
		#	print "\n\n\n";
		        ##################################################################################
                        ###########             GET STATUS FOR TODAY                ##################
                        ##################################################################################        	
			for my $status (@status_fields){
				my $status_query = "SELECT count(*) as count FROM bugs b where b.product=\"$product\" and b.version=\"$version\" and b.bug_status=\"$status\"";			
				my %stat_count = single_row_query($status_query, $ozilla);
				#print "Product: $product Version: $version Status: $status  Count: " . $stat_count{'count'}  . "\n";
				$products{$product}{$version}{$status} = $stat_count{'count'};
			}
		} 
	}
	
	foreach my $product (keys %products){
		foreach  my $version (keys  %{$products{$product}} ) {
			my $insert_query = "INSERT INTO bug_status (date,product,version,new,assigned,resolved, reopened, closed, blocker, critical, major, normal, minor, trivial, enhancement) VALUES (CURDATE(),\"" . $product  . "\",\"" . $version . "\"," . $products{$product}{$version}{'NEW'} . "," . $products{$product}{$version}{'ASSIGNED'}  . "," . $products{$product}{$version}{'RESOLVED'} . "," . $products{$product}{$version}{'REOPENED'} . "," . $products{$product}{$version}{'CLOSED'} . "," . $products{$product}{$version}{'blocker'} . "," . $products{$product}{$version}{'critical'} . ",". $products{$product}{$version}{'major'}  . "," .  $products{$product}{$version}{'normal'}  . "," .  $products{$product}{$version}{'minor'}  . ","  .  $products{$product}{$version}{'trivial'}  . "," .  $products{$product}{$version}{'enhancement'} .")";
			print $insert_query . "\n";	
			my $query_handle = $snapshot->prepare($insert_query);
		       $query_handle->execute();		
				
		}

	}	
		
	$ozilla->disconnect;
	$snapshot->disconnect;
}




sub get_zapus_data{
 
my $testlink = connect_to_testlink();
my $snapshot = connect_to_snapshot();


#An array of the possible status to iterate
my @status_list= ('i','f','b','p');

#Look for active testplans in testlink and only retrieve stats for these
my @active_tp = multi_row_query("SELECT * FROM testplans WHERE active=1", $testlink);

for my $row (@active_tp){

        my %result_hash;
        #iteratate through these testplans and determine the total number of testcases in the plan
        my $total_assigned_query  = "SELECT count(*) AS 'total' from testplan_tcversions WHERE testplan_id=" . $row->{'id'};
        my %query_result = single_row_query($total_assigned_query, $testlink);
        $result_hash{'total'} = $query_result{'total'}; 
        $result_hash{'n'} = $result_hash{'total'};
        # Now find the number of testcases in each status and subtract that number from the not_run
        for my $status_val (@status_list){
                my $status_query = "SELECT * FROM (select * from executions order by id desc)e1 WHERE e1.testplan_id=" . $row->{'id'} . " and e1.status=\'" . $status_val . "\' group by e1.tcversion_id,platform_id order by id desc";
                my @query_result = multi_row_query($status_query, $testlink);
                $result_hash{$status_val} = $#query_result + 1;
                $result_hash{'n'} -= $result_hash{$status_val};
        }   
        # INSERT TODAYS DATA FOR THE ACTIVE TESTPLANS   
        my $insert_query = "INSERT INTO test_status (date,testplan_id,in_prog,not_run,blocked,failed,passed,total) VALUES (CURDATE()," . $row->{'id'}  . "," . $result_hash{'i'} . "," . $result_hash{'n'} . "," . $result_hash{'b'}  . "," . $result_hash{'f'} . "," .$result_hash{'p'} . "," . $result_hash{'total'} .")";
        my $query_handle = $snapshot->prepare($insert_query);
        $query_handle->execute();
}

 


#CLEANUP STARTS HERE
$testlink->disconnect;
$snapshot->disconnect;
}
