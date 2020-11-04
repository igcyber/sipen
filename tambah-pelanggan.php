<?php require_once("includes/head.php"); ?>
       <?php require_once("includes/top-nav.php") ?>

       <div id="layoutSidenav_content">
                <main>
                    <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
                        <div class="container-fluid">
                            <div class="page-header-content">
                                <h1 class="page-header-title my-2">
                                    <div class="page-header-icon"><i class="fas fa-user-plus"></i></div>
                                    <span>Tambah Pelanggan</span>
                                </h1>
                            </div>
                        </div>
                    </div>

                    <!--Start Table-->
                    <div class="container-fluid mt-n10">
                        <div class="card mb-4">
                            <div class="card-header"></div>
                            <div class="card-body">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="post-title">Nomor Rekening Baru</label>
                                            <input class="form-control" type="text" placeholder="Nomor Rekening..." />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="post-title">Nomor Rekening Lama</label>
                                            <input class="form-control" type="text" placeholder="Nomor Rekening..." />
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="post-title">Nama Lengkap Pelanggan</label>
                                            <input class="form-control" type="text" placeholder="Nama Lengkap..." />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Unit Pelayanan</label>
                                            <select class="form-control">
                                                <option disabled selected>Pilih Wilayah</option>
                                                <option>Draft</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="post-content">Alamat Lengkap Pelanggan</label>
                                        <textarea class="form-control" placeholder="Alamat Lengkap..." rows="9"></textarea>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Kelurahan</label>
                                            <input class="form-control" type="text" placeholder="Nama Kelurahan..." />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Kecamatan</label>
                                            <input class="form-control" type="text" placeholder="Nama Kecamatan..." />
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Kelompok</label>
                                            <input class="form-control" type="text" placeholder="Nama Kelompok..." />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Status</label>
                                            <select class="form-control">
                                                <option disabled selected>Pilih Status</option>
                                                <option>Draft</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Tanggal Status</label>
                                            <input class="form-control" type="date" placeholder="Tanggal Status..." />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Hasil Test Meteran</label>
                                            <input class="form-control" type="text" placeholder="Hasil Test Meter..." />
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Tanggal Hasil Test</label>
                                            <input class="form-control" type="date" placeholder="Tanggal Status..." />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Foto Rumah Pelanggan</label>
                                            <input type="file" class="form-control" name="fileUpload">
                                        </div>
                                    </div>
                                    <button class="btn btn-primary mr-2 my-1" type="button">Simpan</button>
                                    <a href="pelanggan.php" class="btn btn-secondary">Kembali</a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--End Table-->
                </main>
            </div>
<?php require_once("includes/foot.php"); ?>
