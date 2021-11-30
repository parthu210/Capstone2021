<?php
//database connection
include('db_connection.php'); 
include('nav.html');
?>
<link rel="stylesheet" href = "event_style.css" type = "text/css">
<main class = "event_main">
        <div class = "newevent_btn">
                <a href="event_addNew.php" class="btn btn-secondary" style="width: 200px;">New Entry</a>
        </div>
        <table class="mytable container">
        <thead>
                <tr>
                        <th class="titlename">#</th>
                        <th class="titlename">Event</th>
                        <th class="titlename">Schedule</th>
                        <th class="titlename">Venue</th>
                        <th class="titlename">Description</th>
                        <!-- <th class="titlename">Picture</th> -->
                        <th class="titlename">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                        $i = 1;
                        $event = $db->query("SELECT * FROM events JOIN venues ON events.id_venues = venues.id_venues");
                        while($row=$event->fetch_assoc()):
                        $trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
                        unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);        
                ?>
                        <tr>
                        <td><?php echo $i++ ?></td>
                        
                        <td>
                                <p> <?php echo ucwords($row['event']) ?> </p>
                        </td>
                        <td>
                                <p><?php echo date("M d, Y h:i A",strtotime($row['schedule'])) ?></p>
                        </td>
                        <td>
                                <p><?php echo ucwords($row['name']) ?></p>
                        </td>
                        <td>
                                <p><?php echo ucfirst($row['eve_description']) ?></p>
                        </td>
                        
                        <td class="adButtons">
                                
                        <?= "<a href='event_edit.php?id_event=$row[id_event]' class='btn btn-primary'>Edit</a>"; ?>
                        <?= "<a href='event_delete.php?id_event=$row[id_event]' class='btn btn-danger'>Delete</a>"; ?>
                        </td>
                        </tr>
                        <?php endwhile; ?>
                </tbody>
        </table>
</main>