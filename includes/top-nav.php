 <!--Top Nav-->
 <nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">
            <!-- <a class="navbar-brand d-none d-sm-block" href="beranda.php">Admin Panel Applikasi</a> -->
            <ul class="navbar-nav align-items-center ml-auto">
                <li class="nav-item dropdown no-caret mr-3 dropdown-user">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="./assets/img/mdabarik.jpg"/></a>
                    <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                        <h6 class="dropdown-header d-flex align-items-center">
                            <img class="dropdown-user-img" src="./assets/img/mdabarik.jpg" alt="Photo" />
                            <div class="dropdown-user-details">
                                <div class="dropdown-user-details-name">
                                    <?php echo $_SESSION['username']; ?>
                                </div>
                                <div class="dropdown-user-details-email">
                                    <?php echo $_SESSION['nm_petugas']; ?>
                                </div>
                            </div>
                        </h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">
                            <div class="dropdown-item-icon">
                                <i class="fas fa-sign-out-alt"></i>
                            </div>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>