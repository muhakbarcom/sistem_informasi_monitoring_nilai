<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2>Data murid</h2>
      <a href="<?php echo base_url('murid/create'); ?>" class="btn btn-success">Tambah murid</a>
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
          <?php foreach ($murid as $g) : ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $g->nama_murid; ?></td>
              <td><?php echo $g->username; ?></td>
              <td><?php echo $g->alamat_murid; ?></td>
              <td><?php echo $g->telepon_murid; ?></td>
              <td>
                <a href="<?php echo base_url('murid/edit/' . $g->id_murid); ?>" class="btn btn-primary">Edit</a>
                <a href="<?php echo base_url('murid/delete/' . $g->id_murid); ?>" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>