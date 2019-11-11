<!doctype html>
<html lang="en">

<head>
    <title>Admin Berita</title>
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
                        <li><a href="<?php echo base_url() ?>admin/berita" class="active"><i class="lnr lnr-laptop"></i> <span>Berita</span></a></li>
                        <li><a href="<?php echo base_url() ?>admin/pengirim" class=""><i class="lnr lnr-user"></i> <span>Pengirim</span></a></li>
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
                    <h3 class="page-title">Admin Berita</h3>
                    <div class="row">
                        <div class="col-md-10">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Tambah Berita
                            </button>
                        </div>
                        <br>
                        <br>
                        <div class="col-md-3">
                            <select class="form-control" value="" name="pengirim" onchange="location = this.value;">
                                <option value="" selected disabled>Pilih Pengirim</option>
                                <?php
                                foreach ($p_punya_berita as $key => $value) {
                                    echo "<option value=" . base_url() . "admin/get_berita/id_pengirim/" . $value->id . ">" . $value->nama . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control" value="" name="pengirim" onchange="location = this.value;">
                                <option value="" selected disabled>Pilih Kategori</option>
                                <?php
                                foreach ($k_punya_berita as $key => $value) {
                                    echo "<option value=" . base_url() . "admin/get_berita/id_kategori/" . $value->id . ">" . $value->nama . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control" value="" name="pengirim" onchange="location = this.value;">
                                <option value="" selected disabled>Pilih Tanggal</option>
                                <?php
                                foreach ($date as $value) {
                                    echo "<option value=" . base_url() . "admin/get_berita_by_date/" . $value->date . ">" . $value->date . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- TABLE HOVER -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">List Berita</h3>
                                </div>
                                <div class="panel-body table-responsive">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Judul</th>
                                                <th>Slug</th>
                                                <th>Isi</th>
                                                <th>Gambar</th>
                                                </th>
                                                <th>Kategori</th>
                                                <th>Pengirim</th>
                                                <th>Softdelete</th>
                                                <th>Created At</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($berita as $key => $value) { ?>
                                                <tr>
                                                    <td><strong><?php echo $key + 1 ?></strong></td>
                                                    <td><?php echo $value->judul; ?></td>
                                                    <td><?php echo $value->url_slug; ?></td>
                                                    <td><?php echo $value->isi ?></td>
                                                    <td>
                                                        <img height="100" src="<?php echo $value->gambar ?>" alt=""></td>
                                                    <td><?php echo $value->kate; ?></td>
                                                    <td><?php echo $value->sender; ?></td>
                                                    <td>
                                                        <h4><?php echo ($value->softdelete == 'f' ? '<span class="label label-warning">Tidak</span>' : '<span class="label label-info">Ya</span>'); ?></h4>
                                                    </td>
                                                    <td><?php echo $value->updated_at; ?></td>
                                                    <td>
                                                        <button id="btn-edit" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal" data-id="<?php echo $value->id; ?>" data-judul="<?php echo $value->judul; ?>" data-isi="<?php echo htmlentities($value->isi); ?>" data-id_pengirim="<?php echo $value->id_pengirim; ?>" data-id_kategori="<?php echo $value->id_kategori; ?>" data-softdelete="<?php echo $value->softdelete; ?>" data-gambar="<?php echo $value->gambar; ?>">
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
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open_multipart('admin/berita/store'); ?>
                <form class="modal-form" action="" method="">
                    <div class="modal-body">
                        <input type="text" class="form-control" name="judul" placeholder="judul" required>
                        <br>
                        <select class="form-control" name="pengirim" required>
                            <option value="" selected disabled>Pilih Pengirim</option>
                            <?php
                            foreach ($pengirim as $key => $value) {
                                echo "<option value=" . $value->id . ">" . $value->nama . "</option>";
                            }
                            ?>
                        </select>
                        <br>
                        <select class="form-control" name="kategori" required>
                            <option value="" selected disabled>Pilih Kategori</option>
                            <?php
                            foreach ($kategori as $key => $value) {
                                echo "<option value=" . $value->id . ">" . $value->nama . "</option>";
                            }
                            ?>
                        </select>
                        <br>
                        <textarea class="form-control" name="isi" id="isi_summernote" placeholder="Isi berita" required></textarea>
                        <br>
                        <select class="form-control" name="softdelete" required>
                            <option value="" selected disabled>Softdelete</option>
                            <option value="true"> YA </option>
                            <option value="false"> TIDAK </option>
                        </select>
                        <br>
                        <input type="file" class="form-control" accept="image/*" name="gambar" placeholder="Gambar" required>
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
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open_multipart('admin/berita/update/1'); ?>
                <form class="modal-form" action="" method="" enctype="">
                    <div class="modal-body">
                        <input type="text" class="form-control" value="" name="judul" placeholder="judul" required>
                        <input type="hidden" class="form-control" value="" name="id">
                        <br>
                        <select class="form-control" value="" name="pengirim" required>
                            <option value="" selected disabled>Pilih Pengirim</option>
                            <?php
                            foreach ($pengirim as $key => $value) {
                                echo "<option value=" . $value->id . ">" . $value->nama . "</option>";
                            }
                            ?>
                        </select>
                        <br>
                        <select class="form-control" value="" name="kategori" required>
                            <option value="" selected disabled>Pilih Kategori</option>
                            <?php
                            foreach ($kategori as $key => $value) {
                                echo "<option value=" . $value->id . ">" . $value->nama . "</option>";
                            }
                            ?>
                        </select>
                        <br>
                        <textarea class="form-control" value="" name="isi" id="isi_summernote2" placeholder="Isi berita" required></textarea>
                        <br>
                        <select class="form-control" name="softdelete" required>
                            <option value="" selected disabled>Softdelete</option>
                            <option value="t"> YA </option>
                            <option value="f"> TIDAK </option>
                        </select>
                        <br>
                        <input type="file" class="form-control" accept="image/*" name="gambar" placeholder="Gambar">
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

    <!-- Modal Delete -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <?php echo form_open_multipart('admin/berita/delete/1'); ?>
                <form class="modal-form" action="" method="">
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
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
    <script>
        $(document).ready(function() {
            $('#isi_summernote').summernote({
                placeholder: 'Isi Berita',
                tabsize: 10,
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ol', 'ul', 'paragraph', 'height']],
                    // ['table', ['table']],
                    ['insert', ['link']],
                    ['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']]
                ]
            });
            $('#isi_summernote2').summernote({
                placeholder: 'Isi Berita',
                tabsize: 10,
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ol', 'ul', 'paragraph', 'height']],
                    // ['table', ['table']],
                    ['insert', ['link']],
                    ['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']]
                ]
            });
        });

        $(document).on("click", "#btn-edit", function() {
            var id = $(this).data('id');
            var judul = $(this).data('judul');
            var isi = $(this).data('isi');
            var id_pengirim = $(this).data('id_pengirim');
            var id_kategori = $(this).data('id_kategori');
            var softdelete = $(this).data('softdelete');

            $("#editModal .modal-body input[name='id']").val(id);
            $("#editModal .modal-body input[name='judul']").val(judul);
            $("#isi_summernote2").summernote('code', isi);
            $("#editModal .modal-body select[name='pengirim']").val(id_pengirim);
            $("#editModal .modal-body select[name='kategori']").val(id_kategori);
            $("#editModal .modal-body select[name='softdelete']").val(softdelete);
        });

        $(document).on("click", "#btn-delete", function() {
            var id = $(this).data('id');

            $("#deleteModal .modal-body input[name='id']").val(id);
        });
    </script>
</body>

</html>