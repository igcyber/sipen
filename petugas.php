<?php
    $current_page = "Petugas";
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
                                <h1 class="page-header-title my-2">
                                    <div class="page-header-icon"><i class="fas fa-user-tag"></i></div>
                                    <span>Daftar Petugas</span>
                                </h1>
                                <a href="index.php" title="Beranda" class="btn btn-white">
                                    <div class="page-header-icon"><i class="fas fa-tachometer-alt"></i></div>
                                </a>
                            </div>
                                <a href="tambah-petugas.php" title="Tambah Petugas Baru" class="btn btn-white my-2">
                                    <div class="page-header-icon"><i class="fas fa-user-plus"></i></div>
                                </a>
                        </div>
                    </div>
                    <!--Table-->
                    <div class="container-fluid mt-n10">

                        <div class="card mb-4">
                            <div class="card-header">All Pages</div>
                            <div class="card-body">
                                <div class="datatable table-responsive">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Page Title</th>
                                                <th>Page Details</th>
                                                <th>Views</th>
                                                <th>Created By</th>
                                                <th>Status</th>
                                                <th>Pilihan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <a href="#">
                                                        Lifestyle
                                                    </a>
                                                </td>
                                                <td>Details</td>
                                                <td>61</td>
                                                <td>Md. A. Barik</td>
                                                <td>
                                                    <div class="badge badge-success">Published
                                                    </div>
                                                </td>
                                                <td>
                                                    <button class="btn btn-blue btn-sm btn-icon"><i class="fas fa-pencil-alt"></i></button>
                                                    <button class="btn btn-red btn-sm btn-icon"><i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </main>
            </div>
<?php require_once("includes/foot.php"); ?>
