<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-4">
                <h5 class="card-title fw-semibold">Kelola Absen</h5>
                <button data-bs-toggle="modal" data-bs-target="#absen" class="btn btn-sm btn-success ms-auto">Absen</button>
            </div>
            <div class="card">
                <div class="card-body p-4">
                    <table class="table table-striped" id="dataTables" style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Jam</th>
                                <th class="text-center">Kursus</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Keterangan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($absen as $row) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td class="text-start"><?= $row->siswa->nama ?></td>
                                    <td class="text-start"><?= $row->tanggal ?></td>
                                    <td class="text-start"><?= $row->jam ?></td>
                                    <td class="text-start"><?= $row->kursus->kursus ?></td>
                                    <td class="text-start"><?= $row->status ?></td>
                                    <td class="text-start"><?= $row->keterangan ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('absen/edit/' . $row->id_absen) ?>" class="btn btn-sm btn-warning">Edit</a>
                                        <?php if (cek_absen_pulang($row->id_siswa)) : ?>
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapus" data-bs-id="<?= $row->id_absen ?>" data-bs-data="<?= $row->siswa->nama ?>">hapus</button>
                                        <?php endif ?>
                                        <?php if ($row->status == 'Pulang') : ?>
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapus" data-bs-id="<?= $row->id_absen ?>" data-bs-data="<?= $row->siswa->nama ?>">hapus</button>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="absen" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h5 class="modal-title">Absen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2">
                    <a class="btn btn-sm btn-primary button" id="startButton">Start</a>
                    <a class="btn btn-sm btn-danger button" id="resetButton">Reset</a>
                </div>
                <div>
                    <video id="video" width="300" height="200" style="border: 1px solid gray"></video>
                </div>
                <div id="sourceSelectPanel" class="input-group mb-3">
                    <label class="input-group-text" for="sourceSelect">Change video source</label>
                    <select class="form-select" id="sourceSelect">
                    </select>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="decoding-style">Decoding Style</label>
                    <select class="form-select" id="decoding-style">
                        <option value="once">Decode once</option>
                    </select>
                </div>
                <pre><code id="result"></code></pre>
            </div>
        </div>
    </div>
</div>

<div class=" modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <strong class="confirm fs-4"></strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="" type="button" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
<script>
    const exampleModal = document.getElementById('hapus')
    if (exampleModal) {
        exampleModal.addEventListener('show.bs.modal', event => {

            const button = event.relatedTarget

            const id = button.getAttribute('data-bs-id')
            const data = button.getAttribute('data-bs-data')

            const modalTitle = exampleModal.querySelector('.modal-title')
            const confirm = exampleModal.querySelector('.confirm')
            const link = exampleModal.querySelector('.modal-footer a')

            modalTitle.textContent = `Hapus data ${data}`
            confirm.textContent = `Yakin ingin hapus data ${data} ?`
            link.href = `<?= base_url('absen/hapus/') ?>${id}`
        })
    }
</script>

<script type="text/javascript" src="https://unpkg.com/@zxing/library@latest"></script>
<script type="text/javascript">
    function decodeOnce(codeReader, selectedDeviceId) {
        codeReader.decodeFromInputVideoDevice(selectedDeviceId, 'video').then((result) => {
            console.log(result.text);
            sendResultToServer(result.text);
        }).catch((err) => {
            console.error(err);
            document.getElementById('result').textContent = err;
        });
    }

    function sendResultToServer(data) {
        $.ajax({
            url: '<?= base_url('absen/absen') ?>',
            type: 'POST',
            data: {
                qr_data: data
            },
            dataType: 'json',
            success: function(response) {
                document.getElementById('result').textContent = response.status;
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
                document.getElementById('result').textContent = 'Gagal absen silahkan coba lagi';
            }
        });
    }

    window.addEventListener('load', function() {
        let selectedDeviceId;
        const codeReader = new ZXing.BrowserQRCodeReader();
        console.log('ZXing code reader initialized');

        codeReader.getVideoInputDevices()
            .then((videoInputDevices) => {
                const sourceSelect = document.getElementById('sourceSelect');
                selectedDeviceId = videoInputDevices[0].deviceId;
                if (videoInputDevices.length >= 1) {
                    videoInputDevices.forEach((element) => {
                        const sourceOption = document.createElement('option');
                        sourceOption.text = element.label;
                        sourceOption.value = element.deviceId;
                        sourceSelect.appendChild(sourceOption);
                    });

                    sourceSelect.onchange = () => {
                        selectedDeviceId = sourceSelect.value;
                    };

                    const sourceSelectPanel = document.getElementById('sourceSelectPanel');
                }

                document.getElementById('startButton').addEventListener('click', () => {

                    const decodingStyle = document.getElementById('decoding-style').value;

                    if (decodingStyle == "once") {
                        decodeOnce(codeReader, selectedDeviceId);
                    } else {
                        decodeContinuously(codeReader, selectedDeviceId);
                    }

                    console.log(`Started decode from camera with id ${selectedDeviceId}`);
                });

                document.getElementById('resetButton').addEventListener('click', () => {
                    codeReader.reset();
                    document.getElementById('result').textContent = '';
                    console.log('Reset.');
                });

            })
            .catch((err) => {
                console.error(err);
            });
    });
</script>