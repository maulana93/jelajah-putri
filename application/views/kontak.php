<?php $this->load->view('shared/header-2'); ?>
    <div class="container">
        <div class="row mt-5" style="height: 1000px;">
            <div class="col-lg-9">
                <h1 class="title-page">HUBUNGI KAMI</h1>
                <img class="img-fluid" src="<?php echo base_url().'assets/images/bg-kontak.png'; ?>">
                <div class="row justify-content-end mt-4">
                    <div class="col-lg-9">
                        <p>For partnership inquiries or if you have something to ask (or maybe wanna have a cup of coffee with our team), please don't hesitate to contact us.</p>
                        <form class="contact-form mb-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Messages"></textarea>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-lg-6">
                                    <button type="button" class="btn btn-cancel mr-4">Cancel</button>
                                    <button type="submit" class="btn btn-submit">Submit</button>
                                </div>
                            </div>
                        </form>
                        <p>You can also DM us via Instagram: <a style="color: #9894FB;" href="https://www.instagram.com/jelajahputri/">https://www.instagram.com/jelajahputri/</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <?php $this->load->view('shared/sidebar'); ?>
            </div>
        </div>
    </div>
<?php $this->load->view('shared/footer'); ?>