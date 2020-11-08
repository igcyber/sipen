<?php
    $current_page = "Petugas";
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
                                    <span>Daftar Petugas</span>
                                </h1>
                                <a href="index.php" title="Beranda" class="btn btn-white">
                                    <div class="page-header-icon"><i class="fas fa-tachometer-alt"></i></div>
                                </a>
                            </div>
                                <a href="tambah-petugas.php" title="Tambah Petugas Baru" class="btn btn-white my-2">
                                    <div class="page-header-icon"><i class="fas fa-user-plus"></i></div>
                                </a>
                        </div>
                    </div>
                    <!--Table-->
                    <div class="container-fluid mt-n10">

                        <div class="card mb-4">
                            <div class="card-header">Daftar Petugas</div>
                            <div class="card-body">
                                <div class="datatable table-responsive">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th><p align="center">No</p></th>
                                                <th><p align="center">No Petugas Baru</p></th>
                                                <th><p align="center">No Petugas Lama</p></th>
                                                <th><p align="center">Nama Petugas</p></th>
                                                <th><p align="center">No HP</p></th>
                                                <th><p align="center">Username</p></th>
                                                <th><p align="center">Hak Akses</p></th>
                                                <th><p align="center">Aksi</p></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $no=1;
                                        $select=$pdo->prepare("SELECT * FROM petugas ORDER BY role ASC");
                                        $select->execute();
                                        while($row=$select->fetch(PDO::FETCH_OBJ)){
                                        ?>
                                            <tr>
                                                <td><p align="center"><?php echo $no++; ?></p></td>
                                                <td><p align="center"><?php echo $row->no_petugas; ?></p></td>
                                                <td><p align="center"><?php echo $row->no_petugas_lama; ?></p></td>                                                </td>
                                                <td><p align="center"><?php echo $row->nm_petugas; ?></p></td>
                                                <td><p align="center"><?php echo $row->no_hp; ?></p></td>
                                                <td><p align="center"><?php echo $row->username; ?></p></td>
                                                <td>
                                                    <p align="center"><?php echo $row->role; ?></p>
                                                    
                                                </td>
                                                <td><p align="center">
                                                    <a href="ubah-petugas.php?id=<?php echo $row->id ?>"class="btn btn-blue btn-sm btn-icon"><i class="fas fa-pencil-alt"></i></a>

                                                    <a href="petugas.php?id=<?php echo $row->id ?>" 
                                                    class="btn btn-red btn-sm btn-icon btn-delete"><i class="fas fa-trash"></i></a>
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

<script>
   $('.btn-delete').on('click', function(e){
      e.preventDefault();
      const href =$(this).attr('href')

 Swal.fire({
  title: 'Apakah Yakin?',
  text :'Ini Akan Menghapus Data Petugas.',
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
  <script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>