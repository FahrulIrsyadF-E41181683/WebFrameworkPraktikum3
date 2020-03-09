<!DOCTYPE html>
<html>
<head>
	<title>Membuat login dengan codeigniter | www.malasngoding.com</title>
</head>
<body>
	<h1>Login berhasil !</h1>
	<h2>Hai, <?php echo $this->session->userdata("nama"); ?></h2> <!-- Syntax yang menampilkan username yang diambil dari session -->
	<a href="<?php echo base_url('login/logout'); ?>">Logout</a> <!-- Syntax yang meengarahkan pengguna ke method logout pada controller login -->
</body>
</html>