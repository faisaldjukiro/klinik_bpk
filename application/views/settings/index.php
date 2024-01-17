<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('template/head')?>
    <!-- <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet"> -->
</head>

<body>

    <!-- ======= Header ======= -->
    <?php $this->load->view('template/header')?>

    <?php $this->load->view('template/sidebar')?>

    <main id="main" class="main">
        <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
        <?php endif; ?>

        <?= $this->session->flashdata('message'); ?>

        <div class="pagetitle">
            <h1>Menu Management</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('')?>">Beranda</a></li>
                    <li class="breadcrumb-item active">Menu Management</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card overflow-auto">
                        <div class="card-body">
                            <br>
                            <button type="button" title="Tambah Menu" class="btn btn-primary mb-3"
                                data-bs-toggle="modal" data-bs-target="#tambah"><i class="bi bi-plus-circle"></i>
                                Data
                            </button>

                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Menu</th>
                                        <th scope="col">Urutan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;?>
                                    <?php foreach ($menu as $m) : ?>
                                    <tr>
                                        <th scope="row">
                                            <?= $i;?>
                                        </th>
                                        <td scope="row"><?= $m['menu']?></td>
                                        <td scope="row"><?= $m['urutan']?></td>
                                        <td scope="row">
                                            <a href="#" class="badge bg-primary" data-bs-target="#edit<?= $m['id'];?>"
                                                data-bs-toggle="modal"><i class="bi bi-pencil"></i></a>

                                            <a href="#" class="badge bg-danger" data-bs-target="#hapus<?= $m['id'];?>"
                                                data-bs-toggle="modal"><i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++;?>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            <!-- modal tambah -->
            <div class="modal fade" id="tambah" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Menu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('settings/') ?>" method="post">
                                <div class="form-group">
                                    <label for="title" class="col-form-label">Menu :</label>
                                    <input type="text" class="form-control border" name="menu" id="menu" required>
                                </div>
                                <div class="form-group">
                                    <label for="title" class="col-form-label">Urutan :</label>
                                    <input type="number" class="form-control border" name="urutan" id="urutan" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Keluar</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Tambah-->

            <!-- modal Edit -->
            <?php $no = 0; 
                 foreach ($menu as $m) : $no++ ;?>
            <div class="modal fade" id="edit<?= $m['id'];?>" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Menu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('settings/editmenu') ?>" method="post">
                                <input type="hidden" name="id" value="<?php echo $m['id'] ?>">

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label"><b>Menu :</b></label>
                                    <input type="text" class="form-control border" id="recipient-name" name="menu"
                                        value="<?php echo $m['menu'];?>" placeholder="Masukan Menu" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label"><b>Urutan :</b></label>
                                    <input type="number" class="form-control border" id="recipient-name" name="urutan"
                                        value="<?php echo $m['urutan'];?>" placeholder="Masukan Menu" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Keluar</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
            <!-- End Edit-->

            <!-- modal hapus -->
            <?php $no = 0; 
                 foreach ($menu as $m) : $no++ ;?>
            <div class="modal fade" id="hapus<?= $m['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Hapus Menu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="post"
                                action="<?php echo base_url('settings/hapusmenu')?>">
                                <div class="modal-body">
                                    <p>Anda yakin mau menghapus <b><?php echo $m['menu'];?> ?</b></p>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $m['id'];?>">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Keluar</button>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <!-- End hapus-->


        </section>

    </main><!-- End #main -->
    <!-- ======= Footer ======= -->
    <?php $this->load->view('template/footer')?>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <?php $this->load->view('template/js')?>
    </script>

</body>

</html>