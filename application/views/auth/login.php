<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('') ?>/assets/admin/src/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="<?= base_url('') ?>/assets/admin/src/assets/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="<?= base_url('') ?>" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <!-- <img src="<?= base_url('') ?>/assets/admin/src/assets/images/logos/dark-logo.svg" width="180" alt=""> -->
                                    <h1>LOGIN</h1>
                                </a>
                                <form method="post">
                                    <div class="mb-3">
                                        <?= $this->session->flashdata('pesan') ?>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" required>
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary w-25 py-8 fs-4 mb-4 rounded-2">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('') ?>/assets/admin/src/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url('') ?>/assets/admin/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>