<?php
session_start();


if (isset($_SESSION['admin_name'])){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .container{
            width: 80%;
            height: 30vh;
            margin-left:auto;
            margin-right: auto;
            margin-top: 20px;
            background-color: grey;
            display:flex;
            justify-content: space-evenly;
            align-items: center;
            padding: 6px;
        }
        .container .box{
            width: 250px;
            height: 150px;
            background-color: red;
            transition: all 0.5s linear;
            color:white;
            text-shadow: 0 0 2px black;
        }
        .container .box:hover{
            scale: 1.2;
            cursor: pointer;
            box-shadow: 0 0 2px black;
        }
        #box1{
            background-color:#1C4E80;
        }
        #box2{
            background-color:#0091D5;
        }
        #box3{
            background-color:#1F3F49;
        }
        #box4{
            background-color:#488A99;
        }
        .container .box .card-title{
            padding: 15px;
            font-size: 2.5rem;
        }
        .container .box .card-bottom{
            padding-left: 9px;
            padding-bottom: 9px;
            font-size: 27px;
            text-align: bottom;
        }
    </style>
    <title>Admin</title>
</head>
<body>
    <?php
        include "nav.php";
        include "../includes/db.php";
    ?>



    <div class="container">
        <div class="box" id="box1">
            <?php
                $stu = "SELECT `stud_id` FROM `students`";
                $result = mysqli_query($conn, $stu);
                $count = mysqli_num_rows($result);
            ?>
            <h3 class="card-title"><?php echo $count; ?></h3>
            <h4 class="card-bottom">Total Students</h4>
        </div>

        <div class="box" id="box2">
            <?php
                $stu = "SELECT `teacher_id` FROM `teachers`";
                $result = mysqli_query($conn, $stu);
                $count = mysqli_num_rows($result);
            ?>
            <h3 class="card-title"><?php echo $count; ?></h3>
            <h4 class="card-bottom">Total Teachers</h4>
        </div>

        <div class="box" id="box3">
            <?php
                $stu = "SELECT `id` FROM `courses`";
                $result = mysqli_query($conn, $stu);
                $count = mysqli_num_rows($result);
            ?>
            <h3 class="card-title"><?php echo $count; ?></h3>
            <h4 class="card-bottom">Total Courses</h4>
        </div>
        <div class="box" id="box4">
            <?php
                $stu = "SELECT `qn_id` FROM `questions`";
                $result = mysqli_query($conn, $stu);
                $count = mysqli_num_rows($result);
            ?>
            <h3 class="card-title"><?php echo $count; ?></h3>
            <h4 class="card-bottom">Questions Asked</h4>
        </div>
    </div>

    <?php
        include_once "addcategory.php";
    ?>
    
</body>
</html>


<?php
}else{
    header("location:http://localhost/elearningapp/admin/adminlogin.php");
}
?>