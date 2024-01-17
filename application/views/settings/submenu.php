<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('template/head') ?>

    <style>
        .table.datatable {
            border-collapse: collapse;
            width: 100%;
        }

        .table.datatable th,
        .table.datatable td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table.datatable th {
            background-color: #f2f2f2;
            text-align: center;
            /* Menyusun teks di header menjadi terpusat */
        }
    </style>

</head>

<body>

    <!-- ======= Header ======= -->
    <?php $this->load->view('template/header') ?>

    <?php $this->load->view('template/sidebar') ?>

    <main id="main" class="main">
        <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php endif; ?>

        <?= $this->session->flashdata('message'); ?>

        <div class="pagetitle">
            <h1>Sub Menu Management</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Beranda</a></li>
                    <li class="breadcrumb-item active">Sub Menu Management</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-auto">
                        <div class="card-body">
                            <br>
                            <button type="button" title="Tambah Sub Menu" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambah"><i class="bi bi-plus-circle"></i>
                                Data
                            </button>

                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Menu</th>
                                        <th scope="col">Url</th>
                                        <th scope="col">Icon</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Urutan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($subMenu as $sm) : ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?></th>
                                            <!-- <td><?= $sm['id']; ?></td> -->
                                            <td><?= $sm['title']; ?></td>
                                            <td><?= $sm['menu']; ?></td>
                                            <td><?= $sm['url']; ?></td>
                                            <td><?= $sm['icon']; ?></td>
                                            <td><?php if ($sm['is_active'] === '1') { ?>
                                                    <span class="badge bg-success">Aktif</span>
                                                <?php } else { ?>
                                                    <span class="badge bg-danger">In Aktif</span>
                                                <?php } ?>
                                            </td>
                                            <td><?= $sm['urutan']; ?></td>
                                            <td>
                                                <a class="badge bg-primary" data-bs-target="#editMenuModal<?= $sm['id']; ?>" data-bs-toggle="modal"><i class="bi bi-pencil"></i></a>

                                                <a href="" class="badge bg-danger" data-bs-target="#hapus<?= $sm['id']; ?>" data-bs-toggle="modal"><i class="bi bi-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
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
                            <h5 class="modal-title">Tambah Sub Menu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('settings/submenu') ?>" method="post">
                                <div class="form-group">
                                    <label for="title" class="col-form-label">Title :</label>
                                    <input type="text" class="form-control border" name="title" id="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="menu_id" class="col-form-label">Menu :</label>
                                    <select name="menu_id" id="menu_id" class="form-control">
                                        <option value=""></option>
                                        <?php foreach ($menu as $m) : ?>
                                            <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="url" class="col-form-label">Url :</label>
                                    <input type="text" name="url" class="form-control border" id="url" required>
                                </div>

                                <div class="form-group">
                                    <label for="icon" class="col-form-label">Icon :</label>
                                    <input type="text" class="form-control border" name="icon" id="icon" required>
                                    <!-- <span class="breadcrumb-item">Harus Di Awali Dingn bi bi-</span> -->
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                        <label class="form-check-label" for="is_active">
                                            Aktif ?
                                        </label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
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
            foreach ($subMenu as $sm) : $no++; ?>
                <div class="modal fade" id="editMenuModal<?= $sm['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Sub Menu</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('settings/editsubmenu') ?>" method="post">
                                    <input type="hidden" name="id" value="<?php echo $sm['id'] ?>">

                                    <div class="form-group">
                                        <label for="title" class="col-form-label">Title :</label>
                                        <input type="text" class="form-control border" name="title" id="title" value="<?php echo $sm['title']; ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="menu_id" class="col-form-label">Menu :</label>
                                        <select name="menu_id" id="menu_id" class="form-control">
                                            <?php foreach ($menu as $stat) : ?>
                                                <option value="<?= $stat['id'] ?>" <?php if ($stat['id'] == $sm['menu_id']) : ?> selected<?php endif; ?>>
                                                    <?= $stat['menu'] ?>
                                                </option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="url" class="col-form-label">Url :</label>
                                        <input type="text" name="url" class="form-control border" id="url" value="<?php echo $sm['url']; ?>" required>
                                    </div>

                                    <div class="form-group  mr-1">
                                        <label for="icon" class="col-form-label">Icon :</label>
                                        <input type="text" class="form-control border" name="icon" id="icon" value="<?php echo $sm['icon']; ?>" required>
                                        <!-- <span class="breadcrumb-item">Harus Di Awali Dingn bi bi-</span> -->
                                    </div>

                                    <div class="form-group  mr-1">
                                        <label for="urutan" class="col-form-label">Urutan :</label>
                                        <input type="number" class="form-control border" name="urutan" id="urutan" value="<?php echo $sm['urutan']; ?>" required>
                                    </div>

                                    <div class="form-group  p-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                            <label class="form-check-label" for="is_active">
                                                Aktif ?
                                            </label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- End Edit-->

            <!-- modal hapus -->
            <?php $no = 0;
            foreach ($subMenu as $sm) : $no++; ?>
                <div class="modal fade" id="hapus<?= $sm['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Hapus Sub Menu</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" method="post" action="<?php echo base_url('settings/hapussubmenu') ?>">
                                    <div class="modal-body">
                                        <p>Anda yakin mau menghapus <b><?php echo $sm['title']; ?> ?</b></p>
                                    </div>
                                    <input type="hidden" name="id" value="<?php echo $sm['id']; ?>">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
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
    <?php $this->load->view('template/footer') ?>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <?php $this->load->view('template/js') ?>
    </script>

</body>

</html>