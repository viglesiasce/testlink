#!/usr/bin/perl
$| = 1;  # make sure output is unbuffered

use strict;
#print "Content-type: text/html\n\n";
use CGI qw/:param/; # cgi.pm module
use DBI;   # perl DBI module
use Data::Dumper;

use vars qw/ $dbh /;

do "./snapshot_globals.pl";
 
my $testlink = connect_to_testlink();
my $snapshot = connect_to_snapshot();

#Load in params from command line or HTTP POST
my %PARAMS;
for (param()) {
	$PARAMS{$_} = param("$_");
}

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
