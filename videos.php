<?php 
include('includes/config.php');
include('includes/header.php');


// GET VIDEOS

$result = mysqli_query($conn, "SELECT * FROM videos ORDER BY id DESC");

?>


<section class="video-section">


<div class="section-header">

<span class="section-tag">
SHOWREEL
</span>


<h2>
My Video Works
</h2>


<p>
A collection of films, advertisements, documentaries and creative videos.
</p>


</div>






<div class="video-container">


<?php while($row = mysqli_fetch_assoc($result)){ ?>



<div class="video-card">



<div class="video-frame">



<video controls poster="assets/uploads/<?php echo htmlspecialchars($row['thumbnail']); ?>">


<source src="assets/videos/<?php echo htmlspecialchars($row['video_file']); ?>" type="video/mp4">


Your browser does not support video playback.


</video>



</div>





<div class="video-info">


<h3>
<?php echo htmlspecialchars($row['title']); ?>
</h3>




<p>

<?php echo htmlspecialchars($row['category']); ?>

</p>



<p>

<?php echo nl2br(htmlspecialchars($row['description'])); ?>

</p>



</div>




</div>




<?php } ?>



</div>



</section>





<?php include('includes/footer.php'); ?>