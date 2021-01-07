<?php
    $current_page = "Beranda";
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
                        <div class="page-header-content my-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i class="fas fa-tachometer-alt"></i></div>
                                <span>Beranda</span>
                            </h1>
                        </div>
                    </div>
                </div>

                <!--Table-->
                <div class="container-fluid mt-n10">

                <!--Card Primary-->
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <p>Pelanggan</p>
                                <p>32</p>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="pelanggan.php">Lihat Detail</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <p>Petugas</p>
                                <p>32</p>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="petugas.php">Lihat Detail</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <p>Transaksi</p>
                                <p>32</p>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="transaksi.php">Lihat Detail</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <p>Validasi</p>
                                <p>32</p>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="./validasi-id">Lihat Detail</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Card Primary-->

                    <div class="card mb-4">
                        <div class="card-header">Most Popular Posts:</div>
                        <div class="card-body">
                            <div class="datatable table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Post Title</th>
                                            <th>Post Category</th>
                                            <th>Total Views</th>
                                            <th>Photo</th>
                                            <th>Author</th>
                                            <th>Posted On</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <a href="#">
                                                    I Love You!
                                                </a>
                                            </td>
                                            <td>Love</td>
                                            <td>61</td>
                                            <td>Photo</td>
                                            <td>MD. A. Barik</td>
                                            <td>17 Nov 20</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>
                                                <a href="#">
                                                    I Love You!
                                                </a>
                                            </td>
                                            <td>Love</td>
                                            <td>61</td>
                                            <td>Photo</td>
                                            <td>MD. A. Barik</td>
                                            <td>17 Nov 20</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>
                                                <a href="#">
                                                    I Love You!
                                                </a>
                                            </td>
                                            <td>Love</td>
                                            <td>61</td>
                                            <td>Photo</td>
                                            <td>MD. A. Barik</td>
                                            <td>17 Nov 20</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Table-->

            </main>
        </div>
<?php require_once("includes/foot.php"); ?>

