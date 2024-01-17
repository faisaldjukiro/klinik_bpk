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

    <!-- ======= Header ======= -->
    <?php $this->load->view('template/header')?>

    <?php $this->load->view('template/sidebar')?>

    <main id="main" class="main">
        <?= $this->session->flashdata('message'); ?>

        <div class="pagetitle">
            <h1>Edit Obat Masuk</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('')?>">Beranda</a></li>
                    <li class="breadcrumb-item active">Edit Obat Masuk</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section ">
            <div class="row center">
                <div class="col-lg-12">
                    <div class="card mx-auto mx-auto border" style="max-width:52vw;">
                        <div class="card-header bg-primary text-white p-2 text-center">
                            Edit Obat Masuk
                        </div>
                        <div class="card-body">
                            <br>
                            <form action="<?= base_url('transaksi/obat-masuk-edit/').$obat_masuk['id_obat_masuk'] ?>"
                                method="post" class="row g-3">
                                <input type="hidden" name="id_obat_masuk" value="<?= $obat_masuk['id_obat_masuk']?>">
                                <input type="hidden" class="form-control" name="id_user"
                                    value="<?= $user['id_user'] ?>">
                                <div class="col-md-6">
                                    <label class="form-label">Nama Obat</label>
                                    <select class="form-control" name="kd_obat" id="kd_barang" style="width: 100%">
                                        <option value=""></option>
                                        <?php foreach($obat as $stat):?>
                                        <option value="<?= $stat['kd_obat']?>"
                                            <?php if ($stat['kd_obat'] == $obat_masuk['kd_obat']) : ?>
                                            selected<?php endif; ?>>
                                            <?= $stat['nama_obat']?>
                                        </option>
                                        <?php endforeach; ?>
                                        <small class=" text-danger"><?= form_error('kd_obat');?></small>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Supplier</label>
                                    <select class="form-control" name="id_supplier" id="id_supplier"
                                        style="width: 100%">
                                        <option value=""></option>
                                        <?php foreach($supplier as $stat):?>
                                        <option value="<?= $stat['id_supplier']?>"
                                            <?php if ($stat['id_supplier'] == $obat_masuk['id_supplier']) : ?>
                                            selected<?php endif; ?>>
                                            <?= $stat['nama_supplier']?>
                                        </option>
                                        <?php endforeach; ?>
                                        <small class=" text-danger"><?= form_error('id_supplier');?></small>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="jumlah_masuk" class="form-label">Jumlah Masuk</label>
                                    <input type="number" class="form-control" name="jumlah_masuk" id="jumlah_masuk"
                                        value="<?= $obat_masuk['jumlah_masuk']?>">
                                    <small class=" text-danger"><?= form_error('jumlah_masuk');?></small>

                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Harga Satuan</label>
                                    <input type="text" class="form-control" name="harga_satuan" id="rupiah"
                                        value="<?= $obat_masuk['harga_satuan']?>">
                                    <small class=" text-danger"><?= form_error('harga_satuan');?></small>

                                </div>
                                <div class=" col-md-6">
                                    <label class="form-label">Stok</label>
                                    <input readonly="readonly" type="number" class="form-control" name="stok" id="stok"
                                        value="<?= $stok['stok']?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Total Stok</label>
                                    <div class="input-group mb-2">
                                        <input type="number" class="form-control" readonly="readonly"
                                            name="riwayat_stok" id="total_stok">
                                        <span class="input-group-text" id="satuan">Satuan</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Tanggal Masuk</label>
                                    <input type="date" class="form-control" name="tgl_masuk"
                                        value="<?= $obat_masuk['tgl_masuk']?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Tanggal Kadaluwarsa</label>
                                    <input type="date" class="form-control" name="tgl_kadaluwarsa" id="tgl_kaldaluarsa"
                                        value="<?= $obat_masuk['tgl_kadaluwarsa']?>">
                                </div>

                                <div class="text-start">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form><!-- End Multi Columns Form -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
    <!-- ======= Footer ======= -->
    <?php $this->load->view('template/footer')?>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    <?php $this->load->view('template/js')?>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#satuannnn').select2({
            placeholder: 'Pilih Satuan',


        });
    });
    </script>

    <script type="text/javascript">
    let hal = '<?= $this->uri->segment(1); ?>';

    let satuan = $('#satuan');
    let stok = $('#stok');
    let total = $('#total_stok');
    let jumlah = hal == 'barangmasuk' ? $('#jumlah_masuk') : $('#jumlah_keluar');

    $(document).on('change', '#kd_barang', function() {
        let url = '<?= base_url('transaksi/getstok/'); ?>' + this.value;
        $.getJSON(url, function(data) {
            satuan.html(data.nama_satuan);
            stok.val(data.stok);
            total.val(data.stok);
            jumlah.focus();
        });
    });

    $(document).on('keyup', '#jumlah_masuk', function() {
        let totalStok = parseInt(stok.val()) + parseInt(this.value);
        total.val(Number(totalStok));
    });

    $(document).on('keyup', '#jumlah_keluar', function() {
        let totalStok = parseInt(stok.val()) - parseInt(this.value);
        total.val(Number(totalStok));
    });
    $(document).ready(function() {
        $('#kd_barang').select2({
            closeOnSelect: true,
            allowClear: true
        });
    });
    $(document).ready(function() {
        $('#id_supplier').select2({
            closeOnSelect: true,
            allowClear: true
        });
    });
    </script>

    <script type="text/javascript">
    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e) {
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
    </script>


</body>

</html>