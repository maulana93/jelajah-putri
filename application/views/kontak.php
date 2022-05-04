<?php $this->load->view('shared/header-2'); ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-9">
                <h1 class="title-page">HUBUNGI KAMI</h1>
                <img class="img-fluid" src="<?php echo base_url().'assets/images/bg-kontak.png'; ?>">
                <div class="row justify-content-end mt-4">
                    <div class="col-lg-9">
                        <p>For partnership inquiries or if you have something to ask (or maybe wanna have a cup of coffee with our team), please don't hesitate to contact us.</p>
                        <div class="contact-form mb-4">
                            <?php 
                            echo form_open(base_url().'kontak/send_mail'); 
                            ?> 
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="7" name="messages" placeholder="Messages"></textarea>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-lg-6">
                                        <button type="button" class="btn btn-cancel mr-4">Cancel</button>
                                        <input type="submit" name="kirim" class="btn btn-submit" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
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