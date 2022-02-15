<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
	<div class="scrollbar-inner">
		<!-- Brand -->
		<div class="sidenav-header  align-items-center">
			<a class="navbar-brand" href="javascript:void(0)">
				<h3 class="text-primary fw-bold" style="letter-spacing: .3em;">PAGODA HOTEL</h3>
			</a>
		</div>
		<div class="navbar-inner">
			<!-- Collapse -->
			<div class="collapse navbar-collapse" id="sidenav-collapse-main">
				<!-- Nav items -->
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link <?= $_GET['page'] == 'kamar' ? 'active' : '' ?>" href="./index.php?page=kamar&halaman=1">
							<i class="las la-bed text-primary"></i>
							<span class="nav-link-text">Kamar</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?= $_GET['page'] == 'user' ? 'active' : '' ?>" href="./index.php?page=user">
							<i class="las la-user text-warning"></i>
							<span class="nav-link-text">User</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?= $_GET['page'] == 'booking' ? 'active' : '' ?>" href="./index.php?page=booking">
							<i class="las la-concierge-bell text-danger"></i>
							<span class="nav-link-text">Booking</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?= $_GET['page'] == 'transaksi' ? 'active' : '' ?>" href="./index.php?page=transaksi">
							<i class="las la-receipt text-info"></i>
							<span class="nav-link-text">Transaksi</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>