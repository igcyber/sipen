<?php
session_start();
require_once('includes/db.php');

if(isset($_SESSION['login']) || isset($_SESSION['role'])){
    header("Location:beranda.php");
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>SIGN IN || Admin Panel</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="js/all.min.js"></script>
        <script src="js/feather.min.js"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <?php
                                    if(isset($_POST['submit'])){
                                        $username = trim($_POST['username']);
                                        $password = trim($_POST['password']);

                                        $sql = "SELECT * FROM petugas WHERE username = :username";
                                        $stmt = $pdo->prepare($sql);
                                        $stmt->execute([
                                            ':username' => $username
                                        ]);
                                        $count = $stmt->rowCount();
                                        if($count == 0) {
                                            $error = "Salah Username";
                                        }else if($count == 1){
                                            $user = $stmt->fetch(PDO::FETCH_ASSOC);
                                            $user_password = $user['password'];
                                            $nm_petugas = $user['nm_petugas'];
                                            $username = $user['username'];
                                            $role = $user['role'];
                                            if(password_verify($password, $user_password)) {
                                                $success = "Berhasil Masuk";
                                                $_SESSION['username'] = $username;
                                                $_SESSION['nm_petugas'] = $nm_petugas;
                                                $_SESSION['role'] = $role;
                                                $_SESSION['login'] = 'success';
                                                header("Refresh:2;url=beranda.php");
                                            } else {
                                                $error_password = "Salah Password";
                                            }
                                        }
                                    }
                                ?>
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header justify-content-center"><h3 class="font-weight-light my-2">SIGN IN</h3></div>
                                    <div class="card-body">
                                        <?php
                                            if(isset($success)){
                                                echo "<p class='alert alert-success'>{$success}</p>";
                                            }
                                            if(isset($error))  {
                                                echo "<p class='alert alert-danger'>{$error}</p>";
                                            }else if(isset($error_password)){
                                                var_dump($error_password);
                                            }
                                        ?>
                                        <form action="" method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputUsername">Username</label>
                                                <input class="form-control py-4" id="inputUsername" type="text" name="username" placeholder="Enter Username" required/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword" name="password" type="password" placeholder="Enter password" required />
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button name="submit" type="submit" class="btn btn-primary btn-block">Masuk</button>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="card-footer text-center">
                                        <div class="small"><a href="forgot-password.php">Lupa Password</a></div>
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
