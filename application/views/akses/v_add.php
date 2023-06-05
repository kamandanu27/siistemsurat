
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
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
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
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="<?php echo base_url() ?>akses/insert" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-3 control-label" for="nama_ibu">Nama Pengguna</label>
                        <div class="input-group col-md-8">
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Nama Pengguna" name="nama_pengguna" required>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group form-inline">
                      <div class="row">
                        <label class="col-md-3 control-label" for="ttl">Alamat</label>
                        <div class="input-group col-md-8">
                          <div class="input-group" style="padding-right: 6px;">
                            <input type="text" class="form-control" placeholder="Alamat" name="tempat_lahir" required>
                          </div>
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="datepicker" placeholder="Tanggal Lahir" name="tgl_lahir" required autocomplete="off">
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-3 control-label" for="name"></label>
                        <div class="input-group col-md-8">
                          <button type="submit" class="btn btn-primary" style="margin-right: 6px;">Simpan</button>
                          <a href="<?= base_url() ?>akses" class="btn btn-danger">Batal</a>
                        </div>
                      </div>
                    </div>
                  </div>

                </form>
              </div><!-- /.box -->

            </div><!--/.col (left) -->
            <!-- right column -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->