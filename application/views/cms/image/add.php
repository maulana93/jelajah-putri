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
					<div class="row">
						<div class="col-lg-6">
							<h3 class="mb-0">Image</h3><small>Tambah Data</small>
						</div>
						<div class="col-lg-6 text-right">
							<a class="btn btn-primary" href="<?php echo base_url().'cms/image'; ?>">Lihat Data</a>
						</div>
					</div>
					<hr>
					<div class="row justify-content-center">
						<div class="col-lg-8">
							<?php echo form_open_multipart(base_url().'cms/image/add'); ?> 
								<div class="form-group">
									<label>Judul</label>
									<input type="text" class="form-control" name="title" required>
								</div>
								<div class="form-group">
									<label>Foto</label>
									<input type="file" class="form-control" name="image" required>
								</div>
								<div class="form-group">
									<input type="submit" name="simpan" value="Simpan" class="btn btn-danger">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $this->load->view('cms/shared/footer'); ?>