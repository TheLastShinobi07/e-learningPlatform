<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .details{
            display: flex;
            justify-content: center;
            padding: 19px;
            margin-bottom: 155px;
        }
        .details table{
            width:80%;
        }
        .details table , th, td{
            border-collapse: none;
            padding:9px;
            text-align:center;
        }
        .details table thead{
            background:blue;
            color: white;
        }
        
    </style>
    <title>Admin</title>
</head>
<body>
    <?php
        include_once "nav.php";
    ?>
    <h3 class="section-title">Users</h3>
    <section class="details">
    <table>
        <thead>
            <tr>
                <th>S.N</th>
                <th>User Name</th>
                <th>E-mail</th>
                <th>CV</th>
                <th>user Role</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
    <?php

    include "../includes/db.php";

    $sql = "SELECT * FROM `teachers`";

    $result = mysqli_query($conn, $sql);
    $sn = 1;
    while($row = mysqli_fetch_assoc($result)){
        
        ?>

        <tr>
            <td><?php echo $sn; ?></td>
            <td><?php echo $row['fullname']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo "<a href='../pages/cv_s/$row[cv]'>View CV</a>"; ?></td>
            <td><?php echo $row['userrole']; ?></td>
            <td>Delete</td>
            <td><a href="approve.php?id=<?php echo $row['teacher_id']; ?>"> <?php echo $row['status'] ?></a></td>
        </tr>
        <?php
        $sn++;
    }


    // $sql = "UPDATE `teachers` SET `status`='[value-9]'";

    ?>
</body>
</html>