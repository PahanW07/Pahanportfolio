<?php
include('includes/config.php');


// CHECK PROJECT ID

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid project.");
}


$id = intval($_GET['id']);


// GET PROJECT DETAILS

$result = mysqli_query($conn, "SELECT * FROM projects WHERE id='$id'");


if(mysqli_num_rows($result)==0){
    die("Project not found.");
}


$project = mysqli_fetch_assoc($result);


// GET GALLERY IMAGES

$gallery = mysqli_query(
    $conn,
    "SELECT * FROM project_gallery WHERE project_id='$id'"
);


include('includes/header.php');

?>



<section class="project-hero">

    <div class="project-hero-content">

        <span class="section-tag">PROJECT</span>

        <h1>
            <?php echo htmlspecialchars($project['title']); ?>
        </h1>


        <p>
            <?php echo nl2br(htmlspecialchars($project['description'])); ?>
        </p>


    </div>

</section>






<section class="project-info">


<div class="info-container">



<!-- LEFT -->

<div class="info-left">


<h2>Overview</h2>


<p>
<?php echo nl2br(htmlspecialchars($project['description'])); ?>
</p>



<!-- VIDEO BUTTON -->

<?php if(!empty($project['video_link'])) { ?>

<a href="<?php echo htmlspecialchars($project['video_link']); ?>" 
target="_blank" 
class="video-btn">

<i class="fab fa-youtube"></i>
View Full Video

</a>

<?php } ?>



</div>







<!-- RIGHT -->

<div class="info-right">


<div class="project-meta">


<h3>Project Info</h3>


<p>
<strong>Client:</strong>
<?php echo htmlspecialchars($project['client']); ?>
</p>


<p>
<strong>Category:</strong>
<?php echo ucfirst(htmlspecialchars($project['category'])); ?>
</p>


<p>
<strong>Year:</strong>
<?php echo htmlspecialchars($project['project_year']); ?>
</p>


</div>





<div class="project-tools">


<h3>Tools Used</h3>


<?php

$tools = explode(",", $project['tools']);


foreach($tools as $tool){

echo "<span>".htmlspecialchars(trim($tool))."</span>";

}

?>


</div>


</div>



</div>


</section>








<!-- GALLERY -->

<section class="project-gallery">


<h2>Project Gallery</h2>



<div class="gallery-grid">



<!-- COVER IMAGE -->

<img 
src="assets/uploads/<?php echo htmlspecialchars($project['image']); ?>"
alt="<?php echo htmlspecialchars($project['title']); ?>">





<?php

while($img = mysqli_fetch_assoc($gallery)){

?>

<img 
src="assets/uploads/<?php echo htmlspecialchars($img['image']); ?>"
alt="Project Image">


<?php

}

?>



</div>



</section>






<?php include('includes/footer.php'); ?>