<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('template/head')?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
    .select2.select2-container {
        width: 100% !important;
    }

    .select2.select2-container .select2-selection {
        border: 1px solid #ccc;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        height: 34px;
        margin-bottom: 15px;
        outline: none !important;
        transition: all .15s ease-in-out;
    }

    .select2.select2-container .select2-selection .select2-selection__rendered {
        color: #333;
        line-height: 32px;
        padding-right: 33px;
    }

    .select2.select2-container .select2-selection .select2-selection__arrow {
        background: #f8f8f8;
        border-left: 1px solid #ccc;
        -webkit-border-radius: 0 3px 3px 0;
        -moz-border-radius: 0 3px 3px 0;
        border-radius: 0 3px 3px 0;
        height: 32px;
        width: 33px;
    }

    .select2.select2-container.select2-container--open .select2-selection.select2-selection--single {
        background: #f8f8f8;
    }

    .select2.select2-container.select2-container--open .select2-selection.select2-selection--single .select2-selection__arrow {
        -webkit-border-radius: 0 3px 0 0;
        -moz-border-radius: 0 3px 0 0;
        border-radius: 0 3px 0 0;
    }

    .select2.select2-container.select2-container--open .select2-selection.select2-selection--multiple {
        border: 1px solid #34495e;
    }

    .select2.select2-container .select2-selection--multiple {
        height: auto;
        min-height: 34px;
    }

    .select2.select2-container .select2-selection--multiple .select2-search--inline .select2-search__field {
        margin-top: 0;
        height: 32px;
    }

    .select2.select2-container .select2-selection--multiple .select2-selection__rendered {
        display: block;
        padding: 0 4px;
        line-height: 29px;
    }

    .select2.select2-container .select2-selection--multiple .select2-selection__choice {
        background-color: #f8f8f8;
        border: 1px solid #ccc;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        margin: 4px 4px 0 0;
        padding: 0 6px 0 22px;
        height: 24px;
        line-height: 24px;
        font-size: 12px;
        position: relative;
    }

    .select2.select2-container .select2-selection--multiple .select2-selection__choice .select2-selection__choice__remove {
        position: absolute;
        top: 0;
        left: 0;
        height: 22px;
        width: 22px;
        margin: 0;
        text-align: center;
        color: #e74c3c;
        font-weight: bold;
        font-size: 16px;
    }

    .select2-container .select2-dropdown {
        background: transparent;
        border: none;
        margin-top: -5px;
    }

    .select2-container .select2-dropdown .select2-search {
        padding: 0;
    }

    .select2-container .select2-dropdown .select2-search input {
        outline: none !important;
        border: 1px solid #34495e !important;
        border-bottom: none !important;
        padding: 4px 6px !important;
    }

    .select2-container .select2-dropdown .select2-results {
        padding: 0;
    }

    .select2-container .select2-dropdown .select2-results ul {
        background: #fff;
        border: 1px solid #34495e;
    }

    .select2-container .select2-dropdown .select2-results ul .select2-results__option--highlighted[aria-selected] {
        background-color: #3498db;
    }
    </style>
</head>

<body>
    <?php $this->load->view('template/header')?>

    <?php $this->load->view('template/sidebar')?>

    <main id="main" class="main">
        <!-- <?php echo validation_errors(); ?> -->

        <div class="pagetitle">
            <h1>Resep Obat</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('beranda')?>">Beranda</a></li>
                    <li class="breadcrumb-item active">Resep Obat</li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="row">
                <form action="<?= base_url('pemeriksaan/resepTambah') ?>" method="post">
                    <div class="col-lg-6">
                        <div class="card">

                            <div class="card-body">
                                <h5 class="card-title">Input Resep</h5>
                                <div class="row mb-3">
                                    <label for="kd_transaksi" class="col-sm-2 col-form-label">Kode</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kd_transaksi"
                                            value="<?= $transaksi?>" readonly>
                                        <input type="hidden" class="form-control" name="id_user[]"
                                            value="<?= $user['nama'];?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="kd_peg" class="col-sm-2 col-form-label">Pegawai</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kd_peg[]" required>

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tgl_keluar" class="col-sm-2 col-form-label">Tgl Resep</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tgl_keluar[]" required>

                                    </div>
                                </div>
                                <div class="text-end">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-body">
                                <h5 class="card-title">List Obat</h5>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Pilih</th>
                                            <th scope="col">Nama Obat</th>
                                            <th scope="col">Satuan</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Aturan Pakai</th>
                                            <th scope="col">Stok</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                        foreach ($obat as $sm) : ?>
                                        <tr>
                                            <th>
                                                <input type="checkbox" name="kd_obat[]"
                                                    value="<?php echo $sm['kd_obat']?>" required>
                                            </th>
                                            <td><?php echo $sm['nama_obat']?></td>
                                            <td><?php echo $sm['id_satuan']?></td>
                                            <td>
                                                <input type="number" class="form-control" name="jumlah_keluar[]"
                                                    required>
                                                <!-- <small class="text-danger"><?= form_error('jumlah_keluar');?></small> -->
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="aturan_pakai[]" required>
                                                <!-- <small class="text-danger"><?= form_error('aturan_pakai');?></small> -->
                                            </td>
                                            <td><?php echo $sm['stok']?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <!-- Pagination -->
                                <!-- Pagination with icons -->
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <?php if ($pagination): ?>
                                        <?php echo $pagination; ?>
                                        <?php endif; ?>
                                    </ul>
                                </nav><!-- End Pagination with icons -->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </main>
    <!-- ======= Footer ======= -->
    <?php $this->load->view('template/footer')?>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    <?php $this->load->view('template/js')?>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</body>

</html>