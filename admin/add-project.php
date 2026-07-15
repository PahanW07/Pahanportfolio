<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include('../includes/config.php');


if(isset($_POST['save'])){


    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $client = mysqli_real_escape_string($conn, $_POST['client']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $tools = mysqli_real_escape_string($conn, $_POST['tools']);

    $video_link = mysqli_real_escape_string($conn, $_POST['video_link']);



    $uploadDir = "../assets/uploads/";


    if(!is_dir($uploadDir)){
        mkdir($uploadDir,0777,true);
    }



    // COVER IMAGE

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];


    move_uploaded_file(
        $tmp,
        $uploadDir.$image
    );




    // INSERT PROJECT


    $query = "INSERT INTO projects

    (
    title,
    category,
    description,
    image,
    client,
    project_year,
    tools,
    video_link
    )


    VALUES


    (
    '$title',
    '$category',
    '$description',
    '$image',
    '$client',
    '$year',
    '$tools',
    '$video_link'
    )";



    if(mysqli_query($conn,$query)){


        $project_id = mysqli_insert_id($conn);



        // MULTIPLE GALLERY IMAGES


        if(isset($_FILES['gallery'])){


            foreach($_FILES['gallery']['name'] as $key=>$galleryImage){



                if($_FILES['gallery']['name'][$key] != ""){


                    $galleryTmp = $_FILES['gallery']['tmp_name'][$key];


                    move_uploaded_file(
                        $galleryTmp,
                        $uploadDir.$galleryImage
                    );



                    mysqli_query($conn,

                    "INSERT INTO project_gallery

                    (
                    project_id,
                    image
                    )


                    VALUES


                    (
                    '$project_id',
                    '$galleryImage'
                    )"

                    );

                }

            }

        }



        echo "
        <script>
        alert('Project Added Successfully');
        window.location='manage-projects.php';
        </script>
        ";


    }
    else{

        echo mysqli_error($conn);

    }

}

?>

<!DOCTYPE html>
<html>

<head>

<title>Add Project</title>

<link rel="stylesheet" href="../assets/css/style.css">

<link rel="stylesheet" 
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>


<body class="admin-body">


<div class="admin-top-actions">

<a href="dashboard.php" class="back-btn">
<i class="fas fa-arrow-left"></i>
Back to Dashboard
</a>

</div>




<div class="project-form-wrapper">


<div class="form-card">


<h2>
<i class="fas fa-plus-circle"></i>
Add New Project
</h2>


<p>Create a new portfolio project entry</p>





<form method="POST" enctype="multipart/form-data">





<div class="input-group">

<label>Project Title</label>

<input 
type="text"
name="title"
placeholder="Enter project title"
required>

</div>






<div class="input-group">

<label>Category</label>

<select name="category" required>


<option value="">
Select Category
</option>


<option value="design">
Design
</option>


<option value="video">
Video
</option>


<option value="photography">
Photography
</option>


<option value="branding">
Branding
</option>


</select>

</div>







<div class="input-group">

<label>Description / Overview</label>

<textarea 
name="description"
rows="5"
placeholder="Project overview...">
</textarea>

</div>







<div class="input-group">

<label>Client</label>

<input
type="text"
name="client"
placeholder="Client name">

</div>







<div class="input-group">

<label>Project Year</label>

<input
type="number"
name="year"
placeholder="2026">

</div>








<div class="input-group">

<label>Tools Used</label>

<input
type="text"
name="tools"
placeholder="Photoshop, Illustrator, After Effects">

</div>







<div class="input-group">

<label>YouTube Video Link</label>

<input
type="url"
name="video_link"
placeholder="https://youtube.com/...">

</div>







<div class="input-group">

<label>Main Project Image</label>

<input
type="file"
name="image"
required>

</div>







<div class="input-group">

<label>Gallery Images</label>

<input
type="file"
name="gallery[]"
multiple>

<p>Select multiple images</p>

</div>








<button 
type="submit"
name="save"
class="submit-btn">

<i class="fas fa-save"></i>
Save Project

</button>



</form>


</div>


</div>



</body>

</html>