<?php { ?>
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
                  
                  <tr>
                    <td><?php echo $semua_data_ok['nik'];?></td>
                    <td><?=$semua_data_ok['nama'];?> </td>
                    <td><?=$semua_data_ok['alamat'];?></td>
                    <td><?=$semua_data_ok['kelamin'];?></td>
                    <td><?=$semua_data_ok['umur'];?></td>
                    <td><?=$semua_data_ok['status'];?> </td>
                    <td><?=$semua_data_ok['pekerjaan'];?></td>
                    <td><?=$semua_data_ok['kewarganegaraan'];?></td>
                    <td><?=$semua_data_ok['tanggallahir'];?></td>
                    <td><?=$semua_data_ok['tempatlahir'];?></td>
                    <td><?=$semua_data_ok['golongandarah'];?></td>
                    <td>
                      <form action="" method="post">
                        <input type="hidden" class="form-control" id="id" name='id' value='<?=$semua_data_ok['id_penduduk'];?>'>
                        <input name='Hapus' value='Hapus' type="submit">
                      </form>
                    </td>
                    <td>
                      <form action="" method="post">
                        <input type="hidden" class="form-control" id="id" name='id' value='<?=$semua_data_ok['id_penduduk'];?>'>
                        <input name='Update' value='Update' type="submit">
                      </form>
                    </td>  
                  </tr>    
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