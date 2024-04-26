
<head>
<link rel="stylesheet" href="../css/style.css">

<style>
    .menu-bar{
        background: blue;
        border:none;
        outline:none;
        display: none;
    }
    .dropbtn{
        width: 50px;
        height: 50px;
        border-radius: 100px;
        padding:3px;
        border: 1px solid blue;
        /* background-color: blue; */
    }

    @media (min-width: 300px) and (max-width: 800px) {
        .menu-bar{
            display:block
        }
        .nav-link{
            display:none;
        }
        #nav-right{
            display: none;
        }
    }
</style>
</head>
<header>
    <!-- Navigation bar -->
    <nav>
        <div id="nav-logo">
            <h1>E-Learning</h1>
        </div>
        <div>
            <button class="menu-bar" id="menu-bar"><box-icon name='menu' size="29px"></box-icon></button>
        </div>
        <ul class="nav-link">
            <li><a href="http://localhost/elearningapp/"> Home </a></li>
            <?php
                if(!isset($_SESSION['pub_id'])){
            ?>
            <li><a href="http://localhost/elearningapp/pages/about.php"> About Us</a></li>
            <?php } ?>

            <?php
                if(isset($_SESSION['pub_id'])){
            ?>
            <li><a href='http://localhost/elearningapp/pages/teacher_pannel.php?pub_id=<?php $pub_id= $_SESSION['pub_id']; echo $pub_id; ?>'> Dashboard</a></li>
            <?php } ?>
           
            <li><a href="http://localhost/elearningapp/pages/contact.php"> Contact Us</a></li>
           
            <?php
                if(!isset($_SESSION['pub_id'])){
            ?>
            <li><a href="http://localhost/elearningapp/pages/courses.php"> Courses</a></li>
            <li><a href="http://localhost/elearningapp/pages/askquestion.php">Ask Question</a></li>
            <?php } ?>
            <?php
                if(isset($_SESSION['pub_id'])){
            ?>
            <li><a href="http://localhost/elearningapp/pages/questions.php">Questions</a></li>
            <?php } ?>
        </ul>
        
        <div id="nav-right">
        <?php
            if(!isset($_SESSION['name'])){
        ?>
            <button id="dropbtn">Login/Sign-up</button>
            <ul id="sub-menu">
                <li><a href="http://localhost/elearningapp/pages/teacher_login.php">Teacher</a></li>
                <li><a href="http://localhost/elearningapp/pages/stud_login.php">Student</a></li>
            </ul>
        <?php
            }else{
                ?>
                <button id="dropbtn"><box-icon name='user' size="30px"></box-icon></button>
                <ul id="sub-menu">
                    <?php if (isset($_SESSION['pub_id'])) {?>
                        <li><a href='http://localhost/elearningapp/pages/account.php?pub_id=<?php echo $_SESSION['pub_id']; ?>'>Account</a></li>
                    <?php  }else{ ?>
                    <li><a href="http://localhost/elearningapp/pages/account.php?s_id=<?php echo $_SESSION['s_id']; ?>">Account</a></li>
                    <?php } ?>
                    <li><a href="http://localhost/elearningapp/pages/logout.php">Logout</a></li>
                </ul>
                <?php
            }
        ?>
        </div>
        
    
    </nav>
</header>

<script>
    let btn = document.getElementById("dropbtn");
    let count = 1;
    btn.addEventListener('click', ()=>{
        document.getElementById("sub-menu").style.display = "flex";
        if(count%2 == 0){
            document.getElementById("sub-menu").style.display = "none";
        }
        count++;
    })
</script>

<!-- Boxicons cdn link -->
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>