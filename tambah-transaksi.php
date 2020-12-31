<?php
    $current_page = "Tambah Transaksi";
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

        $pelanggan_id = $_POST['pelanggan_id'];
        $periode = $_POST['periode'];
        $tgl_catat = $_POST['tgl_catat'];
        $waktu = $_POST['waktu'];
        $m3_kini = $_POST['m3_kini'];
        $m3_lalu = $_POST['m3_lalu'];
        $kubikasi = $_POST['kubikasi'];
        $jml_tagihan = $_POST['jml_tagihan'];
        $tgl_bayar = $_POST['tgl_bayar'];


        $foto_meteran = $_FILES['foto_meteran']['name'];
        $foto_meteran_tmp = $_FILES['foto_meteran']['tmp_name'];
        $foto_meteran_size = $_FILES['foto_meteran']['size'];
        $foto_meteran_ext=explode('.',$foto_meteran);
        $foto_meteran_ext=strtolower(end($foto_meteran_ext));

        if ($foto_meteran_ext=='jpg' || $foto_meteran_ext=='jpeg' || $foto_meteran_ext=='png' && $foto_meteran_size > 2097152) {

            move_uploaded_file("{$foto_meteran_tmp}","foto_rumah/{$foto_meteran}");
            $sql = "INSERT INTO transaksi(pelanggan_id,periode,tgl_catat,waktu,m3_kini,m3_lalu,kubikasi,jml_tagihan,tgl_bayar,foto_meteran)
            VALUES(:pelanggan_id,:periode,:tgl_catat,:waktu,:m3_kini,:m3_lalu,:kubikasi,:jml_tagihan,:tgl_bayar,:foto_meteran)";
            $res = $pdo->prepare($sql);
            $res->execute([
                ':pelanggan_id' => $pelanggan_id,
                ':periode' => $periode,
                ':tgl_catat' => $tgl_catat,
                ':waktu' => $waktu,
                ':m3_kini' => $m3_kini,
                ':m3_lalu' => $m3_lalu,
                ':kubikasi' => $kubikasi,
                ':jml_tagihan' => $jml_tagihan,
                ':tgl_bayar' => $tgl_bayar,
                ':foto_meteran' => $foto_meteran
            ]);
            header("Location: transaksi.php");

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
                                <span>Tambah Transaksi</span>
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
                                        <label>Nama Pelanggan</label>
                                            <select class="form-control" name="pelanggan_id">
                                                <option disabled selected>Nama Pelanggan</option>
                                                    <?php
                                                        $sql =  "SELECT * FROM pelanggan";
                                                        $res = $pdo->prepare($sql);
                                                        $res->execute();
                                                        while($pelanggan = $res->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                <option value="<?php echo $pelanggan['id']; ?>">
                                                    <?php echo $pelanggan['nm_pelanggan']; ?>
                                                </option>
                                            <?php } ?>
                                            </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="post-title">Periode</label>
                                        <input class="form-control" type="text" placeholder="Periode"
                                        name="periode" onkeypress="return hanyaAngka(event)" autocomplete="off" required/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="post-title">Tanggal Catat</label>
                                        <input class="form-control" type="date" placeholder="Tanggal Catat"
                                        name="tgl_catat" autocomplete="off" required/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="post-title">Waktu Catat</label>
                                        <input class="form-control" type="time" placeholder="Waktu Catat"
                                        name="waktu" autocomplete="off" required/>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>M3 Kini</label>
                                        <input class="form-control" type="text" name="m3_kini" id="m3_kini" placeholder="M3 Kini" autocomplete="off" onkeyup="sum();" />
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>M3 Lalu</label>
                                        <input class="form-control" type="text" name="m3_lalu" id="m3_lalu" placeholder="M3 Lalu" autocomplete="off" onkeyup="sum();" />
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Kubikasi</label>
                                        <input class="form-control" type="text" name="kubikasi" id="kubikasi" placeholder="kubikasi" autocomplete="off" readonly/>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Jumlah Tagihan</label>
                                        <input class="form-control" name="jml_tagihan" type="text" placeholder="Jumlah Tagihan" autocomplete="off"/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Tanggal Bayar</label>
                                        <input class="form-control" type="date" name="tgl_bayar"
                                        title="Tanggal Bayar Ditetapkan" />
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <?php
                                            if(isset($error)){
                                                echo "<p class='alert alert-danger'>{$error}</p>";
                                            }
                                        ?>
                                        <label>Foto Meteran Pelanggan</label>
                                        <input type="file" class="form-control" name="foto_meteran" accept="image/*">
                                        <p>*Max size 2 MB</p>
                                    </div>
                                </div>
                                <div align="center">
                                    <button class="btn btn-primary mr-2 my-1" type="submit" name="submit">Simpan</button>
                                    <a href="transaksi.php" class="btn btn-secondary">Kembali</a>
                                </div>
                            </form>
                        </div> <!--cardbody-->
                    </div>
                </div>
                <!--End Table-->
            </main>
        </div>
<?php require_once("includes/foot.php"); ?>

<!-- penjumlahan m3 -->
<script>
function sum() {
      var txtFirstNumberValue = document.getElementById('m3_kini').value;
      var txtSecondNumberValue = document.getElementById('m3_lalu').value;
      var result = parseFloat(txtFirstNumberValue) - parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('kubikasi').value = result;
      }
}
</script>
<!-- penjumlahan m3 -->