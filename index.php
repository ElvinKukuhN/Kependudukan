<?php
ini_set('display_errors', 1);
error_reporting(-1);
// kelas Koneksi DATABASE
class database
{
  //properti yang dibuthkan
  private $dbhost;
  private $dbuser;
  private $dbpass;
  private $dbname;
  //construc
  function __construct($a, $b, $c, $d)
  {
    $this->dbhost = $a;
    $this->dbuser = $b;
    $this->dbpass = $c;
    $this->dbname = $d;
  }
  //method koneksi mysql db
  function conn_mysql()
  {
    $konek_db = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
    return  $konek_db;
  }
}


class penduduk
{
  // Properties
  public $nama;
  public $nik;
  public $alamat;
  public $jenis;
  public $umur;
  public $status;
  public $pekerjaan;
  public $kewarganegaraan;
  public $tempatlahir;
  public $tanggallahir;
  public $golongandarah;

  //Method setting propertis
  function set_all_data($nama, $nik, $alamat, $jenis, $umur, $status, $pekerjaan, $kewarganegaraan, $tempatlahir, $tanggallahir, $golongandarah)
  {
    $this->nama = $nama;
    $this->nik = $nik;
    $this->alamat = $alamat;
    $this->jenis = $jenis;
    $this->umur = $umur;
    $this->status = $status;
    $this->pekerjaan = $pekerjaan;
    $this->kewarganegaraan = $kewarganegaraan;
    $this->tempatlahir = $tempatlahir;
    $this->tanggallahir = $tanggallahir;
    $this->golongandarah = $golongandarah;
  }

  //Method ambil data propertis
  function get_nama()
  {
    return $this->nama;
  }

  function get_nik()
  {
    return $this->nik;
  }

  function get_alamat()
  {
    return $this->alamat;
  }

  function get_jenis()
  {
    return $this->jenis;
  }

  function get_umur()
  {
    return $this->umur;
  }
  function get_status()
  {
    return $this->status;
  }
  function get_pekerjaan()
  {
    return $this->pekerjaan;
  }
  function get_kewarganegaraan()
  {
    return $this->kewarganegaraan;
  }
  function get_tempatlahir()
  {
    return $this->tempatlahir;
  }
  function get_tanggallahir()
  {
    return $this->tanggallahir;
  }
  function get_golongandarah()
  {
    return $this->golongandarah;
  }

  // Tambah Penduduk
  function tambahpenduduk($koneksi, $nama, $nik, $alamat, $jenis, $umur, $status, $pekerjaan, $kewarganegaraan, $tempatlahir, $tanggallahir, $golongandarah)
  {

    $tambahdata = "INSERT INTO tbl_penduduk (nama,nik,alamat,kelamin,umur,status,pekerjaan,kewarganegaraan,tempatlahir,tanggallahir,golongandarah) VALUES ('$nama','$nik','$alamat','$jenis','$umur','$status','$pekerjaan','$kewarganegaraan','$tempatlahir','$tanggallahir','$golongandarah')";
    $proses_tambah = mysqli_query($koneksi, $tambahdata);
    //if ($proses_tambah) echo "Data Berhasil Ditambah";
    //else echo "Data Gagal Ditambah";
  }

  function ambildata_penduduk($koneksi)
  {
    $data_penduduk = "select * from tbl_penduduk";
    $proses_ambil = mysqli_query($koneksi, $data_penduduk);
    return  $proses_ambil;
  }

  function hapus_data($koneksi, $id)
  {
    $hapus = "DELETE FROM tbl_penduduk WHERE id_penduduk = '$id'";
    $proses_hapus = mysqli_query($koneksi, $hapus);
    return "Berhasil";
  }

  function update_data($koneksi, $id)
  {
    $update = "UPDATE FROM tbl_penduduk WHERE id_penduduk = '$id'";
    $proses_update = mysqli_query($koneksi, $update);
    return "Berhasil";
  }
}
// Koneksi
// Konfigurasi DB
// Parameter Data MYSQL
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'kependudukan';
// Instantitasi dan setting obyek
$db = new database($host, $user, $pass, $db);
// Koneksi DB
$koneksi = $db->conn_mysql();

// Post Data
if (isset($_POST['submit'])) {

  if ($_POST['nama'] != '' and $_POST['nik'] != '' and $_POST['alamat'] != ''  and $_POST['jenis'] != ''  and $_POST['umur'] != '' and $_POST['status'] != '' and $_POST['pekerjaan'] != '' and $_POST['kewarganegaraan'] != '' and $_POST['tempatlahir'] != '' and $_POST['tanggallahir'] != '' and $_POST['golongandarah'] != '') {
    $post_nama = $_POST['nama'];
    $post_nik = $_POST['nik'];
    $post_alamat = $_POST['alamat'];
    $post_jenis = $_POST['jenis'];
    $post_umur = $_POST['umur'];
    $post_status = $_POST['status'];
    $post_pekerjaan = $_POST['pekerjaan'];
    $post_kewarganegaraan = $_POST['kewarganegaraan'];
    $post_tempatlahir = $_POST['tempatlahir'];
    $post_tanggallahir = $_POST['tanggallahir'];
    $post_golongandarah = $_POST['golongandarah'];


    $penduduk_post = new penduduk();
    $penduduk_post->tambahpenduduk($koneksi, $post_nama, $post_nik, $post_alamat, $post_jenis, $post_umur, $post_status, $post_pekerjaan, $post_kewarganegaraan, $post_tempatlahir, $post_tanggallahir, $post_golongandarah);


    $data_penduduk_db = $penduduk_post->ambildata_penduduk($koneksi);
  }
}

if (isset($_POST['Hapus'])) {
  if ($_POST['id'] != '') {
    $penduduk_hapus = new penduduk();
    $hapus_data = $penduduk_hapus->hapus_data($koneksi, $_POST['id']);

    $data_penduduk_db = $penduduk_hapus->ambildata_penduduk($koneksi);
  }
}
if (isset($_POST['Update'])) {
  if ($_POST['id'] != '') {
    $penduduk_update = new penduduk();
    $update_data = $penduduk_update->update_data($koneksi, $_POST['id']);

    $data_penduduk_db = $penduduk_update->ambildata_penduduk($koneksi);
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Penduduk | Form</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>


      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Mohammad Jose Rizal</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="index.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dashboard v1</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index2.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dashboard v2</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index3.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dashboard v3</p>
                  </a>
                </li>
              </ul>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Form Data Penduduk</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Advanced Form</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          <div class="row">
            <div class="col-md-12">
              <!-- Input Data -->
              <div class="card card-danger">
                <div class="card-header">
                  <h3 class="card-title">Data Penduduk</h3>
                </div>
                <div class="card-body">
                  <!-- Date dd/mm/yyyy -->
                  <form action="" method="post">
                    <div class="form-group">
                      <label for="nama">Nama Penduduk</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter Nama" required>
                    </div>

                    <div class="form-group">
                      <label for="nik">NIK</label>
                      <input type="number" class="form-control" id="nik" name='nik' placeholder="Enter NIK" required>
                    </div>
                    <!--
                <div class="form-group">
                  <label for="jenis">Jenis Kelamin</label>
                  <input type="text" class="form-control" id="jenis" name='jenis' placeholder="Enter Jenis Kelamin" required>
                </div>-->
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name='jenis'>
                        <option selected="selected">Laki-Laki</option>
                        <option>Perempuan</option>

                      </select>
                    </div>

                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <input type="text" class="form-control" id="alamat" name='alamat' placeholder="Enter Alamat" required>
                    </div>

                    <div class="form-group">
                      <label for="umur">Umur</label>
                      <input type="number" class="form-control" id="umur" name='umur' placeholder="Enter Umur" required>
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name='status'>
                        <option selected="selected">Kawin</option>
                        <option>Belum Kawin</option>

                      </select>
                    </div>
                    <div class="form-group">
                      <label for="pekerjaan">Pekerjaan</label>
                      <input type="text" class="form-control" id="pekerjaan" name='pekerjaan' placeholder="Enter Pekerjaan" required>
                    </div>
                    <div class="form-group">
                      <label>Kewarganegaraan</label>
                      <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name='kewarganegaraan'>
                        <option selected="selected">WNI</option>
                        <option>WNA</option>

                      </select>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <input type="date" name='tanggallahir'>
                    </div>
                    <div class="form-group">
                      <label for="tempatlahir">Tempat Lahir</label>
                      <input type="text" class="form-control" id="tempatlahir" name='tempatlahir' placeholder="Enter Tempat Lahir" required>
                    </div>
                    <div class="form-group">
                      <label>Golongan Darah</label>
                      <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name='golongandarah'>
                        <option selected="selected">A</option>
                        <option>B</option>
                        <option>AB</option>
                        <option>O</option>
                      </select>
                    </div>

                    <input name='submit' value='submit' type="submit">
                  </form>
                </div>
              </div>
              <!-- /Input Data -->
              <?php if (isset($_POST['submit']) or isset($_POST['Hapus'])) { ?>
                <!-- Tabel Data -->

                <div class="card-header">
                  <h3 class="card-title">Data Table Penduduk</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Umur</th>
                        <th>Status</th>
                        <th>Pekerjaan</th>
                        <th>Kewarganegaraan</th>
                        <th>Tanggal Lahir</th>
                        <th>Tempat Lahir</th>
                        <th>Golongan Darah</th>
                        <th>Hapus</th>
                        <th>Update</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while ($semua_data_ok = $data_penduduk_db->fetch_array()) { ?>
                        <tr>
                          <td><?php echo $semua_data_ok['nik']; ?></td>
                          <td><?= $semua_data_ok['nama']; ?> </td>
                          <td><?= $semua_data_ok['alamat']; ?></td>
                          <td><?= $semua_data_ok['kelamin']; ?></td>
                          <td><?= $semua_data_ok['umur']; ?></td>
                          <td><?= $semua_data_ok['status']; ?> </td>
                          <td><?= $semua_data_ok['pekerjaan']; ?></td>
                          <td><?= $semua_data_ok['kewarganegaraan']; ?></td>
                          <td><?= $semua_data_ok['tanggallahir']; ?></td>
                          <td><?= $semua_data_ok['tempatlahir']; ?></td>
                          <td><?= $semua_data_ok['golongandarah']; ?></td>
                          <td>
                            <form action="" method="post">
                              <input type="hidden" class="form-control" id="id" name='id' value='<?= $semua_data_ok['id_penduduk']; ?>'>
                              <input name='Hapus' value='Hapus' type="submit">
                            </form>
                          </td>
                          <td>
                            <form action="update.php" method="post">
                              <input type="hidden" class="form-control" id="id" name='id' value='<?= $semua_data_ok['id_penduduk']; ?>'>
                              <input name='Update' value='Update' type="submit">
                            </form>
                          </td>
                        <?php } ?>
                        </tfoot>
                  </table>
                <?php } ?>
                <!-- /.card-body -->
                </div>
                <!-- /Tabel Data -->
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
      </div>
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- DataTables  & Plugins -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Select2 -->
  <script src="plugins/select2/js/select2.full.min.js"></script>
  <!-- Bootstrap4 Duallistbox -->
  <script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
  <!-- InputMask -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/inputmask/jquery.inputmask.min.js"></script>
  <!-- date-range-picker -->
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap color picker -->
  <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Bootstrap Switch -->
  <script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
  <!-- BS-Stepper -->
  <script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
  <!-- dropzonejs -->
  <script src="plugins/dropzone/min/dropzone.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- Page specific script -->
  <script>
    $(function() {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy'
      })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', {
        'placeholder': 'mm/dd/yyyy'
      })
      //Money Euro
      $('[data-mask]').inputmask()

      //Date picker
      $('#reservationdate').datetimepicker({
        format: 'L'
      });

      //Date and time picker
      $('#reservationdatetime').datetimepicker({
        icons: {
          time: 'far fa-clock'
        }
      });

      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
          format: 'MM/DD/YYYY hh:mm A'
        }
      })
      //Date range as a button
      $('#daterange-btn').daterangepicker({
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function(start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )

      //Timepicker
      $('#timepicker').datetimepicker({
        format: 'LT'
      })

      //Bootstrap Duallistbox
      $('.duallistbox').bootstrapDualListbox()

      //Colorpicker
      $('.my-colorpicker1').colorpicker()
      //color picker with addon
      $('.my-colorpicker2').colorpicker()

      $('.my-colorpicker2').on('colorpickerChange', function(event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
      })

      $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      })

    })
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function() {
      window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })

    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false

    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#template")
    previewNode.id = ""
    var previewTemplate = previewNode.parentNode.innerHTML
    previewNode.parentNode.removeChild(previewNode)

    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
      url: "/target-url", // Set the url
      thumbnailWidth: 80,
      thumbnailHeight: 80,
      parallelUploads: 20,
      previewTemplate: previewTemplate,
      autoQueue: false, // Make sure the files aren't queued until manually added
      previewsContainer: "#previews", // Define the container to display the previews
      clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    })

    myDropzone.on("addedfile", function(file) {
      // Hookup the start button
      file.previewElement.querySelector(".start").onclick = function() {
        myDropzone.enqueueFile(file)
      }
    })

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
      document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
    })

    myDropzone.on("sending", function(file) {
      // Show the total progress bar when upload starts
      document.querySelector("#total-progress").style.opacity = "1"
      // And disable the start button
      file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
    })

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
      document.querySelector("#total-progress").style.opacity = "0"
    })

    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
      myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
    }
    document.querySelector("#actions .cancel").onclick = function() {
      myDropzone.removeAllFiles(true)
    }
    // DropzoneJS Demo Code End
  </script>
</body>

</html>