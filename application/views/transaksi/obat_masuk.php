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
            <h1>Obat Masuk</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Beranda</a></li>
                    <li class="breadcrumb-item active">Obat Masuk</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-auto">
                        <div class="card-body">
                            <br>
                            <a href="<?= base_url('transaksi/obat-masuk-tambah') ?>" type="button"
                                title="Tambah Data Obat" class="btn btn-primary mb-3"><i class="bi bi-plus-circle"></i>
                                Data
                            </a>
                            <table class="table datatable table-striped nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Tgl Masuk</th>
                                        <th scope="col">Tgl kadaluwarsa</th>
                                        <th scope="col">Nama Obat</th>
                                        <th scope="col">Nama Supplier</th>
                                        <th scope="col">Jumlah Masuk</th>
                                        <th scope="col">Harga Satuan</th>
                                        <th scope="col">Total harga</th>
                                        <th scope="col">Riwayat Stok</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($obat_masuk as $sm) :
                                        $tanggal_transaksi = $sm['tgl_masuk'];
                                        // Menghitung selisih waktu dalam detik antara tanggal transaksi dan waktu sekarang
                                        $selisih_waktu = time() - strtotime($tanggal_transaksi);
                                        $selisih_hari = floor($selisih_waktu / (60 * 60 * 24));

                                        $tanggalMasuk = new DateTime($sm['tgl_masuk']);
                                        $tanggalExp = new DateTime($sm['tgl_kadaluwarsa']);
                                    ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td><?= date_format($tanggalMasuk, "d-m-Y"); ?></td>
                                        <td><?= date_format($tanggalExp, "d-m-Y"); ?></td>

                                        <td><?= $sm['nama_obat']; ?></td>
                                        <td><?= $sm['nama_supplier']; ?></td>
                                        <td><?= $sm['jumlah_masuk'] . " " . $sm['nama_satuan']; ?></td>
                                        <td><?= "Rp. " . number_format($sm['harga_satuan'], 0, ".", "."); ?></td>
                                        <td><?= "Rp. " . number_format($sm['harga_satuan'] * $sm['jumlah_masuk'], 0, ".", "."); ?>
                                        <td><?= $sm['riwayat_stok'] . " " . $sm['nama_satuan']; ?></td>
                                        </td>
                                        <td>
                                            <a type="button" class="badge bg-danger"
                                                data-bs-target="#hapus<?= $sm['id_obat_masuk']; ?>"
                                                data-bs-toggle="modal"><i class="bi bi-trash"></i></a>
                                            <!-- <?php if ($selisih_hari <= 1) : ?>
                                            <a type="button"
                                                href="<?= base_url('transaksi/obat-masuk-edit/') . $sm['id_obat_masuk']; ?>"
                                                class="badge bg-primary"><i class="bi bi-pencil"></i></a>

                                            <a type="button" class="badge bg-danger"
                                                data-bs-target="#hapus<?= $sm['id_obat_masuk']; ?>"
                                                data-bs-toggle="modal"><i class="bi bi-trash"></i></a>
                                            <?php else : ?>
                                            <span class="text-muted">lebih dari 1 hari</span>
                                            <?php endif; ?> -->
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
            foreach ($obat_masuk as $m) : $no++; ?>
            <div class="modal fade" id="hapus<?= $m['id_supplier']; ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <p>Anda yakin mau menghapus <b><?php echo $m['nama_obat']; ?> ?</b></p>
                                </div>
                                <input type="hidden" name="id_supplier" value="<?php echo $m['id_supplier']; ?>">
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