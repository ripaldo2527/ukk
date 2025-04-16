<!--begin::App Main-->
<main class="main-panel">
	<div class="content">
		<div class="container-fluid">
			<!--begin::Row-->
			<div class="row">
				<div class="col-sm-9">
					<h3 class="mb-8">Pelanggan</h3>
				</div>
				<div class="col-sm-9">

					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#PelangganModal">
						Tambah
					</button>
					</ol>
				</div>
			</div>
			<!--end::Row-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::App Content Header-->
	<!--begin::App Content-->
	<div class="app-content">
		<!--begin::Container-->
		<div class="container-fluid">
			<div class="card-body">

				<?php if ($this->session->flashdata('success')): ?>
				<div class="col-12">
					<div class="callout callout-info">
						<?= $this->session->flashdata('success'); ?>
					</div>
				</div>
				<?php endif ?>

				<?php if ($this->session->flashdata('error')): ?>
				<div class="col-12">
					<div class="callout callout-danger">
						<?= $this->session->flashdata('error'); ?>
					</div>
				</div>
				<?php endif ?>

				<br>

				<!-- Modal -->
				<div class="modal fade" id="PelangganModal" tabindex="-1" aria-labelledby="ProdukModalLabel"
					aria-hidden="true">
					<div class="modal-dialog modal-dialog-scrollable modal-xs">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title fs-5" id="ProdukModalLabel">Tambah Pelanggan</h4>
								<button type="button" class="btn-close" data-dismiss="modal"
									aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<div class="card-body">
									<form method="post" action="<?= base_url('Pelanggan/ProsesCreate') ?>">
										<!--begin::Body-->
										
											<div class="mb-3">
												<label class=" form-label">Nama Pelanggan</label>
												<input type="text" class="form-control" name="NamaPelanggan" />
												<?= form_error('NamaPelanggan', '<small  class="text-danger" >', '</small>') ?>
											</div>
											<div class="mb-3">
												<label class="form-label">Alamat</label>
												<input type="text" class="form-control" name="Alamat" />
												<?= form_error('Alamat', '<small  class="text-danger" >', '</small>') ?>
											</div>
											<div class="mb-3">
												<label class="form-label">Nomor Telepon</label>
												<input type="text" class="form-control" name="NomorTelpon" />
												<?= form_error('NomorTelpon', '<small  class="text-danger" >', '</small>') ?>
											</div>
										
										<!--end::Body-->
										<!--begin::Footer-->
										<div class="card-footer">
											<button type="submit" class="btn btn-primary">Submit</button>
										</div>
										<!--end::Footer-->
									</form>
								</div>

							</div>
						</div>
					</div>
				</div>

				<div class="card">
					<div class="card-header">
						<div class="card-title">Data Pelanggan</div>
						<table class="table table-head-bg-primary mt-4">
							<thead>
								<tr>
									<th style="width: 10px">#</th>
									<th>Nama Pelanggan</th>
									<th>Alamat</th>
									<th>Nomor Telpon</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
                                        $i = 1;
                                        foreach ($pelanggan as $p):
                                            ?>
								<tr class="align-middle">
									<td><?= $i ?></td>
									<td><?= $p->NamaPelanggan ?></td>
									<td><?= $p->Alamat ?></td>
									<td><?= $p->NomorTelpon ?></td>
									<td>
										<button class="btn btn-primary"
											data-target="#PelangganModal<?= $p->PelangganID ?>"
											data-toggle="modal">Edit</button>

										<a onclick="return confirm('Apakah Anda Ingin Mengapus Data Pelanggan')"
											href="<?= base_url('Pelanggan/Hapus/' . $p->PelangganID) ?>">
											<button class="btn btn-danger">Hapus</button>
										</a>
									</td>
								</tr>

								<div class="modal fade" id="PelangganModal<?= $p->PelangganID ?>" tabindex="-1"
									aria-labelledby="ProdukModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-scrollable modal-xs">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title fs-5" id="ProdukModalLabel">Tambah Pelanggan</h4>
												<button type="button" class="btn-close" data-dismiss="modal"
													aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<div class="card-body">
													<form method="post"
														action="<?= base_url('Pelanggan/ProsesEdit') ?>">
														<!--begin::Body-->
														<div class="card-body">
															<div class="mb-3">
																<label class="form-label">Nama Pelanggan</label>
																<input type="text" class="form-control"
																	value="<?= $p->NamaPelanggan ?>"
																	name="NamaPelanggan" />
																<?= form_error('NamaPelanggan', '<small  class="text-danger" >', '</small>') ?>
															</div>
															<div class="mb-3">
																<label class="form-label">Alamat</label>
																<input type="text" class="form-control" name="Alamat"
																	value="<?= $p->Alamat ?>" />
																<?= form_error('Alamat', '<small  class="text-danger" >', '</small>') ?>
															</div>
															<div class="mb-3">
																<label class="form-label">Nomor Telepon</label>
																<input type="text" class="form-control" name="NomorTelpon" value="<?= $p->NomorTelpon ?>" />
																<?= form_error('NomorTelpon', '<small  class="text-danger" >', '</small>') ?>
															</div>
															<input type="hidden" value="<?= $p->PelangganID ?>"
																name="id">
														</div>
														<!--end::Body-->
														<!--begin::Footer-->
														<div class="card-footer">
															<button type="submit" class="btn btn-primary">Edit</button>
														</div>
														<!--end::Footer-->
													</form>
												</div>

											</div>
										</div>
									</div>
								</div>

								<?php $i++; endforeach ?>
							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>
	</div>
</main>
