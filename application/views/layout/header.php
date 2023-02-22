<!DOCTYPE html>
<html>

<head>
  <title>Dashboard - Admin</title>
  <!-- Load CSS dari CDN Bootstrap 4 -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Sistem Monitoring Nilai Siswa</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?= base_url('dashboard'); ?>">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('guru'); ?>">Data Guru</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('murid'); ?>">Data Murid</a>
        </li>
      </ul>
    </div>
  </nav>