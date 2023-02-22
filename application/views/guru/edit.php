<div class="container">
  <h2>Update Guru</h2>

  <?php echo form_open('guru/edit/' . $guru->id_guru, array('class' => 'form-horizontal')); ?>

  <div class="form-group">
    <label class="control-label col-sm-2" for="nama">Nama:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nama_guru" name="nama_guru" value="<?php echo $guru->nama_guru ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="username">username:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="username" name="username" value="<?php echo $guru->username ?>">
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
      <textarea class="form-control" id="alamat_guru" name="alamat_guru"><?php echo $guru->alamat_guru ?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="no_telp">No. Telp:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="telepon_guru" name="telepon_guru" value="<?php echo $guru->telepon_guru ?>">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="hidden" name="id_user" value="<?php echo $guru->id_user ?>">
      <button type="submit" class="btn btn-primary" name="submit" value="submit">Update</button>
      <a href="<?php echo base_url('guru') ?>" class="btn btn-secondary">Cancel</a>
    </div>
  </div>

  <?php echo form_close(); ?>
</div>