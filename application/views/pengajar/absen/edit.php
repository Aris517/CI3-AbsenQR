<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-4">
                <h5 class="card-title fw-semibold">Form Edit Absen</h5>
                <a href="<?= base_url('absen') ?>" class="btn btn-sm btn-warning ms-auto">Kembali</a>
            </div>
            <div class="card">
                <div class="card-body p-4">
                    <form method="post">
                        <input type="hidden" name="absen" value="<?= $absen->id_absen ?>" readonly>
                        <div class="mb-3">
                            <label class="form-label">Nama Siswa</label>
                            <input type="text" class="form-control" value="<?= $absen->nama ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kursus</label>
                            <input type="text" class="form-control" value="<?= $absen->kursus ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal</label>
                            <input type="text" class="form-control" value="<?= $absen->tanggal ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jam</label>
                            <input type="text" class="form-control" value="<?= $absen->jam ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <input type="text" class="form-control" value="<?= $absen->status ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <select name="keterangan" class="form-select" required>
                                <option value="">Pilih Keterangan</option>
                                <option value="Sakit" <?= $absen->keterangan == 'Sakit' ? 'selected' : '' ?>>Sakit</option>
                                <option value="Izin" <?= $absen->keterangan == 'Izin' ? 'selected' : '' ?>>Izin</option>
                            </select>
                            <div class="text-form text-danger">Ubah jika diperlukan atau biarkan jika tidak perlu</div>
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