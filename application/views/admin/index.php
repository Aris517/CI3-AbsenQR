<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Dashboard</h5>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h3>Selamat Datang di Aplikasi Absensi Siswa</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <h5></h5>
                </div>
                <div class="col-4">
                    <div class="card bg-success">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h4 class="mb-3">Jumlah Absen Hari Ini</h4>
                                <h5><?= jml_absen_hari_ini() ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card bg-success">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h4 class="mb-3">Jumlah Siswa</h4>
                                <h5><?= jml_siswa() ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>