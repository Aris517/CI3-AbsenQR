<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>qr<?= date('Y-m-d H:i:s') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid p-5 mx-auto">
        <div class="row justify-content-center">
            <?php foreach ($qr as $row) : ?>
                <div class="col-4 p-2">
                    <div class="card">
                        <img src="<?= base_url('uploads/qrcode/' . $row->file) ?>" class="card-img-top" alt="<?= $row->nama ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $row->nama ?></h5>
                            <p class="card-text">Kelas : <?= $row->kelas ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
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