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

        .search-query-title{
            font-size: 2.4rem;
            text-align: center;
            padding: 6px;
            margin-top: 20px;
        }

        section .section-title{
            font-size: 30px;
        }     
        .container{
            width: 100%;
            /* height: 100vh; */
            overflow-y: auto;
            display: flex;
            flex-wrap:wrap;
            justify-content: space-evenly;
            padding-top: 60px;
            margin-bottom: 120px;
        }
        .card{
            width: 400px;
            height: 300px;
            padding: 9px;
            box-shadow: 0 0 3px black;
            margin: 9px;
            margin-bottom: 40px;
        }
        .card-img{
            width:100%;
            height: 80%;
        }
    </style>
</head>
<body>
    <?php
        include "../includes/nav.php";
        include "../includes/db.php";
    ?>
    
        <h3 class="section-title">Category: <?php 
            $category = $_REQUEST['category'];
            echo $category ?>
        </h3>
        <div class="container">
            <?php
                $sql = "SELECT * FROM `courses` WHERE `course_category`='$category'";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                
            ?>
                <a href="http://localhost/elearningapp/pages/courseview.php?file=<?php echo $row['course_file']; ?>">
                    <div class="card">
                        <img src='<?php echo "./thumbnails/".$row['thumbnail']; ?>' alt=""  class="card-img">
                        <div>
                            <h3 style="width: 100%;overflow-y:U+2026;"><?php echo $row['course_name']; ?></h3>
                            <div class="stars">
                            <!-- <box-icon name='star'></box-icon><box-icon name='star'></box-icon><box-icon name='star'></box-icon><box-icon name='star'></box-icon><box-icon name='star'></box-icon> -->
                            </div>
                            <h4><?php  ?></h4>
                        </div>
                    </div>
                </a>
            <?php
                }
            ?>
        </div>
     <?php
        include "../includes/footer.php";
    ?>
</body>
</html>