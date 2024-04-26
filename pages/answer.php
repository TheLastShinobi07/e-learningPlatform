
<?php
session_start();

if(isset($_SESSION['pub_id'])){
    if(isset($_POST['submit'])){
        include "../includes/db.php";
        $answer = $_POST['answer'];
        $name = $_SESSION['name'];
        // $id = $_POST['id'];
        $id = $_REQUEST['id'];
        $sql = "UPDATE `questions` SET `answer`='$answer', `answer_by`='$name' WHERE `qn_id`='$id'";

        mysqli_query($conn, $sql);
        mysqli_close($conn);
    }

}
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .post-answer{
            display:flex;
            flex-direction:column;
            justify-content: center;
            align-items: center;
        }
        .post-answer > h3{
            padding: 12px;
        }
        .post-answer form{
            width: 60%;
        }
        .post-answer #answer{
            max-width:100%;
            min-width: 100%;
            max-height:40vh;
            min-height: 40vh;
            border: 1px solid blue;
            margin: 21px;
            padding: 21px;
        }
        .post-answer form #submit-btn{
            padding:9px;
            margin: 6px;
            width: 200px;
            border: none;
            outline: none;
            background: blue;
            color: white;
            border-radius: 9px;
            font-weight: bold;
        }

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
    <title>Answer this Question</title>
</head>
<body>
    <?php
    if(isset($_SESSION['name'])){
        include "../includes/nav.php"; 
    ?>


<section class="details">
    <?php
        include "../includes/db.php";
        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM `questions` WHERE `qn_id`='$id'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            echo "<h2>".$row['question']."</h2>";
        }
        
    ?>

    </section>

        <section class="post-answer">
            <h3>Answer this Question</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <textarea name="answer" id="answer" placeholder="Answer this Question" required></textarea>
                </div>
                <!-- <div>
                    <input type="text" name="id" id="id" value="<?php echo $id; ?>">
                </div> -->
                <div>
                    <button type="submit" name="submit" id="submit-btn">Post Answer</button>
                </div>
            </form>
        </section>





    <?php
        include "../includes/footer.php";
        }else{
            header("location:http://localhost/elearningapp/pages/stud_login.php");
        }
        
    ?>


</body>
</html>