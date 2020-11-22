<?php
    $current_page = "Pelanggan";
?>

<?php
    require_once("includes/head.php");
    require_once("includes/top-nav.php");

    //Abaikkan error tidak membaca ID, Jika Tidak Melakukan Delete
    error_reporting(0);

    //Delete
    $id = $_GET['id'];
    $delete = $pdo->prepare("DELETE FROM pelanggan WHERE id=".$id);
    $delete->execute();
?>
        <!--Content Container-->
        <div id="layoutSidenav_content">
                <main>
                    <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
                        <div class="container-fluid">
                            <div class="page-header-content d-flex align-items-center justify-content-between text-white">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i class="fas fa-user-tag"></i></div>
                                    <span>Daftar Pelanggan</span>
                                </h1>
                                <a href="index.php" title="Beranda" class="btn btn-white">
                                    <div class="page-header-icon"><i class="fas fa-tachometer-alt"></i></div>
                                </a>
                            </div>
                                <a href="tambah-pelanggan.php" title="Tambah Pelanggan Baru" class="btn btn-white my-2">
                                    <div class="page-header-icon"><i class="fas fa-user-plus"></i></div>
                                </a>
                                <a href="tambah-unit.php" title="Tambah Unit Baru" class="btn btn-white my-2">
                                    <div class="page-header-icon"><i class="far fa-building"></i></div>
                                </a>
                                <a href="tambah-kelompok.php" title="Tambah Kelompok Baru" class="btn btn-white my-2">
                                    <div class="page-header-icon"><i class="fas fa-users"></i></div>
                                </a>
                        </div>
                    </div>
                    <!--Table-->
                    <div class="container-fluid mt-n10">

                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="datatable table-responsive">
                                    <table class="table table-bordered table-hover datatab" id="example1" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th><p align="center">No</p></th></p>
                                                <th><p align="center">Rekening Pelanggan</p></th>
                                                <th><p align="center">Nama Pelanggan</p></th>
                                                <th><p align="center">Unit Pelayanan</p></th>
                                                <th><p align="center">Alamat Pelanggan</p></th>
                                                <th><p align="center">Status</p></th>
                                                <th><p align="center">Tanggal Status</p></th>
                                                <th><p align="center">Hasil Test Meteran</p></th>
                                                <th><p align="center">Tanggal Hasil Test</p></th>
                                                <th><p align="center">Aksi</p></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no=1;
                                            $sql=$pdo->prepare("SELECT * FROM pelanggan ORDER BY rek_baru ASC");
                                            $sql->execute();
                                            while($pelanggan = $sql->fetch(PDO::FETCH_ASSOC)){
                                                $id = $pelanggan['id'];
                                                $rek_baru = $pelanggan['rek_baru'];
                                                $rek_lama = $pelanggan['rek_lama'];
                                                $nm_pelanggan = $pelanggan['nm_pelanggan'];

                                                //Mengambil Nama Wilayah Dari Tabel Unit
                                                $unit_id = $pelanggan['unit_id'];
                                                $sql_unit = "SELECT * FROM unit  WHERE id = :id";
                                                $res_unit = $pdo->prepare($sql_unit);
                                                $res_unit->execute([':id'=>$unit_id]);
                                                $unit = $res_unit->fetch(PDO::FETCH_ASSOC);
                                                $unit_nm = $unit['nm_wilayah'];


                                                $alamat = $pelanggan['alamat'];
                                                $status = $pelanggan['status'];
                                                $tgl_status = $pelanggan['tgl_status'];
                                                $hasil_test = $pelanggan['hasil_test'];
                                                $tgl_hasil_test = $pelanggan['tgl_hasil_test'];
                                            ?>
                                                <tr>
                                                    <td><p align="center"><?php echo $no++; ?></p></td>
                                                    <td><p align="center"><?php echo $rek_baru; ?></p></td>
                                                    <td><p align="center"><?php echo $nm_pelanggan; ?></p></td>
                                                    <td><p align="center"><?php echo $unit_nm; ?></p></td>
                                                    <td><p align="center"><?php echo $alamat; ?></p></td>
                                                    <td>
                                                        <div class="badge badge-<?php echo $status=='Aktif'?'success':'warning'; ?>"><?php echo $status; ?></div>
                                                    </td>
                                                    <td><p align="center"><?php echo date("d F Y",strtotime($tgl_status)); ?></p></td>
                                                    <td><p align="center"><?php echo $hasil_test; ?></p></td>
                                                    <td><p align="center"><?php echo date("d F Y",strtotime($tgl_hasil_test)); ?></p></td>
                                                    <td>
                                                        <p align="center">
                                                        <a href="ubah-pelanggan.php?id=<?php echo $id ?>"class="btn btn-primary btn-icon btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                                        <a href="pelanggan.php?id=<?php echo $id ?>"class="btn btn-danger btn-icon btn-sm btn-delete"><i class="fas fa-trash"></i></a>
                                                        <a href="detail-pelanggan.php?id=<?php echo $id ?>"class="btn btn-success btn-sm btn-icon btn-detail"><i class="fas fa-info"></i></a>
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