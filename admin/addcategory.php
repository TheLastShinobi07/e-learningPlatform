<?php
include "../includes/db.php";

if(isset($_SESSION['admin_name'])){
    if(isset($_POST['submit'])){
        $thumbnail_name = $_FILES['thumbnail'];
        $thumbnail_loc = $_FILES['thumbnail']['tmp_name'];
        $thumbnail_name = $_FILES['thumbnail']['name'];
        $category = $_POST['title'];
        
        move_uploaded_file($thumbnail_loc, "thumbnails/".$thumbnail_name);
        $sql = "INSERT INTO `category`(`category_name`, `cat_thumbnail`) VALUES ('$category', '$thumbnail_name')";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        h2{
            text-align: center;
            padding:15px;
            margin-top: 30px;
            text-shadow: none;
        }
        .post-course{
            display:flex;
            flex-direction:column;
            justify-content: center;
            align-items: center;
        }
        .post-course form{
            width: 60%;
        }
        .post-course #file-label, input, select, textarea{
            border: 1px solid blue;
        }
        .post-course #file-label{
            display:flex;
            justify-content:center;
            align-items: center;
            width: 100%;
            height:200px;
            background:grey;
            color: rgba(0,0,0,0.7);
            margin: 6px;
        }
        .post-course form input{
            padding:9px;
            width: 100%;
            margin: 6px;
        }
        .post-course form select{
            padding: 9px;
            width: 100%;
            margin: 6px;
        }
        .post-course form #submit-btn{
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

        .details{
            display: flex;
            justify-content: center;
            padding: 19px;
            margin-bottom: 155px;
        }
        .details table{
            width:80%;
        }
        .details table , th, td{
            border-collapse: none;
            padding:9px;
            text-align:center;
        }
        .details table thead{
            background:blue;
            color: white;
        }
    </style>
</head>
<body>
  

        <section class="post-course">
            <h2>Add a Category</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                <div>
                    <label for="thumbnail" id="file-label">Choose a thumbnail for this Category</label>
                    <input type="file" name="thumbnail" id="thumbnail" style="display:none;">
                </div>

                <div>
                    <input type="text" name="title" id="title"placeholder="Course Title" required>
                </div>
                <div>
                    <button type="submit" name="submit" id="submit-btn">Post</button>
                </div>
            </form>
        </section>

    <h2>All Categories</h2>
    <section class="details">
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Thumbnail</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "../includes/db.php";
                    $sql = "SELECT * FROM `category`";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                ?>

                    <tr>
                        <td><?php echo $row['category_name']; ?></td>
                        <td><img src="thumbnails/<?php echo $row['cat_thumbnail'] ?>" alt="" width="150px"></td>
                        <td><a href="updatecategory.php?id=<?php echo $row['cat_id']; ?>">Update</a></td>
                        <td><a href="categorydelete.php?id=<?php echo $row['cat_id']; ?>">Delete</a></td>
                    </tr>
                <?php
                        }
                ?>
            </tbody>

        </table>
    </section>


    <?php
        include "../includes/footer.php";
    ?>
</body>
</html>

<?php
}
?>