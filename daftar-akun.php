<?php require_once('includes/db.php') ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>SIGN UP || Admin Panel</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="js/all.min.js"></script>
        <script src="js/feather.min.js"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <?php
                        if(isset($_POST['submit'])){
                            $username = trim($_POST['username']);
                            $check = "SELECT * FROM petugas WHERE username = :username";
                            $res = $pdo->prepare($check);
                            $res->execute([
                                ':username' => $username
                            ]);
                            $countUsername = $res->rowCount();
                            if($countUsername != 0){
                                $error_username = "Username Sudah Ada";
                            }
                            $nm_petugas = trim($_POST['nm_petugas']);
                            $password = trim($_POST['password']);
                            $confirm = trim($_POST['confirm']);
                            if($password != $confirm){
                                $error = "Kata Kunci Tidak Sesuai";
                            }else{
                                $hash = password_hash($password, PASSWORD_BCRYPT, ['cost'=>10]);
                                $sql = "INSERT INTO petugas(username, nm_petugas, password, role) VALUES(:username, :nm_petugas, :password, :role)";
                                $res = $pdo->prepare($sql);
                                $res->execute([
                                    ':username' => $username,
                                    ':nm_petugas' => $nm_petugas,
                                    ':password' => $hash,
                                    ':role' => 'Petugas'
                                ]);
                                $success = "Akun Berhasil Dibuat";
                            }
                        }
                    ?>

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header justify-content-center"><h3 class="font-weight-light my-4">Buat Akun</h3></div>
                                    <div class="card-body">
                                        <?php
                                            if(isset($error_username)){
                                                echo "<p class='alert alert-danger'>{$error_username}</p>";
                                            }else if(isset($error)){
                                                echo "<p class='alert alert-danger'>{$error}</p>";
                                            }else if(isset($success)){
                                                echo "<p class='alert alert-success'>{$success}</p>";
                                            }
                                        ?>
                                        <form action="" method="POST">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputUsername">Nama Pengguna</label>
                                                        <input class="form-control py-4" id="inputUsername" type="text" name="username" placeholder="Masukan Nama Pengguna" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputName">Nama Lengkap</label>
                                                        <input class="form-control py-4" id="inputName" name="nm_petugas" type="text" placeholder="Masukan Nama Lengkap" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputPassword">Kata Sandi</label>
                                                        <input class="form-control py-4" id="inputPassword" name="password" type="password" placeholder="Masukan Kata Sandi" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputConfirmPassword">Konfirmasi Kata Sandi</label>
                                                        <input class="form-control py-4" id="inputConfirmPassword" name="confirm" type="password" placeholder="Konfirmasi Kata Sandi" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0">
                                                <button name="submit" class="btn btn-primary btn-block" type="submit">Buat Akun</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>

        <!--Script JS-->
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
