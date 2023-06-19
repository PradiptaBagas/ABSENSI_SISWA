<div class="page-inner">
          <div class="page-header">
            <h4 class="page-title">Jadwal</h4>
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
                <a href="#">Jadwal Mengajar</a>
              </li>
              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item">
                <a href="#">Daftar Jadwal Mengajar</a>
              </li>
            </ul>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">
                     <a href="?page=jadwal&act=add" class="btn btn-primary btn-sm text-white"><i class="fa fa-plus"></i> Tambah</a>
                  </div>
                </div>

                    <div class="card-body">
                      <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Nama Guru</th>
                              <th>Mata Pelajaran</th>
                              <th>Kelas</th>
                              <th>TP/Semester</th>
                              <th>Opsi </th>
                            </tr>
                          </thead>
                          <tbody>
                            <!-- <?php 
                            $mapel = oci_parse ($con,"SELECT * FROM TB_MENGAJAR 
                            INNER JOIN TB_GURU ON TB_MENGAJAR.ID_GURU=TB_GURU.ID_GURU
                            INNER JOIN TB_MASTER_MAPEL ON TB_MENGAJAR.ID_MAPEL=TB_MASTER_MAPEL.ID_MAPEL
                            INNER JOIN TB_MKELAS ON TB_MENGAJAR.ID_MKELAS=TB_MKELAS.ID_MKELAS

                            INNER JOIN TB_SEMESTER ON TB_MENGAJAR.ID_SEMESTER=TB_SEMESTER.ID_SEMESTER
                            INNER JOIN TB_THAJARAN ON TB_MENGAJAR.ID_THAJARAN=TB_THAJARAN.ID_THAJARAN 
                              ");
                              foreach ($mapel as $d) {
                              $no=1;
                            ?>

                            <tr>
                              <th scope="row"><b><?=$no++; ?>.</b></th>
                              <td><?=$d['nama_guru'] ?></td>
                              <td><?=$d['mapel'] ?></td>
                              <td><?=$d['nama_kelas'] ?></td>
                              <td><?=$d['tahun_ajaran'] ?>/<?=$d['semester'] ?></td>
                              <td>
                                <a href="?page=jadwal&act=cancel&id=<?=$d['id_mengajar'];?>" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Batal</a>

                                <!-- <a  href="?page=nilai&mapel=<?=$d['id_pelajaran'];?>" class="btn btn-success btn-sm"><i class="fas fa-file-contract"></i> Lihat Absen</a> -->
                              </td>
                            </tr>
                          <?php } ?> -->
                          

                    <?php
                    $query = "SELECT * FROM TB_MENGAJAR 
                    INNER JOIN TB_GURU ON TB_MENGAJAR.ID_GURU=TB_GURU.ID_GURU
                    INNER JOIN TB_MASTER_MAPEL ON TB_MENGAJAR.ID_MAPEL=TB_MASTER_MAPEL.ID_MAPEL
                    INNER JOIN TB_MKELAS ON TB_MENGAJAR.ID_MKELAS=TB_MKELAS.ID_MKELAS

                    INNER JOIN TB_SEMESTER ON TB_MENGAJAR.ID_SEMESTER=TB_SEMESTER.ID_SEMESTER
                    INNER JOIN TB_THAJARAN ON TB_MENGAJAR.ID_THAJARAN=TB_THAJARAN.ID_THAJARAN 
                      ";
                    $stmt = oci_parse($con, $query);
                    oci_execute($stmt);
                    $no = 1;
                    while ($k = oci_fetch_assoc($stmt)) {
                    ?>
                    <tr>
                            <td><?=$no?>.</td>
                            <td><?=$k['NAMA_GURU'];?></td>
                            <td><?=$k['MAPEL'];?></td>
                            <td><?=$k['NAMA_KELAS'];?></td>
                            <td><?=$k['TAHUN_AJARAN'];?>/<?=$k['SEMESTER'] ?></td>
                            <td>
                            <a href="?page=jadwal&act=cancel&id=<?=$k['ID_MENGAJAR'];?>" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Batal</a>

                            <a  href="?page=nilai&mapel=<?=$k['ID_PELAJARAN'];?>" class="btn btn-success btn-sm"><i class="fas fa-file-contract"></i> Lihat Absen</a>
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