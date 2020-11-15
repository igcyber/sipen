<?php
    $current_page = "Detail Pelanggan";
?>
<?php
    require_once("includes/head.php");
    require_once("includes/top-nav.php");
?>

<?php
    error_reporting(0);
    $id = $_GET['id'];
    $delete = $pdo->prepare("DELETE FROM petugas WHERE id=".$id);
    $delete->execute();
?>
        <!--Content Container-->
        <div id="layoutSidenav_content">
                <main>
                    <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
                        <div class="container-fluid">
                            <div class="page-header-content d-flex align-items-center justify-content-between text-white">
                                <h1 class="page-header-title my-2">
                                    <div class="page-header-icon"><i class="fas fa-user-tag"></i></div>
                                    <span>Detail Pelanggan</span>
                                </h1>
                                <a href="index.php" title="Beranda" class="btn btn-white">
                                    <div class="page-header-icon"><i class="fas fa-tachometer-alt"></i></div>
                                </a>
                            </div>                                
                        </div>
                    </div>
                    <!--Table-->
                    <div class="container-fluid mt-n10">

                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="datatable table-responsive">
                                    <?php
                                        $id=$_GET['id'];
                                        $select=$pdo->prepare("SELECT * FROM pelanggan WHERE id=$id");
                                        $select->execute();
                                        while($row=$select->fetch(PDO::FETCH_OBJ)){
                                    ?>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p><img src="foto_rumah/<?php echo $row->foto_rumah ?>" alt="Rumah Pelanggan" style="width: 220px; height: 250px;" ></p>
                                                        <label for="" >Nomor Rekening :   </label>
                                                        <input type="text" placeholder="<?php echo $row->rek_baru ?>">

                                                        <label for="" >Nama Pelanggan :</label>
                                                        <input type="text" placeholder="<?php echo $row->nm_pelanggan ?>">                                              
                                                </div>
                                                    <div class="form-group col-6">
                                                        <form action="" >
                                                            
                                                            <input type="text" style="float:right; width: calc(100% - 200px);" placeholder="<?php echo $row->unit_id ?>">
                                                            <label for="">Wilayah</label><br>
                                                            
                                                            <input type="text" style="float:right; width: calc(100% - 200px);" placeholder="<?php echo $row->alamat ?>">
                                                            <label for="" ">Alamat</label><br>
                                                            
                                                            <input type="text"style="float:right; width: calc(100% - 200px);" placeholder="<?php echo $row->kelurahan ?>">
                                                            <label for="">Kelurahan</label><br>

                                                            <input type="text"style="float:right; width: calc(100% - 200px);" placeholder="<?php echo $row->kecamatan ?>">
                                                            <label for="">Kecamatan</label><br>

                                                            <input type="text"style="float:right; width: calc(100% - 200px);" placeholder="<?php echo $row->kelompok_id ?>">
                                                            <label for="">Nama Kelompok</label><br>
                                                            
                                                            <input type="text"style="float:right; width: calc(100% - 200px);" placeholder="<?php echo $row->status ?> /  <?php echo date("d F Y",strtotime($row->tgl_status)); ?>">
                                                            <label for="">Status/Tanggal Status</label><br>

                                                            <input type="text"style="float:right; width: calc(100% - 200px);" placeholder="<?php echo $row->hasil_test ?> /  <?php echo date("d F Y",strtotime($row->tgl_hasil_test)); ?>">
                                                            <label for="">Hasil Test/Tanggal Hasil Test</label><br>

                                                            <input type="text"style="float:right; width: calc(100% - 200px);" placeholder="<?php echo $row->petugas_id ?>">
                                                            <label for="">Nama Petugas</label>
                                                        </form>
                                                    </div>
                                            </div>
                                        </div>
                                        <?php }?>
                                </div>
                            </div>
                            <a href="pelanggan.php" class="btn btn-secondary">KEMBALI KE DAFTAR PELANGGAN</a>
                        </div>

                    </div>
                </main>
            </div>
<?php require_once("includes/foot.php"); ?>

<!-- datatable -->
<link rel="stylesheet" href="css/dataTables.bootstrap4.css">
<script src="js/jquery.dataTables.js"></script>
<script src="js/dataTables.bootstrap4.js"></script>
<script>
  $(document).ready(function() {
    $('.datatab').DataTable();
  } );
</script>
<!-- datatable -->