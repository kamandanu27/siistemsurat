
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
                <form action="<?php echo base_url() ?>sk/insert" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="row">
                      <div class="form-group">
                        <label class="col-md-3" for="nama_ibu">No. Surat</label>
                          <div class="input-group col-sm-8 col-md-8">
                          <input type="text" class="form-control" placeholder="No. Surat" name="nosurat" required>
                        </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label" for="ttl">Kode Klasifikasi</label>
                          <div class="input-group col-sm-8 col-md-8">
                            <input type="text" class="form-control" placeholder="Kode Klasifikasi" name="kode_klasifikasi" required>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label" for="ttl">Isi Ringkasan</label>
                          <div class="input-group col-sm-8 col-md-8">
                            <input type="text" class="form-control" placeholder="Isi Ringkasan" name="isi_ringkasan" required>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label" for="ttl">Penerima</label>
                          <div class="input-group col-sm-8 col-md-8">
                            <input type="text" class="form-control" placeholder="Penerima" name="penerima" required>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label" for="ttl">Tanggal Surat</label>
                          <div class="input-group col-sm-8 col-md-8">
                            <input type="date" class="form-control" placeholder="Tanggal Surat" name="tglsurat" required>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label" for="ttl">Tanggal Catat</label>
                          <div class="input-group col-sm-8 col-md-8">
                            <input type="date" class="form-control" placeholder="Tanggal Catat" name="tglcatat" required>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label" for="ttl">Sifat</label>
                          <div class="input-group col-sm-8 col-md-8">
                            <input type="text" class="form-control" placeholder="Sifat" name="sifat" required>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label" for="ttl">Keterangan</label>
                          <div class="input-group col-sm-8 col-md-8">
                            <input type="text" class="form-control" placeholder="Keterangan" name="keterangan" required>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label" for="ttl">File</label>
                          <div class="input-group col-sm-8 col-md-8">
                            <input type="text" class="form-control" placeholder="File" name="file" required>
                          </div>
                      </div>

                      
                      
                    </div>
                    
                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-3 control-label" for="name"></label>
                        <div class="input-group col-md-8">
                          <button type="submit" class="btn btn-primary" style="margin-right: 6px;">Simpan</button>
                          <a href="<?= base_url() ?>sm" class="btn btn-danger">Batal</a>
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