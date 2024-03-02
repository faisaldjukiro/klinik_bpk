<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('template/head') ?>

    <style>
    .table.datatable {
        border-collapse: collapse;
        width: 100%;
    }

    .table.datatable td,
    .table.datatable th {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .table.datatable th {
        background-color: #f2f2f2;
        text-align: center;
        /* Menyusun teks di header menjadi terpusat */
    }

    .table.datatable th:first-child,
    .table.datatable td:first-child {
        text-align: center;
        /* Teks di kolom pertama menjadi terpusat */
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
            <h1>Alat Kesehatan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Beranda</a></li>
                    <li class="breadcrumb-item active">Alat Kesehatan</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card overflow-auto">
                        <div class="card-body">
                            <br>
                            <a href="<?= base_url('master/supplier-tambah') ?>" type="button" title="Tambah Sub Menu"
                                class="btn btn-primary mb-3"><i class="bi bi-plus-circle"></i>
                                Data
                            </a>
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Katogori</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($alkes as $sm) : ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td><?= $sm['nama_alkes']; ?></td>
                                        <td><?= $sm['kategori']; ?></td>
                                        <td><?= $sm['jumlah_alkes']; ?></td>
                                        <td>
                                            <a type="button"
                                                href="<?= base_url('master/supplier-edit/') . $sm['id_alkes']; ?>"
                                                class="badge bg-primary"><i class="bi bi-pencil"></i></a>

                                            <a type="button" class="badge bg-danger"
                                                data-bs-target="#hapus<?= $sm['id_alkes']; ?>" data-bs-toggle="modal"><i
                                                    class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal hapus -->
            <?php $no = 0;
            foreach ($alkes as $m) : $no++; ?>
            <div class="modal fade" id="hapus<?= $m['id_alkes']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Hapus Supplier</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="post"
                                action="<?php echo base_url('master/supplier-hapus') ?>">
                                <div class="modal-body">
                                    <p>Anda yakin mau menghapus <b><?php echo $m['nama_supplier']; ?> ?</b></p>
                                </div>
                                <input type="hidden" name="id_alkes" value="<?php echo $m['id_alkes']; ?>">
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
    <?php $this->load->view('template/footer') ?>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <?php $this->load->view('template/js') ?>
    </script>

</body>

</html>