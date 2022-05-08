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
                                    <?php
                                        $big_opini = '';
                                        if(isset($listsContent[0]['id_category']) && $listsContent[0]['id_category'] == $this->config->item('kanal-id-opini'))
                                        {
                                            $big_opini = ' big-opini';
                                        }
                                    ?>
                                    <a href="<?php echo url_format($value); ?>">
                                        <img src="<?php echo base_url().isset($value['image'])?$value['image']:''; ?>" class="big-img img-fluid mb-2<?php echo $big_opini; ?>">
                                        <h2 class="main-headline-title"><?php echo isset($value['title'])?$value['title']:''; ?></h2>
                                        <p><?php echo isset($value['summary'])?$value['summary']:''; ?></p>
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
                                    <?php
                                        $reguler_opini = '';
                                        if(isset($listsContent[0]['id_category']) && $listsContent[0]['id_category'] == $this->config->item('kanal-id-opini'))
                                        {
                                            $reguler_opini = ' reguler-opini';
                                        }
                                    ?>  
                                    <a href="<?php echo url_format($value); ?>">
                                        <img src="<?php echo base_url().$value['image']; ?>" class="img-fluid mb-2<?php echo $reguler_opini; ?>">
                                        <h2 class="headline-title"><?php echo isset($value['title'])?$value['title']:''; ?></h2>
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
                            <?php
                                $reguler_opini = '';
                                if(isset($listsContent[0]['id_category']) && $listsContent[0]['id_category'] == $this->config->item('kanal-id-opini'))
                                {
                                    $reguler_opini = ' reguler-opini';
                                }
                            ?>  
                            <article>
                                <div class="border-top">
                                    <a href="<?php echo url_format($value); ?>">
                                        <div class="row mt-4">
                                            <div class="col-lg-8">
                                                <h2><?php echo isset($value['title'])?$value['title']:''; ?></h2>
                                                <p><?php echo isset($value['summary'])?$value['summary']:''; ?></p>
                                            </div>
                                            <div class="col-lg-4">
                                                <img src="<?php echo base_url().isset($value['image'])?$value['image']:''; ?>" class="img-fluid<?php echo $reguler_opini; ?>">
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
                <!-- <div class="row justify-content-center">
                    <a id="tombol-lainnya" href="javascript:void(0)" class="btn btn-load-more">Load more</a>
                </div> -->
            </div>
            <div class="col-lg-3">
                <?php $this->load->view('shared/sidebar'); ?>
            </div>
        </div>
    </div>
<?php $this->load->view('shared/footer'); ?>