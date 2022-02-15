<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="./index.php" style="letter-spacing: .4em;">PAGODA HOTEL</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="ms-auto d-flex">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Beranda</a>
                    </li>
                    <?php if (isset($_SESSION['username'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><?= $_SESSION['username'] ?></a>
                        </li>
                    <?php endif; ?>
                </ul>
                <div class="mx-3">
                    <?php if (!isset($_SESSION['username'])) : ?>
                        <a href="./login.php" type="button" class="btn btn-light">Login</a>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['username'])) : ?>
                        <a href="./logout.php" type="button" class="btn btn-light">Logout</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</nav>