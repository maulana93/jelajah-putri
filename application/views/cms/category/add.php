<?php $this->load->view('cms/shared/head'); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2 menu-bar">
				<?php $this->load->view('cms/shared/menu'); ?>
			</div>
			<div class="col-lg-10 content">
				<div class="row">
					<div class="col-lg-6">
						<h3 class="mb-0">Category</h3><small>Tambah Data</small>
					</div>
					<div class="col-lg-6 text-right">
						<a class="btn btn-primary" href="<?php echo base_url().'cms/category'; ?>">Lihat Data</a>
					</div>
				</div>
				<hr>
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<?php echo form_open_multipart(base_url().'cms/category/add'); ?> 
						<script>
							$(document).ready(function() {
								setTimeout(function() {
									$("#alert").alert('close');
								}, 2000);
							});
						</script>
						<?php if(!empty($alert)){ ?>                            
							<div class="alert alert-danger fade in show" id="alert" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<?php echo $alert; ?>
							</div>                       
						<?php } ?>
							<div class="form-group">
								<label>Judul</label>
								<input type="text" class="form-control" name="title" value="<?php echo isset($title_category)?$title_category:''; ?>" required>
							</div>
							<div class="form-group">
								<label>Description</label>
								<textarea rows="7" class="form-control" name="description" required><?php echo isset($description)?$description:''; ?></textarea>
							</div>
							<div class="form-group">
								<label>Status</label>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="status" id="status1" value="1" <?php
									if(isset($status) && $status==1){
										echo 'checked';
									}
									?>>
									<label class="form-check-label" for="status1">
									Aktif
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="status" id="status2" value="0" <?php
									if(isset($status) && $status==0){
										echo 'checked';
									}
									?>>
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