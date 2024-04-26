<?php
    include "../includes/db.php";
    
    if (isset($_SESSION['pub_id'])) {
        $pub_id = $_REQUEST['pub_id'];
        $sql = " SELECT * FROM `teachers` WHERE `pub_id`='$pub_id'";
    
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <script>
                document.getElementById("name").value = "<?php echo $row['admin_name'];?>";
                document.getElementById("email").value = "<?php echo $row['email'];?>";
                document.getElementById("password").value = "<?php echo $row['password'];?>";
                document.getElementById("confpassword").value = "<?php echo $row['confirmpassword'];?>";
            </script>
            <?php
        }
    }else{
        $s_id = $_REQUEST['s_id'];
        $sql = " SELECT * FROM `students` WHERE `stud_id`='$s_id'";
    
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <script>
                document.getElementById("name").value = "<?php echo $row['admin_name'];?>";
                document.getElementById("email").value = "<?php echo $row['email'];?>";
                document.getElementById("password").value = "<?php echo $row['password'];?>";
                document.getElementById("confpassword").value = "<?php echo $row['confirmpassword'];?>";
            </script>
            <?php
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/register.css">
    <title>Account</title>
</head>
<body>
    <section class="main-container">
        
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <h1>Update Account</h1>
            <!-- <div>
                <label for="profilepic">Select Profile-Pic:-<br><box-icon name='user' size="lg"></box-icon></label>
                <input type="file" name="profilepic" id="profilepic" hidden>
            </div> -->
            <div>
                <label for="name">Full Name:- </label>
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
                <?php
                if (isset($_SESSION['pub_id'])) {?>
                    <input type="text" name="s_id" value="<?php echo $pub_id; ?>" hidden>
                <?php
                }else{
                ?>
                <input type="text" name="s_id" value="<?php echo $s_id; ?>" hidden>
                <?php
                } 
                ?>
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
       if (isset($_SESSION['pub_id'])) {
            $name = format_data($_POST["name"]);
            $email = format_data($_POST["email"]);
            $password = md5($_POST["password"]);
            $confirmpassword = md5($_POST["confpassword"]);


            $sql = "UPDATE `teachers` SET `fullname`='$name', `email`='$email', `password`='$password', `confirmpassword`='$confirmpassword' WHERE `pub_id`='$pub_id'";

            mysqli_query($conn, $sql);
            mysqli_close($conn);
        }
        else{
            $name = format_data($_POST["name"]);
            $email = format_data($_POST["email"]);
            $password = md5($_POST["password"]);
            $confirmpassword = md5($_POST["confpassword"]);
            $s_id = $_POST['s_id'];
    
    
            $sql = "UPDATE `students` SET `fullname`='$name', `email`='$email', `password`='$password', `confirmpassword`='$confirmpassword' WHERE `stud_id`='$s_id'";
    
            mysqli_query($conn, $sql);
            mysqli_close($conn);
        
        }
    }


    function format_data($data){
        $data = trim($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>