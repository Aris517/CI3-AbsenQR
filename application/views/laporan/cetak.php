<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cetak<?= date('Y-m-d H:i:s') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid p-5 mx-auto">
        <div class="text-center">
            <div class="row">
                <div class="col-2">
                    <img src="<?= base_url('assets/img/logo.jpeg') ?>" alt="" style="width: 130%;">
                </div>
                <div class="col-10">
                    <div class="text-center">
                        <h5 style="margin-bottom: 0px;">LEMBAGA KURSUS DAN PELATIHAN</h5>
                        <h5 style="margin-bottom: 0px;">"SEKAR"</h5>
                        <P>Jl. Srigunting No. 43 RT. 01/02 Randugunting Kota Tegal Telp. Hp. 081390049393 / (0283) 4533605</P>
                    </div>
                </div>
            </div>
            <hr>
            <h4>Laporan dari <?= $dari ?> sampai <?= $sampai ?></h4>
        </div>
        <section>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" colspan="8"><b class="fs-3">Laporan Absensi</b></th>
                    </tr>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Kursus</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    $masuk = 0;
                    $pulang = 0;
                    $sakit = 0;
                    $izin = 0;
                    $normal = 0;
                    foreach ($absen as $row) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row->siswa->nama ?></td>
                            <td><?= $row->tanggal ?></td>
                            <td><?= $row->jam ?></td>
                            <td><?= $row->kursus->kursus ?></td>
                            <td><?= $row->status ?></td>
                            <td><?= $row->keterangan ?></td>
                        </tr>
                    <?php if ($row->status == 'Masuk') {
                            $masuk += 1;
                        }
                        if ($row->status == 'Pulang') {
                            $pulang += 1;
                        }
                        if ($row->keterangan == 'Sakit' && $row->status == 'Pulang') {
                            $sakit += 1;
                        }
                        if ($row->keterangan == 'Izin' && $row->status == 'Pulang') {
                            $izin += 1;
                        }
                        if ($row->keterangan == '-' && $row->status == 'Pulang') {
                            $normal += 1;
                        }
                    endforeach ?>
                    <tr>
                        <td colspan="6" class="text-center">Jumlah Total Masuk</td>
                        <td><?= $masuk ?></td>
                    </tr>
                    <tr>
                        <td colspan="6" class="text-center">Jumlah Total Pulang</td>
                        <td><?= $pulang ?></td>
                    </tr>
                    <tr>
                        <td colspan="6" class="text-center">Jumlah Total Pulang Karna Sakit</td>
                        <td><?= $sakit ?></td>
                    </tr>
                    <tr>
                        <td colspan="6" class="text-center">Jumlah Total Pulang Karna Izin</td>
                        <td><?= $izin ?></td>
                    </tr>
                    <tr>
                        <td colspan="6" class="text-center">Jumlah Total Pulang Normal</td>
                        <td><?= $normal ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="row justify-content-end">
                <div class="col-5">
                    <div class="text-center">
                        <p class="text-start mb-0">Mengetahui,</p>
                        <p class="text-start mb-5 mt-0">Pimpinan LKP DAN LPK SEKAR KOTA TEGAL</p>
                        <p class="text-start mt-4 mb-0"><b><u>Hj. Yunieti Utamie, S.Kom., M.M</u></b></p>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        window.print()
        window.onafterprint = function() {
            window.close();
        };
    </script>
</body>

</html>