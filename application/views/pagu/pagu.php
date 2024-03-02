<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('template/head') ?>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
            <h1>Pagu</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Beranda</a></li>
                    <li class="breadcrumb-item active">Pagu</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card overflow-auto">
                        <div class="card-body">
                            <h5 class="card-title text-center">List Anggaran</h5>
                            <button type="button" title="Tambah Anggran" class="btn btn-primary mb-3"
                                data-bs-toggle="modal" data-bs-target="#tambah"><i class="bi bi-plus-circle"></i>
                                Anggaran
                            </button>
                            <table class="table datatable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope=" col">No</th>
                                        <th cope="col">Kode Anggran</th>
                                        <th scope="col">Anggaran</th>
                                        <th scope="col">Anggaran Digunakan</th>
                                        <th scope="col">Sisa Anggaran</th>
                                        <th scope="col">Tgl Input</th>
                                        <th scope="col">Tahun Anggaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($pagu as $sm) :
                                        $tanggalKeluar = new DateTime($sm['tahun_anggaran']);
                                        $sisaanggaran = $sm['total_anggaran'] - $sm['anggaran_digunakan'];
                                    ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td><?=$sm['kd_pagu']?></td>
                                        <td><?= "Rp. " . number_format($sm['total_anggaran'], 0, ".", "."); ?></td>
                                        <td><?= "Rp. " . number_format($sm['anggaran_digunakan'], 0, ".", "."); ?></td>
                                        <td><?= "Rp. " . number_format($sisaanggaran, 0, ".", "."); ?></td>
                                        <td><?= date_format($tanggalKeluar, "d-m-Y"); ?></td>
                                        <td><?= date_format($tanggalKeluar, "Y"); ?></td>
                                        <!-- <td>
                                            <a type="button"
                                                href="<?= base_url('master/supplier-edit/') . $sm['kd_pagu']; ?>"
                                                class="badge bg-primary"><i class="bi bi-pencil"></i></a>
                                            <a type="button" class="badge bg-danger"
                                                data-bs-target="#hapus<?= $sm['kd_pagu']; ?>" data-bs-toggle="modal"><i
                                                    class="bi bi-trash"></i></a>
                                        </td> -->
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card overflow-auto">
                        <div class="card-body">
                            <h5 class="card-title text-center">Pergeseran Anggaran</h5>
                            <button type="button" title="Tambah Pergeseran" class="btn btn-primary text-white mb-3"
                                data-bs-toggle="modal" data-bs-target="#tambahpergeseran"><i
                                    class="bi bi-plus-circle"></i>
                                Pergeseran
                            </button>
                            &nbsp;
                            <button type="button" title="Tambah Pergeseran" class="btn btn-warning text-dark mb-3"
                                data-bs-toggle="modal" data-bs-target="#kuarangpergeseran"><i
                                    class="ri ri-indeterminate-circle-line"></i>
                                Pergeseran
                            </button>
                            <table class="table datatable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope=" col">No</th>
                                        <th scope="col">Kode Anggaran</th>
                                        <th scope="col">Jumlah Pergeseran</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Tgl Pergeseran</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($getpergesran as $sm) :
                                        $tanggalKeluar = new DateTime($sm['tgl_pergeseran']);
                                    ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td><?= $sm['kd_pagu']?></td>
                                        <td><?= "Rp. " . number_format($sm['jumlah_pergeseran'], 0, ".", "."); ?></td>
                                        <td><?= $sm['keterangan']?></td>
                                        <td><?= date_format($tanggalKeluar, "d-m-Y"); ?></td>
                                        <td><?php if($sm['status'] === 'tambah') { ?>
                                            <span class="badge bg-primary">Tambah</span>
                                            <?php } else { ?>
                                            <span class="badge bg-warning">Kurang</span>
                                            <?php } ?>
                                        </td>
                                        <!-- <td>
                                            <a type="button"
                                                href="<?= base_url('master/supplier-edit/') . $sm['kd_pagu']; ?>"
                                                class="badge bg-primary"><i class="bi bi-pencil"></i></a>
                                            <a type="button" class="badge bg-danger"
                                                data-bs-target="#hapus<?= $sm['kd_pagu']; ?>" data-bs-toggle="modal"><i
                                                    class="bi bi-trash"></i></a>
                                        </td> -->
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal tambah anggaran -->
            <div class="modal fade" id="tambah" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Pagu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('pagu') ?>" method="post">
                                <div class="form-group mb-3">
                                    <label for="kd_pagu" class="col-form-label">Kode Anggaran :</label>
                                    <input type="text" class="form-control " name="kd_pagu" value="<?= $kode_pagu?>"
                                        required readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="total_anggaran" class="col-form-label">Total Anggaran :</label>
                                    <input type="text" class="form-control " name="total_anggaran" id="rupiahtotal"
                                        required autocomplete='off'>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="tahun_anggaran" class="col-form-label">Tgl Input :</label>
                                    <input type="text" class="form-control " name="tahun_anggaran" id="pagu" required
                                        autocomplete='off'>
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
            <!-- End Tambah anggran-->

            <!-- modal tambah pergeseran -->
            <div class="modal fade" id="tambahpergeseran" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Pergeseran</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('pagu/pergeserantambah') ?>" method="post">
                                <div class="form-group mb-3">
                                    <label for="kd_pagu" class="col-form-label">Kode Anggaran :</label>
                                    <select class="form-control" name="kd_pagu" id="kd_paguuu" style="width: 100%">
                                        <option value=""></option>
                                        <?php foreach ($pagu as $m) : ?>
                                        <option value="<?= $m['kd_pagu']; ?>"><?= $m['kd_pagu']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="jumlah_pergeseran" class="col-form-label">Jumlah Pergeseran :</label>
                                    <input type="text" class="form-control " name="jumlah_pergeseran" id="rupiah2"
                                        required autocomplete='off'>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="keterangan" class="col-form-label">keterangan :</label>
                                    <input type="text" class="form-control " name="keterangan" required
                                        autocomplete='off'>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="tgl_pergeseran" class="col-form-label">Tgl Input :</label>
                                    <input type="text" class="form-control" name="tgl_pergeseran" id="tgl_pergeseran"
                                        required autocomplete='off'>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="jumlah_pergeseran" class="col-form-label">Sisa Anggaran :</label>
                                    <input type="text" class="form-control " id="total_anggaran" readonly required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="jumlah_pergeseran" class="col-form-label">Total Anggaran :</label>
                                    <input type="text" class="form-control " name="totaltambahanggaran" id="total_stok"
                                        required readonly>
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
            <!-- End tambah pergeseran-->

            <!-- modal kurang pergeseran -->
            <div class="modal fade" id="kuarangpergeseran" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Pergeseran</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('pagu/pergeserankurang') ?>" method="post">
                                <div class="form-group mb-3">
                                    <label for="kd_pagu" class="col-form-label">Kode Anggaran :</label>
                                    <select class="form-control" name="kd_pagu" id="kd_paguu" style="width: 100%">
                                        <option value=""></option>
                                        <?php foreach ($pagu as $m) : ?>
                                        <option value="<?= $m['kd_pagu']; ?>"><?= $m['kd_pagu']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="jumlah_pergeseran" class="col-form-label">Jumlah Pergeseran :</label>
                                    <input type="text" class="form-control " name="jumlah_pergeseran" id="rupiah1"
                                        required autocomplete='off'>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="keterangan" class="col-form-label">keterangan :</label>
                                    <input type="text" class="form-control " name="keterangan" required
                                        autocomplete='off'>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="tgl_pergeseran" class="col-form-label">Tgl Input :</label>
                                    <input type="text" class="form-control" name="tgl_pergeseran" id="tgl_pergeseran2"
                                        required autocomplete='off'>
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
            <!-- End kurang pergeseran-->

            <!-- modal hapus -->
            <?php $no = 0;
            foreach ($pagu as $m) : $no++; ?>
            <div class="modal fade" id="hapus<?= $m['kd_pagu']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                    <p>Anda yakin mau menghapus <b><?php echo $m['tahun_anggaran']; ?> ?</b></p>
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    </script>
    <script type="text/javascript">
    $(function() {
        $("#pagu").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
        });
        $("#tgl_pergeseran").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            dropdownParent: $('#kuarangpergeseran')
        });
        $("#tgl_pergeseran2").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            dropdownParent: $('#kuarangpergeseran')
        });

        $(document).ready(function() {
            $('#kd_paguu').select2({
                closeOnSelect: true,
                allowClear: true,
                dropdownParent: $('#kuarangpergeseran')
            });
        });
        $(document).ready(function() {
            $('#kd_paguuu').select2({
                closeOnSelect: true,
                allowClear: true,
                dropdownParent: $('#tambahpergeseran')
            });
        });
    });
    </script>

    <script type="text/javascript">
    function setupRupiahFormatter(elementId) {
        var rupiahElement = document.getElementById(elementId);

        rupiahElement.addEventListener('keyup', function(e) {
            rupiahElement.value = formatRupiah(this.value, 'Rp. ');
        });

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix === undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    }
    setupRupiahFormatter('rupiahtotal');
    setupRupiahFormatter('rupiah1');
    setupRupiahFormatter('rupiah2');
    </script>

    <script type="text/javascript">
    let hal = '<?= $this->uri->segment(1); ?>';
    let total_anggaran = $('#total_anggaran');
    let total = $('#total_stok');
    let jumlah = hal == 'barangmasuk' ? $('#rupiah2') : $('#jumlah_keluar');

    $(document).on('change', '#kd_paguuu', function() {
        let url = '<?= base_url('transaksi/getpagu/'); ?>' + this.value;
        $.getJSON(url, function(data) {
            total_anggaran.val(formatRupiah(data.total_anggaran));
            total.val(formatRupiah(data.total));
            jumlah.focus();
        });
    });

    $(document).on('keyup', '#rupiah2', function() {
        let totalStok = parseInt(total_anggaran.val().replace(/\D/g, '')) + parseInt(this.value.replace(/\D/g,
            ''));
        total.val(formatRupiah(totalStok));
    });

    $(document).on('keyup', '#jumlah_keluar', function() {
        let totalStok = parseInt(total_anggaran.val().replace(/\D/g, '')) - parseInt(this.value.replace(/\D/g,
            ''));
        total.val(formatRupiah(totalStok));
    });

    // Fungsi untuk mengubah angka menjadi format Rupiah
    function formatRupiah(angka) {
        let reverse = angka.toString().split('').reverse().join('');
        let ribuan = reverse.match(/\d{1,3}/g);
        let formatted = ribuan.join('.').split('').reverse().join('');
        return 'Rp ' + formatted;
    }
    </script>

</body>

</html>