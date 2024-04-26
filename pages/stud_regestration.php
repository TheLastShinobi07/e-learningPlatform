<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/register.css">
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
    <title>Signup</title>
</head>
<body>
    <div id="error"> </div>
    <section class="main-container">
        
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <h1>Student Registeration</h1>
            <div>
                <label for="name">Full Name:- </label>
                <input type="text" name="name" id="name" required>
            </div>
            <div>
                <label for="email">E-mail:- </label>
                <input type="email" name="email" id="email" required>
            </div>
            
            <div>
                <label for="password">Password:- </label>
                <input type="password" name="password" id="password" required>
            </div>
            <div>
                <label for="confpassword">Confirm Password:- </label>
                <input type="password" name="confpassword" id="confpassword" required>
            </div>
            <div>
                <button type="submit" name="submit" id="submit-btn">Submit</button>
            </div>
        </form>
        <h3>OR</h3>

        <div>
            <h4>Already have an account? <a href="http://localhost/elearningapp/pages/stud_login.php">Login</a></h4>
        </div>
    </section>
    <script>
        let password = document.getElementById("password");
        let confpassword = document.getElementById("confpassword");
        confpassword.addEventListener('keydown', ()=>{
            setTimeout(() => {
                if(confpassword.value == password.value){
                    document.querySelector('.confirmpass').style.display = "none";
                    console.log("Matched");                    
                }else{
                    document.querySelector('.confirmpass').style.display = "block";                    
                    console.log("didn't matched");
                }
            }, 100);
            
        })
    </script>
    <!-- Boxicons cdn link -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>

<?php

    if(isset($_POST['submit'])){
        include "../includes/db.php";
        $name = format_data($_POST["name"]);
        $email = format_data($_POST["email"]);
        $password = md5($_POST["password"]);
        $confirmpassword = md5($_POST["confpassword"]);

        $name_p = "/^[A-Za-z][^0-9]+$/";
        $email_p = "/^[a-zA-Z\d]+@[a-zA-Z\d]+\.[a-zA-z\d\.]{2,}+$/";

        if ($name != "" || $email != "" || $password != "" || $confirmpassword != "") {
            if($password != $confirmpassword){
                ?>
                <script>
                    document.getElementById('error').style.display = "block";
                    document.getElementById('error').innerText = "Password and Confirm password Didn't match.";
                </script>
                <?php
            }else{
                if(preg_match($name_p, $name) && preg_match($email_p, $email)){
                    $sql = "INSERT INTO `students`(`fullname`, `email`, `password`, `confirmpassword`, `userrole`) VALUES ('$name','$email','$password','$confirmpassword' , 'Student')";

                    mysqli_query($conn, $sql);
                    mysqli_close($conn);
                    header("location:http://localhost/elearningapp/pages/stud_login.php");
                }
            }
        }else{
            ?>
            <script>
                document.getElementById('error').style.display = "block";
                document.getElementById('error').innerText = "Please fill all the fields.";
            </script>
            <?php
        }
    }

    function format_data($data){
        $data = trim($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>