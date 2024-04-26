
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

    #nav-right a{
        text-decoration:none;
        color: white;
    }
    /* aside{
        height: 93vh;
        width: 20%;
        padding:6px;
        background: grey;
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        align-items: center;
        background: black;
    }
    aside div{
        width: 100%;
    }
    aside div button{
        background:grey;
        padding: 20px;
        color: white;
        width:100%;
        border: none;
        outline:none;
        font-size: 1.2rem;
    } */

    @media (min-width: 300px) and (max-width: 800px) {
        .menu-bar{
            display:block;
        }
        .nav-link{
            display: block;
            position: absolute;
            background-color: blue;
            width: 103%;
            margin-left: -15px;
            padding: 14px;
            top: 99%;
        }
        .nav-link li{
            margin: 12px;
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
            <button class="menu-bar" id="menubtn"><box-icon name='menu' size="29px"></box-icon></button>
        </div>
        <ul class="nav-link" id="navlink">
            <li><a href="http://localhost/elearningapp/admin/index.php?"> Dashboard </a></li>
            <li><a href="http://localhost/elearningapp/admin/teachers.php"> Teachers</a></li>
            <li><a href='http://localhost/elearningapp/admin/students.php'> Students</a></li>
           
            <li><a href="http://localhost/elearningapp/admin/categories.php"> Categories</a></li>
        </ul>
        
        <div id="nav-right">
        <?php
                ?>
                <button id="dropbtn"><box-icon name='user' size="30px"></box-icon></button>
                <ul id="sub-menu">
                    <li><a href="http://localhost/elearningapp/admin/account.php">Account</a></li>
                    <li><a href="http://localhost/elearningapp/pages/logout.php">Logout</a></li>
                </ul>
                <?php
        ?>
        </div>
        
    
    </nav>
</header>
<!-- 
<aside>
        <div><button> Dashboard</button></div>
        <hr>
        <div><button> Teachers</button>
        <button> Students</button></div>
        <hr>
        <div><button> Categories</button></div>
        <div><button>Questions</button></div>
</aside> -->

<script>
    // For sub menu dropdown
    // let btn = document.getElementById("dropbtn");
    // let count = 1;
    // btn.addEventListener('click', ()=>{
    //     document.getElementById("sub-menu").style.display = "flex";
    //     if(count%2 == 0){
    //         document.getElementById("sub-menu").style.display = "none";
    //     }
    //     count++;
    // })
    let btn = document.getElementById("dropbtn");
    let count = 1;
    btn.addEventListener('click', ()=>{
        document.getElementById("sub-menu").style.display = "flex";
        if(count%2 == 0){
            document.getElementById("sub-menu").style.display = "none";
        }
        count++;
    })
    // For rexponsive menu
    let menubtn = document.getElementById("menubtn");
    menubtn.addEventListener('click', ()=>{
        document.getElementById("navlink").style.display = "block";
        if(count%2 == 0){
            document.getElementById("navlink").style.display = "none";
        }
        count++;
    })
</script>

<!-- Boxicons cdn link -->
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>