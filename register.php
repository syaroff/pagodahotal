<!DOCTYPE html>
<html lang="en">

<head>
      <?php include "./components/head.html" ?>
</head>

<body>
      <div class="container">
            <div class="position-absolute" style="top: 50%; left: 50%; transform: translate(-50%, -50%)">
                  <div class="card shadow" style="width: 50vh;">
                        <article class="card-body">
                              <h4 class="card-title text-center mb-4 mt-1">Daftar</h4>
                              <hr>
                              <?php if ($_GET) : ?>
                                    <p class="text-danger text-center"><?= $_GET['error'] ?></p>
                              <?php endif; ?>
                              <form method="POST" action="./cekDaftar.php">
                                    <div class="input-group mb-3">
                                          <span class="input-group-text"><i class="las la-envelope"></i></span>
                                          <input name="email" autofocus class="form-control" placeholder="Email" type="email" required>
                                    </div>
                                    <div class="input-group mb-3">
                                          <span class="input-group-text"><i class="las la-phone"></i></span>
                                          <input name="no_telp" autofocus class="form-control" placeholder="Nomor Telepon" type="tel" required>
                                    </div>
                                    <div class="input-group mb-3">
                                          <span class="input-group-text"><i class="las la-user"></i></span>
                                          <input name="username" class="form-control" placeholder="Username" type="text" required>
                                    </div>
                                    <div class="input-group mb-3">
                                          <span class="input-group-text"> <i class="las la-lock"></i> </span>
                                          <input class="form-control" placeholder="Password" name="password" type="password" required>
                                    </div>
                                    <div class="form-floating mb-3">
                                          <textarea name="alamat" class="form-control" id="alamat" style="max-height: 100px; min-height: 60px;" required></textarea>
                                          <label for="alamat">Alamat</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100"> Submit </button>
                              </form>
                        </article>
                  </div>
            </div>
      </div>
</body>

</html>