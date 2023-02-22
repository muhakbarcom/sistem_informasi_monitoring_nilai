<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2>Tambah murid</h2>
      <form method="post" action="<?php echo base_url('murid/create'); ?>">
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" name="nama_murid" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <textarea type="text" name="alamat_murid" class="form-control" required></textarea>
        </div>
        <div class="form-group">
          <label for="telepon_murid">No. HP</label>
          <input type="number" name="telepon_murid" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
      </form>
    </div>
  </div>
</div>