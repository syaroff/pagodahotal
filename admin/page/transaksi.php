<script>
	const toRupiah = val => {
            const number_string = typeof val != 'string' && val.toString()
            const sisa = number_string.length % 3
            let rupiah = number_string.substr(0, sisa)
            const ribuan = number_string.substr(sisa).match(/\d{3}/g);

            if (ribuan) {
                const separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            return `Rp. ${rupiah}`
    }
</script>
<div class="col-12">
<div class="card shadow p-3">
	<div class="container d-flex justify-content-between">
		<input type="search" name="search" id="search" placeholder="Search" class="form-control mr-2">
		<button type="button" id="btn-search" class="btn btn-primary"><i class="las la-search fw-bold fs-1"></i></button>
	</div>
	<div class="table-responsive py-2">
		<table class="table align-items-center table-bordered" >
			<thead class="table-primary">
				<tr>
					<th colspan="2">Total</th>
					<th id="total" class="table-success" style="font-size: 1.2rem;"><b>2000</b></th>
				</tr>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Tanggal</th>
					<th scope="col">Jumlah</th>
				</tr>
			</thead>
			<tbody>
				<?php include "transaksi/transaksi.php"; ?>
			</tbody>
		</table>
	</div>
</div>
</div>
<script>
	
	$(document).ready(function () {
		let total = <?=$total?>;
		$('#total').text(toRupiah(total));
		$('#btn-search').click(function (e) { 
			e.preventDefault();
			query = $('#search').val();
			window.location.href= "?page=transaksi&s=" + query;
		});
	});
</script>