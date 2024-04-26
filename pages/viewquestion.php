<!DOCTYPE html>
<html lang="en">    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        section{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding-top: 50px;
        }
        .questions{
            width:70%;
            /* height: 30vh; */
            padding: 40px;
            box-shadow: 0 0 3px black;
            border: 1px solid black;
            margin: 21px;
        }
        .question{
            font-size: 2rem;
        }
    </style>
</head>
<body>
<?php
    session_start();
    include "../includes/db.php";
    include "../includes/nav.php";

    ?>

    <section>

    <?php
    $id = $_REQUEST['id'];
    $sql = "SELECT * FROM `questions` WHERE `qn_id`='$id'";

    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
        ?>
            <div class="questions">
                <h3 class="question"><?php echo $row['question']; ?></h3>
                <?php
                    if($row['answer'] != ""){
                        ?>
                        <p style="padding:9px;font-size: 25px;"><?php echo "<b>Answer:-</b> <br>".$row['answer']; ?></p>

                        </div>
                        <?php
                    }
                   
                ?>
            </div>
            <?php        
    }

?>
</section>

</body>
</html>