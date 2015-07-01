<?php
/*
DANGER
This will loop through whatever date ranges you enter and insert all those
entries into the database on each day. We read every night for 20 minutes, so
this was to save us time from having to enter it manually everyday


//
//
// Uncomment the require 'db_functions.php' line to make it work
// require 'db_functions.php';
//
//
//

// Start Date
$date = "2014-8-31";
$endDate = "2015-6-30"

// Form entries
$name = 'Oliver';
$subject = 'reading';
$location = 'primary home';
$notes = 'Bedtime reading';
$hours = '.33';



// Prepare it for entry
$name = db_quote($name);
$subject = db_quote($subject);
$location = db_quote($location);
$notes = db_quote($notes);
$hours = db_quote($hours);
while(strtotime($date) < strtotime($endDate)) {
    $date = date('Y-m-d', strtotime("+1 day", strtotime($date)));
    echo $date . '<br/>';

    // Insert it into the database
    $date_entry = db_quote($date);
    $result = db_query("INSERT INTO time (name,date,subject,location,notes,hours) VALUES (" . $name . "," . $date_entry . "," . $subject . "," . $location . "," . $notes . "," . $hours . ")");
    if($result === false) {
        // Handle failure - log the error, notify administrator, etc.
        $error = db_error();
        print $error;
    }
}
*/

?>
