<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo isset($title)?$title:''; ?></title>
        <link rel="shortcut icon" href="<?php echo base_url().'assets/images/favicon.png'; ?>" type="image/png" />
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.js"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.js"></script>
		<script>                            
			jQuery(document).ready(function($) {
				$(".alert").fadeTo(2000, 500).slideUp(500, function(){
					$(".alert").slideUp(500);
				});
			});
		</script>
    </head>
    <body>

		<div class="container">
			<div class="row justify-content-center mt-5">
				<div class="col-sm-4">
					<img src="<?php echo base_url().'assets/images/header-login.png'; ?>" class="img-fluid">
					<div class="card">
						<div class="card-body">
							<div class="form-horizontal">
								<?php echo form_open(base_url().'cms/login'); ?>  					
									<?php if(!empty($alert)){ ?>                            
										<div class="alert alert-danger fade in show" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
										<?php echo $alert; ?>
										</div>                       
									<?php } ?>
									<div class="form-group">
										<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo isset($email)?$email:''; ?>">
									</div>
									<div class="form-group">
										<input type="password" name="password" class="form-control" placeholder="Password">
									</div>
									<input type="submit" name="login" value="Masuk" class="btn btn-primary btn-block" />
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

    </body>
</html>