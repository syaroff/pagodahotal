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
	<div class="d-flex justify-content-between">
		<h1>Booking</h1>
		<button type="button" class="btn  btn-success" onclick="tambah()"><i class="las la-plus fw-bold fs-1"></i></button>
	</div>
	<div class="table-responsive py-2">
		<table class="table align-items-center table-bordered">
			<thead class="table-primary">
				<tr>
					<th scope="col">No</th>
					<th scope="col">Username</th>
					<th scope="col">User ID</th>
					<th scope="col">Jenis Kamar</th>
					<th scope="col">No Kamar</th>
					<th scope="col">Check In</th>
					<th scope="col">Check Out</th>
					<th scope="col">Harga</th>
					<th scope="col">Total Harga</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$query = $koneksi->query("SELECT * FROM bookingVW ORDER BY check_in DESC");
				$i = 1;
				foreach ($query as $row) :
				?>
					<tr>
						<td><?= $i ?></td>
						<td><?= $row['username'] ?></td>
						<td><?= $row['id_user'] ?></td>
						<td>Kamar <?= $row['nama_jenis'] ?></td>
						<td><?= $row['no_kamar'] ?></td>
						<td><?= $row['check_in'] ?></td>
						<td><?= $row['check_out'] ?></td>
						<td>
                            <script>
                                let harga = <?=$row['harga']?>;
                                document.write(toRupiah(harga));
                            </script>
                        </td>
						<td>
                            <script>
                                let hatot = <?=$row['total_bayar']?>;
                                document.write(toRupiah(hatot));
                            </script>
                        </td>
						<td>
                            <a href="./booking/done.php?ib=<?=$row['id_booking']?>&ik=<?=$row['id_kamar']?>" type="button" class="btn btn-success btn-sm">Done</a>
							<a href="../db/inv.php?ib=<?=$row['id_booking']?>" type="button" class="btn btn-primary btn-sm">Print Invoice</a>
							<a href="../db/print.php?ib=<?=$row['id_booking']?>" type="button" class="btn btn-primary btn-sm">Print Tiket</a>
                            <a href="./booking/delete.php?ib=<?=$row['id_booking']?>&ik=<?=$row['id_kamar']?>" class="btn btn-sm btn-danger"><i class="las la-trash-alt"></i></a>
                        </td>
					</tr>
				<?php $i++;
				endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
</div>
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data Pesanan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="../db/booking.php">
				<div class="modal-body pt-0">
					<div class="form-group">
						<label for="" class="form-label">User ID</label>
                        <input type="number" id="user_id" name="user_id" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Kamar</label>
						<select id="selectKamar" name="id_jenis_kamar" class="form-control">
                            <option selected disabled>-= PILIH KAMAR =-</option>
                            <?php foreach ($koneksi->query('SELECT * FROM jenis_kamar WHERE status_jenis=1') as $kamar) : ?>
                                <option value="<?= $kamar['id_jenis_kamar'] ?>" data-harga="<?= $kamar['harga'] ?>">
                                    Kamar <?= $kamar['nama_jenis']." - Rp." . number_format((int) $kamar['harga'], 0, ',', '.') . "/hari"  ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
					</div>
					<div class="form-group">
						<label for="" class="form-label">Tanggal Check In</label>
                        <input type="date" id="checkIn" name="checkin" class="form-control" min="<?= date('Y-m-d') ?>">
					</div>
					<div class="form-group">
						<label for="" class="form-label">Tanggal Check Out</label>
                        <input type="date" class="form-control" id="checkOut" name="checkout" min="<?= date('Y-m-d', strtotime(date('Y/m/d') . "+1 days")) ?>" max="<?= date('Y-m-d', strtotime(date('Y/m/d') . "+14 days")) ?>">
					</div>
					<div class="form-group">
					<label for="" class="form-label">Harga</label>
                        <input type="text" id="form-harga" readonly class="form-control">
                        <input type="hidden" id="form-harga2" name="harga" readonly class="form-control">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button name="edit_kamar" type="submit" class="btn btn-primary">Tambah Data</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	const tambah = () => {
		$('#tambah').modal('show');
	}
	
</script>
<script>
        Date.prototype.yyyymmdd = function() {
            const mm = this.getMonth() + 1
            const dd = this.getDate()
            return `${this.getFullYear()}-${(mm > 9 ? '' : '0') + mm}-${(dd > 9 ? '' : '0') + dd}`
        }
        
        const tanggal = val => new Date(val)
            let hargaKamar = []
            let checkIn
            let checkOut

            $("#selectKamar").change(function() {
                // hargaKamar = $(this).find('option:selected').data('harga')
                // console.log($(this).find('option:selected').data('harga'));
                // console.log($(this).val());
                let sum = 0
                const loopHarga = $(this).find('option:selected').map(function(i) {
                    return $(this).data('harga')
                }).get()
                hargaKamar = loopHarga
                $("#checkIn").removeAttr("disabled")
                if (checkOut && checkIn) {
                    const hari = (checkOut - checkIn) / (1000 * 60 * 60 * 24)
                    let sumHarga = 0
                    for (let i = 0; i < hargaKamar.length; i++) {
                        sumHarga += hargaKamar[i]
                    }
                    const harga = sumHarga * hari
                    $("#form-harga").val(toRupiah(harga))
                    $("#form-harga2").val(harga)
                }
            })
            $("#checkIn").change(function() {
                checkIn = tanggal(this.value)
                $("#checkOut").removeAttr("disabled")
                const sp = this.value.split('-')
                const formatTanggal = `${sp[1]}/${sp[2]}/${sp[0]}`
                const minAttr = new Date().setDate(new Date(formatTanggal).getDate() + 1)
                $("#checkOut").attr("min", tanggal(minAttr).yyyymmdd())
                if (checkOut && hargaKamar) {
                    const hari = (checkOut - checkIn) / (1000 * 60 * 60 * 24)
                    let sumHarga = 0
                    for (let i = 0; i < hargaKamar.length; i++) {
                        sumHarga += hargaKamar[i]
                    }
                    const harga = sumHarga * hari
                    $("#form-harga").val(toRupiah(harga))
                    $("#form-harga2").val(harga)
                }
            })
            $("#checkOut").change(function() {
                checkOut = tanggal(this.value)
                const hari = (checkOut - checkIn) / (1000 * 60 * 60 * 24)
                let sumHarga = 0
                for (let i = 0; i < hargaKamar.length; i++) {
                    sumHarga += hargaKamar[i]
                }
                let harga = sumHarga * hari
                const sp = this.value.split('-')
                const formatTanggal = `${sp[1]}/${sp[2]}/${sp[0]}`
                const maxAttr = new Date().setDate(new Date(formatTanggal).getDate() - 1)
                $("#form-harga").val(toRupiah(harga))
                $("#form-harga2").val(harga)
                $("#checkIn").attr({
                    "max": tanggal(maxAttr).yyyymmdd()
                })
            })
    </script>