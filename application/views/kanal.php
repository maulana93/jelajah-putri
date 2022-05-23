<?php $this->load->view('shared/header-2'); ?>
    <div class="container">
        <div class="title-kanal d-block d-sm-flex mt-5">     
            <?php 
            if (isset($listsKanal) && count($listsKanal)>0) { 
                foreach($listsKanal as $key=>$value) { 
                ?>               
                    <h1><?php echo isset($value['title'])?$value['title']:''; ?></h1>
                    <p><?php echo isset($value['description'])?$value['description']:''; ?></p>
                <?php 
                }
            }
            ?>
        </div>
        <div class="row mt-5">
            <div class="col-lg-9">
                <div class="headline-kanal">
                    <div class="row">
                        <div class="col-lg-8">
                        <?php 
                        if (isset($listsContent) && count($listsContent)>0) { 
                            foreach($listsContent as $key=>$value) {
                                if($key == 0){
                                ?>
                                    <a href="<?php echo url_format($value); ?>">
                                        <img src="<?php echo base_url().isset($value['image'])?$value['image']:''; ?>" class="big-img img-fluid mb-2">
                                        <h2 class="main-headline-title"><?php echo isset($value['title'])?$value['title']:''; ?></h2>
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
                                    </a>
                                <?php 
                                }
                            }
                        }
                        ?>    
                        </div>
                        <div class="col-lg-4">     
                            <?php 
                            if (isset($listsContent) && count($listsContent)>0) { 
                                foreach($listsContent as $key=>$value) {
                                    if($key > 0 && $key < 3){
                                    ?>  
                                    <a href="<?php echo url_format($value); ?>">
                                        <img src="<?php echo base_url().$value['image']; ?>" class="img-fluid mb-2">
                                        <h2 class="headline-title <?php if($value['id_category'] != $this->config->item('kanal-id-opini') && $key==1){ echo 'mb-4'; } ?>"><?php echo isset($value['title'])?$value['title']:''; ?></h2>
                                        <?php if($value['id_category'] == $this->config->item('kanal-id-opini')) { ?>
                                            <div class="kanal-info align-items-center d-flex <?php if($key==1){ echo 'mb-4'; } ?>">
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
                                    </a>    
                                    <?php 
                                    }
                                }
                            }
                            ?>    
                        </div>
                    </div>
                </div>
                <div class="list-news result">   
                    <?php 
                    if (isset($listsContent) && count($listsContent)>0) { 
                        foreach($listsContent as $key=>$value) { 
                            if($key > 2){
                            ?>  
                            <article>
                                <div class="border-top">
                                    <a href="<?php echo url_format($value); ?>">
                                        <div class="row my-4">
                                            <div class="col-lg-8">
                                                <h2><?php echo isset($value['title'])?$value['title']:''; ?></h2>
                                                <p><?php echo isset($value['summary'])?$value['summary']:''; ?></p>
                                                <?php if($value['id_category'] == $this->config->item('kanal-id-opini')) { ?>
                                                    <div class="kanal-info align-items-center d-flex mb-3">
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
                            ?>                                         
                                <?php if ($key == count($listsContent) - 1){ ?>
                                    <input type="hidden" value="<?php echo $value['id']; ?>" class="last_id">
                                    <input type="hidden" value="<?php echo $value['id_category']; ?>" class="id_category">
                                <?php } ?>
                            <?php
                        }
                    }
                    ?>    
                </div>
                <div class="row justify-content-center">
                    <button id="load_button" onclick="load_click()" class="btn btn-load-more">Load more</button>
                </div>
                <script>
                    function load_click(){
                        var last_id  = $(".last_id").val();
                        var id_category  = $(".id_category").val();
                        $.ajax({  
                                url: "<?php echo base_url().'kanal/getAllDataNext/'; ?>",
                                method: "POST",
                                data: {
                                        last_id: last_id, 
                                        id_category: id_category,
                                },
                                dataType: "text", 
                                success: function(data){
                                    var cekdata = data.includes("<article");
                                    if(cekdata){
                                        $('.last_id').remove();
                                        $(".list-news").append(data);
                                        $("#load_button").show();
                                    } else {
                                        $("#load_button").hide();
                                    }
                                }
                            });
                        }
                </script>
            </div>
            <div class="col-lg-3">
                <?php $this->load->view('shared/sidebar'); ?>
            </div>
        </div>
    </div>
<?php $this->load->view('shared/footer'); ?>