<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
    <style>
        .contact{
            width:100%;
            height: 80vh;
            display:flex;
            flex-direction: column;
            justify-content:center;
            align-items:center;
        }
        .contact h1{
            font-size: 40px;
            padding:9px;
            margin-bottom: 9px;
        }
        .contact form{
            width:60%;
            padding:15px;
        }
        .contact form input, textarea{
            width: 90%;
            padding: 9px;
            margin: 9px;
            border: 1.5px solid blue;
            outline: blue;
        }
        .contact form textarea{
            max-width: 90%;
            max-height: 200px;
            min-width: 90%;
            min-height: 200px;
        }
        .contact form #submit_btn{
            padding: 9px;
            margin: 9px;
            background-color: blue;
            color: white;
            border: none;
            box-shadow: 0 0 3px black;
        }
    </style>
</head>
<body>
    <?php
        include "../includes/nav.php";
    ?>
    <section class="contact">
        <h1>Contact Us</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

            <div>
                <input type="text" name="name" id="name" placeholder="Full Name">
            </div>
            <div>
                <input type="email" name="email" id="email" placeholder="E-Mail">
            </div>
            <div>
                <textarea name="message" id="message" placeholder="Message..."></textarea>
            </div>
            <div>
                <button type="submit" name="submit" id="submit_btn">Submit</button>
            </div>

        </form>
      
    </section>

    <?php
        include "../includes/footer.php";
    ?>
</body>
</html>


<?php

    if(isset($_POST['submit'])){
        include "../includes/db.php";
        $name = format_data($_POST["name"]);
        $email = format_data($_POST["email"]);
        $message = format_data($_POST["message"]);

        $sql = "INSERT INTO `contacts`(`fullname`, `email`, `message`) VALUES ('$name','$email', '$message')";

        mysqli_query($conn, $sql);
        mysqli_close($conn);
        ?>
        <script>
            alert("Message Sent!");
            setInterval(() => {
                alert("We will respond shortly!");
            }, 50);
        </script>
        <?php
    }

    function format_data($data){
        $data = trim($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>