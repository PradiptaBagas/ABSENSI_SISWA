<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Kelas</h4>
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
								<a href="#">Daftar Kelas</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">
										<a href="" class="btn btn-primary btn-sm text-white" data-toggle="modal" data-target="#addKelas"><i class="fa fa-plus"></i> Tambah</a>
									</div>
								</div>
								<div class="card-body">
									
									<table class="table table-sm">
										<thead>
											<tr>
												<th scope="col">No</th>
												<th scope="col">Kode Kelas</th>
												<th scope="col">Nama Kelas</th>
												<th scope="col">Opsi</th>
											</tr>
										</thead>
										<tbody>
                        <?php 
                        $query = "SELECT * FROM TB_MKELAS";
                        $stmt = oci_parse($con, $query);
                        oci_execute($stmt);
                        $no=1;
                        while ($k = oci_fetch_assoc($stmt)) {
                            ?>
                            <tr>
                            <td><?= $no ?></td>                          
                            <td><?=$k['KD_KELAS'];?></td>
                            <td><?=$k['NAMA_KELAS'];?></td>
                            <td>
                                
                            <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?=$k['ID_MKELAS'] ?>"><i class="far fa-edit"></i> Edit</a>
                            <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=master&act=delkelas&id=<?=$k['ID_MKELAS'] ?>"><i class="fas fa-trash"></i> Del</a>

                            <!-- Modal -->
                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit<?=$k['ID_MKELAS'] ?>" class="modal fade" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Edit Kelas</h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                                    <div class="modal-body">
                                        <form action="" method="post">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                <label>Nama Kelas</label>
                                                 <input name="id" type="hidden" value="<?=$k['ID_MKELAS'] ?>">
                                                <input name="kelas" type="text" value="<?=$k['NAMA_KELAS'] ?>" class="form-control">
                                            </div>
                                           
                                            <div class="form-group">                    
                                                    <button name="edit" class="btn btn-primary" type="submit">Edit</button>
                                             
                                            </div>                        
                                            </div>                      
                                        </div>
                                        </form>
                                        <?php 
                                        if (isset($_POST['edit'])) {
                                            $save= oci_parse ($con,"UPDATE TB_MKELAS SET NAMA_KELAS='$_POST[KELAS]' WHERE ID_MKELAS='$_POST[ID]' ");
                                            if ($save) {
                                                echo "<script>
                                                alert('Data diubah !');
                                                window.location='?page=master&act=kelas';
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
                        <!-- }
                        // $kelas = oci_parse ($con,"SELECT * FROM tb_mkelas");
                        // foreach ($kelas as $k) {?> -->
                            <?php
                        $no++;
                    }
                    oci_free_statement($stmt);
                    ?>
                    </tbody>      
									</table>
								</div>
							</div>



							<!-- Modal -->
<div id="addKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Tambah Kelas</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                <form action="" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label>Kode Kelas</label>
                        <input name="kode" type="text" value="KL-<?=time();?>" class="form-control" readonly>
                    <div class="form-group">
                        <label>Nama Kelas</label>
                        <input name="kelas" type="text" placeholder="Nama kelas .." class="form-control">
                    </div>
                   
                    <div class="form-group">                     
                            <button name="save" class="btn btn-primary" type="submit">Simpan</button>
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Batal</button>
                    </div>
                </form>
                <?php 
                if (isset($_POST['save'])) {
                   
                    $save= oci_parse ($con,"INSERT INTO tb_mkelas VALUES(NULL,'$_POST[kode]','$_POST[kelas]') ");
                    if ($save) {
                        echo "<script>
                        alert('Data tersimpan !');
                        window.location='?page=master&act=kelas';
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

				</div>
			</div>
		</div>

	</div>
</div>
</div>
</div>
</div>
</div>
</div>
