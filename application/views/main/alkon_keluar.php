                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Alat Kontrasepsi Keluar</h1>
                    </div>
					<div class="row">
						<div class="col-md-12">
							<div class="card o-hidden border-0 shadow-lg">
								<div class="card-body">
									<!-- Nested Row within Card Body -->
									<div class="row">
										<div class="col-lg-12">
											<div class="p-5">
												<div class="text-left">
													<h1 class="h4 text-gray-900 mb-4">Alat Kontrasepsi Keluar</h1>
												</div>
												<form class="user" action="<?= base_url('alkon_keluar_proses')?>" method="POST">
													<div class="row">
														<div class="col-lg-6">
															<div class="form-group">
																<label for="alkon" class="text-gray-900">Alkon Keluar</label>
																<select class="form-control form-control" id="alkon" name="alkon">
																	<option value="" selected>Pilih Alkon</option>
																	<?php foreach($alkon as $row) : ?>
																	<option value="<?= $row->id_alkon; ?>"><?= $row->nama_alkon; ?></option>
																	<?php endforeach ; ?>
																</select>
															</div>	
															
															<div class="form-group">
																<label for="out_date" class="text-gray-900">Tanggal Keluar</label>
																<input type="date" class="form-control form-control"
																	id="out_date" name="out_date">
                                                                    
															</div>
														</div>
														<div class="col-lg-6">
															<div class="form-group">
																<label for="faskes" class="text-gray-900">Alamat Tujuan</label>
																<select class="form-control form-control" id="faskes" name="faskes">
																	<option value="" selected>Pilih faskes</option>
																	<?php foreach($faskes as $row) : ?>
																	<option value="<?= $row->id_faskes; ?>"><?= $row->nama_faskes; ?></option>
																	<?php endforeach ; ?>
																</select>   
                                                                <div class="form-group">
																<label for="nama_penerima" class="text-gray-900">Nama Penerima</label>
																<div class="row">
																	<div class="col-lg-8">
																	<input type="text" class="form-control form-control"
																		id="nama_penerima" name="nama_penerima" placeholder="Nama Penerima">
																	</div>

															</div>
															<div class="form-group">
																<label for="stok" class="text-gray-900">Jumlah</label>
																<div class="row">
																	<div class="col-lg-8">
																	<input type="text" class="form-control form-control"
																		id="stok" name="stok" placeholder="Enter Stok awal...">
																	</div>
																	<div class="col-lg-4 text-center">
																		<span class="input-group-text" id="satuan">Butir</span>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<button type="submit" class="btn btn-primary btn-user btn-block">
														Simpan
													</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							<!-- DataTales Example -->
							<div class="card shadow mb-4">
								<div class="card-header py-3">
									<h6 class="m-0 font-weight-bold text-primary">Data Alkon Keluar</h6>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<thead>
												<tr>
													<th style="width: 5%;">No</th>
													<th style="width: 30%;">Nama Alkon</th>
                                                    <th style="width: 30%;">Tanggal Keluar</th>
													<th style="width: 25%;">Alamat</th>
													<th style="width: 25%;">Jumlah</th>
                                                    <th style="width: 30%;">Nama Penerima</th>
													<th style="width: 20%;">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php $no = 1; foreach($keluar as $row) : ?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?= $row->nama_alkon; ?></td>
													<td><?= date('d-m-Y',strtotime($row->out_date)); ?></td>
													<td><?= $row->nama_faskes; ?></td>
													<td><?= $row->taking; ?></td>
                                                    
													<td><?= $row->nama_penerima; ?></td>
													<td>
														<a href="#" class="btn btn-info btn-circle btn-sm">
															<i class="fas fa-pen"></i>
														</a>
														<a href="<?= base_url('alkon_keluar_delete/').urlencode($this->encryption->encrypt($row->id_out_alkon)); ?>" class="btn btn-danger btn-circle btn-sm">
															<i class="fas fa-trash"></i>
														</a>
													</td>
												</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>

                </div>
                <!-- /.container-fluid -->

				<script src="<?= base_url('public/'); ?>vendor/jquery/jquery.min.js"></script>

				<script>
					$(document).ready(function() {
						$('#dataTable').DataTable();
					});
				</script>
