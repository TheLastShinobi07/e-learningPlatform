<?php
session_start();
include "../includes/db.php";

if(isset($_SESSION['admin_name'])){
    if(isset($_POST['submit'])){
        $thumbnail_name = $_FILES['thumbnail'];
        $thumbnail_loc = $_FILES['thumbnail']['tmp_name'];
        $thumbnail_name = $_FILES['thumbnail']['name'];
        $category = $_POST['title'];
        $id = $_REQUEST['id'];

        move_uploaded_file($thumbnail_loc, "thumbnails/".$thumbnail_name);
        $sql = "UPDATE `category` SET `category_name`='$category', `cat_thumbnail`='$thumbnail_name' WHERE `cat_it`='$id'";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        ?>
        <script>
            setInterval(() => {
                javascript:history.go(-1);
            }, 50);
        </script>
        <?php
    }
?>
  


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        h2{
            text-align: center;
            padding:15px;
            margin-top: 30px;
            text-shadow: none;
        }
        .update-course{
            display:flex;
            flex-direction:column;
            justify-content: center;
            align-items: center;
        }
        .update-course form{
            width: 60%;
        }
        .update-course #file-label, input, select, textarea{
            border: 1px solid blue;
        }
        .update-course #file-label{
            display:flex;
            justify-content:center;
            align-items: center;
            width: 100%;
            height:200px;
            background:grey;
            color: rgba(0,0,0,0.7);
            margin: 6px;
        }
        .update-course form input{
            padding:9px;
            width: 100%;
            margin: 6px;
        }
        .update-course form select{
            padding: 9px;
            width: 100%;
            margin: 6px;
        }
        .update-course form #submit-btn{
            padding:9px;
            margin: 6px;
            width: 200px;
            border: none;
            outline: none;
            background: blue;
            color: white;
            border-radius: 9px;
            font-weight: bold;
        }
    </style>
    <title>Update Category</title>
</head>
<body>
    <section class="update-course">
        <h2>Update Category</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
            <div>
                <label for="thumbnail" id="file-label">Choose a thumbnail for this Category</label>
                <input type="file" name="thumbnail" id="thumbnail" style="display:none;">
            </div>

            <div>
                <input type="text" name="title" id="title"placeholder="Course Title" required>
            </div>
            <div>
                <button type="submit" name="submit" id="submit-btn">Update</button>
            </div>
        </form>
    </section>
</body>
</html>

<?php

}
?>