<?php
    $current_page = "Tambah Petugas";
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
                                    <span>Tambah Petugas</span>
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
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="post-title">Nomor Baru</label>
                                            <input class="form-control" type="text" placeholder="Nomor Baru Petugas..."
                                            name="no_petugas" required/>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="post-title">Nomor Lama</label>
                                            <input class="form-control" type="text" placeholder="Nomor Lama Petugas..."
                                            name="no_petugas_lama" required/>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="post-title">Nama Lengkap</label>
                                            <input class="form-control" type="text" placeholder="Nama Lengkap Petugas..."
                                            name="nm_petugas" required/>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Pilih Hak Akses</label>
                                            <select name="role" class="form-control">
                                                <option value="Admin">Admin</option>
                                                <option value="Petugas Lapangan">Petugas Lapangan</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="post-title">Username</label>
                                            <input class="form-control" type="text" placeholder="Nama Lengkap Petugas..."
                                            name="username" required/>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="post-title">Password</label>
                                            <input class="form-control" type="password" placeholder="Nama Lengkap Petugas..."
                                            name="password" required/>
                                        </div>

                                    </div>

                                        <button class="btn btn-primary my-2" type="submit" name="submit">Simpan</button>
                                        <a href="petugas.php" class="btn btn-secondary">Kembali</a>

                                </form>
                            </div>
                        </div>
                    </div>
                    <!--End Table-->
                </main>
            </div>
<?php require_once("includes/foot.php"); ?>
