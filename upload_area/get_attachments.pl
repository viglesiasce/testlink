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
use File::Copy;


my $database = "DBI:mysql:testlink:localhost:3306";
my $tl_path = "/data/www/testlink/upload_area/";
my $dbh = DBI->connect($database,'root','testlink') or die $DBI::errstr;

my %PARAMS;


for (param()) {
	$PARAMS{$_} = param("$_");
}
my $get_id_query = "SELECT id FROM nodes_hierarchy n where n.name like \"$PARAMS{'testplan_name'}\"";
my @result_tp_id = multi_row_query($get_id_query);

my $testplan_id = $result_tp_id[0]{'id'};


my $get_extid_filename_path_query = "SELECT tc_external_id,file_name,file_path FROM executions e, tcversions t,attachments a where (t.id=e.tcversion_id) and (e.id=a.fk_id) and e.testplan_id=$testplan_id";

my @attachments = multi_row_query($get_extid_filename_path_query);

my $file_no = scalar (@attachments);
mkdir($PARAMS{'testplan_name'}, 0777) || print $!;
for (my $i=0; $i < $file_no; $i++)
{
	print 'TC Number:'. $attachments[$i]{'tc_external_id'}." Filename: " . $attachments[$i]{'file_name'}  ." Path: " . $attachments[$i]{'file_path'}  ,"\n";
	my $og_file_path = $tl_path . $attachments[$i]{'file_path'};
	my $dest_file_path = $PARAMS{'testplan_name'} . "/" . $attachments[$i]{'tc_external_id'}  . "_" . $attachments[$i]{'file_name'};
	copy($og_file_path, $dest_file_path ) or die "Copy failed: $!";
	print "\tSource: $og_file_path\n\tDest: $dest_file_path\n";
}

  my  @tar_args = ("tar", "-zcvf", "attachments_$PARAMS{'testplan_name'}.tar.gz", "$PARAMS{'testplan_name'}");
  system(@tar_args) == 0 or die "system @tar_args failed: $?";

  my @rm_args = ("rm", "-rf", $PARAMS{'testplan_name'});
  system(@rm_args) == 0 or die "system @tar_args failed: $?";



sub multi_row_query(){
my @return; 
my $sql = shift;
my $sth = $dbh->prepare($sql);
$sth->execute();

        my $ref = $sth->{NAME};
        my @array = @$ref;
        my $i = 0;
        while (my $hashref = $sth->fetchrow_hashref()) {
                for (@array) {
                        $return[$i]{$_} = $hashref->{$_};
                }   
                $i++;
        }   
        $sth->finish;
	return @return;
}
