<?php
//database connection
include('db_connection.php'); ?>


<button type="button" onclick="document.location.href='new_booking.php';">Book Now</button>
<table>
       <thead>
            <tr>
                <th style="padding:10px">#</th>
                <th style="padding:10px">First Name</th>
                <th style="padding:10px">Last Name</th>
                <th style="padding:10px">email</th>
                <th style="padding:10px">Contact</th>
                <th style="padding:10px">Duration</th>
                <th style="padding:10px">Date & Time</th>
                <th style="padding:10px">Event Name</th>
                <th style="padding:10px">Venue Name</th>
            </tr>
        </thead>
        <tbody>
             <?php
                  $i = 1;
                  $bookings = $db->query("SELECT * FROM booked_venue");
                  while($row=$bookings->fetch_assoc()):
                    $trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
                    unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);        
             ?>
                <tr>
                    <td style="padding:10px"><?php echo $i++ ?></td>
                    
                    <td style="padding:10px">
                            <p> <b><?php echo ucwords($row['first name']) ?></b></p>
                    </td>
                    <td style="padding:10px">
                            <p><?php echo $row['last name'] ?></p>
                    </td>
                    <td style="padding:10px">
                            <p><?php echo $row['email'] ?></p>
                    </td>
                    <td style="padding:10px">
                            <p><?php echo $row['contact'] ?></p>
                    </td>
                    <td style="padding:10px">
                            <p><?php echo $row['duration'] ?></p>
                    </td>
                    <td style="padding:10px">
                            <p><?php echo $row['datetime'] ?></p>
                    </td>
                    <td style="padding:10px">
                            <p><?php 
                            $event_id = $row['id_event'];
                            $result = mysqli_query($db,"select venue from events where id_event = $event_id");
                            $row3 = $result->fetch_assoc();
                            echo $row3['venue'] ?></p>
                    </td>
                    <td style="padding:10px">
                            <p><?php
                             $venue_id = $row['id_venues'];
                             $result2 = mysqli_query($db,"select name from venues where id_venues = $venue_id");
                             $row2 = $result2->fetch_assoc();
                             echo $row2['name'];
                             ?></p>
                    </td>
                    
                    
                    <td style="padding:10px">
                        <button type="button">Edit</button>
                        
                        <button type="button" onclick=deletebooking(<?php echo $row['id_booked_venues']?>)>Delete</button>
                    </td>
                </tr>
                <?php endwhile; ?>
        </tbody>
</table>

<!-- <script>

function deletebooking(bookingid){
        $('.button').click(function(){
                $.ajax({
                        type: "POST",
                        url: "deletebooking.php",
                        data: { eventbookingid: bookingid }
                        }).done(function( msg ) {
                        alert( "Data Saved: " + msg );
                });
        });
}

</script> -->