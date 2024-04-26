<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/register.css">
    <title>Set Admin</title>
</head>
<body>
    <section class="main-container">
        
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <h1>Setup Admin</h1>
            <!-- <div>
                <label for="profilepic">Select Profile-Pic:-<br><box-icon name='user' size="lg"></box-icon></label>
                <input type="file" name="profilepic" id="profilepic" hidden>
            </div> -->
            <div>
                <label for="name">Admin Name:- </label>
                <input type="text" name="name" id="name">
            </div>
            <div>
                <label for="email">E-mail:- </label>
                <input type="email" name="email" id="email">
            </div>
            
            <div>
                <label for="password">Password:- </label>
                <input type="password" name="password" id="password">
            </div>
            <div>
                <label for="confpassword">Confirm Password:- </label>
                <input type="password" name="confpassword" id="confpassword">
            </div>
            <div>
                <button type="submit" name="submit" id="submit-btn">Submit</button>
            </div>
        </form>
    </section>
    <!-- Boxicons cdn link -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>

<?php

    if(isset($_POST['submit'])){
        include "../includes/db.php";
        $name = format_data($_POST["name"]);
        $email = $_POST["email"];
        $password = md5($_POST["password"]);
        $confirmpassword = md5($_POST["confpassword"]);


        $sql = "UPDATE `admin` SET `fullname`='$name', `email`='$email', `password`='$password', `confirmpassword`='$confirmpassword'";

        mysqli_query($conn, $sql);
        mysqli_close($conn);
    }

    function format_data($data){
        $data = trim($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>