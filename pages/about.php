<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .about-container > h1{
            text-align: center;
            margin-top: 40px;
            padding: 20px;
            font-size: 2.5rem;
            position:relative;
        }
        /* .about-container > h1::before{
            content: "";
            width: 50%;
            height: 2rem;
            background: red;
        } */
        .about-container > h1::before{
            content: "";
            width: 30%;
            height: .2rem;
            background: red;
            position:absolute;
            bottom:0;
        }
        .about-container .card-container{
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .about-container .card-container .title-section{
            font-size: 1.6rem;
            margin-left: 21px;
            padding: 9px;
        }
        .about-container .card-container .card{
            width: 90%;
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
        }
        .about-container .card-container .card > div{
            width: 55%;
            text-align:justify;
            margin: 21px;
        }
        .about-container .card-container .card img{
            width:40%;
        }
        
    </style>
    <title>About Us</title>
</head>
<body>
    <?php
        include "../includes/nav.php";
    ?>

    <section class="about-container">
        <h1>About Us</h1>
        <div class="card-container">
            <div>
                <h3 class="title-section">Who we are?</h3>
                <div class="card">
                    <div>
                        <p>E-learning Platform is a web based application, that helps in improvement of educational sector by making learning contents accessible to anyone and anywhere. In this project we are aiming to make the learning contents more accessible to both teachers and students. On this platform, students can post questions and those questions can be answered by other students or the teachers. With this platform, students can invest their time in right place instead of wasting their time on useless online things.</p>
                    </div>
                    <img src="thumbnails/kotlin.png" alt="">
                </div>
            </div>

            <div class="card">
            <img src="thumbnails/kotlin.png" alt="">
                <div>
                    <p>This platform is designed for students to learn new skills while being in their own space and at their flexible time.</p>
                </div>
            </div>
        </div>
    </section>

    <?php
        include "../includes/footer.php";
    ?>
</body>
</html>