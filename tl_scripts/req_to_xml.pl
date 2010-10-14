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


for (param()) {
	$PARAMS{$_} = param("$_");
}

my $CONFIG = zapus_config();
# retrieve the most recent record entered or passed parameter bug_id
my $sql;
my $requirement_attachments; my $results_attachments;


#CREATE XML SCHEMA

my $gen = XML::Generator->new(':pretty');

my @requirement_ids;

#####Slurp in the input file and setup the requirement_id array

#print "Input File is " . $PARAMS{'file'} . "\n";
open(MYINPUTFILE, "<" . $PARAMS{'file'} ); # open for input

my(@lines) = <MYINPUTFILE>; # read file into list
my %requirement_hash;

 my $csv = Text::CSV->new();              # create a new object
my @columns;
 foreach my $line (@lines){
  my $status  = $csv->parse($line);        # parse a CSV string into fields
  @columns = $csv->fields();            # get the parsed fields
  if($columns[0] =~ /PRD/){
  $requirement_hash{$columns[0]}{'summary'} = $columns[1];
  $requirement_hash{$columns[0]}{'compliance'} = $columns[2];
  $requirement_hash{$columns[0]}{'comment'} = $columns[3];
  $requirement_hash{$columns[0]}{'xref'} = $columns[4];
  $requirement_hash{$columns[0]}{'testcases'} = $columns[5];
  $requirement_hash{$columns[0]}{'assigned_to'} = $columns[6];
  }
}


print "<requirements>\n";

foreach my $req (keys %requirement_hash){
print "\t<requirement>\n\t\t";
my $docid = $req;
print "I have keys: $req" . "\n";
$docid =~ s/ //;
$docid =~ s/\./_/;
$docid =~ s/:/_/;
print   $gen->docid($docid) . "\n\t\t";
print   $gen->title($requirement_hash{$req}{'summary'}) . "\n\t\t";
print   $gen->description("<p>Compliance:<p>" . $requirement_hash{$req}{'compliance'} . "</p><p>Comments: " . $requirement_hash{$req}{'comment'}  . "</p><p>Cross Reference:" . $requirement_hash{$req}{'xref'}  . "</p>"  );
print "\t</requirement>\n";
}
print "</requirements>\n";

exit;


