<?php $this->load->view('cms/shared/head'); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2 menu-bar">
				<?php $this->load->view('cms/shared/menu'); ?>
			</div>
			<div class="col-lg-10 content">
				<h1>Content</h1>
				<table class="table table-bordered"> 
					<thead> 
						<tr> 
							<th>No</th>
							<th>Judul</th>
							<th>Kategori</th>
							<th>Headline</th>
							<th>Status</th>
							<th>Opsi</th>
						</tr> 
					</thead> 
					<tbody>
						<?php
							if($content){
								$no = 1;
								foreach ($content as $key => $value){
								?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $value->title; ?></td>
									<td><?php echo $value->category; ?></td>
									<td><?php echo $value->headline; ?></td>
									<td><?php echo $status; ?></td>
									<td>
										<a class="btn btn-warning" href="<?php echo base_url().'admin/proses/'.$value->id; ?>">Edit</a>
									</td>
								</tr> 
								<?php
									$no++;
								}
							}
							else {
								?>
								<tr>
									<td colspan="5">Tidak Ada Data</td>
								</tr> 
								<?php
							}
						?>	
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php $this->load->view('cms/shared/footer'); ?>