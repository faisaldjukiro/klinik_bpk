<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('template/head')?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
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

<body>

    <!-- ======= Header ======= -->
    <?php $this->load->view('template/header')?>

    <?php $this->load->view('template/sidebar')?>

    <main id="main" class="main">


        <?= $this->session->flashdata('message'); ?>

        <div class="pagetitle">
            <h1>Edit Obat</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('')?>">Beranda</a></li>
                    <li class="breadcrumb-item active">Edit Obat</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section ">
            <div class="row center">
                <div class="col-lg-12">
                    <div class="card mx-auto border" style="max-width: 50%;">
                        <div class="card-header bg-primary text-white p-2 text-center">
                            Edit Obat
                        </div>
                        <div class="card-body">
                            <br>
                            <form action="<?= base_url('master/obat-edit/').$obat['kd_obat'] ?>" method="post">
                                <div class="row mb-3">
                                    <input type="hidden" name="kd_obat" value="<?= $obat['kd_obat']?>">
                                    <label for="kd_obat" class="col-sm-2 col-form-label">Kode Obat</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kd_obat" readonly id="kd_obat"
                                            value="<?= $obat['kd_obat']?>">
                                        <small class="text-danger"><?= form_error('kd_obat');?></small>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="nama_obat" class="col-sm-2 col-form-label">Nama obat</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama_obat" id="nama_obat"
                                            value="<?= $obat['nama_obat']?>">
                                        <small class="text-danger"><?= form_error('nama_obat');?></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="id_satuan" class="col-sm-2 col-form-label">Satuan</label>
                                    <div class="col-sm-10">
                                        <select name="id_satuan" id="satuan" class="form-control">
                                            <?php foreach ($satuanedit as $stat) : ?>
                                            <option value="<?= $stat['id_satuan'] ?>"
                                                <?php if ($stat['id_satuan'] == $obat['id_satuan']) : ?>
                                                selected<?php endif; ?>>
                                                <?= $stat['nama_satuan'] ?>
                                            </option>
                                            <?php endforeach; ?>

                                        </select>
                                        <small class="text-danger"><?= form_error('id_satuan');?></small>
                                    </div>
                                </div>
                                <div class="text-start">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="reset" class="btn btn-secondary">Hapus</button>
                                </div>
                            </form>

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
        $('#satuan').select2({
            closeOnSelect: true,
            allowClear: true

        });

    });
    </script>


</body>

</html>