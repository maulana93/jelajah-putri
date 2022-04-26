<?php $this->load->view('shared/header-2'); ?>
<script type="text/javascript"> 
    $(document).ready(function(){
        $("#tombol-lainnya").click(function(e){
            loadmore();
        });
    });

    function loadmore(){
        $("#tombol-lainnya").hide();
        var current_value  = $(".current_pagination:last").val();
        var array_exclude  = $(".array_exclude:last").val();
        $("#loader").show(0).delay(2000).hide(0);
        $('.current_pagination').remove();
        $('.array_exclude').remove();
        $.post('<?php echo base_url() ?>kanal/getAllDataNext/', { id_kanal: <?php echo $this->webconfig['kanal-id-berita']; ?>, current_value : current_value, array_exclude : array_exclude}, 
            function(data){
                var cekdata = data.includes("<article");
                $("#loader").hide();
                if (cekdata) {
                  $( ".result" ).append( data );
                  $("#tombol-lainnya").show();
                } else {
                  $("#tombol-lainnya").hide();
                }
        });
        return false;
    }
</script>
    <div class="container">
        <div class="title-kanal d-flex mt-5">     
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
                                        <img src="<?php echo base_url().isset($value['image'])?$value['image']:''; ?>" class="img-fluid mb-2">
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
                                        <a href="<?php echo url_format($value); ?>">
                                            <img src="<?php echo base_url().$value['image']; ?>" class="img-fluid mb-2">
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
                <div class="list-news">   
                    <?php 
                    if (isset($listsContent) && count($listsContent)>0) { 
                        foreach($listsContent as $key=>$value) {
                            if($key > 2){
                            ?>  
                            <div class="border-top">
                                <a href="<?php echo url_format($value); ?>">
                                    <div class="row mt-4">
                                        <div class="col-lg-8">
                                            <h2><?php echo isset($value['title'])?$value['title']:''; ?></h2>
                                            <p><?php echo isset($value['summary'])?$value['summary']:''; ?></p>
                                        </div>
                                        <div class="col-lg-4">
                                            <img src="<?php echo base_url().isset($value['image'])?$value['image']:''; ?>" class="img-fluid">
                                        </div>
                                    </div>
                                </a>
                            </div>   
                            <?php 
                            }
                        }
                    }
                    ?>    
                </div>
                <div class="row justify-content-center">
                    <a id="tombol-lainnya" href="javascript:void(0)" class="btn btn-load-more">Load more</a>
                </div>
            </div>
            <div class="col-lg-3">
                <?php $this->load->view('shared/sidebar'); ?>
            </div>
        </div>
    </div>
<?php $this->load->view('shared/footer'); ?>