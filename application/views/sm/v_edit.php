
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
                <form action="<?php echo base_url() ?>sm/update" method="post" enctype="multipart/form-data">
                  <div class="box-body">

                    <div class="row">
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="nosurat">No. Surat</label>
                          <div class="input-group col-md-8">
                              <input class="form-control" type="text" id="id_sm" name="id_sm" value="<?= $data['id_sm'] ?>" required>
                              <input type="text" class="form-control" placeholder="No. Surat" name="nosurat" value="<?= $data['nosurat'] ?>" required>
                              <input type="hidden" name="<?=$this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash(); ?>" style="display: none">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" for="pengirim">Pengirim</label>
                          <div class="input-group col-md-8">
                              <input type="text" class="form-control" placeholder="Pengirim" name="pengirim" value="<?= $data['pengirim'] ?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" for="isi">Isi</label>
                          <div class="input-group col-md-8">
                              <input type="text" class="form-control" placeholder="Isi" name="isi" value="<?= $data['isi'] ?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" for="sifat">Sifat</label>
                          <div class="input-group col-md-8">
                              <input type="text" class="form-control" placeholder="Sifat" name="sifat" value="<?= $data['sifat'] ?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" for="tglsurat">Tanggal Surat</label>
                          <div class="input-group col-md-8">
                              <input type="date" class="form-control" placeholder="Tanggal Surat" name="tglsurat" value="<?= $data['tglsurat'] ?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" for="tglterima">Tangal Terima</label>
                          <div class="input-group col-md-8">
                              <input type="date" class="form-control" placeholder="Tanggal Terima" name="tglterima" value="<?= $data['tglterima'] ?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" for="status">Status</label>
                          <div class="input-group col-md-8">
                              <input type="text" class="form-control" placeholder="Status" name="status" value="<?= $data['status'] ?>" required>
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
                          <a href="<?= base_url() ?>sm" class="btn btn-danger">Batal</a>
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