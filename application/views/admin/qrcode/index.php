<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-4">
                <h5 class="card-title fw-semibold">Kelola QR Code Siswa</h5>
                <a href="<?= base_url('qr/generate/all') ?>" class="btn btn-sm btn-secondary ms-auto">Generate Semua</a>
                <a href="<?= base_url('qr/print/all') ?>" target="_blank" class="btn btn-sm btn-danger ms-sm-3">Print Semua</a>
            </div>
            <div class="card">
                <div class="card-body p-4">
                    <table class="table table-striped" id="dataTables" style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">NIK</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($siswa as $row) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td class="text-start"><?= $row->nik ?></td>
                                    <td class="text-start"><?= $row->nama ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('qr/generate/' . $row->id_siswa) ?>" class="btn btn-sm btn-primary"><?= $row->file == null ? 'Generate' : 'Regenerate' ?></a>
                                        <?php if ($row->file != null) : ?>
                                            <a href="<?= base_url('qr/print/' . $row->id_siswa) ?>" target="_blank" class="btn btn-sm btn-warning">Print</a>
                                        <?php endif ?>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapus" data-bs-id="<?= $row->id_siswa ?>" data-bs-data="<?= $row->nama ?>">hapus</button>
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
            link.href = `<?= base_url('qr/hapus/') ?>${id}`
        })
    }
</script>