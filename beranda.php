<?php
    $current_page = "Beranda";
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
                        <div class="page-header-content my-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i class="fas fa-tachometer-alt"></i></div>
                                <span>Beranda</span>
                            </h1>
                        </div>
                    </div>
                </div>

                <!--Table-->
                <div class="container-fluid mt-n10">

                <!--Card Primary-->
                <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <p>Pelanggan</p>
                                <p>32</p>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="pelanggan.php">Lihat Detail</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <p>Petugas</p>
                                <p>32</p>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="petugas.php">Lihat Detail</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <p>Transaksi</p>
                                <p>32</p>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="transaksi.php">Lihat Detail</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Card Primary-->

                    <div class="card mb-4">
                        <div class="card-header">DAFTAR PELANGGAN BELUM ADA BARCODE:</div>
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
                                        <th><p align="center">Barcode</p></th>
                                        <th><p align="center">Tanggal Status</p></th>
                                        <th><p align="center">Hasil Test Meteran</p></th>
                                        <th><p align="center">Tanggal Hasil Test</p></th>
                                        <th><p align="center">Aksi</p></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no=1;
                                    $sql=$pdo->prepare("SELECT * FROM pelanggan WHERE status='Tidak Tersedia'");
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
                                                <div class="badge badge-<?php echo $status=='Tersedia'?'success':'warning'; ?>"><?php echo $status; ?></div>
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
                <!--End Table-->

            </main>
        </div>
<?php require_once("includes/foot.php"); ?>

