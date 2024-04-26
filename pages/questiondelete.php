<?php
    include "../includes/db.php";

    $id = $_REQUEST['id'];
    $select = "DELETE FROM `questions` WHERE `qn_id`='$id'";
    $result = mysqli_query($conn, $select);
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