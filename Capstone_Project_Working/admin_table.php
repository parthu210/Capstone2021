<?php

session_start();
//database connection
include('db_connection.php'); 
include('nav.html');

?>

<link rel="stylesheet" href = "admin_style.css" type = "text/css">
<main class = "event_main">
        <div class = "newevent_btn">
                <a href="admin_addNew.php" class="btn btn-secondary" style="width: 200px;">New Entry</a>
        </div>

        <table class="mytable container">
        <thead>
                <tr>
                        <th class="titlename">#</th>
                        <th class="titlename">Name</th>
                        <th class="titlename">Username</th>
                        <th class="titlename">Type</th>
                        <th class="titlename">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                        $i = 1;
                        $admin = $db->query("SELECT * FROM admin");
                        while($row=$admin->fetch_assoc()):
                        $trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
                        unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);        
                ?>
                        <tr>
                        <td><?php echo $i++ ?></td>
                        
                        <td>
                                <p> <b><?php echo ucwords($row['name']) ?></b></p>
                        </td>
                        <td>
                                <p><?php echo $row['username'] ?></p>
                        </td>
                        <td>
                                <p><?php echo $row['admin_type'] ?></p>
                        </td>
                        <td class="adButtons">
                             <?= "<a href='admin_edit.php?id_admin=$row[id_admin]' class='btn btn-primary'>Edit</a>"; ?>
                             <?= "<a href='admin_delete.php?id_admin=$row[id_admin]' class='btn btn-danger'>Delete</a>"; ?>
                        </td>
                        </tr>
                        <?php endwhile; ?>
                </tbody>
        </table>
</main>