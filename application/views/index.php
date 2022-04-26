<?php $this->load->view('shared/header-1'); ?>
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <?php 
                    if(isset($cover) && count($cover)>0){ 
                        foreach($cover as $key => $value){
                        ?>
                            <img src="<?php echo base_url().$value['image']; ?>" class="d-block w-100">
                            <div class="carousel-caption d-none d-md-block">
                                <h2><?php echo $value['title'] ?></h2>
                                <p><?php echo $value['summary'] ?></p>
                            </div>
                        <?php
                        }
                    }
                ?>
            </div>
            <?php
                if(isset($category) && count($category)>0){ 
                    foreach($category as $key => $value){                            
                    ?>
                    <div class="carousel-item">
                        <img src="<?php echo base_url().$value['headline'][0]['image']; ?>" class="d-block w-100">
                        <div class="carousel-caption carousel-caption--headline d-none d-md-block">
                            <div class="category"><?php echo $value['title'] ?></div>
                            <h2><?php echo $value['headline'][0]['title']; ?></h2>
                            <p><?php echo $value['headline'][0]['summary']; ?></p>
                        </div>
                    </div>
                    <?php
                    }
                }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-9">
                <?php
                    if(isset($category) && count($category)>0){ 
                        foreach($category as $key => $value){                            
                        ?>
                        <div class="update-news d-flex align-items-center justify-content-between mb-5">
                            <h3><?php echo $value['title']; ?></h3>
                            <a href="<?php echo base_url().strtolower($value['title']); ?>">Selengkapnya »</a>
                        </div>
                        <?php if($value['id'] == 5) { ?>
                            <div class="row article article--opini mb-4">
                                <?php foreach($value['content'] as $key => $value){ ?>
                                <div class="col-lg-4">
                                    <a href="<?php echo url_format($value); ?>">
                                        <img src="<?php echo base_url().$value['image']; ?>" class="img-fluid mb-2">
                                        <h4><?php echo $value['title']; ?></h4>
                                        <p><?php echo $value['penulis'][0]['fullname']; ?></p>
                                    </a>
                                </div>
                                <?php } ?>
                            </div>
                        <?php } else { ?>
                            <div class="row article mb-4">
                                <?php foreach($value['content'] as $key => $value){ ?>
                                    <div class="col-lg-4">
                                        <a href="<?php echo url_format($value); ?>">
                                            <img src="<?php echo base_url().$value['image']; ?>" class="img-fluid mb-2">
                                            <h4 class="mb-3"><?php echo $value['title']; ?></h4>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <?php 
                        }
                    }
                ?>
            </div>
            <div class="col-lg-3">
                <?php $this->load->view('shared/sidebar'); ?>
            </div>
        </div>
    </div>
<?php $this->load->view('shared/footer'); ?>