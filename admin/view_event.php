<?php
//database connection
include('db_connection.php'); ?>
<button type="button" onclick="document.location.href='new_venue.php';">Add Event</button>
<table>
       <thead>
            <tr>
                <th style="padding:10px">#</th>
                <th style="padding:10px">Schedule</th>
                <th style="padding:10px">Venue</th>
                <th style="padding:10px">Description</th>
                <th style="padding:10px">Banner</th>
                <th style="padding:10px">Venu Name</th>
            </tr>
        </thead>
        <tbody>
             <?php
                  $i = 1;
                  $events = $db->query("SELECT * FROM events");
                  while($row=$events->fetch_assoc()):
                    $trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
                    unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);        
             ?>
                <tr>
                    <td style="padding:10px"><?php echo $i++ ?></td>
                    
                    <td style="padding:10px">
                            <p> <b><?php echo ucwords($row['schedule']) ?></b></p>
                    </td>
                    <td style="padding:10px">
                            <p><?php echo $row['venue'] ?></p>
                    </td>
                    <td style="padding:10px">
                            <p><?php echo $row['description'] ?></p>
                    </td>
                    <td style="padding:10px">
                            <p><?php echo $row['banner'] ?></p>
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
                        <button type="button">Delete</button>
                    </td>
                </tr>
                <?php endwhile; ?>
        </tbody>
</table>