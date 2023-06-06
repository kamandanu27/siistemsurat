
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
                <form action="<?php echo base_url() ?>sk/update" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="row">

                        <div class="form-group">
                          <label class="col-md-4 control-label" for="no_surat">No. Surat</label>
                          <div class="input-group col-md-8">
                              <input class="form-control" type="hidden" id="id_sk" name="id_sk" value="<?= $data['id_sk'] ?>" required>
                              <input type="text" class="form-control" placeholder="No. Surat" name="no_surat" value="<?= $data['no_surat'] ?>" required>
                              <input type="hidden" name="<?=$this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash(); ?>" style="display: none">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Klasifikasi</label>
                          <select class="form-control" id="kode_klasifikasi" name="kode_klasifikasi">
									            <option value="">Pilih</option>
										          <?php foreach($list_klasifikasi as $row){ ?>
									        		  <option value="<?= $row->kode_klasifikasi ?>"><?= $row->klasifikasi ?></option>
									          	<?php } ?>
								          	</select>
							        	</div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" for="isi_ringkasan">Isi Ringkasan</label>
                          <div class="input-group col-md-8">
                              <input type="text" class="form-control" placeholder="Isi Ringkasan" name="isi_ringkasan" value="<?= $data['isi_ringkasan'] ?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" for="penerima">Penerima</label>
                          <div class="input-group col-md-8">
                              <input type="text" class="form-control" placeholder="Penerima" name="penerima" value="<?= $data['penerima'] ?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" for="tglsurat">Tanggal Surat</label>
                          <div class="input-group col-md-8">
                              <input type="dater" class="form-control" placeholder="Tanggal Surat" name="tglsurat" value="<?= $data['tglsurat'] ?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" for="tglcatat">Tanggal Catat</label>
                          <div class="input-group col-md-8">
                              <input type="dater" class="form-control" placeholder="Tanggal Catat" name="tglcatat" value="<?= $data['tglcatat'] ?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" for="sifat">Sifat</label>
                          <div class="input-group col-md-8">
                              <input type="text" class="form-control" placeholder="Sifat" name="sifat" value="<?= $data['sifat'] ?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" for="keterangan">Keterangan</label>
                          <div class="input-group col-md-8">
                              <input type="text" class="form-control" placeholder="Keterangan" name="keterangan" value="<?= $data['keterangan'] ?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" for="file">File</label>
                          <div class="input-group col-md-8">
                              <input type="text" class="form-control" placeholder="File" name="file" value="<?= $data['file'] ?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Pengguna</label>
                          <select class="form-control" id="id_pengguna" name="id_pengguna">
									            <option value="">Pilih</option>
										          <?php foreach($list_akses as $row){ ?>
									        		  <option value="<?= $row->id_pengguna ?>"><?= $row->nama_pengguna ?></option>
									          	<?php } ?>
								          	</select>
							        	</div>

                    </div>



                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label" for="name"></label>
                        <div class="input-group col-md-8">
                          <button type="submit" class="btn btn-primary" style="margin-right: 6px;">Update</button>
                          <a href="<?= base_url() ?>sk" class="btn btn-danger">Batal</a>
                        </div>
                      </div>
                    </div>

                  </div><!-- /.box-body -->

                </form>
              </div><!-- /.box -->

            </div><!--/.col (left) -->
            <!-- right column -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->