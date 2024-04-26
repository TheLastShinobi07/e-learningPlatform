<?php
session_start();

    include "../includes/db.php";

    $id = $_REQUEST['id'];
    $sql = "DELETE FROM `courses` WHERE `id`='$id'";
    $select = "SELECT * FROM `courses` WHERE `id`='$id'";
    mysqli_query($conn, $sql);
    $result = mysqli_query($conn, $select);
    while ($row = mysqli_fetch_assoc($result)) {
        unlink($row['course_file']);
    }
    mysqli_close($conn);
    ?>
    <script>
        setInterval(() => {
            javascript:history.go(-1);
        }, 50);
    </script>
    <?php
    // echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">« Go back</a></p>'; 

?>