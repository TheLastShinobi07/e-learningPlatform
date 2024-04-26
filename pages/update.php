<?php
session_start();

include "../includes/db.php";
if(isset($_SESSION['pub_id'])){
    if(isset($_POST['submit'])){
        $file_name = $_FILES['file'];
        $file_loc = $_FILES['file']['tmp_name'];
        $file_name = $_FILES['file']['name'];
        $thumbnail_name = $_FILES['thumbnail'];
        $thumbnail_loc = $_FILES['thumbnail']['tmp_name'];
        $thumbnail_name = $_FILES['thumbnail']['name'];
        $course_name = $_POST['title'];
        $category = $_POST['category'];
        $description = $_POST['description'];
        $id = $_REQUEST['id'];
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        if($ext == "pdf"){
            move_uploaded_file($file_loc, "course_pdf/".$file_name);
            move_uploaded_file($thumbnail_loc, "thumbnails/".$thumbnail_name);
            $sql = "UPDATE `courses` SET `course_file`='$file_name', `thumbnail`='$thumbnail_name', `course_name`='$course_name', `course_category`='$category', `course_desc`='$description' WHERE `id`='$id'";

            mysqli_query($conn, $sql);
            mysqli_close($conn);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Pannel</title>
    
    <!-- Summernotes cdn links  -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

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
    <?php
        include "../includes/nav.php";
    ?>

        <section class="post-course">
            <h2>Update Course</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                <div>
                    <label for="file" id="file-label">Choose course file <br>Only PDF File Allowed</label>
                    <input type="file" name="file" id="file" style="display:none;">
                </div>

                <div>
                    <label for="thumbnail" id="file-label">Choose a thumbnail for this course</label>
                    <input type="file" name="thumbnail" id="thumbnail" style="display:none;">
                </div>

                <div>
                    <input type="text" name="title" id="title"placeholder="Course Title" required>
                </div>
                <div>
                    <select name="category" id="category" required>
                        <?php
                            $sql = "SELECT * FROM `category`";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result)){
                        ?>

                        <option value="">----- Select Category -----</option>
                        <option value="<?php echo $row['category_name']; ?>"><?php echo $row['category_name']; ?></option>
                        <?php
                                }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="description">Enter Description</label>
                    <textarea name="description" id="summernote" required></textarea>
                </div>
                <div>
                    <button type="submit" name="submit" id="submit-btn">Update</button>
                </div>
            </form>
        </section>


    <?php
        include "../includes/footer.php";
    ?>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote(
                {
                    height: 400,
                    
                }
            );
        });
    </script>
</body>
</html>

<?php
}
else{
    header("location:teacher_login.php");
}
?>
