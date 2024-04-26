<?php
    include "../includes/db.php";

    $id = $_REQUEST['id'];
    $select = "SELECT * FROM `category` WHERE `cat_id`='$id'";
    $result = mysqli_query($conn, $select);
    while ($row = mysqli_fetch_assoc($result)) {
        unlink($row['cat_thumbnail']);
    }

    $sql = "DELETE FROM `category` WHERE `cat_id`='$id'";
    mysqli_query($conn, $sql);
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