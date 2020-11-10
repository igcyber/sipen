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
<?php
$id=$_GET['id'];

$select=$pdo->prepare("SELECT * FROM petugas WHERE id=$id");
$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);

$no_petugas_db=$row['no_petugas'];
$no_petugas_lama_db=$row['no_petugas_lama'];
$nm_petugas_db=$row['nm_petugas'];
$no_hp_db=$row['no_hp'];
$username_db=$row['username'];
$role_db=$row['role'];

if (isset($_POST['ubah'])){
    $no_petugas=$_POST['no_petugas'];
    $no_petugas_lama=$_POST['no_petugas_lama'];
    $nm_petugas=$_POST['nm_petugas'];
    $no_hp=$_POST['no_hp'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $role=$_POST['role'];

    $hash = password_hash($password, PASSWORD_BCRYPT, ['cost'=>10]);
    $update = $pdo->prepare("UPDATE petugas SET no_petugas=:no_petugas,
                                                no_petugas_lama=:no_petugas_lama,
                                                nm_petugas=:nm_petugas,
                                                no_hp=:no_hp,
                                                username=:username,
                                                password=:password,
                                                role=:role
                            WHERE id=$id");
    $update->bindParam(':no_petugas',$no_petugas);
    $update->bindParam(':no_petugas_lama',$no_petugas_lama);
    $update->bindParam(':nm_petugas',$nm_petugas);
    $update->bindParam(':no_hp',$no_hp);
    $update->bindParam(':username',$username);
    $update->bindParam(':password',$hash);
    $update->bindParam(':role',$role);
    $update->execute();
    echo "<script>location.href='petugas.php'</script>";
}
?>
       <div id="layoutSidenav_content">

                <main>
                    <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
                        <div class="container-fluid">
                            <div class="page-header-content">
                                <h1 class="page-header-title my-2">
                                    <div class="page-header-icon"><i class="far fa-edit"></i></div>
                                    <span>Ubah Data Petugas</span>
                                </h1>
                            </div>
                        </div>
                    </div>

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
                                            <input class="form-control" type="text" value="<?php echo $no_petugas_db; ?>"
                                            name="no_petugas" maxlength="6" autocomplete="off" onkeypress="return hanyaAngka(event)" required/>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="post-title">Nomor Lama</label>
                                            <input class="form-control" type="text" value="<?php echo $no_petugas_lama_db; ?>"
                                            name="no_petugas_lama" maxlength="6" autocomplete="off" onkeypress="return hanyaAngka(event)" required/>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="post-title">Nama Lengkap</label>
                                            <input class="form-control" type="text" value="<?php echo $nm_petugas_db; ?>"
                                            name="nm_petugas" autocomplete="off" required/>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="post-title">Nomor Hp</label>
                                            <input class="form-control" type="text" value="<?php echo $no_hp_db; ?>"
                                            name="no_hp" maxlength="12" autocomplete="off" onkeypress="return hanyaAngka(event)" required/>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="post-title">Username</label>
                                            <input class="form-control" type="text" value="<?php echo $username_db?>"
                                            name="username" autocomplete="off" required/>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="post-title">Password</label>
                                            <input class="form-control" type="password" placeholder="Password Baru..."
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

                                        <button class="btn btn-primary my-2" type="submit" name="ubah">Simpan</button>
                                        <a href="petugas.php" class="btn btn-secondary">Kembali</a>

                                </form>
                            </div>
                        </div>
                    </div>
                    <!--End Table-->
                </main>
            </div>
<?php require_once("includes/foot.php"); ?>