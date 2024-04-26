<?php
session_start();
include "./includes/db.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>E-learning</title>
</head>
<body>
    <!-- Header Part -->
    <header>
        <!-- Navigation bar -->
        <?php
            include "./includes/nav.php";
        ?>

        
    </header>

    <!-- Hero Section -->
    <section id="hero-section">
            <div>
                <h1>Welcome to E-Learning Platform</h1>
                <h2>Join us and grow in Knowledge</h2>
                <form action="pages/search.php" method="get">
                    <input type="search" name="search" id="search" placeholder="Search......">
                    <button id="submit" name="submit"><box-icon name='search-alt-2'></box-icon></button>
                </form>
            </div>
    </section>

    <h3 class="section-title">Quote</h3>
    <section class="quote">
        <img src="images/img2.jpg" alt="">
        <div class="quote-bottom">
            <?php
                if (isset($_SESSION['name'])) {
                ?>
                    <h3 class="quote-title">Welcome and have fun learning on our platform.</h3>
                    <p>Start your journey towards your successfull carrier with our free courses.</p>
                    <a href="http://localhost/elearningapp/pages/courses.php" id="joinbtn">All Courses</a>
                <?php
                }else{

                ?>
                    <h3 class="quote-title">Take next step towards your personal and professional goals with our courses</h3>
                    <p>Join now and start your journey towards your successfull carrier.</p>
                    <a href="http://localhost/elearningapp/pages/stud_regestration.php" id="joinbtn">Join Now</a>
                <?php
                }
                ?>
        </div>
    </section>

    <!-- Top Courses Section -->
    <section class="top-courses">
        <h3 class="section-title">Latest Courses</h3>
        <section class="card-container">
        <?php
            $sql = "SELECT * FROM `courses` LIMIT 4";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
            
        ?>
            <a href="http://localhost/elearningapp/pages/courseview.php?file=<?php echo $row['course_file']; ?>">
                <div class="card">
                    <img src='<?php echo "./pages/thumbnails/".$row['thumbnail']; ?>' alt="" width="100%" height="200px">
                    <div>
                        <h3 style="width: 100%;overflow:U+2026;"><?php echo $row['course_name']; ?></h3>
                    </div>
                </div>
            </a>
        <?php
            }
        ?>  
        </section>
    </section>


    <!-- Category Section -->
    <section class="top-courses">
        <h3 class="section-title">Categories</h3>
        <section class="card-container"> 
        <?php
            $sql = "SELECT * FROM `category` LIMIT 4";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
            
        ?>
            <a href="http://localhost/elearningapp/pages/category.php?category=<?php echo $row['category_name']; ?>">  
                <div class="card">
                    <img src='<?php echo "./admin/thumbnails/".$row['cat_thumbnail']; ?>' alt="">
                    <div>
                        <h3 style="width: 100%;overflow-y:U+2026;"><?php echo $row['category_name']; ?></h3>
                    </div>
                </div>
            </a>
        <?php
            }
        ?>
           
        </section>
    </section>
    <?php
        include "./includes/footer.php";
    ?>
    <!-- Boxicons cdn link -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>
