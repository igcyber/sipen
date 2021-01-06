<?php
    $current_page = "Transaksi";
?>
<?php
    require_once("includes/head.php");
    require_once("includes/top-nav.php");

    error_reporting(0);
    $id = $_GET['id'];
    $delete = $pdo->prepare("DELETE FROM transaksi WHERE id=".$id);
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
                                    <span>Daftar Transaksi</span>
                                </h1>
                                <a href="index.php" title="Beranda" class="btn btn-white">
                                    <div class="page-header-icon"><i class="fas fa-tachometer-alt"></i></div>
                                </a>
                            </div>
                                <a href="tambah-transaksi.php" title="Tambah Transaksi Baru" class="btn btn-white my-2">
                                    <div class="page-header-icon"><i class="fas fa-user-plus"></i></div>
                                </a>
                        </div>
                    </div>
                    <!--Table-->
                    <div class="container-fluid mt-n10">

                        <div class="card mb-4">
                            <!-- <div class="card-header">Daftar Petugas</div> -->
                            <div class="card-body">
                                <div class="datatable table-responsive">
                                    <table class="table table-bordered table-hover datatab" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th><p align="center">No</p></th>
                                                <th><p align="center">Nama Pelanggan</p></th>
                                                <th><p align="center">Nomor Rekening</p></th>
                                                <th><p align="center">Periode</p></th>
                                                <th><p align="center">Tanggal Catat</p></th>
                                                <th><p align="center">Aksi</p></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no=1;
                                            $sql=$pdo->prepare("SELECT * FROM transaksi");
                                            $sql->execute();
                                            while($transaksi=$sql->fetch(PDO::FETCH_ASSOC)){
                                                $id= $transaksi['id'];
                                                $periode = $transaksi['periode'];
                                                $tgl_catat = $transaksi['tgl_catat'];
                                                    
                                                //Mengambil Nama & rek_baru Dari Tabel pelanggan
                                                $pelanggan_id = $transaksi['pelanggan_id'];
                                                $sql_pelanggan = "SELECT * FROM pelanggan WHERE id = :id";
                                                $res_pelanggan = $pdo->prepare($sql_pelanggan);
                                                $res_pelanggan->execute([':id'=>$pelanggan_id]);
                                                $pelanggan = $res_pelanggan->fetch(PDO::FETCH_ASSOC);
                                                $nm_pelanggan = $pelanggan['nm_pelanggan'];
                                                $rek_baru = $pelanggan['rek_baru'];
                                            ?>
                                                <tr>
                                                    <td><p align="center"><?php echo $no++; ?></p></td>
                                                    <td><p align="center"><?php echo $nm_pelanggan; ?></p></td>
                                                    <td><p align="center"><?php echo $rek_baru; ?></p></td>
                                                    <td><p align="center"><?php echo $periode; ?></p></td>
                                                    <td><p align="center"><?php echo date("d F Y",strtotime($tgl_catat)); ?></p></td>
                                                    <td><p align="center">
                                                        <a href="#.php?id=<?php echo $row->id ?>"class="btn btn-blue btn-sm btn-icon"><i class="fas fa-pencil-alt"></i></a>
                                                        <a href="transaksi.php?id=<?php echo $id ?>"
                                                        class="btn btn-red btn-sm btn-icon btn-delete"><i class="fas fa-trash"></i></a>
                                                        <a href="detail-transaksi.php?id=<?php echo $id ?>"class="btn btn-success btn-sm btn-icon btn-detail"><i class="fas fa-info"></i></a>
                                                        </p>
                                                    </td>
                                                </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </main>
            </div>
<?php require_once("includes/foot.php"); ?>

<!-- sweet allert -->
<script>
   $('.btn-delete').on('click', function(e){
      e.preventDefault();
      const href =$(this).attr('href')

 Swal.fire({
  title: 'Apakah Yakin?',
  text :'Ini Akan Menghapus Data Petugas',
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya, hapus!'
}).then((result) => {
  if (result.value) {
      document.location.href=href;
  }
})
   })
</script>
<!-- sweet allert -->

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