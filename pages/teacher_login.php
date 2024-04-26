<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <style>
         #error{
            display:none;
            width: 50%;
            background-color:red;
            color: white;
            padding: 9px;
            margin: 8px;
            box-shadow: 0 0 6px black;
        }
    </style>
    <title>Login</title>
</head>
<body>
    <div id="error"> </div>
    <section class="main-container">
        
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <h1>Teacher Login</h1>
            <div>
                <label for="email">E-mail:- </label>
                <input type="email" name="email" id="email">
            </div>
            <div>
                <label for="password">Password:- </label>
                <input type="password" name="password" id="password">
            </div>
            <div>
                <button type="submit" name="submit" id="submit-btn">Submit</button>
            </div>
        </form>

        <a href="#" id="forget">Forget Password?</a>

        <h3 id="or">OR</h3>

        <div>
            <h4>Don't have an account? <a href="http://localhost/elearningapp/pages/teacher_regestration.php">Create Account</a></h4>
        </div>
    </section>

</body>
</html>

<?php

session_start();
if(isset($_POST['submit'])){
    include "../includes/db.php";

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $email_p = "/^[a-zA-Z\d]+@[a-zA-Z\d]+\.[a-zA-z\d\.]{2,}+$/";

    if (!preg_match($email_p, $email)) {
        echo "<script>alert('E-mail Pattern didn\'t matched')</script>";
    }else{
        $sql = "SELECT * FROM `teachers` WHERE `email`='$email'";

        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['status'] == "approved") {
                if ($row['email'] != $email) {
                    ?>
                        <script>
                            document.getElementById('error').style.display = "block";
                            document.getElementById('error').innerText = "Wrong E-mail";
                        </script>
                    <?php
                }else if($row['password'] != $password){
                    ?>
                            <script>
                                document.getElementById('error').style.display = "block";
                                document.getElementById('error').innerText = "Wrong Password";
                            </script>
                        <?php
                }else{
                    $_SESSION['name'] = $row['fullname'];
                    $_SESSION['pub_id'] = $row['pub_id'];
                    header("location:http://localhost/elearningapp/pages/teacher_pannel.php?".http_build_query(array('fullname' => $row['fullname'], 'pub_id' => $row['pub_id'])));
                }
            }
        }
    }
}

?>