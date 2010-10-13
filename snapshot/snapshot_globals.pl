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
	my $db_pass = "testlink";
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
	my $db_pass = "testlink";
	my $dbh = DBI->connect($database,$db_user,$db_pass) or die $DBI::errstr;
	return $dbh;
	###############################################################
}

sub connect_to_ozilla {
	my $database_name = "bugs";
        my $location = "tux";
        my $port_num = "3306";
        my $database = "DBI:mysql:$database_name:$location:$port_num";
        my $db_user = "nobody";
        my $dbh = DBI->connect($database,$db_user) or die $DBI::errstr;
        return $dbh;

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
