<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Load Bootstrap CSS from CDN -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- Load custom CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <h2 class="text-center">Login</h2>
        <div class="box" style="background-color: #ccc;padding:10px;border-radius: 10px;margin-bottom: 10px;">
          <div class="box-body">
            <p>
              <b>Data login</b>
              <br> <br>
              <b>admin</b><br>
              Username : admin<br>
              Password : password123
              <br> <br>
              <b>guru</b><br>
              Username : guru1<br>
              Password : password123
              <br> <br>
              <b>murid</b><br>
              Username : murid1<br>
              Password : password123
            </p>
          </div>
        </div>
        <?php if ($this->session->flashdata('error')) : ?>
          <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>
        <form action="<?php echo site_url('login/process'); ?>" method="post">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
      </div>
    </div>
  </div>
  <!-- Load jQuery and Bootstrap JS from CDN -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>