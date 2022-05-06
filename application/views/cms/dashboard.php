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
				</div>
			</div>
		</div>
	</div>
<?php $this->load->view('cms/shared/footer'); ?>