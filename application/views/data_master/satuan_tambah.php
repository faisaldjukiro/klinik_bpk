<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('template/head')?>
</head>

<body>

    <!-- ======= Header ======= -->
    <?php $this->load->view('template/header')?>

    <?php $this->load->view('template/sidebar')?>

    <main id="main" class="main">


        <?= $this->session->flashdata('message'); ?>

        <div class="pagetitle">
            <h1>Tambah Satuan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('')?>">Beranda</a></li>
                    <li class="breadcrumb-item active">Tambah Satuan</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section ">
            <div class="row center">
                <div class="col-lg-12">
                    <div class="card mx-auto border" style="max-width:50vw;">
                        <div class="card-header bg-primary text-white p-2 text-center">
                            Tambah Satuan
                        </div>
                        <div class="card-body">
                            <br>
                            <form action="<?= base_url('master/satuan-tambah') ?>" method="post">
                                <div class="row mb-3">
                                    <label for="nama_satuan" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama_satuan" id="nama_satuan">
                                        <small class="text-danger"><?= form_error('nama_satuan');?></small>
                                    </div>
                                </div>

                                <div class="text-start">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="reset" class="btn btn-secondary">Hapus</button>
                                </div>
                            </form><!-- End Horizontal Form -->

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
    </script>

</body>

</html>