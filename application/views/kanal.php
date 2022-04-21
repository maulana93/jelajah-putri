<?php $this->load->view('shared/header-2'); ?>
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
                                        <a href="">
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
                                            <a href="">
                                                <img src="<?php echo base_url().isset($value['image'])?$value['image']:''; ?>" class="img-fluid mb-2">
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
                                    <a href="">
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
                <?php /* ?>
                    <div class="headline-kanal">
                        <div class="row">
                            <div class="col-lg-8">                            
                                <a href="">
                                    <img src="<?php echo base_url().'assets/images/sample/Rectangle 166.png'; ?>" class="img-fluid mb-2">
                                    <h2 class="main-headline-title">Cerita-cerita dari Denali</h2>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                </a>
                            </div>
                            <div class="col-lg-4">         
                                <a href="">
                                    <img src="<?php echo base_url().'assets/images/sample/Rectangle 17.png'; ?>" class="img-fluid mb-2">
                                    <h2 class="headline-title">Tips mendaki di gunung es</h2>
                                </a>     
                                <a href="">
                                    <img src="<?php echo base_url().'assets/images/sample/Rectangle 18.png'; ?>" class="img-fluid mb-2">
                                    <h2 class="headline-title">Ambisius di Kantor, Ya atau Tidak?</h2>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="list-news">
                        <div class="border-top">
                            <a href="">
                                <div class="row mt-4">
                                    <div class="col-lg-8">
                                        <h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h2>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                    </div>
                                    <div class="col-lg-4">
                                        <img src="<?php echo base_url().'assets/images/sample/Rectangle 1111.png'; ?>" class="img-fluid">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="border-top">
                            <a href="">
                                <div class="row mt-4">
                                    <div class="col-lg-8">
                                        <h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h2>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                    </div>
                                    <div class="col-lg-4">
                                        <img src="<?php echo base_url().'assets/images/sample/Rectangle 32.png'; ?>" class="img-fluid">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="border-top">
                            <a href="">
                                <div class="row mt-4">
                                    <div class="col-lg-8">
                                        <h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h2>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                    </div>
                                    <div class="col-lg-4">
                                        <img src="<?php echo base_url().'assets/images/sample/Rectangle 33.png'; ?>" class="img-fluid">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="border-top">
                            <a href="">
                                <div class="row mt-4">
                                    <div class="col-lg-8">
                                        <h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h2>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                    </div>
                                    <div class="col-lg-4">
                                        <img src="<?php echo base_url().'assets/images/sample/Rectangle 1111.png'; ?>" class="img-fluid">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="border-top">
                            <a href="">
                                <div class="row mt-4">
                                    <div class="col-lg-8">
                                        <h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h2>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                    </div>
                                    <div class="col-lg-4">
                                        <img src="<?php echo base_url().'assets/images/sample/Rectangle 32.png'; ?>" class="img-fluid">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="border-top">
                            <a href="">
                                <div class="row mt-4">
                                    <div class="col-lg-8">
                                        <h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h2>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                    </div>
                                    <div class="col-lg-4">
                                        <img src="<?php echo base_url().'assets/images/sample/Rectangle 33.png'; ?>" class="img-fluid">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="border-top">
                            <a href="">
                                <div class="row mt-4">
                                    <div class="col-lg-8">
                                        <h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h2>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                    </div>
                                    <div class="col-lg-4">
                                        <img src="<?php echo base_url().'assets/images/sample/Rectangle 1111.png'; ?>" class="img-fluid">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="border-top">
                            <a href="">
                                <div class="row mt-4">
                                    <div class="col-lg-8">
                                        <h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h2>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                    </div>
                                    <div class="col-lg-4">
                                        <img src="<?php echo base_url().'assets/images/sample/Rectangle 32.png'; ?>" class="img-fluid">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="border-top">
                            <a href="">
                                <div class="row mt-4">
                                    <div class="col-lg-8">
                                        <h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h2>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                    </div>
                                    <div class="col-lg-4">
                                        <img src="<?php echo base_url().'assets/images/sample/Rectangle 33.png'; ?>" class="img-fluid">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="border-top">
                            <a href="">
                                <div class="row mt-4">
                                    <div class="col-lg-8">
                                        <h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h2>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                    </div>
                                    <div class="col-lg-4">
                                        <img src="<?php echo base_url().'assets/images/sample/Rectangle 1111.png'; ?>" class="img-fluid">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } */ ?>
                <div class="row justify-content-center">
                    <button type="button" class="btn btn-load-more">Load more</button>
                </div>
            </div>
            <div class="col-lg-3">
                <?php $this->load->view('shared/sidebar'); ?>
            </div>
        </div>
    </div>
<?php $this->load->view('shared/footer'); ?>