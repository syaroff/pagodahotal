<?php
session_start();
if ($_SESSION) {
    if ($_SESSION['username']) {
        if ($_SESSION['roles'] == 'admin') return header('location: admin/index.php?page=kamar');
        if ($_SESSION['roles'] == 'user') return header('location: index.php');
    }
}
?>
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
                    <h4 class="card-title text-center mb-4 mt-1">Sign in</h4>
                    <hr>
                    <?php if ($_GET) : ?>
                        <p class="text-danger text-center"><?= $_GET['error'] ?></p>
                    <?php endif; ?>
                    <form method="POST" action="./cekLogin.php">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="las la-user"></i></span>
                            <input name="username" autofocus class="form-control" placeholder="Username" type="text">
                        </div> <!-- input-group.// -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"> <i class="las la-lock"></i> </span>
                            <input class="form-control" placeholder="Password" name="password" type="password">
                        </div> <!-- input-group.// -->
                        <button type="submit" class="btn btn-primary w-100"> Login </button>
                    </form>
                </article>
            </div>
        </div>
    </div>
</body>

</html>