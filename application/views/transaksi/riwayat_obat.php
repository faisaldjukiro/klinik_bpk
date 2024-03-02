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
            <h1>Riwayat Obat</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Beranda</a></li>
                    <li class="breadcrumb-item active">Riwayat Obat</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-auto">
                        <div class="card-body">
                            <br>
                            <form method="post" action="<?= site_url('transaksi/export'); ?>" class="form-horizontal">
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <input type="date" class="form-control" id="start_date" name="start_date"
                                            placeholder="Pilih Tanggal Awal" required>
                                    </div>
                                    <!-- <label for="end_date" class="col-sm-1 col-form-label mr-1">End Date:</label> -->
                                    <div class="col-sm-2">
                                        <input type="date" class="form-control" id="end_date" name="end_date"
                                            placeholder="Pilih Tanggal Akhir" required>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-success"><i
                                                class="ri-file-excel-2-fill"></i> Export Data</button>
                                    </div>
                                </div>
                            </form>
                            <table class="table datatable table-striped nowrap" style="width:100%">
                                <br>
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Status Obat</th>
                                        <th scope="col">Tgl Transaksi</th>
                                        <th scope="col">Nama Lengap</th>
                                        <th scope="col">Unit Kerja</th>
                                        <th scope="col">Nama Obat</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Riwayat</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($riwayat as $sm) :
                                        $tanggalMasuk = new DateTime($sm['tgl_transaksi']);
                                    ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <th>
                                            <?php if($sm['tipe'] === 'Obat Masuk') { ?>
                                            <span class="badge bg-success">Obat Masuk</span>
                                            <?php } else { ?>
                                            <span class="badge bg-danger">Obat Keluar</span>
                                            <?php } ?>
                                        </th>
                                        <td><?= date_format($tanggalMasuk, "d-m-Y"); ?></td>
                                        <td><?= $sm['nama']; ?></td>
                                        <td><?= $sm['nama_sub']; ?></td>
                                        <td><?= $sm['nama_obat']; ?></td>
                                        <td><?= $sm['jumlah']; ?></td>
                                        <td><?= $sm['riwayat']; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

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