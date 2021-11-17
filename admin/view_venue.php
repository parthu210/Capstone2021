<?php
//database connection
include('db_connection.php'); ?>
<button type="button" onclick="document.location.href='new_venue.php';">Add Venues</button>
<table>
       <thead>
            <tr>
                <th style="padding:10px">#</th>
                <th style="padding:10px">Venue</th>
                <th style="padding:10px">Address</th>
                <th style="padding:10px">Description</th>
                <th style="padding:10px">Rate</th>
                <th style="padding:10px">Audiance Capacity</th>
                <th style="padding:10px">Action</th>
            </tr>
        </thead>
        <tbody>
             <?php
                  $i = 1;
                  $venue = $db->query("SELECT * FROM venues");
                  while($row=$venue->fetch_assoc()):
                    $trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
                    unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);        
             ?>
                <tr>
                    <td style="padding:10px"><?php echo $i++ ?></td>
                    
                    <td style="padding:10px">
                            <p> <b><?php echo ucwords($row['name']) ?></b></p>
                    </td>
                    <td style="padding:10px">
                            <p><?php echo $row['address'] ?></p>
                    </td>
                    <td style="padding:10px">
                            <p><?php echo $row['description'] ?></p>
                    </td>
                    <td style="padding:10px">
                            <p><?php echo number_format($row['rate'],2) ?></p>
                    </td>
                    <td style="padding:10px">
                            <p><?php echo number_format($row['capacity'],2) ?></p>
                    </td>
                    <td style="padding:10px">
                        <button type="button">Edit</button>
                        <button type="button">Delete</button>
                    </td>
                </tr>
                <?php endwhile; ?>
        </tbody>
</table>