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
    if(isset($_POST['submit'])){
        $rek_baru=$_POST['rek_baru'];
        $rek_lama=$_POST['rek_lama'];
        $nm_pelanggan=$_POST['nm_pelanggan'];
        $id_unit=$_POST['id_unit'];
        $kelurahan=$_POST['kelurahan'];
        $kecamatan=$_POST['kecamatan'];
        $id_kelompok=$_POST['id_kelompok'];
        $status=$_POST['status'];
        $tgl_status=$_POST['tgl_status'];
        $no_petugas=$_POST['no_petugas'];
        $nm_petugas=$_POST['nm_petugas'];
        
        $image=$_FILES['foto_rumah']['name'];
        $image_tmp=$_FILES['foto_rumah']['tmp_name'];
        $image_size=$_FILES['foto_rumah']['size'];
        $image_ext=explode('.',$image);
        $image_ext=strtolower(end($image_ext));
        $image_new=uniqid().'.'.$image_ext;
        $store="foto_rumah/".$image_new;

        if ($image_ext=='jpg' || $image_ext=='jpeg' || $image_ext=='png' || $image_ext=='gif') {
            if ($image_size >= 100000000000000000000000000000) {
              $error="Error";
              echo $error;
            }
            else{
              if (move_uploaded_file($image_tmp, $store)) {
                $foto=$image_new;
                if(!isset($error))
                {
                    $insert=$pdo->prepare("INSERT INTO 
                    pelanggan(rek_baru,rek_lama,nm_pelanggan,id_unit,kelurahan,kecamatan,id_kelompok,status,tgl_status,no_petugas,nm_petugas,foto_rumah)
                    VALUES(:rek_baru,:rek_lama,:nm_pelanggan,:id_unit,:kelurahan,:kecamatan,:id_kelompok,:status,:tgl_status,:no_petugas,:nm_petugas,:foto_rumah)");

                        $insert->bindParam(':rek_baru',$rek_baru);
                        $insert->bindParam(':rek_lama',$rek_lama);
                        $insert->bindParam(':nm_pelanggan',$nm_pelanggan);
                        $insert->bindParam(':id_unit',$id_unit);
                        $insert->bindParam(':kelurahan',$kelurahan);
                        $insert->bindParam(':kecamatan',$kecamatan);
                        $insert->bindParam(':id_kelompok',$id_kelompok);
                        $insert->bindParam(':status',$status);
                        $insert->bindParam(':tgl_status',$tgl_status);
                        $insert->bindParam(':no_petugas',$no_petugas);
                        $insert->bindParam(':nm_petugas',$nm_petugas);
                        $insert->bindParam(':foto_rumah',$foto_rumah);
                        $insert->execute();
                }
                }
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
                                <form action="" method ="POST" >
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="post-title">Nomor Rekening Baru</label>
                                            <input class="form-control" type="text" placeholder="Nomor Rekening Baru..."
                                            name="rek_baru" onkeypress="return hanyaAngka(event)" required/>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="post-title">Nomor Rekening Lama</label>
                                            <input class="form-control" type="text" placeholder="Nomor Rekening Lama..."
                                            name="rek_lama" onkeypress="return hanyaAngka(event)" required/>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="post-title">Nama Lengkap Pelanggan</label>
                                            <input class="form-control" type="text" placeholder="Nama Lengkap..."
                                            name="nm_pelanggan" required/>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Unit Pelayanan</label>
                                            <select class="form-control" name="id_unit">
                                            <option disabled selected>Pilih Wilayah</option>
                                                <?php 
                                                $select=$pdo->prepare("SELECT * FROM unit");
                                                $select->execute();
                                                while($row=$select->fetch(PDO::FETCH_ASSOC)){

                                                    extract($row)
                                                ?>
                                                
                                                <option>
                                                <?php echo $row['nm_wilayah'] ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="post-content">Alamat Lengkap Pelanggan</label>
                                        <textarea class="form-control" placeholder="Alamat Lengkap..." rows="9"></textarea>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                                <label>Nama Petugas</label>
                                                <select name="nm_petugas" id="nm_petugas" class="form-control" onchange='changeValue(this.value)'>
                                                <option disabled selected>Pilih Petugas</option>
                                                    <?php
                                                        $select=$pdo->prepare("SELECT * FROM petugas");
                                                        $select->execute();
                                                        $jsArray = "var prdName = new Array();\n";
                                                        while($row=$select->fetch(PDO::FETCH_ASSOC)){
                                                                echo '<option name="nm_petugas"  value="' . $row['nm_petugas'] . '">' . $row['nm_petugas'] . '</option>';  
                                                                $jsArray .= "prdName['" . $row['nm_petugas'] . "'] = {no_petugas:'" . addslashes($row['no_petugas']) . "'};\n";
                                                                 }
                                                    ?>
                                                </select>
                                            </div>
                                        <div class="form-group col-md-6">
                                            <label>Nomor Petugas</label>
                                            <input class="form-control" type="text" name="no_petugas" id="no_petugas" placeholder="otomatis..." readonly/>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Kelurahan</label>
                                            <input class="form-control" type="text" name="kelurahan" placeholder="Nama Kelurahan..." />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Kecamatan</label>
                                            <input class="form-control" type="text" name="kecamatan" placeholder="Nama Kecamatan..." />
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Kelompok</label>
                                            <select name="id_kelompok" class="form-control">
                                            <option disabled selected>Pilih Kelompok</option>
                                                <?php
                                                    $select=$pdo->prepare("SELECT * FROM kelompok");
                                                    $select->execute();
                                                    while($row=$select->fetch(PDO::FETCH_ASSOC)){
                                                        extract($row)
                                                ?>
                                            <option><?php echo $row['nm_kelompok']?></option>
                                            <?php }?>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option disabled selected>Pilih Status</option>
                                                <option value="aktif">Aktif</option>
                                                <option value="tidakaktif">Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Tanggal Status</label>
                                            <input class="form-control" type="date" name="tgl_status" placeholder="Tanggal Status..." />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Hasil Test Meteran</label>
                                            <input class="form-control" type="text" placeholder="Hasil Test Meter..." />
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Tanggal Hasil Test</label>
                                            <input class="form-control" type="date" placeholder="Tanggal Status..." />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Foto Rumah Pelanggan</label>
                                            <input type="file" class="form-control" name="foto_rumah">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info" name="submit">SIMPAN</button>
                                    <!-- <button class="btn btn-primary mr-2 my-1" type="button" name="submit">Simpan</button> -->
                                    <a href="pelanggan.php" class="btn btn-secondary">Kembali</a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--End Table-->
                </main>
            </div>
<?php require_once("includes/foot.php"); ?>

<script type="text/javascript"> 
<?php echo $jsArray; ?>
function changeValue(id){
    document.getElementById('no_petugas').value = prdName[id].no_petugas;
};
</script>