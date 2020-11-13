<?php
    $current_page = "Pelanggan";
?>
<?php
    require_once("includes/head.php");
    require_once("includes/top-nav.php");
?>

<?php
    require_once("includes/head.php");
    require_once("includes/top-nav.php");

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
                                    <span>Daftar Pelanggan</span>
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
                                <a href="pelanggan.php" class="btn btn-secondary">Kembali</a>
                                    <?php
                                        $id=$_GET['id'];
                                        $select=$pdo->prepare("SELECT * FROM pelanggan WHERE id=$id");
                                        $select->execute();
                                        while($row=$select->fetch(PDO::FETCH_OBJ)){
                                    ?>
                                        <div><p align="center">
                                            <img src="foto_rumah/<?php echo $row->foto_rumah ?>" alt="Rumah Pelanggan" style="width: 176px; height: 190px;" class="img-responsive">
                                            </p>
                                        </div>
                                        <div>
                                        <table class="table table-bordered table-hover" id="example1" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th><p align="center">Rekening Pelanggan</p></th>
                                                <th><p align="center">Nama Pelanggan</p></th>
                                                <th><p align="center">Unit Pelayanan</p></th>
                                                <th><p align="center">Alamat Pelanggan</p></th>
                                                <th><p align="center">Kelurahan</p></th>
                                                <th><p align="center">Kecamatan</p></th>
                                                <th><p align="center">Status</p></th>
                                                <th><p align="center">Tanggal Status</p></th>
                                                <th><p align="center">Hasil Test Meteran</p></th>
                                                <th><p align="center">Tanggal Hasil Test</p></th>
                                                <th><p align="center">Kelompok</p></th>
                                                <th><p align="center">Nama Petugas</p></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <tr>
                                                    <td><p align="center"><?php echo $row->rek_baru; ?></p></td>
                                                    <td><p align="center"><?php echo $row->nm_pelanggan; ?></p></td>
                                                    <td><p align="center"><?php echo $row->unit_id; ?></p></td>
                                                    <td><p align="center"><?php echo $row->alamat; ?></p></td>
                                                    <td><p align="center"><?php echo $row->kelurahan; ?></p></td>
                                                    <td><p align="center"><?php echo $row->kecamatan; ?></p></td>
                                                    <td><p align="center"><?php echo $row->status; ?></p></td>
                                                    <td><p align="center"><?php echo $row->tgl_status; ?></p></td>
                                                    <td><p align="center"><?php echo $row->hasil_test; ?></p></td>
                                                    <td><p align="center"><?php echo $row->tgl_hasil_test; ?></p></td>
                                                    <td><p align="center"><?php echo $row->kelompok_id; ?></p></td>
                                                    <td><p align="center"><?php echo $row->petugas_id; ?></p></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                        </div>
                                        <?php }?>
                                </div>
                            </div>
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