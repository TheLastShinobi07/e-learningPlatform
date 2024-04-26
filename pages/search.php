<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing:border-box;
        }
        .container{
            width: 100%;
            height: 100vh;
            overflow-y: auto;
            display: flex;
            flex-wrap:wrap;
            justify-content: space-evenly;
            padding-top: 120px;
            margin-bottom: 120px;
        }
        .card{
            width: 400px;
            padding: 9px;
            box-shadow: 0 0 3px black;
            margin: 9px;
            margin-top: 21px;
        }
        .card-img{
            width:100%;
        }
    </style>
</head>
<body>

        <?php
            session_start();
            include "../includes/nav.php";
            $string = $_REQUEST['search']; // a string
            $arrayString=  explode(" ", $string ); // split string with space (white space) as a delimiter.
            
        ?>

    <section class="container">
        <?php
            
            if(isset($_GET['submit'])){
                include "../includes/db.php";

                $search = $_GET['search'];

                $sql = "SELECT * FROM `courses` WHERE `course_name` LIKE '%". $search . "%' OR `course_desc` LIKE '%". $search . "%'";

                $results = mysqli_query($conn, $sql);
                ?>
                <h1 class="search-query-title">Your Search Query: <?php echo $_GET['search']; ?></h>
                <?php
                while ($row = mysqli_fetch_array($results)) {
                    ?>
                    <!-- <div class="card">
                        <img src="./thumbnails/<?php echo $row['thumbnail'] ?>" alt="" class="card-img">
                        <div class="card-bottom">
                            <h3><?php echo $row['course_name']; ?></h3>
                        </div>
                    </div> -->

                    <a href="http://localhost/elearningapp/pages/courseview.php?file=<?php echo $row['course_file']; ?>">
                    <div class="card">
                        <img src='<?php echo "./thumbnails/".$row['thumbnail']; ?>' alt="" class="card-img">
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
            }

        ?>
    </section>
</body>
</html>
