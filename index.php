<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Tugas 3 | CRUD</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>


body {
	color: #566787;
	background: #f5f5f5;
	font-family: 'Varela Round', sans-serif;
	font-size: 13px;
}

.pagination {
	float: right;
	margin: 0 0 5px;
}
.pagination li a {
	border: none;
	font-size: 13px;
	min-width: 30px;
	min-height: 30px;
	color: #999;
	margin: 0 2px;
	line-height: 30px;
	border-radius: 2px !important;
	text-align: center;
	padding: 0 6px;
}
.pagination li a:hover {
	color: #666;
}	
.pagination li.active a, .pagination li.active a.page-link {
	background: #03A9F4;
}
.pagination li.active a:hover {        
	background: #0397d6;
}
.pagination li.disabled i {
	color: #ccc;
}
.pagination li i {
	font-size: 16px;
	padding-top: 6px
}
.hint-text {
	float: left;
	margin-top: 10px;
	font-size: 13px;
}    


.container{
    width: 30%;
    background-color: white;
	padding: 20px;
}
</style>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">DATA SISWA</a>
    <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
		<a class="nav-link" href='#profileModal' data-toggle='modal'>Profile</a>
    </div>
  </div>
</nav>
<div class="container" style="background-color: #435d7d; margin-top: 70px;">
<h2 style="color:white; text-align:center">Login</h2>
</div>
<div class="container">
<form action="ceklogin.php" method="POST">
  <div class="mb-3">
    <label for="inputusername" class="form-label">Username</label>
    <input type="text" class="form-control" id="inputusername" name="username">
  </div>
  <div class="mb-3">
    <label for="inputpassword" class="form-label">Password</label>
    <input type="password" class="form-control" id="inputpassword" name="password">
  </div>
  <div style="text-align: center;">
	  <button type="submit" class="btn btn-primary" value="LOGIN">login</button>
  </div>
  <div style="text-align: center; margin-top:20px">
	  <p>Belum Punya Akun? <a href="register.php">Daftar</a></p>
  </div>
</form>
</div>

</body>
</html>
