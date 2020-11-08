<?php
    $current_page = "Tambah Unit";
?>
<?php
    require_once("includes/head.php");
    require_once("includes/top-nav.php");
?>
       <div id="layoutSidenav_content">

                <main>
                    <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
                        <div class="container-fluid">
                            <div class="page-header-content">
                                <h1 class="page-header-title my-2">
                                    <div class="page-header-icon"><i class="fas fa-users"></i></div>
                                    <span>Tambah Kelompok</span>
                                </h1>
                            </div>
                        </div>
                    </div>
                        <?php
                            if(isset($_POST['submit'])){
                                $nm_kelompok = trim($_POST['nm_kelompok']);
                                $kd_kelompok = trim($_POST['kd_kelompok']);
                                $check = "SELECT * FROM kd_kelompok WHERE kd_kelompok = :kd_kelompok";
                                $res = $pdo->prepare($check);
                                $res->execute([
                                    ':kd_kelompok' => $kd_kelompok
                                ]);
                                $countName = $res->rowCount();
                                if($countName != 0){
                                    $error_name = "Kelompok Ini Sudah Ada";
                                }
                                $sql = "INSERT INTO kelompok(kd_kelompok,nm_kelompok) VALUES(:kd_kelompok, :nm_kelompok)";
                                $res = $pdo->prepare($sql);
                                $res->execute([
                                    ':kd_kelompok' => $kd_kelompok,
                                    ':nm_kelompok' => $nm_kelompok
                                ]);
                                $success = "Kelompok Berhasil Ditambah";
                            }
                        ?>

                    <!--Start Table-->
                    <div class="container-fluid mt-n10">
                        <div class="card mb-4">
                            <div class="card-header"></div>
                            <div class="card-body">

                                <?php
                                    if(isset($error_name)){
                                        echo "<p class='alert alert-danger'>{$error_name}</p>";
                                    }else if(isset($success)){
                                        echo "<p class='alert alert-success'>{$success}</p>";
                                    }
                                ?>

                                <form action="" method ="POST" >
                                    <div class="form-group col-md-6 mx-auto">
                                        <label for="post-title">Kode Kelompok</label>
                                        <input class="form-control" type="text" placeholder="Kode Kelompok Baru..."
                                        name="kd_kelompok" required/>
                                        <br>
                                        <label for="post-title">Nama Kelompok</label>
                                        <input class="form-control" type="text" placeholder="Nama Kelompok Baru..."
                                        name="nm_kelompok" required/>
                                        <button class="btn btn-primary my-2" type="submit" name="submit">Simpan</button>
                                        <a href="pelanggan.php" class="btn btn-secondary">Kembali</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--End Table-->
                </main>
            </div>
<?php require_once("includes/foot.php"); ?>
