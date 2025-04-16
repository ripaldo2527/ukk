<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title></title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
		name='viewport' />
	<link rel="stylesheet" href="<?= base_url('assets')?>/css/bootstrap.min.css">
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="<?= base_url('assets')?>/css/ready.css">
	<link rel="stylesheet" href="<?= base_url('assets')?>/css/demo.css">

</head>

<body>
	<!--begin::App Main-->
	<main class="main-panel">
		<div class="content">
			<div class="container-fluid">
				<!--begin::Row-->
				<div class="row">
					<div class="col-sm-6">
						<h3 class="mb-0">Transaksi Detail</h3>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-end">
						</ol>
					</div>
				</div>
				<!--end::Row-->
			</div>
			<!--end::Container-->
		</div>
		<div class="content">
			<!--begin::Container-->
			<div class="container-fluid">
				<!--begin::Row-->
				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success">
					<?= $this->session->flashdata('success'); ?>
				</div>
				<?php endif ?>
				<?php if ($this->session->flashdata('error')): ?>
				<div class="alert alert-danger">
					<?= $this->session->flashdata('error'); ?>
				</div>
				<?php endif ?>

				<br>

				<div class="row">
					<div class="col-md-6">
						<div class="card mb-4">

							<div class="card-body">
								<div class="mb-3">
									<label>Nama Pelanggan</label>
									<input type="text" readonly class="form-control"
										value="<?= isset($penjualan->NamaPelanggan) ? $penjualan->NamaPelanggan : 'Nama Pelanggan Tidak Ditemukan' ?>">

								</div>
								<div class="mb-3">
									<label>Tanggal Penjualan</label>
									<input type="text" readonly class="form-control"
										value="<?= isset($penjualan->TanggalPenjualan) ? $penjualan->TanggalPenjualan : 'Nama Pelanggan Tidak Ditemukan' ?>">

								</div>

								<br>

								<form action="<?= base_url('Penjualan/AddDetail') ?>" method="post">
									<label>Nama Product</label>
									<div class="mb-3">

										<select class="form-control" name="ProdukID">
											<?php
                                        foreach ($produk as $p):
                                            ?>
											<option value="<?= $p->ProdukID ?>"><?= $p->NamaProduk ?> - Harga :
												<?= $p->Harga ?>
												- Stok : <?= $p->Stok ?>
											</option>
											<?php
                                        endforeach;
                                        ?>
										</select>
									</div>
									<div class="mb-3">
										<label> Jumlah </label>
										<input type="number" class="form-control" min="1" required name="JumlahProduct">
									</div>

									<?php $penjualanID = $this->uri->segment(3);
                                ?>

									<input type="hidden" name="PenjualanID" value="<?= $penjualanID ?>">

									<div class="mt-5">
										<button type="submit" class="btn btn-primary">Tambah</button>
									</div>
								</form>

							</div>
							<h2>
								Rp. <?= number_format($TotalHarga->Subtotal) ?>
							</h2>

							<?php
                        if ($detail):
                            ?>
							<button class="btn btn-success" data-toggle="modal" data-target="#BayarModal">
								Bayar
							</button>
							<?php endif ?>
						</div>
					</div>

					<!-- /.col -->
					<div class="col-md-6">

						<div class="card mb-4">
							<div class="card-header">
								<h3 class="card-title">Produk</h3>
							</div>
							<!-- /.card-header -->
							<div class="card-body p-0">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th style="width: 10px">#</th>
											<th>Nama Produk</th>
											<th>Harga</th>
											<th>Jumlah</th>
											<th>Subtotal</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
                                    $i = 1;
                                    foreach ($detail as $p):
                                        ?>
										<tr class="align-middle">
											<td><?= $i ?></td>
											<td><?= $p->NamaProduk ?></td>
											<td>Rp. <?= number_format($p->Harga) ?></td>
											<td><?= number_format($p->JumlahProduk) ?></td>
											<td>Rp. <?= number_format($p->Subtotal) ?></td>
											<td>
												<a onclick="confirm('Apakah Anda Ingin Mengapus Data Produk')"
													href="<?= base_url('Penjualan/HapusDetail/' . $p->DetailID) ?>">
													<button class="btn btn-danger">Hapus</button>
												</a>
											</td>
										</tr>
										<?php $i++; endforeach ?>
									</tbody>
								</table>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
					</div>
					<!-- /.col -->
				</div>
				<!--end::Row-->

				<!-- MODAL  -->

				<div class="modal fade" id="BayarModal" tabindex="-1" aria-labelledby="BayarModalLabel"
					aria-hidden="true">
					<div class="modal-dialog modal-dialog-scrollable ">
						<div class="modal-content">
							<div class="modal-header">
								<h1 class="modal-title fs-5" id="BayarModalLabel">Pembayaran</h1>
								<?php if ($this->session->flashdata('error')): ?>
								<div class="col-12">
									<div class="callout callout-danger">
										<?= $this->session->flashdata('error'); ?>
									</div>
								</div>
								<?php endif ?>
								<button type="button" class="btn-close" data-dismiss="modal"
									aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<div class="card-body">
									<form action="<?= base_url('Penjualan/Bayar/' . $penjualanID) ?>" method="post">

										<div class="mb-3">
											<label>Total Harga</label>
											<input type="text" class="form-control" readonly
												value="Rp. <?= $TotalHarga->Subtotal ?>">
											<input type="hidden" name="TotalHarga" value="<?= $TotalHarga->Subtotal ?>">
										</div>

										<div class="mb-4">
											<label>Pembayaran</label>
											<input type="number" min="<?= $TotalHarga->Subtotal ?>" name="Pembayaran"
												class="form-control">
										</div>

										<div class="mb-3">
											<button type="submit" class="btn btn-success">Bayar</button>
										</div>

									</form>
								</div>

							</div>
						</div>
					</div>
				</div>

			</div>
			<!--end::Container-->
		</div>
	</main>
	<script src="<?= base_url('assets')?>/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?= base_url('assets')?>/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?= base_url('assets')?>/js/core/popper.min.js"></script>
	<script src="<?= base_url('assets')?>/js/core/bootstrap.min.js"></script>
	<script src="<?= base_url('assets')?>/js/plugin/chartist/chartist.min.js"></script>
	<script src="<?= base_url('assets')?>/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>
	<script src="<?= base_url('assets')?>/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
	<script src="<?= base_url('assets')?>/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
	<script src="<?= base_url('assets')?>/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
	<script src="<?= base_url('assets')?>/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
	<script src="<?= base_url('assets')?>/js/plugin/chart-circle/circles.min.js"></script>
	<script src="<?= base_url('assets')?>/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<script src=" <?= base_url('assets')?>/js/demo.js"></script>
	<script src="<?= base_url('assets')?>/js/ready.min.js"></script>

</body>

</html>
