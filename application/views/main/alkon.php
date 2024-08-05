                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Alat Kontrasepsi</h1>
                    </div>
					<div class="row">
						<div class="col-md-4">
							<div class="card o-hidden border-0 shadow-lg">
								<div class="card-body">
									<!-- Nested Row within Card Body -->
									<div class="row">
										<div class="col-lg-12">
											<div class="p-5">
												<div class="text-left">
													<h1 class="h4 text-gray-900 mb-4">New Alat Kontrasepsi</h1>
												</div>
												<form class="user" action="<?= base_url('alkon_proses')?>" method="POST">
													<div class="form-group">
														<label for="nama" class="text-gray-900">Nama Alkon</label>
														<input type="text" class="form-control form-control"
															id="nama" name="nama" placeholder="Enter Name...">
													</div>
													<div class="form-group">
														<label for="jns_alkon" class="text-gray-900">Jenis Alkon</label>
														<select class="form-control form-control" id="jns_alkon" name="jns_alkon">
															<option value="" selected>Pilih Jenis Alkon</option>
															<?php foreach($jenis as $row) : ?>
															<option value="<?= $row->id_jns_alkon; ?>"><?= $row->jns_alkon; ?></option>
															<?php endforeach ; ?>
														</select>
													</div>
													<div class="form-group">
														<label for="stok" class="text-gray-900">Stok Awal</label>
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
													<div class="form-group">
														<label for="expired_date" class="text-gray-900">Tanggal Kadalursa</label>
														<input type="date" class="form-control form-control"
															id="expired_date" name="expired_date">
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
						<div class="col-md-8">
							<!-- DataTales Example -->
							<div class="card shadow mb-4">
								<div class="card-header py-3">
									<h6 class="m-0 font-weight-bold text-primary">Data Alat Kontrasepsi</h6>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<thead>
												<tr>
													<th style="width: 5%;">No</th>
													<th style="width: 30%;">Nama Alkon</th>
													<th style="width: 25%;">Jenis Alkon</th>
													<th style="width: 20%;">Stok Awal Alkon</th>
													<th style="width: 20%;">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php $no = 1; foreach($alkon as $row) : ?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?= $row->nama_alkon; ?></td>
													<td><?= $row->jns_alkon; ?></td>
													<td><?= $row->stock." ".$row->satuan; ?></td>
													<td>
														<a href="#" class="btn btn-info btn-circle btn-sm">
															<i class="fas fa-pen"></i>
														</a>
														<a href="<?= base_url('alkon_delete/').urlencode($this->encryption->encrypt($row->id_alkon)); ?>" class="btn btn-danger btn-circle btn-sm">
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
