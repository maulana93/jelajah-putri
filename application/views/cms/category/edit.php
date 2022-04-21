<?php $this->load->view('cms/shared/head'); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2 menu-bar">
				<?php $this->load->view('cms/shared/menu'); ?>
			</div>
			<div class="col-lg-10 content">
				<div class="row">
					<div class="col-lg-6">
						<h3 class="mb-0">Header Cover</h3><small>Update Data</small>
					</div>
					<div class="col-lg-6 text-right">
						<a class="btn btn-primary" href="<?php echo base_url().'cms/category'; ?>">Lihat Data</a>
					</div>
				</div>
				<hr>
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<?php echo form_open_multipart(base_url().'cms/category/edit'); ?>
							<input type="hidden" class="form-control" name="id" value="<?php echo isset($lists[0]['id'])?$lists[0]['id']:''; ?>" required> 

							<div class="form-group">
								<label>Judul</label>
								<input type="text" class="form-control" name="title" value="<?php echo isset($lists[0]['title'])?$lists[0]['title']:''; ?>" required>
							</div>
							<div class="form-group">
								<label>Slug</label>
								<input type="text" class="form-control" name="slug" value="<?php echo isset($lists[0]['slug'])?$lists[0]['slug']:''; ?>" required>
							</div>
							<div class="form-group">
								<label>Description</label>
								<textarea class="form-control" name="description" required><?php echo isset($lists[0]['description'])?$lists[0]['description']:''; ?></textarea>
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
<?php $this->load->view('cms/shared/footer'); ?>