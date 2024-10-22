<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-4">
                <h5 class="card-title fw-semibold">Form Edit Siswa</h5>
                <a href="<?= base_url('siswa/kelola') ?>" class="btn btn-sm btn-warning ms-auto">Kembali</a>
            </div>
            <div class="card">
                <div class="card-body p-4">
                    <form method="post">
                        <input type="hidden" name="siswa" value="<?= $siswa->id_siswa ?>" readonly>
                        <div class="mb-3">
                            <label class="form-label">Nama Siswa</label>
                            <input type="text" class="form-control" name="nama" value="<?= $siswa->nama ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NIK</label>
                            <input type="text" class="form-control" name="nik" value="<?= $siswa->nik ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea type="text" class="form-control" name="alamat" required><?= $siswa->alamat ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No HP</label>
                            <input type="text" class="form-control" name="no_hp" value="<?= $siswa->no_hp ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select name="jk" class="form-select" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki" <?= $siswa->jk == 'Laki-Laki' ? 'selected' : '' ?>>Laki-Laki</option>
                                <option value="Perempuan" <?= $siswa->jk == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kelas</label>
                            <input type="text" class="form-control" name="kelas" value="<?= $siswa->kelas ?>" required>
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