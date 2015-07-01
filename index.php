<?php require_once('login.php');?>
<html>
    <head>
        <title>Time Tracking</title>
        <link rel="stylesheet" href="style.css" type="text/css" media="all"/>
        <script type='text/javascript' src="js/jquery.js"></script>
        <script type='text/javascript' src="js/scripts.js"></script>

        <?php require 'db_functions.php';?>


    </head>
    <body>
        <div class="masthead">
            <div class="container">
                <h4 class="no-margin">Homeschool Hours</h4>
            </div>
        </div>

        <div class="container">
            <div class="gutters row">
                <div class="col grid_4">
                    <form action="insert.php" method="post">
                        <select name="name" class="invisible">
                          <option value="Oliver">Oliver</option>
                          <option value="Oakley">Oakley</option>
                        </select>
                        <label>Date</label>
                        <input type="text" name="date" class="date-field" />
                        <label>Subject</label>
                        <select name="subject">
                          <option value="reading">Reading</option>
                          <option value="math">Math</option>
                          <option value="science">Science</option>
                          <option value="social studies">Social Studies</option>
                          <option value="language arts">Language Arts</option>
                          <option value="ASL">ASL</option>
                          <option value="art">Art</option>
                          <option value="music">Music</option>
                          <option value="pe">Physical Ed</option>
                          <option value="critical thinking">Critical Thinking</option>
                        </select>
                        <label>Location</label>
                        <select name="location">
                          <option value="primary home">Primary/Home</option>
                          <option value="non-primary home">Non-Primary/Home</option>
                          <option value="primary away">Primary/Away</option>
                          <option value="non-primary away">Non-Primary/Away</option>
                        </select>
                        <label>Notes</label>
                        <input type="text" name="notes" />
                        <label>Hours</label>
                        <input type="text" name="hours" />
                        <br/>
                        <input class="btn" type="submit" />
                    </form>
                </div>

                <div class="col grid_4">
                    <table class="time">
                        <tbody>
                            <thead>
                                <td>Subject</td>
                                <td>Hours</td>
                            </thead>
                            <tr>
                                <td>Reading</td>
                                <td><?php echo hours_sum("subject = 'reading'");?></td>
                            </tr>
                            <tr>
                                <td>Science</td>
                                <td><?php echo hours_sum("subject = 'science'");?></td>
                            </tr>
                            <tr>
                                <td>Math</td>
                                <td><?php echo hours_sum("subject = 'math'");?></td>
                            </tr>
                            <tr>
                                <td>Social Studies</td>
                                <td><?php echo hours_sum("subject = 'social studies'");?></td>
                            </tr>
                            <tr>
                                <td>Language Arts</td>
                                <td><?php echo hours_sum("subject = 'language arts'");?></td>
                            </tr>
                            <tr>
                                <td>ASL</td>
                                <td><?php echo hours_sum("subject = 'ASL'");?></td>
                            </tr>
                            <tr>
                                <td>Art</td>
                                <td><?php echo hours_sum("subject = 'art'");?></td>
                            </tr>
                            <tr>
                                <td>Music</td>
                                <td><?php echo hours_sum("subject = 'music'");?></td>
                            </tr>
                            <tr>
                                <td>Physical Ed</td>
                                <td><?php echo hours_sum("subject = 'pe'");?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: 600;">Core Hours Total</td>
                                <td style="font-weight: 600;"><?php echo hours_sum("subject = 'reading'") + hours_sum("subject = 'science'") + hours_sum("subject = 'math'") + hours_sum("subject = 'social studies'") + hours_sum("subject = 'language arts'");?></td>
                            </tr>
                            <tr class="standout-row">
                                <td>Total</td>
                                <td><?php echo hours_sum();?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <?php
                    // A select query. $result will be a `mysqli_result` object if successful
                    $endDate = date('Y-m-d');
                    $startDate = date('Y-m-d', strtotime("-30 day", strtotime($endDate)));
                    $result = db_query("SELECT date, subject, location, notes, hours FROM time WHERE date BETWEEN '$startDate' AND '$endDate' ORDER BY date DESC");

                    if($result === false) {
                        // Handle failure - log the error, notify administrator, etc.
                        $error = db_error();
                        print $error;
                    } else {
                        // Fetch all the rows in an array
                        $rows = array();?>

                        <table class="time">
                            <tbody>
                                <thead>
                                    <td class="date">Date</td>
                                    <td class="subject">Subject</td>
                                    <td class="location">Location</td>
                                    <td class="notes">Notes</td>
                                    <td class="hours">Hours</td>
                                </thead>


                        <?php while ($row = mysqli_fetch_assoc($result)) {
                            $rows[] = $row;?>

                            <tr>
                                <td class="date"><?php echo $row['date'];?></td>
                                <td class="subject"><?php echo $row['subject'];?></td>
                                <td class="location"><?php echo $row['location'];?></td>
                                <td class="notes"><?php echo $row['notes'];?></td>
                                <td class="hours"><?php echo $row['hours'];?></td>
                            </tr>


                        <?php } ?>

                            <tr class="standout-row">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Total Hours</td>
                                <td class='hours'><?php echo hours_sum();?></td>
                            </tr>

                            </tbody>
                        </table>

                    <?php } ?>
                </div>
            </div><!-- .container -->
    </body>
</html>
