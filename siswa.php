<?php
	session_start();
	if($_SESSION['level']!='siswa' || empty($_SESSION['login'])){
		header("location:index.php");
	}
	require "fungsiCRUD.php";
?>
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
.table-responsive {
    margin: 30px auto;
}
.table-wrapper {
	background: #fff;
	padding: 20px 25px;
	border-radius: 3px;
	min-width: 1000px;
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {        
	padding-bottom: 15px;
	background: #435d7d;
	color: #fff;
	padding: 16px 30px;
	min-width: 100%;
	margin: -20px -25px 10px;
	border-radius: 3px 3px 0 0;
}
.table-title h2 {
	margin: 5px 0 0;
	font-size: 24px;
}
.table-title .btn-group {
	float: right;
}
.table-title .btn {
	color: #fff;
	float: right;
	font-size: 13px;
	border: none;
	min-width: 50px;
	border-radius: 2px;
	border: none;
	outline: none !important;
	margin-left: 10px;
}
.table-title .btn i {
	float: left;
	font-size: 21px;
	margin-right: 5px;
}
.table-title .btn span {
	float: left;
	margin-top: 2px;
}
table.table tr th, table.table tr td {
	border-color: #e9e9e9;
	padding: 12px 15px;
	vertical-align: middle;
}
/* table.table tr th:first-child {
	width: 80px;
} */
table.table tr th:last-child {
	width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
	background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
	background: #f5f5f5;
}
table.table th i {
	font-size: 13px;
	margin: 0 5px;
	cursor: pointer;
}	
table.table td:last-child i {
	opacity: 0.9;
	font-size: 22px;
	margin: 0 5px;
}
table.table td a {
	font-weight: bold;
	color: #566787;
	display: inline-block;
	text-decoration: none;
	outline: none !important;
}
table.table td a:hover {
	color: #2196F3;
}
table.table td a.edit {
	color: #FFC107;
}
table.table td a.delete {
	color: #F44336;
}
table.table td i {
	font-size: 19px;
}
table.table .avatar {
	border-radius: 50%;
	vertical-align: middle;
	margin-right: 10px;
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
/* Custom checkbox */
.custom-checkbox {
	position: relative;
}
.custom-checkbox input[type="checkbox"] {    
	opacity: 0;
	position: absolute;
	margin: 5px 0 0 3px;
	z-index: 9;
}
.custom-checkbox label:before{
	width: 18px;
	height: 18px;
}
.custom-checkbox label:before {
	content: '';
	margin-right: 10px;
	display: inline-block;
	vertical-align: text-top;
	background: white;
	border: 1px solid #bbb;
	border-radius: 2px;
	box-sizing: border-box;
	z-index: 2;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	content: '';
	position: absolute;
	left: 6px;
	top: 3px;
	width: 6px;
	height: 11px;
	border: solid #000;
	border-width: 0 3px 3px 0;
	transform: inherit;
	z-index: 3;
	transform: rotateZ(45deg);
}
.custom-checkbox input[type="checkbox"]:checked + label:before {
	border-color: #03A9F4;
	background: #03A9F4;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	border-color: #fff;
}
.custom-checkbox input[type="checkbox"]:disabled + label:before {
	color: #b8b8b8;
	cursor: auto;
	box-shadow: none;
	background: #ddd;
}
/* Modal styles */
.modal .modal-dialog {
	max-width: 400px;
}
.modal .modal-header, .modal .modal-body, .modal .modal-footer {
	padding: 20px 30px;
}
.modal .modal-content {
	border-radius: 3px;
	font-size: 14px;
}
.modal .modal-footer {
	background: #ecf0f1;
	border-radius: 0 0 3px 3px;
}
.modal .modal-title {
	display: inline-block;
}
.modal .form-control {
	border-radius: 2px;
	box-shadow: none;
	border-color: #dddddd;
}
.modal textarea.form-control {
	resize: vertical;
}
.modal .btn {
	border-radius: 2px;
	min-width: 100px;
}	
.modal form label {
	font-weight: normal;
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
	<a class="navbar-text" href='logout.php'><button type="button" class="btn btn-danger">Logout</button></a>
  </div>
</nav>
<div class="container-fluid">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row justify-content-between">
					<div class="col-sm-6">
						<h2><b>Data Siswa Yang Lolos di PTN</b></h2>
					</div>
					<form class="d-flex" action="" method="post">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="cari">
					<button style="width: 90px;" class="btn btn-success" type="submit" name="tombolcari">Search</button>
					<button style="width: 230px;" class="btn btn-primary" type="submit" name="tombolsemua">tampilkan semua</button>
					</form>
				</div>
			</div>
			<table class="table table-bordered table-hover table-sm">
				<thead class="table-dark">
					<tr>
						<th style="width: 140px;">Nama Siswa</th>
						<th style="width: 80px;">No Hp</th>
						<th style="width: 80px;">Jurusan</th>
						<th style="width: 90px;">Jalur</th>
						<th style="width: 90px;">Tahun Masuk</th>
						<th style="width: 200px;">Nama PTN</th>
						<th style="width: 70px;">Fakultas</th>
						<th style="width: 100px;">Prodi</th>
					</tr>
				</thead>
				<tbody>
                    <?php
                        include "koneksi.php";
						if(isset($_POST["tombolcari"])){
							$cari=$_POST["cari"];
							$query="SELECT siswa.*,jalur.*,ptn.* FROM siswa INNER JOIN jalur ON siswa.NISN = jalur.NISN INNER jOIN ptn ON jalur.ID_MASUK = ptn.ID_MASUK WHERE siswa.NAMA_SISWA LIKE '%$cari%' GROUP BY siswa.NISN;";
						}else{
							$query="SELECT siswa.*,jalur.*,ptn.* FROM siswa INNER JOIN jalur ON siswa.NISN = jalur.NISN INNER jOIN ptn ON jalur.ID_MASUK = ptn.ID_MASUK GROUP BY siswa.NISN;";
						}
                        $hasil = mysqli_query($koneksi,$query);
                        
                        if(mysqli_num_rows($hasil)>0){
                            while($data=mysqli_fetch_array($hasil)){
                                echo"
                                <tr>
                                    <td>$data[NAMA_SISWA]</td>
                                    <td>$data[NO_TELEPON]</td>
                                    <td>$data[JURUSAN]</td>
                                    <td>$data[JALUR_MASUK]</td>
                                    <td>$data[TAHUN_MASUK]</td>
                                    <td>$data[NAMA_PTN]</td>
                                    <td>$data[FAKULTAS]</td>
                                    <td>$data[PRODI]</td>
                                </tr>";
                            }
                        }else{
                            echo"
                            <tr>
                                <td>KOSONG</td>
                            </tr>
                            ";
                        }

                        ?>
				</tbody>
			</table>
		</div>
	</div>        
</div>
</body>
</html>
