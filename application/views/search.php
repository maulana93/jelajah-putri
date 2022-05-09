<?php $this->load->view('shared/header-2'); ?>
    <div class="container">
        <div class="row pt-5">
            <div class="col-lg-9">
                <?php 
                    if (isset($listsSearch)) { 
                        ?>  
                        <p style="font-family: 'Barlow';">Ada <?php echo count($listsSearch); ?> hasil pencarian untuk <b>"<?php echo $keyword; ?>"</b></p>            
                        <?php
                    }
                ?>    
                <form action="search" method="get">
                    <div class="input-group input-group--search">
                        <input type="text" class="form-control" name="q" placeholder="Cari berita..." required>
                        <div class="input-group-append">
                            <button class="btn btn-search" style="border-left: none;" type="submit"><i class="bi bi-search text-dark"></i></button>
                            <!-- <input type="submit" name="search" value='<i class="bi bi-search text-dark"></i>'> -->
                        </div>
                    </div>
                </form>
                <div class="list-news">                     
                    <?php 
                    if (isset($listsSearch) && count($listsSearch)>0) { 
                        foreach($listsSearch as $key=>$value) { 
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
                                            <img src="<?php echo base_url().$value['image']; ?>" class="img-fluid">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </article>
                        <?php 
                        }
                        ?>
                        <?php if ($key == count($listsSearch) - 1){ ?>
                            <input type="hidden" value="<?php echo $value['id']; ?>" class="last_id">
                        <?php } ?>
                        <?php
                    }
                    ?>
                </div>
                <?php 
                if (isset($listsSearch) && count($listsSearch)>0) { 
                    ?>  
                        <div class="row justify-content-center">
                            <button id="load_button" onclick="load_click()" class="btn btn-load-more">Load more</button>
                        </div>
                    <?php 
                }
                ?>
                <script>
                    function load_click(){
                        var last_id  = $(".last_id").val();
                        $.ajax({  
                                url: "<?php echo base_url().'kanal/getAllDataNext/'; ?>",
                                method: "POST",
                                data: {
                                        last_id: last_id
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