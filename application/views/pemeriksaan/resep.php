<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('template/head')?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
        <?= $this->session->flashdata('message'); ?>
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
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?= base_url('pemeriksaan/resep') ?>" method="post">
                                <h5 class="card-title">Resep Obat</h5>
                                <div class="row mb-3">
                                    <input type="hidden" name="id_user" value="<?= $user['id_user']?>">
                                    <label for="kd_peg" class="col-sm-2 col-form-label">Nama Pegawai</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="kd_peg" id="pegawai" style="width: 100%"
                                            value="<?= set_value('kd_peg') ?>">
                                            <option value=""></option>
                                            <?php foreach ($pegawai as $m) : ?>
                                            <option value="<?= $m['kd_peg']; ?>"
                                                <?= set_select('kd_peg', $m['kd_peg'], isset($selected_obat) && $selected_obat == $m['kd_peg']); ?>>
                                                <?= $m['nama_lengkap']; ?>
                                            </option>
                                            <?php endforeach; ?>

                                        </select>
                                        <small class="text-danger"><?= form_error('kd_peg');?></small>

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="kd_obat" class="col-sm-2 col-form-label">Obat</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="kd_obat" id="kd_obat" style="width: 100%"
                                            value="<?= set_value('kd_obat') ?>">
                                            <option value=""></option>
                                            <?php foreach ($obat as $m) : ?>
                                            <option value="<?= $m['kd_obat']; ?>"
                                                <?= set_select('kd_obat', $m['kd_obat'], isset($selected_obat) && $selected_obat == $m['kd_obat']); ?>>
                                                <?= $m['nama_obat']; ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="text-danger"><?= form_error('kd_obat');?></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="kd_obat" class="col-sm-2 col-form-label">Jumlah</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="jumlah_keluar"
                                            id="jumlah_keluar">
                                        <small class="text-danger"><?= form_error('jumlah_keluar');?></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="kd_obat" class="col-sm-2 col-form-label">Stok</label>
                                    <div class="col-md-10">
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control" readonly="readonly"
                                                name="riwayat_stok" id="total_stok" required>
                                            <input type="hidden" class="form-control" readonly="readonly" id="stok">
                                            <span class="input-group-text" id="satuan">Satuan</span>
                                        </div>
                                        <small class="text-danger"><?= form_error('riwayat_stok');?></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="aturan_pakai" class="col-sm-2 col-form-label">Aturan Pakai</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="aturan_pakai"
                                            value="<?= set_value('aturan_pakai') ?>">
                                        <small class="text-danger"><?= form_error('aturan_pakai');?></small>

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tgl_resep" class="col-sm-2 col-form-label">Tgl Resep</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="tgl_keluar" id="tgl_keluar"
                                            autocomplete='off' value="<?= set_value('tgl_keluar') ?>">
                                        <small class="text-danger"><?= form_error('tgl_keluar');?></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="text-end">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            <button type="reset" class="btn btn-secondary">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Riwayat Resep</h5>
                            <form action="">
                                <table class="table table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Pegawai</th>
                                            <th scope="col">Obat</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Aturan Pakai</th>
                                            <th scope="col">Tgl Resep</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                        foreach ($listobat as $sm) : 
                                            $tanggalKeluar = new DateTime($sm['tgl_keluar']);
                                        ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $sm['nama_lengkap']; ?></td>
                                            <td><?= $sm['nama_obat']; ?></td>
                                            <td><?= $sm['jumlah_keluar']; ?></td>
                                            <td><?= $sm['aturan_pakai']; ?></td>

                                            <td><?= date_format($tanggalKeluar,"d-m-Y"); ?></td>
                                            <td>
                                                <a type="button" class="badge bg-primary" title="Pengembalian Obat"
                                                    data-bs-target="#kembali<?= $sm['id_obat_keluar']; ?>"
                                                    data-bs-toggle="modal"><i
                                                        class="bi bi-skip-backward-circle"></i></a>
                                                <a type="button" class="badge bg-danger" title="Hapus Obat"
                                                    data-bs-target=" #hapus<?= $sm['id_obat_keluar']; ?>"
                                                    data-bs-toggle="modal"><i class="bi bi-trash"></i></a>

                                            </td>

                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- modal hapus -->
            <?php $no = 0;
            foreach ($listobat as $m) : $no++; ?>
            <div class="modal fade" id="hapus<?= $m['id_obat_keluar']; ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Hapus Resep</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="post"
                                action="<?php echo base_url('pemeriksaan/resephapus') ?>">
                                <div class="modal-body">
                                    <p>Anda yakin mau menghapus</p>
                                    <p>Nama Pegawai: <b><?php echo $m['nama_lengkap']; ?></b></p>
                                    <p>Nama Obat: <b><?php echo $m['nama_obat']; ?></b></p>
                                </div>
                                <input type="hidden" name="id_obat_keluar" value="<?php echo $m['id_obat_keluar']; ?>">
                                <input type="hidden" name="jumlah_keluar" value="<?php echo $m['jumlah_keluar']; ?>">
                                <input type="hidden" name="kd_obat" value="<?php echo $m['kd_obat']; ?>">
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

            <!-- pengmbalian obat -->
            <?php $no = 0;
            foreach ($listobat as $m) : $no++; ?>
            <div class="modal fade" id="kembali<?= $m['id_obat_keluar']; ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Pengembalian Resep</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="post"
                                action="<?php echo base_url('pemeriksaan/kembaliresep') ?>">
                                <div class="modal-body">
                                    <p>Anda yakin mau mengembalikan</p>
                                    <div class="row mb-1">
                                        <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10 d-flex align-items-center">
                                            <span><b><?php echo $m['nama_lengkap']; ?></b></span>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <label for="nama_obat" class="col-sm-2 col-form-label">Obat</label>
                                        <div class="col-sm-10 d-flex align-items-center">
                                            <span><b><?php echo $m['nama_obat']; ?></b></span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Jumlah</label>
                                        <div class="col-sm-10 d-flex align-items-center">
                                            <span><b><?php echo $m['jumlah_keluar']; ?>
                                                    <?php echo $m['nama_satuan']; ?></b></span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Jumlah</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="jumlah_kembali"
                                                placeholder="Tidak Bisa Lebih Dari jumlah Pertama" min="1" required>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="id_obat_keluar" value="<?php echo $m['id_obat_keluar']; ?>">
                                <input type="hidden" name="jumlah_keluar" value="<?php echo $m['jumlah_keluar']; ?>">
                                <input type="hidden" name="kd_obat" value="<?php echo $m['kd_obat']; ?>">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Keluar</button>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <!-- pengembalian obat-->
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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <script type="text/javascript">
    let hal = '<?= $this->uri->segment(1); ?>';

    let satuan = $('#satuan');
    let stok = $('#stok');
    let total = $('#total_stok');
    let jumlah_keluar = $('#jumlah_keluar');

    $(document).on('change', '#kd_obat', function() {
        let url = '<?= base_url('transaksi/getstok/'); ?>' + this.value;
        $.getJSON(url, function(data) {
            satuan.html(data.nama_satuan);
            stok.val(data.stok);
            total.val(data.stok);
            jumlah_keluar.focus();
        });
    });

    $(document).on('keyup', '#jumlah_keluar', function() {
        let totalStok = parseInt(stok.val()) - parseInt(this.value);
        total.val(isNaN(totalStok) ? '' : totalStok);
    });

    $(document).ready(function() {
        $('#kd_obat').select2({
            closeOnSelect: true,
            allowClear: true
        });
    });
    $(document).ready(function() {
        $('#pegawai').select2({
            closeOnSelect: true,
            allowClear: true
        });
    });
    </script>

    <script>
    $(function() {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; // January is 0!
        var yyyy = today.getFullYear();

        if (dd < 10) {
            dd = '0' + dd;
        }

        if (mm < 10) {
            mm = '0' + mm;
        }

        today = yyyy + '-' + mm + '-' + dd;

        $("#tgl_keluar").val(today);
        $("#tgl_keluar").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true
        });

    });
    </script>
</body>

</html>