<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Kasir</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="<?= base_url('assets')?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="<?= base_url('assets')?>/css/ready.css">
	<link rel="stylesheet" href="<?= base_url('assets')?>/css/demo.css">
	
</head>
<!--end::Head-->
<!--begin::Body-->

<body>
	<!-- BEGIN STRUK -->
	<div class="container-fluid mt-5">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="card">
					<div class="card-body">
						<h4 class="text-center">Struk Pembayaran</h4>
						<hr>

						<!-- Nama Pelanggan -->
						<div class="mb-3">
							<label><strong>Nama Pelanggan:</strong></label>
							<p><?= $penjualan->NamaPelanggan ?></p>
						</div>

						<!-- Tanggal Penjualan -->
						<div class="mb-3">
							<label><strong>Tanggal Penjualan:</strong></label>
							<p><?= $penjualan->TanggalPenjualan ?>
							</p>
						</div>
						<hr>

						<!-- Produk yang dibeli -->
						<div class="mb-3">
							<h5><strong>Produk yang Dibeli:</strong></h5>
							<table class="table">
								<thead>
									<tr>
										<th>Nama Produk</th>
										<th>Harga</th>
										<th>Jumlah</th>
										<th>Subtotal</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($detail as $p): ?>
									<tr class="align-middle">
										<td><?= $p->NamaProduk ?></td>
										<td>Rp. <?= number_format($p->Harga) ?></td>
										<td><?= number_format($p->JumlahProduk) ?></td>
										<td>Rp. <?= number_format($p->Subtotal) ?></td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>

						<hr>

						<!-- Total Harga -->
						<div class="mb-3">
							<label><strong>Total Harga:</strong></label>
							<p>Rp. <?= number_format($penjualan->TotalHarga) ?></p>
						</div>

						<!-- Pembayaran -->
						<div class="mb-3">
							<label><strong>Pembayaran:</strong></label>
							<p>Rp. <?= number_format($penjualan->TotalPembayaran) ?></p>
						</div>

						<!-- Kembalian -->
						<div class="mb-3">
							<label><strong>Kembalian:</strong></label>
							<p>Rp. <?= number_format($penjualan->TotalPembayaran - $penjualan->TotalHarga) ?></p>
						</div>

						<hr>

						<!-- Footer -->
						<p class="text-center"><strong>Terima Kasih atas Pembelian Anda!</strong></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Tombol Print -->
	<div class="text-center mt-4">
		<button onclick="window.history.back()" class="btn btn-secondary">Back</button>
		<button onclick="window.print()" class="btn btn-primary">Cetak Struk</button>
	</div>

	<!-- END STRUK -->
	<!--end::Required Plugin(Bootstrap 5)-->
	<!--begin::Required Plugin(AdminLTE)-->
	
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
<!--end::Body-->

</html>
