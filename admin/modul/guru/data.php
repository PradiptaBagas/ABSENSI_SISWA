<div class="page-inner">
          <div class="page-header">
            <h4 class="page-title">Guru</h4>
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
                <a href="#">Data Guru</a>
              </li>
              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item">
                <a href="#">Daftar Guru</a>
              </li>
            </ul>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">
                     <a href="?page=guru&act=add" class="btn btn-primary btn-sm text-white"><i class="fa fa-plus"></i> Tambah</a>
                  </div>
                </div>
                <div class="card-body">
                  
                      <div class="table-responsive">
                   <table id="basic-datatables" class="display table table-striped table-hover" >
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nip</th>
                            <th>Nama Guru</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Foto</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>  
                    <!-- <tfoot>
                        <tr>
                          <th>#</th>
                            <th>Nip</th>
                            <th>Nama Guru</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Foto</th>
                            <th>Opsi</th>
                        </tr>
                      </tfoot> -->
                    <tbody>
                        <!-- <?php 
                        $no=1;
                        // $guru = mysqli_query($con,"SELECT * FROM tb_guru");
                        // foreach ($guru as $g) 
                        $query = "SELECT TB_GURU.ID, NIP, NAMA_GURU, EMAIL, STOK, FOTO, STATUS";
                        $stmt = oci_parse($con, $query);
                        oci_execute($stmt);
                        while ($g = oci_fetch_assoc($stmt))
                        {?>
                        <tr>
                            <td><?=$no++;?>.</td>
                          
                            <td><?=$g['nip'];?></td>
                            <td><?=$g['nama_guru'];?></td>
                            <td><?=$g['email'];?></td>
                            <td><?php if ($g['status']=='Y') {
                                echo "<span class='badge badge-success'>Aktif</span>";
                                
                            }else {
                                echo "<span class='badge badge-danger'>Off</span>";
                            } ?></td>
                            <td><img src="../assets/img/user/<?=$g['foto'] ?>" width="45" height="45"></td>
                              <td>
              <a class="btn btn-info btn-sm" href="?page=guru&act=edit&id=<?=$g['id_guru'] ?>"><i class="far fa-edit"></i></a>
              <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=guru&act=del&id=<?=$g['id_guru'] ?>"><i class="fas fa-trash"></i>
              </a>

                            </td>
                        </tr>
                    <?php } ?> -->
                    
                    <?php
                    $query = "SELECT * FROM TB_GURU";
                    $stmt = oci_parse($con, $query);
                    oci_execute($stmt);
                    $no = 1;
                    while ($res = oci_fetch_assoc($stmt)) {
                    ?>
                        <tr>
                            <td><?= $no?></td>
                            <td><?= $res['NIP'] ?></td>
                            <td><?= $res['NAMA_GURU'] ?></td>
                            <td><?= $res['EMAIL'] ?></td>
                            <td><?php if ($res['STATUS']=='Y') {
                                echo "<span class='badge badge-success'>Aktif</span>";   
                            }else {
                                echo "<span class='badge badge-danger'>Off</span>";
                            } ?></td>
                            <td><img src="../assets/img/user/<?=$res['FOTO'] ?>" width="45" height="45"></td>
                              <td>
              <a class="btn btn-info btn-sm" href="?page=guru&act=edit&id=<?=$res['ID_GURU'] ?>"><i class="far fa-edit"></i></a>
              <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=guru&act=del&id=<?=$g['id_guru'] ?>"><i class="fas fa-trash"></i>
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





