
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
                <form action="<?php echo base_url() ?>kader/update" method="post" enctype="multipart/form-data">
                  <div class="box-body">

                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label" for="nama_ibu">Nama Kader</label>
                        <div class="input-group col-md-8">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-venus"></i></span>
                            <input class="form-control" type="hidden" id="id" name="id" value="<?= encrypt_url($data['id']) ?>" required>
                            <input type="text" class="form-control" placeholder="Nama Ibu" name="nama_ibu" value="<?= $data['nama_ibu'] ?>" required>
                            <input type="hidden" name="<?=$this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash(); ?>" style="display: none">
                          </div>
                        </div>
                      </div>
                    </div>
                    <input type="hidden" class="form-control" placeholder="Nama Suami" name="nama_suami" value="<?= $data['nama_suami'] ?>" required>
                    <div class="form-group form-inline">
                      <div class="row">
                        <label class="col-md-4 control-label" for="ttl">Tempat, Tanggal Lahir</label>
                        <div class="input-group col-md-8">
                          <div class="input-group" style="padding-right: 6px;">
                            <span class="input-group-addon"><i class="fa fa-home"></i></span>
                            <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" value="<?= $data['tempat_lahir'] ?>" required>
                          </div>
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="datepicker" placeholder="Tanggal Lahir" name="tgl_lahir" value="<?= $data['tgl_lahir'] ?>" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group form-inline">
                      <div class="row">
                        <label class="col-md-4 control-label" for="alamat">Alamat</label>
                        <div class="input-group col-md-8">
                          <div class="input-group" style="padding-right: 6px;">
                            <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                            <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?= $data['alamat'] ?>" required>
                          </div>
                          <div class="input-group col-xs-2" style="padding-right: 6px;">
                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                            <input type="number" class="form-control" placeholder="Rt" name="rt" value="<?= $data['rt'] ?>" required>
                          </div>
                          <div class="input-group col-xs-2">
                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                            <input type="number" class="form-control" placeholder="Rw" name="rw" value="<?= $data['rw'] ?>" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group form-inline">
                      <div class="row">
                        <label class="col-md-4 control-label" for="alamat2"></label>
                        <div class="input-group col-md-8">
                          <div class="input-group" style="padding-right: 6px;">
                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                            <input type="text" class="form-control" placeholder="Kelurahan" name="kelurahan" value="<?= $data['kelurahan'] ?>" required>
                          </div>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                            <input type="text" class="form-control" placeholder="Kecamatan" name="kecamatan" value="<?= $data['kecamatan'] ?>" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label" for="notelp">Nomor Telpon</label>
                        <div class="input-group col-md-8">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                            <input type="number" class="form-control" placeholder="Nomor Telpon" name="No_tlp" value="<?= $data['No_tlp'] ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label" for="agama">Agama</label>
                        <div class="input-group col-md-8">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
                            <select class="form-control" name="agama" style="width: 100%;" required>
                              <option selected="selected" value="<?= $data['agama'] ?>">
                                <?php if ($data['agama'] == 0){ ?>
                                    Islam
                                <?php }elseif ($data['agama'] == 1){ ?>
                                    Kristen
                                <?php }elseif ($data['agama'] == 2){ ?>
                                    Katolik
                                <?php }elseif ($data['agama'] == 3){ ?>
                                    Hindu
                                <?php }elseif ($data['agama'] == 4){ ?>
                                    Buddha
                                <?php }elseif ($data['agama'] == 5){ ?>
                                    Kong Hu Cu
                                <?php } ?>
                              </option>
                              <option value="">-- Agama --</option>
                              <option value="0">Islam</option>
                              <option value="1">Kristen</option>
                              <option value="2">Katolik</option>
                              <option value="3">Hindu</option>
                              <option value="4">Buddha</option>
                              <option value="5">Kong Hu Cu</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label" for="nik">NIK</label>
                        <div class="input-group col-md-8">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                            <input type="number" class="form-control" placeholder="NIK" name="NIK" value="<?= $data['NIK'] ?>" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label" for="no KK">Nomor KK</label>
                        <div class="input-group col-md-8">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                            <input type="number" class="form-control" placeholder="Nomor KK" name="No_KK" value="<?= $data['No_KK'] ?>" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label" for="No_BPJS">Nomor BPJS <small>(bila ada)</small></label>
                        <div class="input-group col-md-8">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                            <input type="number" class="form-control" placeholder="Nomor BPJS (bila ada)" name="No_BPJS" value="<?= $data['No_BPJS'] ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label" for="nama_anak">Status Gakin</label>
                        <div class="input-group col-md-8">
                          <div class="form-check-inline">
                            <label class="form-check-label" style="padding: 6px 10px 0px 0px;">
                              <input type="radio" name="gakin" class="form-check-input minimal" value="0" <?php echo ($data['gakin'] == '0')?'checked':'' ?> > Non Gakin
                            </label>
                            <label class="form-check-label">
                              <input type="radio" name="gakin" class="form-check-input minimal" value="1" <?php echo ($data['gakin'] == '1')?'checked':'' ?> > Gakin
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label" for="notelp">Nomor Telpon</label>
                        <div class="input-group col-md-8">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                            <input type="number" class="form-control" placeholder="Nomor Telpon" name="No_tlp" value="<?= $data['No_tlp'] ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label" for="notelp">Email</label>
                        <div class="input-group col-md-8">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" class="form-control" placeholder="email" name="email" value="<?= $data['email'] ?>" readonly>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label" for="notelp">Password</label>
                        <div class="input-group col-md-8">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label" for="nama_anak">Jabatan Sebagai Kader</label>
                        <div class="input-group col-md-8">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                            <select class="form-control" name="jabatan" style="width: 100%;" required>
                              <option selected="selected" value="<?= $data['jabatan'] ?>">
                                <?php if ($data['jabatan'] == 1){ ?>
                                    Ketua
                                <?php }elseif ($data['jabatan'] == 2){ ?>
                                    Sekretaris
                                <?php }elseif ($data['jabatan'] == 3){ ?>
                                    Bendahara
                                <?php }elseif ($data['jabatan'] == 4){ ?>
                                    Anggota
                                <?php }else{ ?>
                                    Null
                                <?php } ?>
                              </option>

                              <option value="0">-- Jabatan --</option>
                              <option value="1">Ketua</option>
                              <option value="2">Sekretaris</option>
                              <option value="3">Bendahara</option>
                              <option value="4">Anggota</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label" for="name"></label>
                        <div class="input-group col-md-8">
                          <button type="submit" class="btn btn-primary" style="margin-right: 6px;">Update</button>
                          <a href="<?= base_url() ?>ibu" class="btn btn-danger">Batal</a>
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