<div id="demo" class="carousel slide" data-bs-ride="carousel" style="overflow: hidden;">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    </div>

    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?php echo base_url(); ?>home1.jpg" class="d-block w-100" style="object-fit: cover; height: 100vh;">
        </div>
        <div class="carousel-item">
            <img src="<?php echo base_url(); ?>home2.jpg" class="d-block w-100" style="object-fit: cover; height: 100vh;">
        </div>
        <div class="carousel-item">
            <img src="<?php echo base_url(); ?>home3.jpg" class="d-block w-100" style="object-fit: cover; height: 100vh;">
        </div>
    </div>

    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>


</body>

</html>