<main class="main-panel">
	<div class="content">
		<div class="container-fluid">
			<h4 class="page-title">Dashboard</h4>
			<div class="row">
				<div class="col-md-3">
					<div class="card card-stats card-warning">
						<div class="card-body ">
							<div class="row">
								<div class="col-5">
									<div class="icon-big text-center">
										<i class="la la-users"></i>
									</div>
								</div>
								<div class="col-7 d-flex align-items-center">
									<div class="numbers">
										<p class="card-category">Penjualan</p>
										<h4><?= $penjualan ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card card-stats card-success">
						<div class="card-body ">
							<div class="row">
								<div class="col-5">
									<div class="icon-big text-center">
										<i class="la la-bar-chart"></i>
									</div>
								</div>
								<div class="col-7 d-flex align-items-center">
									<div class="numbers">
										<p class="card-category">Pendapatan</p>
										<h4>Rp. <?= number_format($pendapatan->TotalHarga) ?></h4>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card card-stats card-danger">
						<div class="card-body">
							<div class="row">
								<div class="col-5">
									<div class="icon-big text-center">
										<i class="la la-newspaper-o"></i>
									</div>
								</div>
								<div class="col-7 d-flex align-items-center">
									<div class="numbers">
										<p class="card-category">Pelanggan</p>
										<h4><?= $pelanggan ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card card-stats card-primary">
						<div class="card-body ">
							<div class="row">
								<div class="col-5">
									<div class="icon-big text-center">
										<i class="la la-check-circle"></i>
									</div>
								</div>
								<div class="col-7 d-flex align-items-center">
									<div class="numbers">
										<p class="card-category">Produk</p>
										<h4><?= $produk ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
