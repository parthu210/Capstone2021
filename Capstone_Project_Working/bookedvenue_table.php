<?php

//database connection
include('db_connection.php'); 
include('nav.html');

?>

<link rel="stylesheet" href = "bookedtable_style.css" type = "text/css">
<main class = "event_main">
        <div class = "newevent_btn">
                <a href="booking_addNew.php" class="btn btn-secondary" style="width: 200px;">New Entry</a>
        </div>
<table class="mytable container">
       <thead>
            <tr>
                <th class="titlename">#</th>
                <th class="titlename">Name</th>
                <th class="titlename">Email</th>
                <th class="titlename">Contact</th>
                <th class="titlename">Event Type</th>
                <th class="titlename">Date & Time</th>
                <th class="titlename">Duration</th>
                <th class="titlename">Description</th>
                <th class="titlename">Venue</th>
                <th class="titlename">Action</th>
            </tr>
        </thead>
        <tbody>
             <?php
                  $i = 1;
                  $bookings = $db->query("SELECT * FROM bookings JOIN venues ON bookings.venue = venues.id_venues");
                  while($row=$bookings->fetch_assoc()):
                    $trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
                    unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);        
             ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    
                    <td>
                            <p> <b><?php echo ucwords($row['firstname'].' '.$row['lastname']) ?></b></p>
                    </td>
                    <td>
                            <p><?php echo $row['email'] ?></p>
                    </td>
                    <td>
                            <p><?php echo $row['contact'] ?></p>
                    </td>
                    <td>
                            <p><?php echo $row['eventtype'] ?></p>
                    </td>
                    <td>
                            <p><?php echo date("M d, Y h:i A",strtotime($row['datetime'])) ?></p>
                    </td>
                    <td>
                            <p><?php echo $row['duration'] ?></p>
                    </td>
                    <td>
                            <p><?php echo $row['event_description'] ?></p>
                    </td>
                    <td>
                            <p><?php echo $row['name'] ?></p>
                    </td>
                    <td class="adButtons">
                        <?= "<a href='booking_edit.php?id_bookings=$row[id_bookings]' class='btn btn-primary'>Edit</a>"; ?>
                        <?= "<a href='booking_delete.php?id_bookings=$row[id_bookings]' class='btn btn-danger'>Delete</a>"; ?>
                    </td>
                </tr>
                <?php endwhile; ?>
        </tbody>
</table>
</main>
