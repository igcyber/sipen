<?php require_once("includes/head.php"); ?>
       <?php require_once("includes/top-nav.php"); ?>

<?php 
//  Settingan waktu indonesia
date_default_timezone_set('Asia/Makassar');
// Settingan waktu indonesia
?>

<!-- Hanya Angka -->
<script>
    function hanyaAngka(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode <48 || charCode > 57))

            return false;
            return true;
        }
</script>
<!-- Hanya Angka -->


<?php
    if(isset($_POST['submit'])){

        $rek_baru = $_POST['rek_baru'];
        $rek_lama = $_POST['rek_lama'];
        $nm_pelanggan = $_POST['nm_pelanggan'];
        $unit_id = $_POST['unit_id'];
        $alamat = $_POST['alamat'];
        $kelurahan = $_POST['kelurahan'];
        $kecamatan = $_POST['kecamatan'];
        $status = $_POST['status'];
        $tgl_status = $_POST['tgl_status'];
        $hasil_test = $_POST['hasil_test'];
        $tgl_hasil_test = $_POST['tgl_hasil_test'];
        $kelompok_id = $_POST['kelompok_id'];
        $petugas_id = $_POST['petugas_id'];
        $foto_rumah = $_FILES['foto_rumah']['name'];
        $foto_rumah_tmp = $_FILES['foto_rumah']['tmp_name'];
        move_uploaded_file("{$foto_rumah_tmp}","foto_rumah/{$foto_rumah}","$image_size >= 2048");

        $sql = "INSERT INTO pelanggan(rek_baru,rek_lama,nm_pelanggan,unit_id,alamat,kelurahan,kecamatan,kelompok_id,status,tgl_status,hasil_test,tgl_hasil_test,petugas_id,foto_rumah)
        VALUES(:rek_baru,:rek_lama,:nm_pelanggan,:unit_id,:alamat,:kelurahan,:kecamatan,:kelompok_id,:status,:tgl_status,:hasil_test,:tgl_hasil_test,:petugas_id,:foto_rumah)";
        $res = $pdo->prepare($sql);
        $res->execute([
            ':rek_baru' => $rek_baru,
            ':rek_lama' => $rek_lama,
            ':nm_pelanggan' => $nm_pelanggan,
            ':unit_id' => $unit_id,
            ':alamat' => $alamat,
            ':kelurahan' => $kelurahan,
            ':kecamatan' => $kecamatan,
            ':status' => $status,
            ':tgl_status' => $tgl_status,
            ':hasil_test' => $hasil_test,
            ':tgl_hasil_test' => $tgl_hasil_test,
            ':kelompok_id' => $kelompok_id,
            ':petugas_id' => $petugas_id,
            ':foto_rumah' => $foto_rumah
        ]);
        header("Location: pelanggan.php");
    }
?>
        <div id="layoutSidenav_content">
            <main>
                <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
                    <div class="container-fluid">
                        <div class="page-header-content">
                            <h1 class="page-header-title my-2">
                                <div class="page-header-icon"><i class="fas fa-user-plus"></i></div>
                                <span>Tambah Pelanggan</span>
                            </h1>
                        </div>
                    </div>
                </div>

                <!--Start Table-->
                <div class="container-fluid mt-n10">
                    <div class="card mb-4">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="post-title">Nomor Rekening Baru</label>
                                        <input class="form-control" type="text" placeholder="Nomor Rekening Baru Pelanggan"
                                        name="rek_baru" onkeypress="return hanyaAngka(event)" required/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="post-title">Nomor Rekening Lama</label>
                                        <input class="form-control" type="text" placeholder="Nomor Rekening Lama Pelanggan"
                                        name="rek_lama" onkeypress="return hanyaAngka(event)" required/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="post-title">Nama Lengkap Pelanggan</label>
                                        <input class="form-control" type="text" placeholder="Nama Lengkap Pelanggan Sesuai KTP"
                                        name="nm_pelanggan" required/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Unit Pelayanan</label>
                                        <select class="form-control" name="unit_id">
                                            <option disabled selected>Pilih Wilayah</option>
                                        <?php
                                            $sql =  "SELECT * FROM unit";
                                            $res = $pdo->prepare($sql);
                                            $res->execute();
                                            while($unit = $res->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <option value="<?php echo $unit['id']; ?>">
                                                <?php echo $unit['nm_wilayah']; ?>
                                            </option>
                                        <?php
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="post-content">Alamat Lengkap</label>
                                    <textarea class="form-control" name="alamat" placeholder="Alamat Lengkap Pelanggan Sesuai KTP" rows="9"></textarea>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Kelurahan</label>
                                        <input class="form-control" type="text" name="kelurahan" placeholder="Nama Kelurahan" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Kecamatan</label>
                                        <input class="form-control" type="text" name="kecamatan" placeholder="Nama Kecamatan" />
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            <option disabled selected>Pilih Status</option>
                                            <option value="Aktif">Aktif</option>
                                            <option value="Tidak Aktif">Tidak Aktif</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Tanggal Status</label>
                                        <input class="form-control" type="date" name="tgl_status" title="Tanggal Status Ditetapkan"/>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Hasil Test Meteran</label>
                                        <input class="form-control" name="hasil_test" type="text" placeholder="Hasil Test Meter..." />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Tanggal Hasil Test</label>
                                        <input class="form-control" type="date" name="tgl_hasil_test"
                                        title="Tanggal Hasil Test Ditetapkan" />
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Kelompok</label>
                                        <select name="kelompok_id" class="form-control">
                                        <option disabled selected>Pilih Kelompok</option>
                                            <?php
                                            $sql =  "SELECT * FROM kelompok";
                                            $res = $pdo->prepare($sql);
                                            $res->execute();
                                            while($kelompok = $res->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                                <option value="<?php echo $kelompok['id']; ?>">
                                                    <?php echo $kelompok['kd_kelompok'] ?> - <?php echo $kelompok['nm_kelompok']; ?>
                                                </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Petugas Lapangan</label> <span class="text-muted small">Pastikan Petugas Lapangan Ada</span>
                                        <select name="petugas_id" class="form-control" onchange='changeValue(this.value)'>
                                            <option disabled selected>Pilih Petugas</option>
                                            <?php
                                            $sql =  "SELECT * FROM petugas WHERE role = :role";
                                            $res = $pdo->prepare($sql);
                                            $res->execute([
                                                ':role' => 'Petugas Lapangan'
                                            ]);

                                            while($petugas = $res->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                                <option value="<?php echo $petugas['id']; ?>">
                                                    <?php echo $petugas['no_petugas'] ?> - <?php echo $petugas['nm_petugas']; ?>
                                                </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Foto Rumah Pelanggan</label>
                                        <input type="file" class="form-control" name="foto_rumah">
                                        <p>*max file 2mb</p>
                                    </div>
                                </div>
                                <button class="btn btn-primary mr-2 my-1" type="submit" name="submit">Simpan</button>
                                <a href="pelanggan.php" class="btn btn-secondary">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
                <!--End Table-->
            </main>
        </div>
<?php require_once("includes/foot.php"); ?>