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
            <h1>Edit Supplier</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('')?>">Beranda</a></li>
                    <li class="breadcrumb-item active">Edit Supplier</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section ">
            <div class="row center">
                <div class="col-lg-12">
                    <div class="card mx-auto border" style="max-width:60vw;">
                        <div class="card-header bg-primary text-white p-2 text-center">
                            Edit Supplier
                        </div>
                        <div class="card-body">
                            <br>
                            <form action="<?= base_url('master/supplier-edit/').$supplier['id_supplier'] ?>"
                                method="post">
                                <div class="row mb-3">
                                    <input type="hidden" name="id_supplier" value="<?= $supplier['id_supplier']?>">
                                    <label for="nama_supplier" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama_supplier" id="nama_supplier"
                                            value="<?= $supplier['nama_supplier']?>">
                                        <small class=" text-danger"><?= form_error('nama_supplier');?></small>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="no_telp" class="col-sm-2 col-form-label">No Telpon</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="no_telp" id="no_telp"
                                            value="<?= $supplier['no_telp']?>">
                                        <small class=" text-danger"><?= form_error('no_telp');?></small>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="alamat_suplier" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control"
                                            name="alamat_suplier"><?php echo $supplier['alamat_suplier']; ?></textarea>
                                        <small class=" text-danger"><?= form_error('alamat_suplier');?></small>
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