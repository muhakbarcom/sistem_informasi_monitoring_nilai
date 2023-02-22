<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2>Data Guru</h2>
      <a href="<?php echo base_url('guru/create'); ?>" class="btn btn-success">Tambah Guru</a>
      <br><br>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Email</th>
            <th>No. HP</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($guru as $g) : ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $g->nama_guru; ?></td>
              <td><?php echo $g->username; ?></td>
              <td><?php echo $g->alamat_guru; ?></td>
              <td><?php echo $g->telepon_guru; ?></td>
              <td>
                <a href="<?php echo base_url('guru/edit/' . $g->id_guru); ?>" class="btn btn-primary">Edit</a>
                <a href="<?php echo base_url('guru/delete/' . $g->id_guru); ?>" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>