<div class="container">
  <!-- header -->
  <h2>Data Nilai</h2>
  <a href="<?php echo base_url('nilai/add'); ?>" class="btn btn-primary">Tambah Nilai</a>
  <br><br>
  <!-- data -->
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Murid</th>
        <th>Nilai</th>
        <th>Jenis_Nilai</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($nilai as $n) {
      ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $n['nama_murid']; ?></td>
          <td><?php echo $n['nilai']; ?></td>
          <td><?php echo $n['jenis_nilai']; ?></td>
          <td>
            <a href="<?php echo base_url('nilai/edit/' . $n['id_nilai']); ?>" class="btn btn-success">Edit</a>
            <a href="<?php echo base_url('nilai/delete/' . $n['id_nilai']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>