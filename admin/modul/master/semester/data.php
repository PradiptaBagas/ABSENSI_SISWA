<div class="page-inner">
          <div class="page-header">
            <h4 class="page-title">Semester</h4>
            <ul class="breadcrumbs">
              <li class="nav-home">
                <a href="#">
                  <i class="flaticon-home"></i>
                </a>
              </li>
              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item">
                <a href="#">Data Umum</a>
              </li>
              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item">
                <a href="#">Daftar Semester</a>
              </li>
            </ul>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">
                     <a href="" class="btn btn-primary btn-sm text-white" data-toggle="modal" data-target="#addSemester"><i class="fa fa-plus"></i> Tambah</a>
                  </div>
                </div>
                    <div class="card-body">
                      <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Semester</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>  
                    <tbody>
                        <!-- <?php 
                        $no=1;
			                  $SEMESTER = oci_parse ($con,"SELECT * FROM TB_SEMESTER");
                        foreach ($SEMESTER as $res) {?>
                        <tr>
                            <td><?=$no++;?>.</td>
                            <td><?=$res['SEMESTER'];?></td>
                            <td><?php 
                            if ($res['status']==0) {
                              echo "<span class='badge badge-danger'>Tidak Aktif</span>";
                              
                            }else{
                              echo "<span class='badge badge-success'>Aktif</span>";
                            }

                            ?></td>
                            <td>
                              <?php 
                            if ($res['status']==0) {
                            ?>
                             <a onclick="return confirm('Yakin Aktifkan Semester  ??')" href="?page=master&act=set_SEMESTER&id=<?=$res['ID_SEMESTER'] ?>&status=1" class="btn btn-success btn-sm"><i class="fas fa-check-circle"></i> Aktifkan</a>
                             <?php
                              
                            }else{
                              ?>
                              <a onclick="return confirm('Yakin NonAktifkan Semester  ??')" href="?page=master&act=set_SEMESTER&id=<?=$res['ID_SEMESTER'] ?>&status=0" class="btn btn-danger btn-sm"><i class="far fa-times-circle"></i> Nonaktif</a>
                              <?php
                            }
                            ?>
                                
                            <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?=$res['ID_SEMESTER'] ?>"><i class="far fa-edit"></i> Edit</a>
                            <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=master&act=delSEMESTER&id=<?=$res['ID_SEMESTER'] ?>">
<i class="fas fa-trash"></i> Del</a>

                            <!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit<?=$res['ID_SEMESTER'] ?>" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Edit SEMESTER</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
            <div class="modal-body">
                <form action="" method="post">
                  <div class="row">
                    <div class="col-md-10">
                          <div class="form-group">
                        <label>Semester</label>
                         <input name="id" type="hidden" value="<?=$res['ID_SEMESTER'] ?>">
                        <input name="SEMESTER" type="text" value="<?=$res['SEMESTER'] ?>" class="form-control">
                    </div>
                    <div class="form-group">                    
                            <button name="edit" class="btn btn-primary" type="submit">Edit</button>                     
                    </div>                        
                    </div>                      
                  </div>
                </form>
                <?php 
                if (isset($_POST['edit'])) {
                    $save= oci_parse ($con,"UPDATE TB_SEMESTER SET SEMESTER='$_POST[SEMESTER]' WHERE ID_SEMESTER='$_POST[id]' ");
                    if ($save) {
                        echo "<script>
                        alert('Data diubah !');
                        window.location='?page=master&act=SEMESTER';
                        </script>";                        
                    }
                }
                ?>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
                            </td>
                        </tr>
                    <?php } ?> -->
                    
                    <?php
                    $query = "SELECT * FROM TB_SEMESTER";
                    $stmt = oci_parse($con, $query);
                    oci_execute($stmt);
                    $no = 1;
                    while ($res = oci_fetch_assoc($stmt)) {
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $res['SEMESTER'] ?></td>
                            <td><?php 
                            if ($res['STATUS']==0) {
                              echo "<span class='badge badge-danger'>Tidak Aktif</span>";
                              
                            }else{
                              echo "<span class='badge badge-success'>Aktif</span>";
                            }

                            ?></td>
                            <td>
                              <?php 
                            if ($res['STATUS']==0) {
                            ?>
                            <a onclick="return confirm('Yakin Aktifkan Semester  ??')" href="?page=master&act=set_SEMESTER&id=<?=$res['ID_SEMESTER'] ?>&status=1" class="btn btn-success btn-sm"><i class="fas fa-check-circle"></i> Aktifkan</a>
                            <?php
                              
                            }else{
                              ?>
                              <a onclick="return confirm('Yakin NonAktifkan Semester  ??')" href="?page=master&act=set_SEMESTER&id=<?=$res['ID_SEMESTER'] ?>&status=0" class="btn btn-danger btn-sm"><i class="far fa-times-circle"></i> Nonaktif</a>
                              <?php

                            }
                            ?>

<a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?=$res['ID_SEMESTER'] ?>"><i class="far fa-edit"></i> Edit</a>
                            <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=master&act=delSEMESTER&id=<?=$res['ID_SEMESTER'] ?>">
<i class="fas fa-trash"></i> Del</a>

                            <!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit<?=$res['ID_SEMESTER'] ?>" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Edit SEMESTER</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
            <div class="modal-body">
                <form action="" method="post">
                  <div class="row">
                    <div class="col-md-10">
                          <div class="form-group">
                        <label>Semester</label>
                        <input name="id" type="hidden" value="<?=$res['ID_SEMESTER'] ?>">
                        <input name="SEMESTER" type="text" value="<?=$res['SEMESTER'] ?>" class="form-control">
                    </div>
                    <div class="form-group">                    
                            <button name="edit" class="btn btn-primary" type="submit">Edit</button>                     
                    </div>                        
                    </div>                      
                  </div>
                </form>
                <?php 
                if (isset($_POST['edit'])) {
                    $save= oci_parse ($con,"UPDATE TB_SEMESTER SET SEMESTER='$_POST[SEMESTER]' WHERE ID_SEMESTER='$_POST[id]' ");
                    if ($save) {
                        echo "<script>
                        alert('Data diubah !');
                        window.location='?page=master&act=SEMESTER';
                        </script>";                        
                    }
                }
                ?>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
                            </td>

                        </tr>
                    <?php
                        $no++;
                    }
                    oci_free_statement($stmt);
                    ?>
                    </tbody>                        
                </table>


</div>
</div>
</div>
</div>
</div>
</div>

<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="addSemester" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">           
            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Tambah SEMESTER</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
            <div class="modal-body">
                <form action="" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label>Semester</label>
                        <input name="SEMESTER" type="text" placeholder="Nama SEMESTER .." class="form-control">
                    </div>
                   
                    <div class="form-group">                     
                            <button name="save" class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
                <?php 
                if (isset($_POST['save'])) {
                    $save= oci_parse ($con,"INSERT INTO TB_SEMESTER VALUES(NULL,'$_POST[SEMESTER]','1') ");
                    if ($save) {
                        echo "<script>
                        alert('Data tersimpan !');
                        window.location='?page=master&act=SEMESTER';
                        </script>";                        
                    }
                }

                 ?>


            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


