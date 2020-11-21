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
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                        <div class="form-row">
                                                            <img src="foto_rumah/<?php echo $foto ?>" alt="Rumah Pelanggan" style="width: 290px; height: 270px; margin-bottom: 20px;" >
                                                            <div class="form-group col-md-6">
                                                                <label>Nomor Rekening</label>
                                                                <input class="form-control form-control-sm" value="<?php echo $rek_baru ?>" readonly>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Nama Pelanggan</label>
                                                                <input class="form-control form-control-sm" value="<?php echo $nm_pelanggan ?>" readonly>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="col-md-8">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Wilayah</label>
                                                                <input class="form-control form-control-sm" value="<?php echo $unit_nm ?>" readonly>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Alamat Lengkap</label>
                                                                <textarea class="form-control form-control-sm" readonly><?php echo $alamat ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Kelurahan</label>
                                                                <input class="form-control form-control-sm" value="<?php echo $kelurahan ?>" readonly>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Kecamatan</label>
                                                                <input class="form-control form-control-sm" value="<?php echo $kecamatan ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Kelompok</label>
                                                                <input class="form-control form-control-sm" value="<?php echo $kd_kelompok?> - <?php echo $nm_kelompok ?>" readonly>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Status/Tanggal Status</label>
                                                                <input class="form-control form-control-sm" value="<?php echo $status ?> /  <?php echo date("d F Y",strtotime($tgl_status)); ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Nomor & Nama Petugas</label>
                                                                <input class="form-control form-control-sm" value="<?php echo $no_petugas ?> - <?php echo $nm_petugas ?>" readonly>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label>Hasil Test/Tanggal Hasil Test</label>
                                                                <input class="form-control form-control-sm" value="<?php echo $hasil_test ?> /  <?php echo date("d F Y",strtotime($tgl_hasil_test)); ?>" readonly>
                                                            </div>
                                                        </div>

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