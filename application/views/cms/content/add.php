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
									<input type="text" class="form-control" id="title" name="title" maxlength="50" required>
									<span class="counter"></span>
									<script>
										let input = document.querySelector('.form-group input')
											counter = document.querySelector('.counter')
											maxLength = input.getAttribute('maxlength')
											counter.innerHTML = `Sisa karakter ${maxLength}`

											input.addEventListener('keyup', (e) => {
												counter.innerHTML = `Sisa karakter ${parseFloat(maxLength) - e.target.value.length}`
											})
									</script>
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
									<textarea class="form-control" name="summary" rows="7" maxlength="180" required></textarea>
									<span class="counter-summary"></span>
									<script>
										let input1 = document.querySelector('.form-group textarea')
											counter1 = document.querySelector('.counter-summary')
											maxLength1 = input1.getAttribute('maxlength')
											counter1.innerHTML = `Sisa karakter ${maxLength1}`

											input1.addEventListener('keyup', (e) => {
												counter1.innerHTML = `Sisa karakter ${parseFloat(maxLength1) - e.target.value.length}`
											})
									</script>
								</div><div class="form-group">
									<label>Konten</label>
									<textarea class="form-control" name="body" id="mytextarea"></textarea>
								</div>
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
	</div>
<?php $this->load->view('cms/shared/footer'); ?>