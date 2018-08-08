<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
// Code for change password	
if(isset($_POST['submit']))
{

$Nama=$_POST['Nama'];
$Nik=$_POST['Nik'];
$Hp=$_POST['Hp'];
$Email=$_POST['Email'];
$Skema_Sertf=$_POST['Skema_Sertf'];
$Tempat_uji_kmp=$_POST['Tempat_uji_kmp'];
$rekomend=$_POST['rekomend'];
$Tgl_terbit=$_POST['Tgl_terbit'];
$Tgl_lahir=$_POST['Tgl_lahir']; 
$Org=$_POST['Org'];

$sql="INSERT INTO pendaftar(Nama,Nik,Hp,Email,Skema_Sertf,Tempat_uji_kmp,rekomend,Tgl_terbit,Tgl_lahir,Org) VALUES(:Nama,:Nik,:Hp,:Email,:Skema_Sertf,:Tempat_uji_kmp,:rekomend,:Tgl_terbit,:Tgl_lahir,:Org)";
$query = $dbh->prepare($sql);
$query->bindParam(':Nama',$Nama,PDO::PARAM_STR);
$query->bindParam(':Nik',$Nik,PDO::PARAM_STR);
$query->bindParam(':Hp',$Hp,PDO::PARAM_STR);
$query->bindParam(':Email',$Email,PDO::PARAM_STR);
$query->bindParam(':Skema_Sertf',$Skema_Sertf,PDO::PARAM_STR);
$query->bindParam(':Tempat_uji_kmp',$Tempat_uji_kmp,PDO::PARAM_STR);
$query->bindParam(':rekomend',$rekomend,PDO::PARAM_STR);
$query->bindParam(':Tgl_terbit',$Tgl_terbit,PDO::PARAM_STR);
$query->bindParam(':Tgl_lahir',$Tgl_lahir,PDO::PARAM_STR);
$query->bindParam(':Org',$Org,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="berhasil tambah data merk mobil baru";
}
else 
{
$error="terjadi kesalahan. Coba lagi";
}

}
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>PENDAFTARAN PESERTA BARU</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>


</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">PENDAFTARAN PESERTA BARU </h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">FORM PENDAFTARAN PESERTA BARU SKEMA PEMROGRAMAN</div>
									<div class="panel-body">
										<form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();">
										
											
						  	        	  <?php if($error){
						  	        	  	?>
						  	        	  	<div class="errorWrap"><strong>GAGAL</strong>:
						  	        	  	<?php echo htmlentities($error); ?> </div>
						  	        	  	<?php } 
											else if($msg){?>
											<div class="succWrap"><strong>SUKSES</strong>:
											<?php echo htmlentities($msg); ?> </div><?php }
											?>
											


											<div class="form-group">
												<label class="col-sm-4 control-label">NAMA LENGKAP PESERTA</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="Nama" id="brand" required>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">NIK KTP</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="Nik" id="Nik" required>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">HANDPHOE</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="Hp" id="Hp" required>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">EMAIL</label>
												<div class="col-sm-8">
													<input type="email" class="form-control" name="Email" id="emailid" onBlur="checkAvailability()" placeholder="Alamat Email Aktif " required="required">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">SKEMA SERTIFIKASI</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="Skema_Sertf" id="skema" required>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">TEMPAT UJI KOMPETENSI </label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="Tempat_uji_kmp" id="brand" required>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">REKOMENDASI </label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="rekomend" id="brand" required>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">TANGGAL TERBIT SERTIFIKAT </label>
												<div class="col-sm-8">
													<input type="date" class="form-control" name="Tgl_terbit" id="brand" required>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">TANGGAL LAHIR </label>
												<div class="col-sm-8">
													<input type="date" class="form-control" name="Tgl_lahir" id="Tgl_lahir" required>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">ORGANISASI </label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="Org" id="Org" required>
												</div>
											</div>

											<div class="hr-dashed"></div>
											
										
								
											
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
								
													<button class="btn btn-primary" name="submit" type="submit">S I M P A N</button>
												</div>
											</div>

										</form>

									</div>
								</div>
							</div>
							
						</div>
						
					

					</div>
				</div>
				
			
			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</body>

</html>
<?php } ?>