<?php
require "../function.php";
$kategori = query("SELECT * FROM tb_kategori");
$lokasi = query("SELECT * FROM tb_lokasi");
if ( isset($_POST["submit"]) ) {
  if ( add_aset($_POST) > 0 ) {
    echo "
            <script>
            alert('Data Berhasil Di Tambahkan!');
            document.location.href = 'aset.php';
            </script>
            "
        ;
  } else {
    echo "
        <script>
            alert('Data Gagal Di Tambahkan!');
            document.location.href = 'add-aset.php';
        </script>
        "
    ;
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>PT. ISTEM</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet" />
  </head>

  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
          <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
          </div>
          <div class="sidebar-brand-text mx-3">PT. ISTEM</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider" />

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Master</span>
          </a>
          <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="../master/kategori/kategori-barang.php">Kategori Barang</a>
              <a class="collapse-item" href="../master/lokasi/lokasi-barang.php">Lokasi Barang</a>
              <a class="collapse-item" href="../user.php">User</a>
            </div>
          </li>
          
          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block" />
          
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAset" aria-expanded="true" aria-controls="collapseAset">
              <i class="fas fa-fw fa-folder"></i>
              <span>Data Aset</span>
            </a>
            <div id="collapseAset" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="aset.php">Aset</a>
              <a class="collapse-item" href="../penyusutan/penyusutan.php">Penyusutan</a>
          </div>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block" />

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
      </ul>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
              <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
              <!-- Nav Item - Search Dropdown (Visible Only XS) -->
              <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                  <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                      <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                          <i class="fas fa-search fa-sm"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </li>

              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                  <img class="img-profile rounded-circle" src="img/undraw_profile.svg" />
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>
                </div>
              </li>
            </ul>
          </nav>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <div class="mb-0 text-gray-800">
                <div class="card">
                  <div class="card-header">
                    <h3>Input Data Aset</h3>
                  </div>
                  <div class="card-body">
                    <form action="" method="POST">
                      <table class="table" width="25%" border="0">
                          <tr>
                              <td>Nama Aset</td>
                              <td><input class="form-control" type="text" name="nama_aset"></td>
                          </tr>
                          <tr>
                              <td>Keterangan</td>
                              <td><input class="form-control" type="text" cols="6" name="keterangan"></td>
                          </tr>
                          <tr>
                            <td>Nama Kategori</td>
                            <td>
                              <select name="id_kategori" id="id_kategori">
                                <?php foreach ($kategori as $br) :?>
                                  <option value="<?php echo $br["id_kategori"]; ?>"><?php echo $br["kategori_barang"]; ?></option>
                                <?php endforeach; ?>
                              </select>
                            </td>
                          </tr>
                          <tr>
                              <td>Jumlah Aset</td>
                              <td><input class="form-control" type="text" name="jumlah_aset"></td>
                          </tr>
                          <tr>
                              <td>Lokasi Aset</td>
                              <td>
                                <select name="id_lokasi" id="id_lokasi">
                                  <?php foreach ($lokasi as $br) :?>
                                    <option value="<?php echo $br["id_lokasi"]; ?>"><?php echo $br["nama_lokasi"]; ?></option>
                                  <?php endforeach; ?>
                                </select>
                            </td>
                          </tr>
                          <tr>
                              <td>Tanggal Perolehan</td>
                              <td><input class="form-control" type="date" name="tgl_peroleh"></td>
                          </tr>

                          <tr>
                              <td>Masa Manfaat</td>
                              <td><input class="form-control" type="text" name="masa_manfaat"></td>
                          </tr>
                          <tr>
                              <td>Harga Perolehan</td>
                              <td><input class="form-control" type="text" name="harga_peroleh" ></td>
                          </tr>
                          <tr>
                              <td>Status Aset</td>
                              <td>
                                <select name="status_aset" id="status_aset">
                                  <option value="Aktif">Aktif</option>
                                  <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                              </td>
                          </tr>
                          <tr>
                              <td>Kondisi Aset</td>
                              <td>
                                <select name="kondisi_aset" id="kondisi_aset">
                                  <option value="Baik">Baik</option>
                                  <option value="Buruk">Buruk</option>
                                  <option value="Butuh Perawatan">Butuh Perawatan</option>
                                </select>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <button class="btn btn-primary" type="submit" name="submit">SIMPAN</button>
                              </td>
                          </tr>
                      </table>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Your Website 2020</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">??</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>
  </body>
</html>
