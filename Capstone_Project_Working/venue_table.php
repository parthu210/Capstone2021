<?php
//database connection
include('db_connection.php');
include('nav.html');
 ?>

<link rel="stylesheet" href = "venue_style.css" type = "text/css">
<main class = "event_main">
        <div class = "newevent_btn">
                <a href="venue_addNew.php" class="btn btn-secondary" style="width: 200px;">New Entry</a>
        </div>

<table class="mytable container">
       <thead>
            <tr>
                <th class="titlename">#</th>
                <th class="titlename">Venue</th>
                <th class="titlename">Address</th>
                <th class="titlename">Description</th>
                <th class="titlename">Rate</th>
                <th class="titlename">Audiance Capacity</th>
                <th class="titlename">Action</th>
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
                    <td><?php echo $i++ ?></td>
                    
                    <td>
                            <p> <b><?php echo ucwords($row['name']) ?></b></p>
                    </td>
                    <td>
                            <p><?php echo $row['address'] ?></p>
                    </td>
                    <td>
                            <p><?php echo $row['description'] ?></p>
                    </td>
                    <td>
                            <p><?php echo '$'.number_format($row['rate'],2) ?></p>
                    </td>
                    <td>
                            <p><?php echo $row['capacity'] ?></p>
                    </td>
                    <td class="adButtons">
                    <?= "<a href='venue_edit.php?id_venues=$row[id_venues]' class='btn btn-primary'>Edit</a>"; ?>
                    <?= "<a href='venue_delete.php?id_venues=$row[id_venues]' class='btn btn-danger'>Delete</a>"; ?>
                    </td>
                </tr>
                <?php endwhile; ?>
        </tbody>
</table>
</main>