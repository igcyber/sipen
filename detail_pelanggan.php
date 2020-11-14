<?php
    $current_page = "Detail Pelanggan";
?>
<?php
    require_once("includes/head.php");
    require_once("includes/top-nav.php");

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
                                        $sql=$pdo->prepare("SELECT * FROM pelanggan WHERE id=$id");
                                        $sql->execute();
                                        while($pelanggan = $sql->fetch(PDO::FETCH_ASSOC)){
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
                                            $kelurahan = $pelanggan['kelurahan'];
                                            $kecamatan = $pelanggan['kecamatan'];

                                            //Mengambil Nama & Kode Kelompok Dari Tabel Kelompok
                                            $kelompok_id = $pelanggan['kelompok_id'];
                                            $sql_kelompok = "SELECT * FROM kelompok WHERE id = :id";
                                            $res_kelompok = $pdo->prepare($sql_kelompok);
                                            $res_kelompok->execute([':id'=>$kelompok_id]);
                                            $kelompok = $res_kelompok->fetch(PDO::FETCH_ASSOC);
                                            $kd_kelompok = $kelompok['kd_kelompok'];
                                            $nm_kelompok = $kelompok['nm_kelompok'];

                                            $status = $pelanggan['status'];
                                            $tgl_status = $pelanggan['tgl_status'];
                                            $hasil_test = $pelanggan['hasil_test'];
                                            $tgl_hasil_test = $pelanggan['tgl_hasil_test'];

                                            //Mengambil Nama & Nomor Petugas Dari Tabel Petugas
                                            $petugas_id = $pelanggan['petugas_id'];
                                            $sql_petugas = "SELECT * FROM petugas WHERE id = :id";
                                            $res_petugas = $pdo->prepare($sql_petugas);
                                            $res_petugas->execute([':id'=>$petugas_id]);
                                            $petugas = $res_petugas->fetch(PDO::FETCH_ASSOC);
                                            $no_petugas = $petugas['no_petugas'];
                                            $no_petugas_lama = $petugas['no_petugas_lama'];
                                            $nm_petugas = $petugas['nm_petugas'];

                                            $foto = $pelanggan['foto_rumah'];

                                    ?>
                                        <div><p align="center">
                                            <img src="foto_rumah/<?php echo $foto ?>" alt="Rumah Pelanggan" style="width: 176px; height: 190px;" class="img-responsive">
                                            </p>
                                        </div>
                                        <div>
                                            <table class="table table-bordered table-hover" id="example1" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th><p align="center">Rekening Baru Pelanggan</p></th>
                                                    <th><p align="center">Rekening Lama Pelanggan</p></th>
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
                                                        <td><p align="center"><?php echo $rek_baru; ?></p></td>
                                                        <td><p align="center"><?php echo $rek_lama; ?></p></td>
                                                        <td><p align="center"><?php echo $nm_pelanggan; ?></p></td>
                                                        <td><p align="center"><?php echo $unit_nm; ?></p></td>
                                                        <td><p align="center"><?php echo $alamat ?></p></td>
                                                        <td><p align="center"><?php echo $kelurahan ?></p></td>
                                                        <td><p align="center"><?php echo $kecamatan ?></p></td>
                                                        <td><p align="center"><?php echo $status ?></p></td>
                                                        <td><p align="center"><?php echo $tgl_status ?></p></td>
                                                        <td><p align="center"><?php echo $hasil_test ?></p></td>
                                                        <td><p align="center"><?php echo $tgl_hasil_test ?></p></td>
                                                        <td><p align="center"><?php echo $kd_kelompok; ?>- <?php echo $nm_kelompok ?></p></td>
                                                        <td><p align="center">No. Baru: <?php echo $no_petugas ?>-<?php echo $nm_petugas; ?> -
                                                            <?php echo $no_petugas ?></p>
                                                        </td>
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