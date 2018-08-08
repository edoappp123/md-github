<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "delete from pendaftar  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
$msg="berhasil hapus data peserta tersebut";

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
    
    <title> LAPORAN DATA PESERTA </title>

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
        <script src="js/modernizr.custom.js"></script>
    <link href="print/style.css" rel="stylesheet" media="screen">
            <!-- ss yang digunakan tampilkan ketika dalam mode print -->
            <link href="print/print.css" rel="stylesheet" media="print">
            
            <script src="print/jquery-1.8.3.min.js"></script>
            <script src="print/jquery.PrintArea.js"></script>
            <script>
                (function($) {
                    // fungsi dijalankan setelah seluruh dokumen ditampilkan
                    $(document).ready(function(e) {
                        
                        // aksi ketika tombol cetak ditekan
                        $("#cetak").bind("click", function(event) {
                            // cetak data pada area <div id="#data-mahasiswa"></div>
                            $('#data-mahasiswa').printArea();
                        });
                    });
                }) (jQuery);
            </script>

</head>

<body>
    <?php include('includes/header.php');?>

    <div class="ts-main-content">
        <?php include('includes/leftbar.php');?>
        <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12" id="data-mahasiswa">

                        <h2 class="page-title">LAPORAN DATA PESERTA BARU </h2>

                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <div class="panel-heading"> DATA PESERTA SERTIFIKASI SKEMA PEMROGRAMAN</div>
                            <div class="panel-body">
                            <?php if($error){?><div class="errorWrap"><strong>GAGAL</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>SUKSES</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                                <table id="zctb" class=" " border="1" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                            <th> Nama </th>
                                            <th> Nik</th>
                                            <th>Hp</th>
                                            <th>Email</th>
                                            <th>Skema Sertf</th>
                                            <th>Tmp_Uji_Kmp</th>
                                            <th>rek</th>
                                            <th>tgl tr_</th>
                                            <th>tgl lhr</th>
                                            <th>Organisasi</th> 
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>#</th>
                                            <th> Nama </th>
                                            <th> Nik</th>
                                            <th>Hp</th>
                                            <th>Email</th>
                                            <th>Skema Sertifikasi</th>
                                            <th>Tempat Uji Kompetensi</th>
                                            <th>Rekomendasi</th>
                                            <th>Tanggal Terbit Sertifikat </th>
                                            <th>Tanggal Lahir</th>
                                            <th>Organisasi</th> 
                                        </tr>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php $sql = "SELECT * from  pendaftar ";
                                        $query = $dbh -> prepare($sql);
                                        $query->execute();
                                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt=1;
                                        if($query->rowCount() > 0)
                                        {
                                        foreach($results as $result)
                                        {
                                    ?>  
                                        <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($result->Nama);?></td>
                                            <td><?php echo htmlentities($result->Nik);?></td>
                                            <td><?php echo htmlentities($result->Hp);?></td>
                                            <td><?php echo htmlentities($result->Email);?></td>
                                            <td><?php echo htmlentities($result->Skema_Sertf);?></td>
                                            <td><?php echo htmlentities($result->Tempat_uji_kmp);?></td>
                                            <td><?php echo htmlentities($result->rekomend);?></td>
                                            <td><?php echo htmlentities($result->Tgl_terbit);?></td>
                                            <td><?php echo htmlentities($result->Tgl_lahir);?></td>
                                            <td><?php echo htmlentities($result->Org);?></td>

                                        </tr>
                                        <?php $cnt=$cnt+1; }} ?>
                                        
                                    </tbody>
                                </table>

                        <button type="submit" class="btn btn-default btn-sm lead asta-text-1 text-center" id="cetak"><span class=" glyphicon glyphicon-print"></span></button>

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
