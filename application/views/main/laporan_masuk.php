

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Laporan Alkon Masuk</h1>
                        <!-- Button for PDF export -->
                    <a href="<?= site_url('pdfcontroller/generate_pdf') ?>" class="btn btn-primary">Export to PDF</a>


                    </div>
					
					<br>
					<div class="row">
						<div class="col-md-12">
							<!-- DataTales Example -->
							<div class="card shadow mb-4">
								<div class="card-header py-3">
									<h6 class="m-0 font-weight-bold text-primary">Laporan Alkon Masuk</h6>
								</div>
								<div class="card-body">
									<div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
												<tr>
													<th style="width: 5%;">No</th>
													<th style="width: 20%;">Nama Alkon</th>
													<th style="width: 20%;">No Batch</th>
													<th style="width: 20%;">Asal Stok</th>
													<th style="width: 20%;">Stok Masuk</th>
													<th style="width: 20%;">Tanggal Masuk</th>
													<th style="width: 20%;">Tanggal kadaluarsa</th>
												</tr>
											</thead>
                                    

											
											<tbody>
												<?php $no = 1; foreach($masuk as $row) : ?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?= $row->nama_alkon; ?></td>
													<td><?= $row->no_batch; ?></td>
													<td><?= $row->nama_supplier; ?></td>
													<td><?= $row->stock." ".$row->satuan; ?></td>
													<td><?= date('d-m-Y',strtotime($row->entry_date)); ?></td>
													<td><?= date('d-m-Y',strtotime($row->expired_date)); ?></td>
														<!-- <a href="#" class="btn btn-info btn-circle btn-sm">
															<i class="fas fa-pen"></i>
														</a>
														<a href="<?= base_url('alkon_masuk_delete/').urlencode($this->encryption->encrypt($row->id_stock_alkon)); ?>" class="btn btn-danger btn-circle btn-sm">
															<i class="fas fa-trash"></i>
														</a> -->
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
