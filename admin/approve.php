<?php

include "../includes/db.php";

$id = $_REQUEST['id'];

$sql = "UPDATE `teachers` SET `status`='approved' WHERE `teacher_id`='$id'";

mysqli_query($conn, $sql);
mysqli_close($conn);

header("location:http://localhost/elearningapp/admin/teachers.php");
?>

