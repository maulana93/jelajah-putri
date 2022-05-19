<?php $this->load->view('cms/shared/head'); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2 px-0">
				<div class="menu-bar">
					<?php $this->load->view('cms/shared/menu'); ?>
				</div>
			</div>
			<div class="col-lg-10">
				<div class="content">
					<h3>Selamat datang, <?php echo $this->session->userdata('SESSION_NAME'); ?></h3>
					<p>Ini adalah content management system website Jelajah Putri. Anda bisa mengelola konten website lewat halaman ini.</p>
					<div class="row">
						<div class="col-lg-4">
							<div class="alert alert-success text-center mb-0" role="alert">
								<b>Artikel Terbaru Saya</b>
							</div>
							<div class="list-group">
								<?php 
								if($listsMyArticle){
									foreach ($listsMyArticle as $key => $value){ 
									?> 									
									<a href="<?php echo url_format($value); ?>" class="list-group-item list-group-item-action"><?php echo $value['title'];?></a>
									<?php 
									}
								} 
								?>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="alert alert-warning text-center mb-0" role="alert">
								<b>Artikel Terbaru</b>
							</div>
							<div class="list-group">
								<?php 
								if($listsNewArticle){
									foreach ($listsNewArticle as $key => $value){ 
									?> 									
									<a href="<?php echo url_format($value); ?>" class="list-group-item list-group-item-action"><?php echo $value['title'];?></a>
									<?php 
									}
								} 
								?>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="alert alert-primary text-center mb-0" role="alert">
								<b>Headline</b>
							</div>
							<div class="list-group">
								<?php 
								if($listsHeadline){
									foreach ($listsHeadline as $key => $value){ 
									?> 									
									<a href="<?php echo url_format($value); ?>" class="list-group-item list-group-item-action"><?php echo $value['title'];?></a>
									<?php 
									}
								} 
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $this->load->view('cms/shared/footer'); ?>