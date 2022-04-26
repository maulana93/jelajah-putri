<?php $this->load->view('cms/shared/head'); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2 menu-bar">
				<?php $this->load->view('cms/shared/menu'); ?>
			</div>
			<div class="col-lg-10 content">
				<div class="row">
					<div class="col-lg-6">
						<h3 class="mb-0">Content</h3><small>Tambah Data</small>
					</div>
					<div class="col-lg-6 text-right">
						<a class="btn btn-primary" href="<?php echo base_url().'cms/content'; ?>">Lihat Data</a>
					</div>
				</div>
				<hr>
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<?php echo form_open_multipart(base_url().'cms/content/add'); ?> 
							<div class="form-group">
								<label>Judul</label>
								<input type="text" class="form-control" id="title" name="title" required>
								Karakter tersisa <b><span id="charsLeft"></span></b>
							</div>
							<div class="form-group">
								<label>Kategori</label>
								<select class="form-control" name="category" required>
									<option value="" disabled selected>-- Pilih Kategori --</option>
									<?php
									if(isset($category)){										
										foreach($category as $key => $value){
											?>
											<option value="<?php echo $value['id']; ?>"><?php echo $value['title']; ?></option>
											<?php
										}
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label>Ringkasan</label>
								<textarea class="form-control" name="summary" required></textarea>
							</div>
							<div class="form-group">
								<label>Konten</label>
								<textarea class="form-control" name="body" id="bodytextarea" required></textarea>
							</div>
							<script>
								CKEDITOR.replace('bodytextarea');
							</script>
							<div class="form-group">
								<label>Foto</label>
								<input type="file" class="form-control" name="image" required>
							</div>
							<div class="form-group">
								<label>Headline</label>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="headline" id="headline1" value="1">
									<label class="form-check-label" for="headline1">
										Ya
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="headline" id="headline2" value="0" checked>
									<label class="form-check-label" for="headline2">
										Tidak
									</label>
								</div>
							</div>
							<div class="form-group">
								<label>Status</label>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="status" id="status1" value="1">
									<label class="form-check-label" for="status1">
									Aktif
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="status" id="status2" value="0" checked>
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