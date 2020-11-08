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
                                    <div class="page-header-icon"><i class="far fa-building"></i></div>
                                    <span>Tambah Unit</span>
                                </h1>
                            </div>
                        </div>
                    </div>
                        <?php
                            if(isset($_POST['submit'])){
                                $nm_wilayah = trim($_POST['nm_wilayah']);
                                $check = "SELECT * FROM unit WHERE nm_wilayah = :nm_wilayah";
                                $res = $pdo->prepare($check);
                                $res->execute([
                                    ':nm_wilayah' => $nm_wilayah
                                ]);
                                $countName = $res->rowCount();
                                if($countName != 0){
                                    $error_name = "Wilayah Ini Sudah Ada";
                                }
                                $sql = "INSERT INTO unit(nm_wilayah) VALUES(:nm_wilayah)";
                                $res = $pdo->prepare($sql);
                                $res->execute([
                                    ':nm_wilayah' => $nm_wilayah
                                ]);
                                $success = "Wilayah Berhasil Ditambah";
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
                                        <label for="post-title">Nama Wilayah</label>
                                        <input class="form-control" type="text" placeholder="Nama Wilayah Unit..."
                                        name="nm_wilayah" required/>
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
