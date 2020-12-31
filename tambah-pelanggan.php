<?php
    $current_page = "Tambah Pelanggan";
    require_once("includes/head.php");
    require_once("includes/top-nav.php") ;

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
        $foto_rumah_size = $_FILES['foto_rumah']['size'];
        $foto_rumah_ext=explode('.',$foto_rumah);
        $foto_rumah_ext=strtolower(end($foto_rumah_ext));

        if ($foto_rumah_ext=='jpg' || $foto_rumah_ext=='jpeg' || $foto_rumah_ext=='png' && $foto_rumah_size > 2097152) {

            move_uploaded_file("{$foto_rumah_tmp}","foto_rumah/{$foto_rumah}");
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

        }else {
            $error = "Format harus jpeg, jpg, png dan tidak lebih dari 2Mb";
        }


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
                        <a href="upload-pelanggan.php" title="Upload Data Pelanggan Baru" class="btn btn-white my-2">
                            <div class="page-header-icon"><i class="fa fa-upload"></i></div>
                        </a>
                        <a href="unduh-data.php" title="Download Data Excel" class="btn btn-white my-2">
                            <div class="page-header-icon"><i class="fa fa-download"></i></div>
                        </a>
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
                                        name="rek_baru" onkeypress="return hanyaAngka(event)" autocomplete="off" required/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="post-title">Nomor Rekening Lama</label>
                                        <input class="form-control" type="text" placeholder="Nomor Rekening Lama Pelanggan"
                                        name="rek_lama" onkeypress="return hanyaAngka(event)" autocomplete="off" required/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="post-title">Nama Lengkap Pelanggan</label>
                                        <input class="form-control" type="text" placeholder="Nama Lengkap Pelanggan Sesuai KTP"
                                        name="nm_pelanggan" autocomplete="off" required/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Unit Pelayanan</label>
                                        <select class="form-control" name="unit_id">
                                            <option disabled selected>Pilih Wilayah</option>
                                        <?php
                                            $no=1;
                                            $sql =  "SELECT * FROM unit";
                                            $res = $pdo->prepare($sql);
                                            $res->execute();
                                            while($unit = $res->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <option value="<?php echo $unit['id']; ?>">
                                            <?php echo $no++; ?>. <?php echo $unit['nm_wilayah']; ?>
                                            </option>
                                        <?php
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="post-content">Alamat Lengkap</label>
                                    <textarea class="form-control" name="alamat" placeholder="Alamat Lengkap Pelanggan Sesuai KTP" rows="9" autocomplete="off"></textarea>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Kelurahan</label>
                                        <input class="form-control" type="text" name="kelurahan" placeholder="Nama Kelurahan" autocomplete="off"/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Kecamatan</label>
                                        <input class="form-control" type="text" name="kecamatan" placeholder="Nama Kecamatan" autocomplete="off"/>
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
                                        <input class="form-control" name="hasil_test" type="text" placeholder="Hasil Test Meter..." autocomplete="off"/>
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
                                            $no=1;
                                            $sql =  "SELECT * FROM kelompok";
                                            $res = $pdo->prepare($sql);
                                            $res->execute();
                                            while($kelompok = $res->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                                <option value="<?php echo $kelompok['id']; ?>">
                                                <?php echo $no++; ?>. <?php echo $kelompok['kd_kelompok'] ?> - <?php echo $kelompok['nm_kelompok']; ?>
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
                                    <div class="form-group col-md-12">
                                        <?php
                                            if(isset($error)){
                                                echo "<p class='alert alert-danger'>{$error}</p>";
                                            }
                                        ?>
                                        <label>Foto Rumah Pelanggan</label>
                                        <input type="file" class="form-control" name="foto_rumah" accept="image/*">
                                        <p>*Max size 2 MB</p>
                                    </div>
                                </div>
                                <div align="center">
                                    <button class="btn btn-primary mr-2 my-1" type="submit" name="submit">Simpan</button>
                                    <a href="pelanggan.php" class="btn btn-secondary">Kembali</a>
                                </div>
                            </form>
                        </div> <!--cardbody-->
                    </div>
                </div>
                <!--End Table-->
            </main>
        </div>
<?php require_once("includes/foot.php"); ?>