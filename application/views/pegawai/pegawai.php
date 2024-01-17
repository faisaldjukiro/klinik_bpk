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
        text-align: center;
    }

    .table.datatable th {
        background-color: #f2f2f2;
        text-align: center;

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
            <h1>Data Pegawai</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Beranda</a></li>
                    <li class="breadcrumb-item active">Data Pegawai</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-auto">
                        <div class="card-body">
                            <br>
                            <a href="<?= base_url('pegawai/tambah') ?>" type="button" title="Tambah Sub Menu"
                                class="btn btn-primary mb-3"><i class="bi bi-plus-circle"></i>
                                Data
                            </a>
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Lengkap</th>
                                        <th scope="col">Sub Bagian</th>
                                        <th scope="col">Staf</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Tgl Lahir</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($pegawai as $sm) : ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td><?= $sm['nama_lengkap']; ?></td>
                                        <td><?= $sm['nama_subbagian']; ?></td>
                                        <td><?= $sm['nama_staf']; ?></td>
                                        <td><?= $sm['jenis_kelamin']; ?></td>
                                        <td><?= $sm['tgl_lahir']; ?></td>
                                        <td>
                                            <a type="button"
                                                href="<?= base_url('master/satuan-edit/') . $sm['kd_peg']; ?>"
                                                class="badge bg-primary"><i class="bi bi-pencil"></i></a>

                                            <a type="button" class="badge bg-danger"
                                                data-bs-target="#hapus<?= $sm['kd_peg']; ?>" data-bs-toggle="modal"><i
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
            foreach ($pegawai as $m) : $no++; ?>
            <div class="modal fade" id="hapus<?= $m['kd_peg']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Hapus Pegawai</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="post"
                                action="<?php echo base_url('master/obat-hapus') ?>">
                                <div class="modal-body">
                                    <p>Anda yakin mau menghapus <b><?php echo $m['nama_lengkap']; ?> ?</b></p>
                                </div>
                                <input type="hidden" name="kd_peg" value="<?php echo $m['kd_peg']; ?>">
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