<?php $current_page = "Tambah Pelanggan";?>

<?php require_once("includes/head.php"); ?>
<?php require_once("includes/top-nav.php") ?>

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
    $id=$_GET['id'];
    $select=$pdo->prepare("SELECT * FROM pelanggan WHERE id=$id");
    $select->execute();
    $row=$select->fetch(PDO::FETCH_ASSOC);
    
    $rek_baru_db = $row['rek_baru'];
    $rek_lama_db = $row['rek_lama'];
    $nm_pelanggan_db = $row['nm_pelanggan'];
    $unit_id_db = $row['unit_id'];
    $alamat_db = $row['alamat'];
    $kelurahan_db = $row['kelurahan'];
    $kecamatan_db = $row['kecamatan'];
    $status_db = $row['status'];
    $tgl_status_db = $row['tgl_status'];
    $hasil_test_db = $row['hasil_test'];
    $tgl_hasil_test_db = $row['tgl_hasil_test'];
    $kelompok_id_db = $row['kelompok_id'];
    $petugas_id_db = $row['petugas_id'];
    $foto_rumah_db = $row['foto_rumah'];


    if(isset($_POST['ubah'])){

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

        if (!empty($foto_rumah)) {
            $image_tmp=$_FILES['foto_rumah']['tmp_name'];
            $image_size=$_FILES['foto_rumah']['size'];
            $image_ext=explode('.',$foto_rumah);
            $image_ext=strtolower(end($image_ext));
            $image_new=uniqid().'.'.$image_ext;
            $store="foto_rumah/".$image_new;
                
            if ($image_ext=='jpg' || $image_ext=='jpeg' || $image_ext=='png' || $image_ext=='gif') {
                if ($image_size >= 2097152) {
                $error="Error";
                echo $error;
                }
            else{
                if (move_uploaded_file($image_tmp, $store)){
                    $gambar=$image_new;
                    if (!isset($error)) {
                        $update=$pdo->prepare("UPDATE pelanggan SET rek_baru=:rek_baru,
                                                                    rek_lama=:rek_lama,
                                                                    nm_pelanggan=:nm_pelanggan,
                                                                    unit_id=:unit_id,
                                                                    alamat=:alamat,
                                                                    kelurahan=:kelurahan,
                                                                    kecamatan=:kecamatan,
                                                                    status=:status,
                                                                    tgl_status=:tgl_status,
                                                                    hasil_test=:hasil_test,
                                                                    tgl_hasil_test=:tgl_hasil_test,
                                                                    kelompok_id=:kelompok_id,
                                                                    petugas_id=:petugas_id,
                                                                    foto_rumah=:foto_rumah 
                        WHERE id=$id");
                        $update->bindParam('rek_baru',$rek_baru);
                        $update->bindParam('rek_lama',$rek_lama);
                        $update->bindParam('nm_pelanggan',$nm_pelanggan);
                        $update->bindParam('unit_id',$unit_id);
                        $update->bindParam('alamat',$alamat);
                        $update->bindParam('kelurahan',$kelurahan);
                        $update->bindParam('kecamatan',$kecamatan);
                        $update->bindParam('status',$status);
                        $update->bindParam('tgl_status',$tgl_status);
                        $update->bindParam('hasil_test',$hasil_test);
                        $update->bindParam('tgl_hasil_test',$tgl_hasil_test);
                        $update->bindParam('kelompok_id',$kelompok_id);
                        $update->bindParam('petugas_id',$petugas_id);                  
                        $update->bindParam('foto_rumah',$image_new);
                        $update->execute();
                        echo "<script>location.href='pelanggan.php'</script>";
                      }
            }}
          }
        }else{
            $image_new = $foto_rumah_db ;
            if (!isset($error)) {
              $update=$pdo->prepare("UPDATE pelanggan SET rek_baru=:rek_baru,
                                                            rek_lama=:rek_lama,
                                                            nm_pelanggan=:nm_pelanggan,
                                                            unit_id=:unit_id,
                                                            alamat=:alamat,
                                                            kelurahan=:kelurahan,
                                                            kecamatan=:kecamatan,
                                                            status=:status,
                                                            tgl_status=:tgl_status,
                                                            hasil_test=:hasil_test,
                                                            tgl_hasil_test=:tgl_hasil_test,
                                                            kelompok_id=:kelompok_id,
                                                            petugas_id=:petugas_id,
                                                            foto_rumah=:foto_rumah 
                        WHERE id=$id");
                        $update->bindParam('rek_baru',$rek_baru);
                        $update->bindParam('rek_lama',$rek_lama);
                        $update->bindParam('nm_pelanggan',$nm_pelanggan);
                        $update->bindParam('unit_id',$unit_id);
                        $update->bindParam('alamat',$alamat);
                        $update->bindParam('kelurahan',$kelurahan);
                        $update->bindParam('kecamatan',$kecamatan);
                        $update->bindParam('status',$status);
                        $update->bindParam('tgl_status',$tgl_status);
                        $update->bindParam('hasil_test',$hasil_test);
                        $update->bindParam('tgl_hasil_test',$tgl_hasil_test);
                        $update->bindParam('kelompok_id',$kelompok_id);
                        $update->bindParam('petugas_id',$petugas_id);                  
                        $update->bindParam('foto_rumah',$image_new);
                        $update->execute();
                        echo "<script>location.href='pelanggan.php'</script>";
            }
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
                                        name="rek_baru" onkeypress="return hanyaAngka(event)" autocomplete="off" value="<?php echo $rek_baru_db?>" required/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="post-title">Nomor Rekening Lama</label>
                                        <input class="form-control" type="text" placeholder="Nomor Rekening Lama Pelanggan"
                                        name="rek_lama" onkeypress="return hanyaAngka(event)" autocomplete="off" value="<?php echo $rek_lama_db?>" required/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="post-title">Nama Lengkap Pelanggan</label>
                                        <input class="form-control" type="text" placeholder="Nama Lengkap Pelanggan Sesuai KTP"
                                        name="nm_pelanggan" autocomplete="off" value="<?php echo $nm_pelanggan_db?>" required/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Unit Pelayanan</label>
                                        <select class="form-control" name="unit_id">
                                            <option disabled selected>Pilih Wilayah</option>
                                        <?php
                                            $select=$pdo->prepare("SELECT * FROM unit");
                                            $select->execute();
                                            while($row = $select->fetch(PDO::FETCH_ASSOC)) {
                                                extract($row); 
                                        ?>
                                            <option value="<?php if ($row['id']==$unit_id_db) {?> selected="selected" <?php }?>">
                                                <?php echo $row['nm_wilayah']; ?>
                                            </option>
                                        <?php
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="post-content">Alamat Lengkap</label>
                                    <textarea class="form-control" name="alamat" placeholder="Alamat Lengkap Pelanggan Sesuai KTP" rows="9" autocomplete="off"><?php echo $alamat_db?></textarea>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Kelurahan</label>
                                        <input class="form-control" type="text" name="kelurahan" placeholder="Nama Kelurahan" autocomplete="off" value="<?php echo $kelurahan_db?>"/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Kecamatan</label>
                                        <input class="form-control" type="text" name="kecamatan" placeholder="Nama Kecamatan" autocomplete="off" value="<?php echo $kecamatan_db?>"/>
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
                                        <input class="form-control" type="date" name="tgl_status" title="Tanggal Status Ditetapkan" value="<?php echo $tgl_status_db?>"/>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Hasil Test Meteran</label>
                                        <input class="form-control" name="hasil_test" type="text" placeholder="Hasil Test Meter..." autocomplete="off" value="<?php echo $hasil_test_db?>"/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Tanggal Hasil Test</label>
                                        <input class="form-control" type="date" name="tgl_hasil_test"
                                        title="Tanggal Hasil Test Ditetapkan" value="<?php echo $tgl_hasil_test_db?>"/>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Kelompok</label>
                                        <select class="form-control" name="kelompok_id">
                                            <option disabled selected>Pilih Kelompok</option>
                                        <?php
                                            $sql =  "SELECT * FROM kelompok";
                                            $res = $pdo->prepare($sql);
                                            $res->execute();
                                            while($kelompok = $res->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <option value="<?php if ($kelompok['id']==$kelompok_id_db) {?> selected="selected" <?php }?>">
                                                <?php echo $kelompok['kd_kelompok'] ?> - <?php echo $kelompok['nm_kelompok']; ?>
                                            </option>
                                        <?php
                                            }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Petugas Lapangan</label> <span class="text-muted small">Pastikan Petugas Lapangan Ada</span>
                                        <select class="form-control" name="petugas_id">
                                            <option disabled selected>Pilih petugas</option>
                                        <?php
                                            $sql =  "SELECT * FROM petugas";
                                            $res = $pdo->prepare($sql);
                                            $res->execute();
                                            while($petugas = $res->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <option value="<?php if ($petugas['id']==$petugas_id_db) {?> selected="selected" <?php }?>">
                                                <?php echo $petugas['no_petugas'] ?> - <?php echo $petugas['nm_petugas']; ?>
                                            </option>
                                        <?php
                                            }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Foto Rumah Pelanggan</label>
                                        <img src="foto_rumah/<?php echo $foto_rumah_db ?>" style="width: 200px; height: 200px;">
                                        <input type="file" class="form-control" name="foto_rumah" accept="image/*">
                                        <p>*Max size 2 MB</p>
                                    </div>
                                </div>
                                <button class="btn btn-primary mr-2 my-1" type="submit" name="ubah">Simpan</button>
                                <a href="pelanggan.php" class="btn btn-secondary">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
                <!--End Table-->
            </main>
        </div>
<?php require_once("includes/foot.php"); ?>