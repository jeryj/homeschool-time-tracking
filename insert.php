<?php
    require 'db_functions.php';
    // Insert values into table
    // Quote and escape form submitted values
    if( !empty($_POST['name']) ) {
        $name = db_quote($_POST['name']);
    }
    if( !empty($_POST['date']) ) {
        $date = db_quote($_POST['date']);
    }
    if( !empty($_POST['subject']) ) {
        $subject = db_quote($_POST['subject']);
    }
    if( !empty($_POST['location']) ) {
        $location = db_quote($_POST['location']);
    }
    if( !empty($_POST['notes']) ) {
        $notes = db_quote($_POST['notes']);
    }
    if( !empty($_POST['hours']) ) {
        $hours = db_quote($_POST['hours']);
    }

    if(!empty($name) && !empty($date) && !empty($subject) && !empty($location) && !empty($hours) ) {
        // Insert the values into the database
        $result = db_query("INSERT INTO time (name,date,subject,location,notes,hours) VALUES (" . $name . "," . $date . "," . $subject . "," . $location . "," . $notes . "," . $hours . ")");
        if($result === false) {
            // Handle failure - log the error, notify administrator, etc.
            $error = db_error();
            print $error;
        }
    } else {
        echo 'something is empty <br/>';
        if(empty($name)) {
            echo '<br/>Name is empty';
        } else {
            echo '<br/>Name is '.$name;
        }

        if(empty($date)) {
            echo '<br/>date is empty';
        } else {
            echo '<br/>date is '.$date;
        }

        if(empty($subject)) {
            echo '<br/>subject is empty';
        } else {
            echo '<br/>subject is '.$subject;
        }

        if(empty($location)) {
            echo '<br/>location is empty';
        } else {
            echo '<br/>location is '.$location;
        }

        if(empty($notes)) {
            echo '<br/>notes is empty';
        } else {
            echo '<br/>notes is '.$notes;
        }

        if(empty($hours)) {
            echo '<br/>hours is empty';
        } else {
            echo '<br/>hours is '.$hours;
        }
    }


    header('Location: '.$_SERVER["PHP_SELF"].'/..');
?>
