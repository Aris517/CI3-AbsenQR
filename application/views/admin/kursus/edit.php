<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-4">
                <h5 class="card-title fw-semibold">Form Edit Kursus</h5>
                <a href="<?= base_url('kursus/kelola') ?>" class="btn btn-sm btn-warning ms-auto">Kembali</a>
            </div>
            <div class="card">
                <div class="card-body p-4">
                    <form method="post">
                        <input type="hidden" name="id" value="<?= $kursus->id_kursus ?>" readonly>
                        <div class="mb-3">
                            <label class="form-label">Pengajar</label>
                            <select name="pengajar" class="form-select" required>
                                <option value="">Pilih Pengajar</option>
                                <?php foreach ($pengajar as $row) : ?>
                                    <option value="<?= $row->id_pengajar ?>" <?= $row->id_pengajar == $kursus->id_pengajar ? 'selected' : '' ?>>
                                        <?= $row->nama ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">kursus</label>
                            <input type="text" class="form-control" name="kursus" value="<?= $kursus->kursus ?>" required>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>