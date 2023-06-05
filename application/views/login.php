
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="#">
        <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
        <meta name="author" content="#">

        <link rel="icon" href="<?= base_url() ?>public/adminty-html/files/assets/images/auth/logoneww.jpeg" type="image/x-icon">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/adminty-html/files/bower_components/bootstrap/dist/css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/adminty-html/files/assets/icon/themify-icons/themify-icons.css">

        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/adminty-html/files/assets/icon/icofont/css/icofont.css">

        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/adminty-html/files/assets/css/style.css">
    </head>

    <body class="fix-menu">

        <div class="theme-loader">
            <div class="ball-scale">
                <div class='contain'>
                    <div class="ring">
                        <div class="frame"></div>
                    </div>
                    
                    <div class="ring">
                        <div class="frame"></div>
                    </div>
                    <div class="ring">
                        <div class="frame"></div>
                    </div>
                    <div class="ring">
                        <div class="frame"></div>
                    </div>
                    <div class="ring">
                        <div class="frame"></div>
                    </div>
                    <div class="ring">
                        <div class="frame"></div>
                    </div>
                    <div class="ring">
                        <div class="frame"></div>
                    </div>
                    <div class="ring">
                        <div class="frame"></div>
                    </div>
                    <div class="ring">
                        <div class="frame"></div>
                    </div>
                    <div class="ring">
                        <div class="frame"></div>
                    </div>
                </div>
            </div>
        </div>

        <section class="login-block">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <form class="md-float-material form-material" action="<?= base_url()?>login/login" method="post">
                            
                            <div class="auth-box card">
                                <div class="card-block">
                                    <div class="row m-b-20">
                                        <div class="col-md-12">
                                            <div class="text-center" style="margin-bottom: 20px;">
                                                <!-- <img src="<?= base_url() ?>public/adminty-html/files/assets/images/auth/logoneww.jpeg" alt="logo.png" width="200px;" style="rounded: 20%;"> -->
                                                <h3>LOGIN PRESENSI</h3>
                                                 <span class="text-center" style="font-size: 16px;">Sistem Informasi Penjemputan Siswa</span>
                                                 <br>
                                            </div>

                                        </div>
                                    </div>
                                    <?php  
                                    echo validation_errors('<div class="alert alert-danger alert-slide-up">','</div>');
                                    if ($this->session->flashdata('danger'))
                                    {
                                        echo '<div class="alert alert-danger alert-slide-up">';
                                        echo $this->session->flashdata('danger');
                                        echo '</div>';
                                    }

                                    if ($this->session->flashdata('sukses'))
                                    {
                                        echo '<div class="alert alert-success alert-slide-up">';
                                        echo $this->session->flashdata('sukses');
                                        echo '</div>';
                                    }
                                    ?>

                                    <div class="form-group form-primary">
                                        <input type="text" id="username" name="username" class="form-control" required="" placeholder="Username">
                                        <span class="form-bar"></span>
                                    </div>
                                    <div class="form-group form-primary">
                                        <input type="password" id="password" name="password" class="form-control" required="" placeholder="Password">
                                        <span class="form-bar"></span>
                                    </div>
                                    <div class="row m-t-25 text-left">
                                        <div class="col-12">
                                            <div class="checkbox-fade fade-in-primary d-">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                    <span class="text-inverse">Remember me</span>
                                                </label>
                                            </div>
                                            <div class="forgot-phone text-right f-right">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Sign in</button>
                                        </div>
                                    </div>
                                    <hr />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <script type="text/javascript" src="<?= base_url() ?>public/adminty-html/files/bower_components/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>public/adminty-html/files/bower_components/jquery-ui/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>public/adminty-html/files/bower_components/popper.js/dist/umd/popper.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>public/adminty-html/files/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="<?= base_url() ?>public/adminty-html/files/bower_components/jquery-slimscroll/jquery.slimscroll.js"></script>

        <script type="text/javascript" src="<?= base_url() ?>public/adminty-html/files/bower_components/modernizr/modernizr.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>public/adminty-html/files/bower_components/modernizr/feature-detects/css-scrollbars.js"></script>

        <script type="text/javascript" src="<?= base_url() ?>public/adminty-html/files/bower_components/i18next/i18next.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>public/adminty-html/files/bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>public/adminty-html/files/bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>public/adminty-html/files/bower_components/jquery-i18next/jquery-i18next.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>public/adminty-html/files/assets/js/common-pages.js"></script>

        <script type="text/javascript">
		    $(".alert-slide-up").alert().delay(3000).slideUp('slow');
	    </script>
    </body>
</html>