<?php
    $current_page = "Upload Data Pelanggan";
?>

<?php
    require_once("includes/head.php");
    require_once("includes/top-nav.php");
?>
        <!--Content Container-->
        <div id="layoutSidenav_content">
                <main>
                    <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
                        <div class="container-fluid">
                            <div class="page-header-content d-flex align-items-center justify-content-between text-white">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i class="fas fa-user-tag"></i></div>
                                    <span>Daftar Pelanggan</span>
                                </h1>
                                <a href="index.php" title="Beranda" class="btn btn-white">
                                    <div class="page-header-icon"><i class="fas fa-tachometer-alt"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--Table-->
                    <div class="container-fluid mt-n10">

                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="datatable table-responsive">
                                <form method="post" enctype="multipart/form-data" action="upload_aksi.php">
                                    <div class="form-group col-md-12">
                                        <label>Upload Data Pelanggan</label>
                                        <input type="file" class="form-control" name="upload"><br>
                                        <input name="import" type="submit" value="Import" class="btn btn-secondary">
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </main>
            </div>
<?php require_once("includes/foot.php"); ?>