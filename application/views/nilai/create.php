<div class="container mt-4">
  <h1>Tambah Nilai Murid</h1>
  <form action="<?php echo base_url('nilai/create'); ?>" method="post">
    <div class="form-group">
      <label for="murid_id">Murid</label>
      <select name="murid_id" id="murid_id" class="form-control">
        <?php foreach ($murid_list as $murid) : ?>
          <option value="<?php echo $murid->id_murid ?>"><?php echo $murid->nama_murid ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label for="nilai">Nilai</label>
      <input type="number" name="nilai" max="100" min="0" id="nilai" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="jenis_nilai">Jenis Nilai</label>
      <select class="form-control" name="jenis_nilai" id="jenis_nilai">
        <option value="UTS">UTS</option>
        <option value="UAS">UAS</option>
        <option value="Tugas">Tugas</option>
        <option value="Praktikum">Praktikum</option>
      </select>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </form>
</div>