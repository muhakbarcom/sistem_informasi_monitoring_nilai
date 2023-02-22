<div class="container">
  <div class="container">
    <!-- header -->
    <h2>Nilai Saya (<?= $nilai[0]['nama_murid']; ?>)</h2>
    <br><br>
    <!-- data -->
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Murid</th>
          <th>Nilai</th>
          <th>Jenis_Nilai</th>
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

          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</div>