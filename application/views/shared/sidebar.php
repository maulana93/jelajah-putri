<div class="sidebar mb-5">    
    <?php
    if(isset($banner) && count($banner)>0){ 
        foreach($banner as $key => $value){ 
            ?>
            <a target="_blank" href="<?php echo $value['url']; ?>">
                <img src="<?php echo base_url().$value['image']; ?>" class="img-banner mb-3 img-fluid">
            </a>
            <?php
        }
    }
    ?>
    <div class="d-flex justify-content-between">
        <h4>FOLLOW US</H4>
        <P>@jelajahputri</p>
    </div>
    <div class="elfsight-app-dc205a0e-1be2-42ae-9533-440bca657f88 mt-3" style="display: block;"></div>
    <h4 class="mt-3">FIND US ON SOCIAL MEDIA</H4>
    <div class="d-flex justify-content-between">
        <a target="_blank" href="https://www.instagram.com/jelajahputri"><img src="<?php echo base_url().'assets/images/logo-ig.png'; ?>" class="img-fluid img-socmed mr-3"></a>
        <a target="_blank" href="https://www.facebook.com/1810601745899364/posts/pfbid0bjskedcfdqsg9PbHrwoNUzQKd3BNCje6Ea2qcwQcyceEzyMXNWeACotfLcLHKi71l"><img src="<?php echo base_url().'assets/images/logo-fb.png'; ?>" class="img-fluid img-socmed mr-3"></a>
        <a target="_blank" href="https://www.youtube.com/channel/UCQeScXJWhJryCsSNoG51bNw?app=desktop"><img src="<?php echo base_url().'assets/images/logo-youtube.png'; ?>" class="img-fluid img-socmed mr-3"></a>
        <a target="_blank" href="http://www.tiktok.com/@jelajahputri"><img src="<?php echo base_url().'assets/images/logo-tiktok.png'; ?>" class="img-fluid img-socmed"></a>
    </div>
</div>