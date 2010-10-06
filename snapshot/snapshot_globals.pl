use CGI qw/:param/; 

sub connect_to_snapshot {
	###############################################################
	############### connect to database ###########################
	###############################################################
	my $database_name = "snapshot";
	my $location = "localhost";
	my $port_num = "3306";
	my $database = "DBI:mysql:$database_name:$location:$port_num";
	my $db_user = "root";
	my $db_pass = "joshgui12";
	my $dbh = DBI->connect($database,$db_user,$db_pass) or die $DBI::errstr;
	return $dbh;
	###############################################################
}
sub connect_to_testlink {
	###############################################################
	############### connect to database ###########################
	###############################################################
	my $database_name = "testlink";
	my $location = "localhost";
	my $port_num = "3306";
	my $database = "DBI:mysql:$database_name:$location:$port_num";
	my $db_user = "root";
	my $db_pass = "joshgui12";
	my $dbh = DBI->connect($database,$db_user,$db_pass) or die $DBI::errstr;
	return $dbh;
	###############################################################
}
sub connect_to_kingfisher {
	my $database_name = "bugs";
	my $location = "kingfisher";
	my $port_num = "3306";
	my $database = "DBI:mysql:$database_name:$location:$port_num";
	my $db_user = "bugs";
	my $db_pass = "bugs";
	$dbh = DBI->connect($database,$db_user,$db_pass) or die $DBI::errstr;
}

sub zapus_config {
	my %return;
	$return{'dept'} = param("dept");
	open (CONFIG, "<zapus.config");
	while (<CONFIG>) {
		next if /^#/ || /^$/;
		chomp;
		my ($var, $val) = split /\|/;
		$return{$var} = $val;
		if ($var =~ /cgi/) {
			if ($return{'dept'} eq "sitest") {
				$return{$var} .= "?dept=$return{'dept'}";
			}
		}
	}
	return \%return;
}

sub increment_counts {

	my $ref = shift;
	my $counts = shift;
	my $status = $ref->{'status'};
        $counts->{'total_time'} += $ref->{'test_time'};
        $counts->{'time_left'} += $ref->{'test_time'};

        # increment counts
          if ($status =~ /^Passed/) {
		$counts->{'passed'}++;
        	$counts->{'time_left'} -= $ref->{'test_time'};
          } elsif ($status =~ /Conditionally/) {
		$counts->{'conditionally_passed'}++;
          } elsif ($status =~ /Deferred/) {
		$counts->{'deferred'}++;
          } elsif ($status =~ /Failed/) {
		$counts->{'failed'}++;
          } elsif ($status =~ /Waived/) {
		$counts->{'waived'}++;
        	$counts->{'time_left'} -= $ref->{'test_time'};
	  } elsif ($status =~ /In Progress/) {
		$counts->{'in_progress'}++;
        	$counts->{'time_left'} -= $ref->{'test_time'};
          } else {
		$counts->{'untested'}++;
          }  
	$counts->{'total'}++;
	return $counts;
}

sub sanitize_testplan {
 
	my $fullstring = shift;
	my $searchstring = shift;
	my $foo;
 
	# put commas before and after comma separated string
	$fullstring = "," . $fullstring . ",";
	# bracket search string with commas
	$searchstring = "," . $searchstring . ",";
 
	# fullstring must contain the comma-bracketed searchsting, else fail
	unless ($fullstring =~ /$searchstring/) {
		$foo = "fail";
	} else {
		$foo = "success";
	}
	return $foo;
}        

sub init_sort_array {
# an array of the same name as the hash that gives readable values
# for the ordering types
my @sort_types;
         $sort_types[0] = "blank for the zeroeth element";
         $sort_types[1] = "Status, Testcase Author";
         $sort_types[2] = "Status, Feature";
         $sort_types[3] = "Testcase Author, Status";
         $sort_types[4] = "Feature, Status";
         $sort_types[5] = "Results ID desc";
         $sort_types[6] = "Testcase ID";
         $sort_types[7] = "Testcase Author, Testcase ID";
         $sort_types[8] = "Testcase Author, Feature";
         $sort_types[9] = "Feature, Testcase Author";
         $sort_types[10] = "Test plan desc, Results ID desc";
         $sort_types[11] = "Test plan desc, Feature";
         $sort_types[12] = "Feature, Tester";
         $sort_types[13] = "Tester, Feature";
         $sort_types[14] = "Status, Tester";
         $sort_types[15] = "Status, Results Id";
         $sort_types[16] = "Testcase ID desc";
         $sort_types[17] = "Testcase Author, Testcase ID desc";
         $sort_types[18] = "Testcase Feature, Testcase ID";
	 $sort_types[19] = "Assigned To, Status";
	 $sort_types[20] = "Priority, Status";
	 $sort_types[21] = "Reviewer, Testcase ID";
	return @sort_types;
}

sub init_sort_hash {

# a hash of different ways of ordering a result set
	my %sort_types = ( 
		   "1" => "results.status desc, testcases.author",
                   "2" => "results.status desc, testcases.feature",
                   "3" => "testcases.author, results.status desc",
                   "4" => "testcases.feature, results.status desc",
                   "5" => "results.results_id desc",
                   "6" => "testcases.test_case_id",
                   "7" => "testcases.author, testcases.test_case_id",
                   "8" => "testcases.author, testcases.feature",
                   "9" => "testcases.feature, testcases.author",
                  "10" => "results.test_plan desc, results.results_id",
                  "11" => "results.test_plan desc, testcases.feature",
                  "12" => "testcases.feature, results.tester",
                  "13" => "results.tester, testcases.feature",
                  "14" => "results.status desc, results.tester",
                  "15" => "results.status desc, results.results_id",
                  "16" => "testcases.test_case_id desc",
                  "17" => "testcases.author, testcases.test_case_id desc",
                  "18" => "testcases.feature, testcases.test_case_id",
		  "19" => "assignment.assigned_to, results.status desc",
		  "20" => "priority.priority, results.status desc",
		  "21" => "reviewer.reviewer, testcases.test_case_id"
                );
	return %sort_types; 
}

sub single_row_query {

	# takes an arbitrary SQL query that will return a single row in and returns a hash reference 
	# with keys the field names and the data as the values
	#
	# this is identical to multi_row_query except instead of a 1-element array of a single hash reference,
	# it simplifies to just a hash
	my $query = shift;
	my $dbh = shift;
	my %return;
	my $sth = $dbh->prepare($query);
	$sth->execute();
	my $ref = $sth->{NAME};
	my @array = @$ref;
	while (my $hashref = $sth->fetchrow_hashref()) {
		for (@array) {
			$return{$_} = $hashref->{$_};
		}
	}
	$sth->finish;
	return %return;

}

sub multi_row_query {

	# takes an arbitrary SQL query in and returns a LoH (array of hashes) array reference
	# with each return row from MySQL an element in the array
	# and each element a hash reference to data from the the table with the field name as the key and the data as the value
	my $query = shift;
	my $dbh = shift;
	my @return;
	#warn "$query\n";
	my $sth = $dbh->prepare($query);
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

sub all_person_info {
	my $query = "SELECT * from people order by name";
	my $ref = multi_row_query($query);
	return $ref;
}

sub person_info {
	my $ldap = shift;
	my $query = "SELECT * from people where email = \"$ldap\"";
	my $ref = single_row_query($query);
	my ($last, $first) = split /\s*,\s*/, $ref->{'name'};
	$ref->{'fullname'} = $first . " " . $last;
	return $ref;
}
sub ldap_user {
	$ENV{'LDAP_USER'} = $ENV{'REMOTE_USER'};
	$ENV{'LDAP_USER'} =~ s/.*?uid=(\w+),.*/$1/;
	return $ENV{'LDAP_USER'};
}

sub make_links_for_bugs {
	my $string = shift;
	chomp($string);
	my @numbers = split /\D+/, $string;
	return @numbers;
}

sub format_for_web {
	my $data = shift;
	$data =~ s/\n/<br>/g;
	$data =~ s/\t/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/g;
	return $data;
}

sub populate_array {
        my $sql = shift;
        my $field = shift;
        my $ref = multi_row_query($sql);
        my @return;
        for (@$ref) {
                push @return, $_->{$field};
        }
        return @return;
}

sub log_to_file {

	my @ary = @_;
	open(LOG,">>/tmp/zapus.debug");
	for (@ary) {
		print LOG $_ . "\n";
	}
	close(LOG);
}

sub all_ldap_users {
        my $ref = multi_row_query("select * from people");
        my %return;
        for (@$ref) {
                my $person = $_->{'name'};
                $return{$person} = $_->{'email'};
        }
        return \%return;
}

sub setup_status_vars {
	my @status = ('Untested', 'Passed', 'Conditionally Passed', 'Failed', 'In Progress', 'Deferred', 'Waived');
	my %status_sort = (
                        'Passed'        =>      '1',
                        'Conditionally Passed'  =>      '2',
                        'In Progress'   =>      '3',
                        'Deferred'      =>      '4',
                        'Waived'        =>      '5',
                        'Failed'        =>      '6',
                        'Untested'      =>      '7');
	my %status_classes = (
              "Passed" =>       'passed',
              "Failed" =>       'failed',
              "In Progress" =>  'in_progress',
              "Deferred" =>     'deferred',
                "Untested"      =>      'untested',
              "Waived"  =>      'waived',
                "Conditionally Passed"  =>      'conditionally_passed'
	);
        return \@status, \%status_sort, \%status_classes;
}

sub split_test_plan {
        my $string = shift;
        my @return;
        if ($string =~ /,/) {
                @return = split /\s*,\s*/, $string;
        } else {
                @return = ( $string );
        }
        return \@return;
}

sub trim {
    my $str = shift;
    $str =~ s/^\s+//g;
    $str =~ s/\s+$//g;
    return $str;
}

sub SqlQuote {
    my ($str) = shift;
    $str =~ s/([\\\'])/\\$1/g;
    $str =~ s/\0/\\0/g;
    return "'$str'";
}

sub get_attachments {
	my ($id, $table) = @_;
	my $query = "select * from attachments where link_id = $id and linked_table = \"$table\" order by attachment_id";
	my $return = multi_row_query($query);
	return $return;
}
