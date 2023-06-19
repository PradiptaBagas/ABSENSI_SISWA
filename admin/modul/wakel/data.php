<div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Wali Kelas</h4>
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
                                <a href="#">Wali Kelas</a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Daftar Wali Kelas</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                         <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah</a>
                                    </div>
                                </div>
                                <div class="card-body">




                 <table class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelas</th>
                            <th>Nama Wali Kelas</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>  
                    <tbody>
                        <!-- <?php 
                        $no=1;
			$kelas = mysqli_query($con,"SELECT * FROM TB_WALIKELAS
                INNER JOIN TB_GURU ON TB_WALIKELAS.ID_GURU=TB_GURU.ID_GURU
                INNER JOIN TB_MKELAS ON TB_WALIKELAS.ID_MKELAS=TB_MKELAS.ID_MKELAS

                ORDER BY TB_WALIKELAS.ID_MKELAS DESC");
                        foreach ($kelas as $k) {?>
                        <tr>
                            <td><?=$no++;?>.</td>
                            
                            <td><?=$k['NAMA_KELAS'];?></td>
                            <td><?=$k['nama_guru'];?></td>
                            <td>
                                
                            <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit<?=$k['ID_WALIKELAS'] ?>"><i class="far fa-edit"></i> Edit</a>
                            <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=master&act=delwakel&id=<?=$k['ID_WALIKELAS'] ?>"><i class="fas fa-trash"></i> Del</a>

                            <!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit<?=$k['ID_WALIKELAS'] ?>" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
                 <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Edit Wali Kelas</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
            <div class="modal-body">
                       <form action="" method="post" class="form-horizontal">
                        <input type="hidden" name="id" value="<?=$k['ID_WALIKELAS'] ?>">
                    <div class="form-group">
                        <label>Nama Guru</label>
                        <select name="wakel" class="form-control">
                            <?php 
                            $wkel = mysqli_query($con,"SELECT * FROM TB_GURU");
                            foreach ($wkel as $wk) {
                                if ($wk['ID_GURU']==$k['ID_GURU']) {
                                    $selected="selected";
                                }else{
                                    $selected='';
                                }
                                echo "<option value='$wk[ID_GURU]' $selected>$wk[nama_guru]</option>";
                            }

                             ?>
                        </select>
                    </div>
               <div class="form-group">
                        <label>Nama Kelas</label>
                        <select name="kelas" class="form-control">
                            <option value="">Pilih Kelas</option>
                            <?php 
                            $kel = mysqli_query($con,"SELECT * FROM TB_MKELAS ORDER BY ID_MKELAS ASC ");
                            foreach ($kel as $kl) {

                                 if ($kl['ID_MKELAS']==$k['ID_MKELAS']) {
                                    $selected="selected";
                                }else{
                                    $selected='';
                                }

                                echo "<option value='$kl[ID_MKELAS]' $selected>$kl[NAMA_KELAS]</option>";
                            }

                             ?>
                        </select>
                    </div>

           


                   
                    <div class="row form-group">
                        <div class="col-lg-2 col-lg-10">                       
                            <button name="edit" class="btn btn-info" type="submit">Edit</button>
                        </div>
                    </div>
                </form>
                <?php 
                if (isset($_POST['edit'])) {
                    $save= mysqli_query($con,"UPDATE TB_WALIKELAS SET ID_GURU='$_POST[wakel]',ID_MKELAS='$_POST[kelas]' WHERE ID_WALIKELAS='$_POST[id]' ");
                    if ($save) {
                        echo "<script>
                        alert('Data diubah !');
                        window.location='?page=walas';
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
                    $query = "SELECT * FROM  TB_WALIKELAS
                    INNER JOIN TB_GURU ON TB_WALIKELAS.ID_GURU=TB_GURU.ID_GURU
                    INNER JOIN TB_MKELAS ON TB_WALIKELAS.ID_MKELAS=TB_MKELAS.ID_MKELAS
                    ORDER BY TB_WALIKELAS.ID_MKELAS DESC";
                    $stmt = oci_parse($con, $query);
                    oci_execute($stmt);
                    $no = 1;
                    while ($k = oci_fetch_assoc($stmt)) {
                    ?>
                    <tr>
                            <td><?=$no++;?>.</td>
                            
                            <td><?=$k['NAMA_KELAS'];?></td>
                            <td><?=$k['NAMA_GURU'];?></td>
                            <td>
                                
                            <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit<?=$k['ID_WALIKELAS'] ?>"><i class="far fa-edit"></i> Edit</a>
                            <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=master&act=delwakel&id=<?=$k['ID_WALIKELAS'] ?>"><i class="fas fa-trash"></i> Del</a>

                            <!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit<?=$k['ID_WALIKELAS'] ?>" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
                 <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Edit Wali Kelas</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
            <div class="modal-body">
                       <form action="" method="post" class="form-horizontal">
                        <input type="hidden" name="id" value="<?=$k['ID_WALIKELAS'] ?>">
                    <div class="form-group">
                        <label>Nama Guru</label>
                        <select name="wakel" class="form-control">
                            <?php 
                            $wkel = oci_parse($con,"SELECT * FROM TB_GURU");
                            foreach ($wkel as $wk) {
                                if ($wk['ID_GURU']==$k['ID_GURU']) {
                                    $selected="selected";
                                }else{
                                    $selected='';
                                }
                                echo "<option value='$wk[ID_GURU]' $selected>$wk[NAMA_GURU]</option>";
                            }

                             ?>
                        </select>
                    </div>
               <div class="form-group">
                        <label>Nama Kelas</label>
                        <select name="kelas" class="form-control">
                            <option value="">Pilih Kelas</option>
                            <?php 
                            $kel = oci_parse($con,"SELECT * FROM TB_MKELAS ORDER BY ID_MKELAS ASC ");
                            foreach ($kel as $kl) {

                                 if ($kl['ID_MKELAS']==$k['ID_MKELAS']) {
                                    $selected="selected";
                                }else{
                                    $selected='';
                                }

                                echo "<option value='$kl[ID_MKELAS]' $selected>$kl[NAMA_KELAS]</option>";
                            }

                             ?>
                        </select>
                    </div>

           


                   
                    <div class="row form-group">
                        <div class="col-lg-2 col-lg-10">                       
                            <button name="edit" class="btn btn-info" type="submit">Edit</button>
                        </div>
                    </div>
                </form>
                <?php 
                if (isset($_POST['edit'])) {
                    $save= oci_parse($con,"UPDATE TB_WALIKELAS SET ID_GURU='$_POST[wakel]',ID_MKELAS='$_POST[kelas]' WHERE ID_WALIKELAS='$_POST[id]' ");
                    if ($save) {
                        echo "<script>
                        alert('Data diubah !');
                        window.location='?page=walas';
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


<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
              <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Tambah Wali Kelas</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
            <div class="modal-body">
                <form action="" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label>Nama Guru</label>
                        <select name="wakel" class="form-control">
                            <option value="">Pilih Guru</option>
                            <?php 
                            $wkel = mysqli_query($con,"SELECT * FROM TB_GURU");
                            foreach ($wkel as $wk) {
                                echo "<option value='$wk[ID_GURU]'>$wk[nama_guru]</option>";
                            }

                             ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Kelas</label>
                        <select name="kelas" class="form-control">
                            <option value="">Pilih Kelas</option>
                            <?php 
                            $kel = mysqli_query($con,"SELECT * FROM TB_MKELAS ORDER BY ID_MKELAS ASC ");
                            foreach ($kel as $k) {
                                echo "<option value='$k[ID_MKELAS]'>$k[NAMA_KELAS]</option>";
                            }

                             ?>
                        </select>
                    </div>

   


                   
                    <div class="row form-group">
                        <div class="col-lg-2 col-lg-10">                       
                            <button name="save" class="btn btn-info" type="submit">Save</button>
                        </div>
                    </div>
                </form>
                <?php 
                if (isset($_POST['save'])) {
                    $save= mysqli_query($con,"INSERT INTO TB_WALIKELAS VALUES(NULL,'$_POST[wakel]','$_POST[kelas]') ");
                    if ($save) {
                        echo "<script>
                        alert('Data tersimpan !');
                        window.location='?page=walas';
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



