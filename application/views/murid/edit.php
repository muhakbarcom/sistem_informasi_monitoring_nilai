<div class="container">
  <h2>Update murid</h2>

  <?php echo form_open('murid/edit/' . $murid->id_murid, array('class' => 'form-horizontal')); ?>

  <div class="form-group">
    <label class="control-label col-sm-2" for="nama">Nama:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nama_murid" name="nama_murid" value="<?php echo $murid->nama_murid ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="username">username:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="username" name="username" value="<?php echo $murid->username ?>">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="password">Password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" name="password">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="alamat">Alamat:</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="alamat_murid" name="alamat_murid"><?php echo $murid->alamat_murid ?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="no_telp">No. Telp:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="telepon_murid" name="telepon_murid" value="<?php echo $murid->telepon_murid ?>">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="hidden" name="id_user" value="<?php echo $murid->id_user ?>">
      <button type="submit" class="btn btn-primary" name="submit" value="submit">Update</button>
      <a href="<?php echo base_url('murid') ?>" class="btn btn-secondary">Cancel</a>
    </div>
  </div>

  <?php echo form_close(); ?>
</div>