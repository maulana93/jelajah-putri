<?php $this->load->view('cms/shared/head'); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2 menu-bar">
				<?php $this->load->view('cms/shared/menu'); ?>
			</div>
			<div class="col-lg-10 content">
				<div class="row">
					<div class="col-lg-6">
						<h3 class="mb-0">Image</h3><small>Update Data</small>
					</div>
					<div class="col-lg-6 text-right">
						<a class="btn btn-primary" href="<?php echo base_url().'cms/image'; ?>">Lihat Data</a>
					</div>
				</div>
				<hr>
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<?php echo form_open_multipart(base_url().'cms/image/edit'); ?>
							<input type="hidden" class="form-control" name="image_existing" value="<?php echo isset($lists[0]['image'])?$lists[0]['image']:''; ?>" required>
							<input type="hidden" class="form-control" name="id" value="<?php echo isset($lists[0]['id'])?$lists[0]['id']:''; ?>" required> 

							<div class="form-group">
								<label>Judul</label>
								<input type="text" class="form-control" name="title" value="<?php echo isset($lists[0]['title'])?$lists[0]['title']:''; ?>" required>
							</div>
							<div class="form-group">
								<label>Foto</label><br>
								<img src="<?php echo isset($lists[0]['image'])?base_url().$lists[0]['image']:''; ?>" class="img-fluid">
								<input type="file" class="form-control" name="image">
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
<?php $this->load->view('cms/shared/footer'); ?>