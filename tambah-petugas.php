<?php
    $current_page = "Tambah Petugas";
?>
<?php
    require_once("includes/head.php");
    require_once("includes/top-nav.php");
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
                                $no_petugas = trim($_POST['no_petugas']);
                                $no_petugas_lama = trim($_POST['no_petugas_lama']);
                                $nm_petugas = trim($_POST['nm_petugas']);
                                $no_hp = trim($_POST['no_hp']);
                                $username = trim($_POST['username']); 
                                $password = trim($_POST['password']);
                                $role = trim($_POST['role']);

                                $check = "SELECT * FROM petugas WHERE no_petugas = :no_petugas";
                                $res = $pdo->prepare($check);
                                $res->execute([
                                    ':no_petugas' => $no_petugas
                                ]);
                                $countName = $res->rowCount();
                                if($countName != 0){
                                    $error_name = "Petugas Ini Sudah Ada";
                                }
                                $hash = password_hash($password, PASSWORD_BCRYPT, ['cost'=>10]);
                                $sql = "INSERT INTO petugas(no_petugas,no_petugas_lama,nm_petugas,no_hp,username,password,role) 
                                VALUES(:no_petugas,:no_petugas_lama,:nm_petugas,:no_hp,:username,:password,:role)";
                                $res = $pdo->prepare($sql);
                                $res->execute([
                                    ':no_petugas' => $no_petugas,
                                    ':no_petugas_lama' => $no_petugas_lama,
                                    ':nm_petugas' => $nm_petugas,
                                    ':no_hp' => $no_hp,
                                    ':username' => $username,
                                    ':password' => $hash,
                                    ':role' => $role
                                ]);
                                $success = "Petugas Berhasil Ditambah";
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
                                            name="no_petugas" maxlength="6" onkeypress="return hanyaAngka(event)" autocomplete="off" required/>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="post-title">Nomor Lama</label>
                                            <input class="form-control" type="text" placeholder="Nomor Lama Petugas..."
                                            name="no_petugas_lama" maxlength="6" onkeypress="return hanyaAngka(event)" autocomplete="off" required/>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="post-title">Nama Lengkap</label>
                                            <input class="form-control" type="text" placeholder="Nama Lengkap Petugas..."
                                            name="nm_petugas" autocomplete="off" required/>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="post-title">Nomor Hp</label>
                                            <input class="form-control" type="text" placeholder="Nomor HP Petugas..."
                                            name="no_hp" maxlength="12" onkeypress="return hanyaAngka(event)" autocomplete="off" required/>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="post-title">Username</label>
                                            <input class="form-control" type="text" placeholder="Username..."
                                            name="username" autocomplete="off" required/>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="post-title">Password</label>
                                            <input class="form-control" type="password" placeholder="Password..."
                                            name="password" required/>
                                        </div>                                        
                                        <div class="form-group col-md-4">
                                            <label>Pilih Hak Akses</label>
                                            <select name="role" class="form-control">
                                                <option value="Admin">Admin</option>
                                                <option value="Petugas Lapangan">Petugas Lapangan</option>
                                            </select>
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
