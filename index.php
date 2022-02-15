<?php 
    session_start();
    include "./db/koneksi.php";
    if($_SESSION['roles'] == "admin") { header("Location: admin/index.php?page=booking");}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "./components/head.html" ?>
</head>

<body>
    <?php
    include "./components/navbar.php";
    include "./components/jumbotron.html";
    include "./components/modalPesan.html";
    include "./db/cekKamar.php";
    ?>
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-3 col-md-5 mt-5 mx-auto">
                <div class="card">
                    <img src="./assets/ekonomi.jpg" alt="" class="card-img-top">
                    <div class="card-body">
                        <h3 class="text-center fw-bold">Kelas Ekonomi</h3>
                        <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item">Rp 100.000/hari</li>
                            <li class="list-group-item">Tanpa AC</li>
                            <li class="list-group-item">WIFI UpTo 10-20Mbps</li>
                            <li class="list-group-item">Kamar Mandi Shower</li>
                            <li class="list-group-item">Tidak Termasuk Makanan</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-5 mt-5 mx-auto">
                <div class="card">
                    <img src="./assets/bisnis.jpg" alt="" class="card-img-top">
                    <div class="card-body">
                        <h3 class="text-center fw-bold">Kelas Bisnis</h3>
                        <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item">Rp 250.000/hari</li>
                            <li class="list-group-item">AC Ready</li>
                            <li class="list-group-item">WIFI UpTo 30-50Mbps</li>
                            <li class="list-group-item">Kamar Mandi Bathub</li>
                            <li class="list-group-item">Tidak Termasuk Makanan</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-5 mt-5 mx-auto">
                <div class="card">
                    <img src="./assets/first.jpg" alt="" class="card-img-top">
                    <div class="card-body">
                        <h3 class="text-center fw-bold">Kelas Utama</h3>
                        <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item">Rp 500.000/hari</li>
                            <li class="list-group-item">AC Ready</li>
                            <li class="list-group-item">WIFI 70Mbps + E-TV Support</li>
                            <li class="list-group-item">Kamar Mandi Bathub</li>
                            <li class="list-group-item">Snack & Soft Drink Ready</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-5 mt-5 mx-auto">
                <div class="card">
                    <img src="./assets/vip.jpg" alt="" class="card-img-top">
                    <div class="card-body">
                        <h3 class="text-center fw-bold">Kelas VIP</h3>
                        <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item">Rp 750.000/hari</li>
                            <li class="list-group-item">AC Ready</li>
                            <li class="list-group-item">WIFI 120Mbps + E-TV Support</li>
                            <li class="list-group-item">Kamar Mandi Shower + Bathub</li>
                            <li class="list-group-item">Full Support 24 Jam</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                <h3>Booking Sekarang</h3>
            </div>
            <div class="card-body" id="booking">
                <form <?= isset($_SESSION['username']) ? "action='./db/booking.php' method='POST'" : "" ?>>

                    <div class="mb-3">
                        <select id="selectKamar" name="id_jenis_kamar" class="form-select">
                            <option selected disabled>-= PILIH KAMAR =-</option>
                            <?php foreach ($koneksi->query('SELECT * FROM jenis_kamar WHERE status_jenis=1') as $kamar) : ?>
                                <option value="<?= $kamar['id_jenis_kamar'] ?>" data-harga="<?= $kamar['harga'] ?>">
                                    Kamar <?= $kamar['nama_jenis']." - Rp." . number_format((int) $kamar['harga'], 0, ',', '.') . "/hari"  ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Tanggal Check In</label>
                        <input type="date" id="checkIn" name="checkin" class="form-control" min="<?= date('Y-m-d') ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Tanggal Check Out</label>
                        <input type="date" class="form-control" id="checkOut" name="checkout" min="<?= date('Y-m-d', strtotime(date('Y/m/d') . "+1 days")) ?>" max="<?= date('Y-m-d', strtotime(date('Y/m/d') . "+14 days")) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Harga</label>
                        <input type="text" id="form-harga" readonly class="form-control">
                        <input type="hidden" id="form-harga2" name="harga" readonly class="form-control">
                    </div>
                    <?php if (isset($_SESSION['username'])) : ?>
                        <button type="submit" class="btn btn-success float-end">Booking</button>
                    <?php else : ?>
                        <button type="button" class="btn btn-success float-end" onclick="alert('Silahkan login terlebih dahulu!')">Booking</button>
                    <?php endif ?>
                </form>
            </div>
        </div>
    </div>
    <script>
        Date.prototype.yyyymmdd = function() {
            const mm = this.getMonth() + 1
            const dd = this.getDate()
            return `${this.getFullYear()}-${(mm > 9 ? '' : '0') + mm}-${(dd > 9 ? '' : '0') + dd}`
        }
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
        $(document).ready(function() {
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
        })
    </script>
</body>
<?php include "./components/footer.html"; ?>
</html>