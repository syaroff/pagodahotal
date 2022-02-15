<div class="col-6">
<div class="card p-3">
	<div class="d-flex justify-content-between">
		<h1>Data Jenis Kamar</h1>
		<button type="button" class="btn  btn-success" data-toggle="modal" data-target="#tambah"><i class="las la-plus fw-bold fs-1"></i></button>
	</div>
	<div class="table-responsive py-2">
		<table class="table align-items-center table-bordered">
			<thead class="table-primary">
				<tr>
					<th scope="col">No</th>
					<th scope="col">Kamar</th>
					<th scope="col">Harga</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$query = $koneksi->query("SELECT * FROM jenis_kamar");
				$i = 1;
				foreach ($query as $row) :
				?>
					<tr>
						<td><?= $i ?></td>
						<td><?= $row['nama_jenis'] ?></td>
						<td><?= $row['harga'] ?></td>
						<td>
							<button type="button" class="btn btn-sm btn-warning btn-edit" onclick="edit('<?= $row['id_jenis_kamar'] ?>','<?= $row['harga'] ?>','<?= $row['nama_jenis'] ?>')">
								<i class="las la-pen"></i>
							</button>
							<a href="./jenis_kamar/hapus.php?id=<?= $row['id_jenis_kamar'] ?>" type="submit" class="btn btn-sm btn-danger">
								<i class="las la-trash"></i>
							</a>
						</td>
					</tr>
				<?php $i++;
				endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
</div>
<div class="col-6">
<div class="card p-3">
	<div class="d-flex justify-content-between">
		<h1>Data Kamar</h1>
		<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#tambahKamar">Tambah Kamar</button>
	</div>
	<div class="table-responsive py-2">
		<table class="table align-items-center table-bordered">
			<thead class="table-primary">
				<tr>
					<th scope="col">No</th>
					<th scope="col">ID Jenis Kamar</th>
					<th scope="col">Nomor Kamar</th>
					<th scope="col">Status</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$batas = 5;
				$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
				$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
    
				$data = mysqli_query($koneksi,"SELECT * FROM kamar INNER JOIN jenis_kamar ON kamar.id_jenis_kamar = jenis_kamar.id_jenis_kamar");
				$jumlah_data = mysqli_num_rows($data);
				$total_halaman = ceil($jumlah_data / $batas);
						
				$query = $koneksi->query("SELECT * FROM kamar INNER JOIN jenis_kamar ON kamar.id_jenis_kamar = jenis_kamar.id_jenis_kamar LIMIT $halaman_awal,$batas");
				$i = $halaman_awal+1;
				foreach ($query as $row) :
				?>
					<tr>
						<td><?= $i ?></td>
						<td>Kamar <?= $row['nama_jenis'] ?></td>
						<td><?= $row['no_kamar'] ?></td>
						<td>
							<span class="badge badge-<?= $row['status'] > 0 ? 'success' : 'danger' ?>">
								<?= $row['status'] > 0 ? 'Tersedia' : 'Tidak Tersedia' ?>
							</span>
						</td>
						<td class="text-center">
							<a href="./kamar/edit.php?i=<?=$row['id_kamar']?>&s=<?=$row['status']?>" class="btn btn-sm btn-success"><i class="las la-check-circle"></i></a>
							<a href="./kamar/hapus.php?id=<?= $row['id_kamar'] ?>" type="submit" class="btn btn-sm btn-danger">
								<i class="las la-trash"></i>
							</a>
						</td>
					</tr>
				<?php $i++;
				endforeach; ?>
			</tbody>
		</table>
	</div>
	<div class="card-footer">
		<nav>
		<ul class="pagination justify-content-center">
			<?php 
			for($x=1;$x<=$total_halaman;$x++){
			?> 
			<li class="page-item  <?= $_GET['halaman'] == $x  ? 'active' : '' ?>"><a class="page-link" href="<?php echo "?page=kamar&halaman=".$x ?>"><?php echo $x; ?></a></li>
			<?php
			}
			?>				
		</ul>
		</nav>
	</div>
</div>
</div>



<script>
	const edit = (nomor,harga,nama_jenis) => {

		$('#editModal').modal('show');
		$('#edit_nama_tipe_kamar').val(nama_jenis)
		$('#edit_harga').val(harga)
		$('#edit_id').val(nomor)
	}
</script>



<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data Jenis Kamar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="./jenis_kamar/tambah.php">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Nama Tipe Kamar</label>
						<input type="text" name="nama_tipe" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="">Harga</label>
						<input type="text" name="harga" class="form-control" required>
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

<div class="modal fade" id="tambahKamar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Kamar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="./kamar/tambah.php">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Jumlah</label>
						<input type="number" name="jumlah" value="1" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="">Jenis Kamar</label>
						<select name="jenis" id="jenis" class="form-control">
							<?php
								$selJenis = mysqli_query($koneksi,"SELECT * FROM jenis_kamar");
								foreach($selJenis as $row) {
							?>
									<option value="<?=$row['id_jenis_kamar']?>"><?=$row['nama_jenis']?></option>
							<?php
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Prefix No. Kamar</label>
						<input type="text" name="prefix" id="prefix" class="form-control" placeholder="Ex: A. B, C, D, E (Opsional)">
					</div>
					<div class="form-group">
						<label for="">Start No. Kamar</label>
						<input type="number" name="startnum" id="startnum" class="form-control" value="1" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Tambah Data</button>
				</div>
			</form>
		</div>
	</div>
</div>




<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Data Jenis Kamar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="./jenis_kamar/edit.php">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Nama Tipe Kamar</label>
						<input type="hidden" name="id_jenis_kamar" class="form-control" required id="edit_id">
						<input type="text" name="nama_tipe_kamar" class="form-control" required id="edit_nama_tipe_kamar">
					</div>
					<div class="form-group">
						<label for="">Harga</label>
						<input type="number" name="harga" class="form-control" required id="edit_harga">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button name="edit_kamar" type="submit" class="btn btn-primary">Simpan Perubahan</button>
				</div>
			</form>
		</div>
	</div>
</div>