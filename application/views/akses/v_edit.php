
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
                <form action="<?php echo base_url() ?>akses/update" method="post" enctype="multipart/form-data">
                  <div class="box-body">

                    <div class="row">
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="nama_pengguna">Nama Pengguna</label>
                          <div class="input-group col-md-8">
                              <input class="form-control" type="hidden" id="id_pengguna" name="id_pengguna" value="<?= $data['id_pengguna'] ?>" required>
                              <input type="text" class="form-control" placeholder="Nama Pengguna" name="nama_pengguna" value="<?= $data['nama_pengguna'] ?>" required>
                              <input type="hidden" name="<?=$this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash(); ?>" style="display: none">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" for="alamat">Alamat</label>
                          <div class="input-group col-md-8">
                              <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?= $data['alamat'] ?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" for="telp">No. Telp</label>
                          <div class="input-group col-md-8">
                              <input type="text" class="form-control" placeholder="telp" name="telp" value="<?= $data['telp'] ?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" for="email">Email</label>
                          <div class="input-group col-md-8">
                              <input type="text" class="form-control" placeholder="email" name="email" value="<?= $data['email'] ?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" for="username">Username</label>
                          <div class="input-group col-md-8">
                              <input type="text" class="form-control" placeholder="username" name="username" value="<?= $data['username'] ?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" for="password">Password</label>
                          <div class="input-group col-md-8">
                              <input type="text" class="form-control" placeholder="password" name="password" value="<?= $data['password'] ?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" for="level">Level</label>
                          <div class="input-group col-md-8">
                              <input type="text" class="form-control" placeholder="level" name="level" value="<?= $data['level'] ?>" required>
                          </div>
                        </div>

                    </div>



                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label" for="name"></label>
                        <div class="input-group col-md-8">
                          <button type="submit" class="btn btn-primary" style="margin-right: 6px;">Update</button>
                          <a href="<?= base_url() ?>akses" class="btn btn-danger">Batal</a>
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