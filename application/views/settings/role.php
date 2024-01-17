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
            <h1>Role Management</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('')?>">Beranda</a></li>
                    <li class="breadcrumb-item active">Role Management</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card overflow-auto">
                        <div class="card-body">
                            <br>
                            <button type="button" title="Tambah Role" class="btn btn-primary mb-3"
                                data-bs-toggle="modal" data-bs-target="#tambah"><i class="bi bi-plus-circle"></i>
                                Data
                            </button>

                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Akses</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;?>
                                    <?php foreach ($role as $m) : ?>
                                    <tr>
                                        <th scope="row">
                                            <?= $i;?>
                                        </th>
                                        <td scope="row"><?= $m['role']?></td>
                                        <td scope="row">
                                            <a href="<?= base_url('settings/roleaccess/') . $m['role_id']; ?>"
                                                class="badge bg-warning" title="Access"><i class="bi bi-lock"></i>
                                                Access</a>
                                        </td>
                                        <td scope="row">
                                            <a href="#" class="badge bg-primary"
                                                data-bs-target="#edit<?= $m['role_id'];?>" data-bs-toggle="modal"><i
                                                    class="bi bi-pencil"></i></a>

                                            <a href="#" class="badge bg-danger"
                                                data-bs-target="#hapus<?= $m['role_id'];?>" data-bs-toggle="modal"><i
                                                    class="bi bi-trash"></i></a>
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
                            <h5 class="modal-title">Tambah Role</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('settings/role') ?>" method="post">
                                <div class="form-group">
                                    <label for="title" class="col-form-label">Role :</label>
                                    <input type="text" class="form-control border" name="role" id="role" required>
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
                 foreach ($role as $m) : $no++ ;?>
            <div class="modal fade" id="edit<?= $m['role_id'];?>" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Role</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('settings/editrole') ?>" method="post">
                                <input type="hidden" name="role_id" value="<?php echo $m['role_id'] ?>">

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label"><b>Role :</b></label>
                                    <input type="text" class="form-control border" id="recipient-name" name="role"
                                        value="<?php echo $m['role'];?>" placeholder="Masukan Menu" required>
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
                 foreach ($role as $m) : $no++ ;?>
            <div class="modal fade" id="hapus<?= $m['role_id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Hapus Role</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="post"
                                action="<?php echo base_url('settings/hapusrole')?>">
                                <div class="modal-body">
                                    <p>Anda yakin mau menghapus <b><?php echo $m['role'];?> ?</b></p>
                                </div>
                                <input type="hidden" name="role_id" value="<?php echo $m['role_id'];?>">
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