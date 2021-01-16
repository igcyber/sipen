<?php
    $current_page = "Detail Transaksi";
?>
<?php
    require_once("includes/head.php");
    require_once("includes/top-nav.php");
?>
        <!--Content Container-->
        <div id="layoutSidenav_content">
                <main>
                    <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
                        <div class="container-fluid">
                            <div class="page-header-content d-flex align-items-center justify-content-between text-white">
                                <h1 class="page-header-title my-2">
                                    <div class="page-header-icon"><i class="fas fa-user-tag"></i></div>
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
                                        $no=1;
                                        $id=$_GET['id'];    
                                        $sql=$pdo->prepare("SELECT * FROM transaksi WHERE id=$id");
                                        $sql->execute();
                                        
                                        while($transaksi = $sql->fetch(PDO::FETCH_ASSOC)){
                                            $periode = $transaksi['periode'];
                                            $tgl_catat = $transaksi['tgl_catat'];
                                            $waktu = $transaksi['waktu'];
                                            $m3_kini = $transaksi['m3_kini'];
                                            $m3_lalu = $transaksi['m3_lalu'];
                                            $kubikasi = $transaksi['kubikasi'];
                                            $jml_tagihan = $transaksi['jml_tagihan'];
                                            $tgl_bayar = $transaksi['tgl_bayar'];
                                            $foto = $transaksi['foto_meteran'];


                                            $pelanggan_id = $transaksi['pelanggan_id'];
                                            $sql_pelanggan = "SELECT * FROM pelanggan WHERE id = :id";
                                            $res_pelanggan = $pdo->prepare($sql_pelanggan);
                                            $res_pelanggan->execute([':id'=>$pelanggan_id]);
                                            $pelanggan = $res_pelanggan->fetch(PDO::FETCH_ASSOC);
                                            $nm_pelanggan = $pelanggan['nm_pelanggan'];

                                            $rek_baru = $pelanggan['rek_baru'];
                                            $rek_lama = $pelanggan['rek_lama'];
                                            $nm_pelanggan = $pelanggan['nm_pelanggan'];
                                            $status = $pelanggan['status'];
                                            $tgl_status = $pelanggan['tgl_status'];
                                            $hasil_test = $pelanggan['hasil_test'];
                                            $tgl_hasil_test = $pelanggan['tgl_hasil_test'];
                                            $alamat = $pelanggan['alamat'];
                                            $kelurahan = $pelanggan['kelurahan'];
                                            $kecamatan = $pelanggan['kecamatan'];

                                            //Mengambil Nama Wilayah Dari Tabel Unit
                                            $unit_id = $pelanggan['unit_id'];
                                            $sql_unit = "SELECT * FROM unit  WHERE id = :id";
                                            $res_unit = $pdo->prepare($sql_unit);
                                            $res_unit->execute([':id'=>$unit_id]);
                                            $unit = $res_unit->fetch(PDO::FETCH_ASSOC);
                                            $unit_nm = $unit['nm_wilayah'];

                                            //Mengambil Nama & Kode Kelompok Dari Tabel Kelompok
                                            $kelompok_id = $pelanggan['kelompok_id'];
                                            $sql_kelompok = "SELECT * FROM kelompok WHERE id = :id";
                                            $res_kelompok = $pdo->prepare($sql_kelompok);
                                            $res_kelompok->execute([':id'=>$kelompok_id]);
                                            $kelompok = $res_kelompok->fetch(PDO::FETCH_ASSOC);
                                            $kd_kelompok = $kelompok['kd_kelompok'];
                                            $nm_kelompok = $kelompok['nm_kelompok'];


                                            //Mengambil Nama & Nomor Petugas Dari Tabel Petugas
                                            $petugas_id = $pelanggan['petugas_id'];
                                            $sql_petugas = "SELECT * FROM petugas WHERE id = :id";
                                            $res_petugas = $pdo->prepare($sql_petugas);
                                            $res_petugas->execute([':id'=>$petugas_id]);
                                            $petugas = $res_petugas->fetch(PDO::FETCH_ASSOC);
                                            $no_petugas = $petugas['no_petugas'];
                                            $no_petugas_lama = $petugas['no_petugas_lama'];
                                            $nm_petugas = $petugas['nm_petugas'];

                                ?>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                        <div class="form-row">
                                                            <img src="foto_rumah/<?php echo $foto ?>" alt="Meteran Pelanggan" style="width: 290px; height: 270px; margin-bottom: 20px;" >
                                                            <div class="form-group col-md-12">
                                                                <a href="foto_rumah/<?php echo $foto ?>" target="_blank" class="btn btn-primary btn-sm">Lihat Foto</a>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Tanggal Catat</label>
                                                                <input class="form-control form-control-sm" value="<?php echo date("d F Y",strtotime($tgl_catat)); ?>" readonly>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Waktu</label>
                                                                <input class="form-control form-control-sm" value="<?php echo $waktu ?> WITA" readonly>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="col-md-8">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Nomor Baru / Nomor Lama / Nama Pelanggan</label>
                                                                <input class="form-control form-control-sm" value="<?php echo $rek_baru ?> / <?php echo $rek_lama ?> / <?php echo $nm_pelanggan ?>" readonly>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Unit Wilayah</label>
                                                                <input class="form-control form-control-sm" value="<?php echo $unit_nm ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Kelompok</label>
                                                                <input class="form-control form-control-sm" value="<?php echo $kd_kelompok ?> / <?php echo $nm_kelompok ?>" readonly>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Kelurahan / Kecamatan</label>
                                                                <input class="form-control form-control-sm" value="<?php echo $kelurahan ?> / <?php echo $kecamatan ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Hasil Test/Tanggal Hasil Test</label>
                                                                <input class="form-control form-control-sm" value="<?php echo $hasil_test ?> /  <?php echo date("d F Y",strtotime($tgl_hasil_test)); ?>" readonly>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Status/Tanggal Status</label>
                                                                <input class="form-control form-control-sm" value="<?php echo $status ?> /  <?php echo date("d F Y",strtotime($tgl_status)); ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label>Nomor & Nama Petugas</label>
                                                                <input class="form-control form-control-sm" value="<?php echo $no_petugas ?> - <?php echo $nm_petugas ?>" readonly>
                                                            </div>
                                                        </div>
                                                </div>
                                                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th><p align="center">No</p></th>
                                                                <th><p align="center">Periode</p></th>
                                                                <th><p align="center">Tanggal Catat</p></th>
                                                                <th><p align="center">M3 Kini</p></th>
                                                                <th><p align="center">M3 Lalu</p></th>
                                                                <th><p align="center">Kubikasi</p></th>
                                                                <th><p align="center">Jumlah Tagihan</p></th>
                                                                <th><p align="center">Tanggal Bayar</p></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><p align="center"><?php echo $no++; ?></p></td>
                                                                <td><p align="center"><?php echo $periode; ?></td>
                                                                <td><p align="center"><?php echo date("d F Y",strtotime($tgl_catat)); ?></td>
                                                                <td><p align="center"><?php echo $m3_kini; ?></td>
                                                                <td><p align="center"><?php echo $m3_lalu; ?></td>
                                                                <td><p align="center"><?php echo $kubikasi; ?></td>
                                                                <td><p align="center"><?php echo $jml_tagihan; ?></td>
                                                                <td><p align="center"><?php echo date("d F Y",strtotime($tgl_bayar)); ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                            </div>
                                        </div>
                                        <?php }?>
                                </div>
                            </div>
                            <a href="transaksi.php" class="btn btn-secondary">KEMBALI KE DAFTAR PELANGGAN</a>
                        </div>


                    </div>
                </main>
            </div>
<?php require_once("includes/foot.php"); ?>