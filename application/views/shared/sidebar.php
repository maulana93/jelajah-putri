<div class="sidebar">    
    <?php
    if(isset($banner) && count($banner)>0){ 
        foreach($banner as $key => $value){ 
            ?>
            <a href="<?php echo $value['url']; ?>">
                <img src="<?php echo base_url().$value['image']; ?>" class="mb-3 img-fluid">
            </a>
            <?php
        }
    }
    ?>
    <div class="d-flex justify-content-between">
        <h4>FOLLOW US</H4>
        <P>@jelajahputri</p>
    </div>
    <h4>FIND US ON SOCIAL MEDIA</H4>
    <a href=""><img src="<?php echo base_url().'assets/images/logo-ig.png'; ?>" class="img-fluid mr-3"></a>
    <a href=""><img src="<?php echo base_url().'assets/images/logo-fb.png'; ?>" class="img-fluid mr-3"></a>
    <a href=""><img src="<?php echo base_url().'assets/images/logo-linkedin.png'; ?>" class="img-fluid mr-3"></a>
    <a href=""><img src="<?php echo base_url().'assets/images/logo-youtube.png'; ?>" class="img-fluid"></a>
</div>