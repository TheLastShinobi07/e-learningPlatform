
<?php
session_start();

if(isset($_SESSION['name'])){
    if(isset($_POST['submit'])){
        include "../includes/db.php";
        $question = "<b>".$_POST['question']."</b>";
        $name = $_SESSION['name'];
        if($question != " "){
            $sql = "INSERT INTO `questions`(`question`, `question_by`) VALUES ('$question', '$name')";

            mysqli_query($conn, $sql);
            mysqli_close($conn);
        }
    }

}
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .post-question{
            display:flex;
            flex-direction:column;
            justify-content: center;
            align-items: center;
        }
        .post-question > h3{
            padding: 12px;
        }
        .post-question form{
            width: 60%;
        }
        .post-question #question{
            max-width:100%;
            min-width: 100%;
            max-height:40vh;
            min-height: 40vh;
            border: 1px solid blue;
            margin: 21px;
            padding: 21px;
        }
        .post-question form #submit-btn{
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
    <title>Ask Question</title>
</head>
<body>
    <?php
    if(isset($_SESSION['name'])){
        include "../includes/nav.php"; 
    ?>

        <section class="post-question">
            <h3>Ask A Question</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <textarea name="question" id="question" placeholder="Enter Question" required></textarea>
                </div>
                <div>
                    <button type="submit" name="submit" id="submit-btn">Post</button>
                </div>
            </form>
        </section>


        <h2 class="section-title">Question Details</h2>
    <section class="details">
        <table>
            <thead>
                <tr>
                    <th>Question</th>
                    <!-- <th>Course Category</th> -->
                    <th>View</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "../includes/db.php";
                    $sql = "SELECT * FROM `questions`";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        if($row['question_by'] == $_SESSION['name']){
                    
                ?>

                <tr>
                    <td><?php echo $row['question']; ?></td>
                    <!-- <td><?php echo $row['answer']; ?></td> -->
                    <td><a href="http://localhost/elearningapp/pages/viewquestion.php?id=<?php echo $row['qn_id']; ?>">View</a></td>
                    <td><a href="http://localhost/elearningapp/pages/questiondelete.php?id=<?php echo $row['qn_id']; ?>">Delete</a></td>
                </tr>
                <?php
                        }
                    }
                ?>
            </tbody>

        </table>
    </section>


    <?php
        include "../includes/footer.php";
        }else{
            header("location:http://localhost/elearningapp/pages/stud_login.php");
        }
        
    ?>


</body>
</html>