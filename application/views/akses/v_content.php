        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?= $judul ?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?= base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?= $judul ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box box-success">
                <div class="box-header with-border">
                  <?php
                    echo validation_errors('<div class="alert alert-danger alert-dismissible">','</div>');
                    if ($this->session->flashdata('success'))
                    {
                        echo '<div class="alert alert-success alert-dismissible " role="alert">';
                        echo $this->session->flashdata('success');
                        echo '</div>';
                    }
                    if ($this->session->flashdata('error'))
                    {
                        echo '<div class="alert alert-danger alert-dismissible " role="alert">';
                        echo $this->session->flashdata('error');
                        echo '</div>';
                    }

                  ?>
                  <h3 class="box-title">Data Kader</h3>
                  <div style="padding-top: 10px;">
                  <p><a href="<?= base_url(); ?>kader/add" class="btn btn-sm btn-success icon-btn"><i class="fa fa-plus"></i> Tambah Data</a></p>
                  </div>
            
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                      <thead>
                          <tr>
                              <th style="width: 5%;text-align: center;">#</th>
                              <th style="width: 15%;text-align: center;">Nama Kader</th>
                              <th style="width: 15%;text-align: center;">Tempat/Tgl Lahir</th>
                              <th style="width: 23%;text-align: center;">Alamat</th>
                              <th style="width: 15%;text-align: center;">Jabatan</th>
                              <th style="width: 14%;text-align: center;">No. Telp</th>
                              <th style="width: 13%;text-align: center;">Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $total= 0; $no=1; foreach($data as $row){  ?>
                          <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $row->nama_ibu ?></td>
                              <td><?= $row->tempat_lahir ?>, <?= $row->tgl_lahir ?></td>
                              <td><?= $row->alamat ?> Rt <?= $row->rt ?>/Rw <?= $row->rw ?></td>
                              <td>
                                  <?php if ($row->jabatan == 0){ ?>
                                    Ibu Posyandu
                                  <?php }elseif ($row->jabatan == 1){ ?>
                                    Ketua
                                  <?php }elseif ($row->jabatan == 2){ ?>
                                    Sekretaris
                                  <?php }elseif ($row->jabatan == 3){ ?>
                                    Bendahara
                                  <?php }elseif ($row->jabatan == 4){ ?>
                                    Anggota
                                  <?php }else{ ?>
                                      Ibu Posyandu
                                  <?php } ?>
                              </td>
                              <td><?= $row->No_tlp ?></td>
                              <td style="text-align: center;">
                                  <form action="<?= base_url() ?>kader/delete/<?= encrypt_urldua($row->id) ?>" method="post">
                                      <div class="btn-group">
                                          <a href="<?= base_url() ?>kader/edit/<?= encrypt_url($row->id) ?>" class=" btn btn-sm btn-warning" data-toggle="tooltip" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>

                                          <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')" data-toggle="tooltip" title="Hapus"><span class="glyphicon glyphicon-trash"></span></button>
                                      </div>
                                  </form>
                              </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->