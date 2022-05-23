<?php $this->load->view('shared/header-2'); ?>
    <div class="container">        
    <?php
    if(isset($detail) && count($detail)>0){ 
        foreach($detail as $key => $value){                            
        ?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-3">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="bi bi-house-door"></i></a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().$value['category'][0]['slug']; ?>"><?php echo $value['category'][0]['title']; ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $value['title']; ?></li>
            </ol>
        </nav>
        <?php 
        }
    }
    ?>
        <div class="row">
            <div class="col-lg-9">
                <div class="news-detail">
                    <?php
                    if(isset($detail) && count($detail)>0){ 
                        foreach($detail as $key => $value){                         
                        ?>
                        <h1><?php echo $value['title']; ?></h1>
                        <p class="summary"><?php echo $value['summary']; ?></p>
                        <div class="d-flex align-items-center justify-content-between my-4">
                            <div class="detail-info align-items-center d-flex">
                                <!-- <div class="row"> -->
                                    <?php if($value['profile_image'] != '') { ?>
                                        <div class="mr-3">
                                            <img class="img-fluid img-opini" src="<?php echo base_url().$value['profile_image']; ?>">
                                        </div>
                                    <?php } ?>
                                    <div>
                                        <?php if($value['profile_name'] != '') { ?>
                                            <p><?php echo $value['profile_name']; ?></p>
                                        <?php } else { ?>
                                            <p><?php echo $value['penulis'][0]['fullname']; ?></p>
                                        <?php } ?>
                                        <span><?php echo date("j F Y", strtotime( $value['datecreated'])); ?></span>
                                    </div>
                                <!-- </div> -->
                            </div>
                            <div class="detail-share">
                                <a href="https://twitter.com/intent/tweet?text=<?php echo $value['title']; ?>+<?php echo $meta_url; ?>"><img class="img-fluid" src="<?php echo base_url().'assets/images/logo-twitter.png'; ?>"></a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $meta_url; ?>"><img class="img-fluid" src="<?php echo base_url().'assets/images/logo-fb.png'; ?>"></a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&title=<?php echo $value['title']; ?>&url=<?php echo $meta_url; ?>"><img class="img-fluid" src="<?php echo base_url().'assets/images/logo-linkedin.png'; ?>"></a>
                            </div>
                        </div>
                        <img class="img-fluid img-header" src="<?php echo base_url().$value['image']; ?>">
                        <p class="caption-image"><?php echo isset($value['caption_image'])?$value['caption_image']:''; ?></p>
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-9">
                                <div class="detail-body mt-4">
                                    <?php echo $value['body']; ?>
                                    <div id="fb-root"></div>
                                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v13.0" nonce="GrNiXRdp"></script>

                                    <div class="fb-comments" data-href="<?php echo base_url().$_SERVER['REQUEST_URI']; ?>" data-width="" data-numposts="5"></div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                    }
                    ?>
                    <hr>
                    <h4 class="section-title">MUNGKIN MENARIK BUAT KAMU</h4>
                    <div class="list-news mb-5">
                        <?php
                        if(isset($listsContent) && count($listsContent)>0){ 
                            foreach($listsContent as $key => $value){                         
                            ?>
                            <div class="border-top">
                                <a href="<?php echo url_format($value); ?>">
                                    <div class="row mt-4">
                                        <div class="col-lg-8">
                                            <h2><?php echo isset($value['title'])?$value['title']:''; ?></h2>
                                            <p><?php echo isset($value['summary'])?$value['summary']:''; ?>.</p>
                                        </div>
                                        <div class="col-lg-4">
                                            <img src="<?php echo base_url().$value['image']; ?>" class="img-fluid">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <?php $this->load->view('shared/sidebar'); ?>
            </div>
        </div>
    </div>
<?php $this->load->view('shared/footer'); ?>