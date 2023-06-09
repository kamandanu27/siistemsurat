
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
                <form action="<?php echo base_url() ?>asesi/insert" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="row">
                      
                      <div class="form-group">
                          <label class="col-md-3 control-label" for="ttl">Nim</label>
                          <div class="input-group col-sm-8 col-md-8">
                            <input type="text" class="form-control" placeholder="Nim" name="nim_asesi" required>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label" for="ttl">Nik</label>
                          <div class="input-group col-sm-8 col-md-8">
                            <input type="text" class="form-control" placeholder="Nik" name="nik_asesi" required>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label" for="ttl">Nama</label>
                          <div class="input-group col-sm-8 col-md-8">
                            <input type="text" class="form-control" placeholder="Nama" name="nama_asesi" required>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label" for="ttl">Alamat</label>
                          <div class="input-group col-sm-8 col-md-8">
                            <input type="text" class="form-control" placeholder="Alamat" name="alamat_asesi" required>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label" for="ttl">No. Telp</label>
                          <div class="input-group col-sm-8 col-md-8">
                            <input type="text" class="form-control" placeholder="No. Telp" name="notlp_asesi" required>
                          </div>
                      </div>

                      <div class="form-group">
												<label class="col-md-3 control-label" for="exampleInputEmail1">Jenis Kelamin Pemohon:</label>
												<select class="form-control" id="jeniskelamin_asesi" name="jeniskelamin_asesi">
													<option value="">Pilih</option>
													<option value="Laki-Laki">Laki-laki</option>
													<option value="Perempuan">Perempuan</option>
												</select>
							      	</div>

                      <div class="form-group">
                          <label class="col-md-3 control-label" for="ttl">Jurusan</label>
                          <div class="input-group col-sm-8 col-md-8">
                            <input type="text" class="form-control" placeholder="Jurusan" name="jurusan_asesi" required>
                          </div>
                      </div>

                      <div class="form-group">
                            <label class="col-sm-3 col-form-label">Foto Asesi</label>
                            <div class="input-group col-sm-8 col-md-8">
                             <input type="file" class="form-control" id="foto_asesi" name="foto_asesi" id="exampleInputUpload Foto1" placeholder="Upload Foto">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-3 control-label" for="name"></label>
                        <div class="input-group col-md-8">
                          <button type="submit" class="btn btn-primary" style="margin-right: 6px;">Simpan</button>
                          <a href="<?= base_url() ?>asesi" class="btn btn-danger">Batal</a>
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