   
<?php 
if (isset($listsSearch) && count($listsSearch)>0) { 
    foreach($listsSearch as $key=>$value) {
    ?>  
    <?php if ($key == count($listsSearch) - 1){ ?>
        <input type="hidden" value="<?php echo $value['id']; ?>" class="last_id">
        <input type="hidden" value="<?php echo $keyword; ?>" class="keyword">
    <?php } ?>

        <article>
            <div class="border-top">
                <a href="<?php echo url_format($value); ?>">
                    <div class="row my-4">
                        <div class="col-lg-8">
                            <h2><?php echo isset($value['title'])?$value['title']:''; ?></h2>
                            <p><?php echo isset($value['summary'])?$value['summary']:''; ?></p>
                            <?php if($value['id_category'] == $this->config->item('kanal-id-opini')) { ?>
                                <div class="kanal-info align-items-center d-flex mb-4">
                                    <div class="mr-2">
                                        <?php if($value['profile_image'] != '') { ?>
                                            <img class="img-fluid img-opini" src="<?php echo base_url().$value['profile_image']; ?>">
                                        <?php } else { ?>
                                            <img class="img-fluid img-opini" src="<?php echo base_url().'assets/images/default-profile-picture.jpg'; ?>">
                                        <?php } ?>
                                    </div>
                                    <div>
                                        <?php if($value['profile_name'] != '') { ?>
                                            <p><?php echo $value['profile_name']; ?></p>
                                        <?php } else { ?>
                                            <p><?php echo $value['penulis'][0]['fullname']; ?></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-lg-4">
                            <img src="<?php echo base_url().isset($value['image'])?$value['image']:''; ?>" class="img-fluid">
                        </div>
                    </div>
                </a>
            </div>   
        </article>   
        <?php 
    }
}
?>