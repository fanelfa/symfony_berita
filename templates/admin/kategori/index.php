<!doctype html>
<html lang="en">

<head>
    <title>Admin Kategori</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="<?php echo $this->asset; ?>asset_klorofil/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $this->asset; ?>asset_klorofil/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $this->asset; ?>asset_klorofil/vendor/linearicons/style.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="<?php echo $this->asset; ?>css/main_klorofil.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->asset; ?>img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $this->asset; ?>img/favicon.png">

    <!-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">

</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- NAVBAR -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="brand">
                <a href="index.html"><img src="<?php echo $this->asset; ?>img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
            </div>
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
        <div id="sidebar-nav" class="sidebar">
            <div class="sidebar-scroll">
                <nav>
                    <ul class="nav">
                        <li><a href="<?php echo base_url() ?>admin/berita" class=""><i class="lnr lnr-laptop"></i> <span>Berita</span></a></li>
                        <li><a href="<?php echo base_url() ?>admin/pengirim" class="active"><i class="lnr lnr-user"></i> <span>Kategori</span></a></li>
                        <li><a href="<?php echo base_url() ?>admin/kategori" class=""><i class="lnr lnr-bookmark"></i> <span>Kategori</span></a></li>
                        <li><a href="<?php echo base_url() ?>" class=""><i class="lnr lnr-moon"></i> <span>Lihat Blog</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- END LEFT SIDEBAR -->
        <!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <h3 class="page-title">Admin Kategori</h3>
                    <div class="row">
                        <div class="col-md-10">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Tambah Kategori
                            </button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- TABLE HOVER -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">List Kategori</h3>
                                </div>
                                <div class="panel-body table-responsive">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($kategori as $key => $value) { ?>
                                                <tr>
                                                    <td><strong><?php echo $key + 1 ?></strong></td>
                                                    <td><?php echo $value->nama; ?></td>
                                                    <td>
                                                        <button id="btn-edit" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal" data-id="<?php echo $value->id; ?>" data-nama="<?php echo $value->nama; ?>">
                                                            Edit
                                                        </button>
                                                        <button id="btn-delete" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" data-id="<?php echo $value->id; ?>">
                                                            Delete
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END TABLE HOVER -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN -->
        <div class="clearfix"></div>
        <footer>
            <div class="container-fluid">
                <p class="copyright">Shared by <i class="fa fa-love"></i><a href="https://bootstrapthemes.co">BootstrapThemes</a>
                </p>
            </div>
        </footer>
    </div>

    <!-- Modal Create-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="modal-form" action="<?php echo base_url(); ?>admin/kategori/store" method="post">
                    <div class="modal-body">
                        <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" placeholder="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="modal-form" action="<?php echo base_url(); ?>admin/kategori/update/1" method="post" enctype="">
                    <div class="modal-body">
                        <input type="text" class="form-control" value="" name="nama" placeholder="Nama" required>
                        <input type="hidden" class="form-control" value="" name="id">
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Edit">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form class="modal-form" action="<?php echo base_url(); ?>admin/kategori/delete/1" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <strong>Yakin? mau menghapus??</strong>
                        <input type="hidden" value="" name="id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Hapus">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- END WRAPPER -->
    <!-- Javascript -->
    <script src="<?php echo $this->asset; ?>asset_klorofil/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo $this->asset; ?>asset_klorofil/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo $this->asset; ?>asset_klorofil/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo $this->asset; ?>scripts/klorofil-common.js"></script>
    <script>
        $(document).on("click", "#btn-edit", function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');

            $("#editModal .modal-body input[name='id']").val(id);
            $("#editModal .modal-body input[name='nama']").val(nama);
        });

        $(document).on("click", "#btn-delete", function() {
            var id = $(this).data('id');
            $("#deleteModal .modal-body input[name='id']").val(id);
        });
    </script>
</body>

</html>