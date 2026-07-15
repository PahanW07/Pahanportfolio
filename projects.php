<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>

<section class="projects">

    <div class="section-header">
        <span class="section-tag">PORTFOLIO</span>

        <h2>My Creative Works</h2>

        <p>
            A collection of design, video, photography and branding projects.
        </p>
    </div>

    <!-- FILTERS -->
    <div class="project-filters">
        <button class="filter-btn active" data-filter="all">All</button>
        <button class="filter-btn" data-filter="design">Design</button>
        <button class="filter-btn" data-filter="video">Video</button>
        <button class="filter-btn" data-filter="photography">Photography</button>
        <button class="filter-btn" data-filter="branding">Branding</button>
    </div>

    <?php
    $result = mysqli_query($conn, "SELECT * FROM projects ORDER BY id DESC");
    ?>

    <div class="project-grid">

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

            <a href="project-details.php?id=<?php echo $row['id']; ?>" class="project-link">

                <div class="project-card <?php echo $row['category']; ?>">

                    <img src="assets/uploads/<?php echo $row['image']; ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">

                    <div class="overlay">
                        <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                        <p><?php echo ucfirst(htmlspecialchars($row['category'])); ?></p>
                    </div>

                </div>

            </a>

        <?php } ?>

    </div>

</section>

<?php include('includes/footer.php'); ?>