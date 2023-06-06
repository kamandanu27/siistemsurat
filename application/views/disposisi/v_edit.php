
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
                <form action="<?php echo base_url() ?>disposisi/update" method="post" enctype="multipart/form-data">
                  <div class="box-body">

                    <div class="form-group">
									       <label for="exampleInputEmail1">Id SM:</label>
							        		<select class="form-control" id="id_sm" name="id_sm">
							      		  	<option value="">Pilih</option>
								  		      <?php foreach($list_sm as $row){ ?>
										        	<option value="<?= $row->id_sm ?>"><?= $row->id_sm ?></option>
										        <?php } ?>
								      	</select>
							      	</div>

                    <div class="row">
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="isi_disposisi">Isi Disposisi</label>
                          <div class="input-group col-md-8">
                              <input class="form-control" type="hidden" id="id_disposisi" name="id_disposisi" value="<?= $data['id_disposisi'] ?>" required>
                              <input type="text" class="form-control" placeholder="Isi Disposisi" name="isi_disposisi" value="<?= $data['isi_disposisi'] ?>" required>
                              <input type="hidden" name="<?=$this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash(); ?>" style="display: none">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" for="sifat">Sifat</label>
                          <div class="input-group col-md-8">
                              <input type="text" class="form-control" placeholder="Sifat" name="sifat" value="<?= $data['sifat'] ?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" for="tgldisposisi">Tanggal Disposisi</label>
                          <div class="input-group col-md-8">
                              <input type="date" class="form-control" placeholder="Tanggal Disposisi" name="tgldisposisi" value="<?= $data['tgldisposisi'] ?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" for="bataswaktu">Batas Waktu</label>
                          <div class="input-group col-md-8">
                              <input type="date" class="form-control" placeholder="Batas Waktu" name="bataswaktu" value="<?= $data['bataswaktu'] ?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" for="status">Status</label>
                          <div class="input-group col-md-8">
                              <input type="text" class="form-control" placeholder="Status" name="status" value="<?= $data['status'] ?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Bagian</label>
                          <select class="form-control" id="id_bagian" name="id_bagian">
									            <option value="">Pilih</option>
										          <?php foreach($list_perangkat as $row){ ?>
									        		  <option value="<?= $row->id_bagian ?>"><?= $row->nama_bagian ?></option>
									          	<?php } ?>
								          	</select>
							        	</div>

                    </div>



                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label" for="name"></label>
                        <div class="input-group col-md-8">
                          <button type="submit" class="btn btn-primary" style="margin-right: 6px;">Update</button>
                          <a href="<?= base_url() ?>disposisi" class="btn btn-danger">Batal</a>
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