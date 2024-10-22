<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-4">
                <h5 class="card-title fw-semibold">Form Tambah Pengajar</h5>
                <a href="<?= base_url('pengajar/kelola') ?>" class="btn btn-sm btn-warning ms-auto">Kembali</a>
            </div>
            <div class="card">
                <div class="card-body p-4">
                    <form method="post">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <select name="user" class="form-select" required>
                                <option value="">Pilih Username Akun</option>
                                <?php foreach ($user as $row) : ?>
                                    <option value="<?= $row->id_user ?>"><?= $row->username ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea type="text" class="form-control" name="alamat" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No HP</label>
                            <input type="text" class="form-control" name="no_hp" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select name="jk" class="form-select" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
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