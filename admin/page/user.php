<div class="col-12">
	<div class="card shadow p-3">
		<div class="d-flex justify-content-between">
			<h3>Data User</h3>
			<a href="../register.php"class="btn btn-sm btn-success"><i class="las la-plus"></i></a>
		</div>
		<div class="table-responsive py-2">
			<table class="table align-items-center table-bordered">
				<thead class="table-primary">
					<tr>
						<th scope="col">No</th>
						<th scope="col">Username</th>
						<th scope="col">User ID</th>
						<th scope="col">Sebagai</th>
						<th scope="col">Email</th>
						<th scope="col">No Telepon</th>
						<th scope="col">Alamat</th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$query = $koneksi->query("SELECT * FROM user");
					$i = 1;
					foreach ($query as $row) :
					?>
						<tr>
							<td><?= $i ?></td>
							<td><?= $row['username'] ?></td>
							<td><?= $row['id_user'] ?></td>
							<td><?= $row['roles'] ?></td>
							<td><?= $row['email'] ?></td>
							<td><?= $row['no_telp'] ?></td>
							<td><?= $row['alamat'] ?></td>
							<td>
								<?php
									if($_SESSION['username']!=$row['username']) {
								?>
										<a href="./user/set.php?i=<?=$row['id_user']?>" type="button" class="btn btn-warning btn-sm">Reset Password</a>
										<a href="./user/hapus.php?id=<?=$row['id_user']?>" type="button" class="btn btn-danger btn-sm"><i class="las la-trash-alt"></i></a>
								<?php
									}
								?>
							</td>
						</tr>
					<?php $i++;
					endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>