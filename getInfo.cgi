#!/usr/bin/perl

# * File: load_graph_form.cgi
# * 
# * Author: Victor Iglesias
# * 
# * Purpose: Used to load product and version names into comboboxes
# * 
# ******************************************************************************/

use strict;
use vars qw/$dbh/;
use CGI qw(:standard);
use CGI::Carp qw(fatalsToBrowser);
use DBI;   # perl DBI module
use Net::Telnet;

my $PARAMS;
my $paramcount=0;
for (param()) {
	$PARAMS->{$_} = param("$_");
	$paramcount++;
	
}

my $ip = $PARAMS->{"ip"};
my $cmd = $PARAMS->{"command"};
my %blade_info = get_blade_info($ip, $cmd);

print "Content-type: text/xml\n\n";
print "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n\n";
print "<dut_info>\n";
print "<result id=\"result\">\n". $blade_info{'result'} . "\n</result>\n";
print "<status id=\"status\">" . $blade_info{'status'} . "</status>\n";
print "</dut_info>\n";
sub get_blade_info(){
	my $hostname = shift;
        my %hash_return;

	my $telnet = new Net::Telnet ( Timeout=>10 , Errmode => "return",Prompt => '/\> $/i', Input_log => 'inputlog.txt', Output_log => 'outputlog.txt');
        my $ok = $telnet->open($hostname);
        $telnet->waitfor('/:/i');
        $telnet->print('occam');
        $telnet->waitfor('/\>/i');
        $telnet->print('enable');
        $telnet->waitfor('/Password: $/i');
        $telnet->print('razor');
        $telnet->waitfor('/\#/i');
        $telnet->prompt('/\#/i');
	$telnet->cmd('terminal length 0');
        my @result = $telnet->cmd($cmd);
	$telnet->cmd('no terminal length');
	my $result_string;
	my $line_count= 0;
	for my $line (@result){
		next if($line_count eq $#result);
		$result_string .= $line;
		$line_count += 1;
	}
   	
	$result_string =~ s/^\W//;
	
	$hash_return{'result'} = $result_string;
	if ($ok and $#result > 1 ){
		$hash_return{'status'}= 1;
	}
	else{
		 $hash_return{'status'}= 0;
	}
	return %hash_return;
}
