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
							<h3 class="mb-0">Banner</h3><small>Update Data</small>
						</div>
						<div class="col-lg-6 text-right">
							<a class="btn btn-primary" href="<?php echo base_url().'cms/banner'; ?>">Lihat Data</a>
						</div>
					</div>
					<hr>
					<div class="row justify-content-center">
						<div class="col-lg-8">
							<?php echo form_open_multipart(base_url().'cms/banner/edit'); ?>
								<input type="hidden" class="form-control" name="image_existing" value="<?php echo isset($lists[0]['image'])?$lists[0]['image']:''; ?>" required>
								<input type="hidden" class="form-control" name="id" value="<?php echo isset($lists[0]['id'])?$lists[0]['id']:''; ?>" required> 

								<div class="form-group">
									<label>Judul</label>
									<input type="text" class="form-control" name="title" value="<?php echo isset($lists[0]['title'])?$lists[0]['title']:''; ?>" required>
								</div>
								<div class="form-group">
									<label>Url</label>
									<input type="text" class="form-control" name="url" value="<?php echo isset($lists[0]['url'])?$lists[0]['url']:''; ?>" required>
								</div>
								<div class="form-group">
									<label>Foto</label><br>
									<img src="<?php echo isset($lists[0]['image'])?base_url().$lists[0]['image']:''; ?>" class="img-fluid">
									<input type="file" class="form-control" name="image">
								</div>
								<div class="form-group">
									<label>Status</label>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="status" id="status1" value="1" <?php if(isset($lists[0]['status']) && $lists[0]['status'] == 1) { echo 'checked'; } ?>>
										<label class="form-check-label" for="status1">
										Aktif
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="status" id="status2" value="0" <?php if(isset($lists[0]['status']) && $lists[0]['status'] == 0) { echo 'checked'; } ?>>
										<label class="form-check-label" for="status2">
											Tidak Aktif
										</label>
									</div>
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