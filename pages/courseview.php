<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        #file-view{
            width: 100%;
            margin: auto;
        }
        #file-view iframe{
            width:100%;
            height: 100vh;
        }
    </style>
</head>
<body>
    <?php
        // include "../includes/nav.php";
        if(isset($_SESSION['name'])){
            $file = $_REQUEST['file'];
            $pdffile = "./course_pdf/$file";
            ?>
            <div id="file-view">
            <iframe src='<?php echo $pdffile; ?>'></iframe>
            </div>
            <?php
        }
        else{
            header("location:http://localhost/elearningapp/pages/stud_login.php");
        }
    ?>
</body>
</html>