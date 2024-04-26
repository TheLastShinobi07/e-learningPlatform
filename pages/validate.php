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
            <h1>Student Login</h1>
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
            <h4>Don't have an account? <a href="http://localhost/elearningapp/pages/stud_regestration.php">Create Account</a></h4>
        </div>
    </section>
    
    <script>
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        let btn = document.getElementById('submit-btn');

        btn.addEventListener('click', (e)=>{
            if(email == "" || password == ""){
                e.preventDefault();
                document.getElementById('error').style.display = "block";
                document.getElementById('error').innerText = "Please Fill all the fields";
                btn.setAttribute('type', 'submit');
            }
        });
    </script>

</body>
</html>


<?php

session_start();
if(isset($_POST['submit'])){
    include "../includes/db.php";

    $email = $_POST['email'];
    $password = md5($_POST['password']);


    // $sql = "SELECT * FROM `students` WHERE `email`='$email' AND `password`='$password'";
    $sql = "SELECT * FROM `students`";

    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
        if($email != $row['email']){
            ?>
                <script>
                    document.getElementById('error').style.display = "block";
                    document.getElementById('error').innerText = "Wrong E-mail";
                </script>
            <?php
        }
        else if($password != $row['password']){
            ?>
                <script>
                    document.getElementById('error').style.display = "block";
                    document.getElementById('error').innerText = "Wrong Password";
                </script>
            <?php
        }else{
            $_SESSION['name'] = $row['fullname'];
            $_SESSION['s_id'] = $row['stud_id'];
            header("location:http://localhost/elearningapp?".http_build_query(array('fullname' => $row['fullname'], 'pub_id' => $row['pub_id'])));
            echo "welcome user ". $row['fullname'];
        }
    }
    

}

?>