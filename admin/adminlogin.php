<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Signup</title>
</head>
<body>
    <section class="main-container">
        
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <h1>Admin Login</h1>
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
    </section>

</body>
</html>

<?php

if(isset($_POST['submit'])){
    session_start();
    include "../includes/db.php";

    $email = $_POST['email'];
    $password = md5($_POST['password']);


    $sql = "SELECT * FROM `admin`";

    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
        if($email != $row['email']){
            if($password != $row['password']){
            ?> 
                <script>alert("Wrong Password")</script>
            <?php
            }else{
                ?>
                <script>alert("Wrong E-mail")</script>
            <?php
            }
        }else{
            $_SESSION['admin_name'] = $row['admin_name'];
            header("location:http://localhost/elearningapp/admin/index.php?".http_build_query(array('admin' => $row['admin_name'])));
            }
        }
    }

    

?>