<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('template/head')?>
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
    <?php $this->load->view('template/header')?>

    <?php $this->load->view('template/sidebar')?>

    <main id="main" class="main">
        <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
        <?php endif; ?>

        <?= $this->session->flashdata('message'); ?>

        <div class="pagetitle">
            <h1>User Management</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('')?>">Beranda</a></li>
                    <li class="breadcrumb-item active">User Management</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-auto">
                        <div class="card-body">
                            <br>
                            <button type="button" title="Tambah Sub Menu" class="btn btn-primary mb-3"
                                data-bs-toggle="modal" data-bs-target="#tambah"><i class="bi bi-plus-circle"></i>
                                Data
                            </button>

                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Bagian</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">role</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Tgl Buat</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; 
                                        foreach ($userr as $sm) : ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td><img src="<?= base_url('img/') .$sm['image']?> " alt="image" width="35"
                                                height="35">
                                        </td>
                                        <td><?= $sm['nama']; ?></td>
                                        <td><?= $sm['nama_subbagian']; ?></td>
                                        <td><?= $sm['email']; ?></td>
                                        <!-- <td><?= $sm['image']; ?></td> -->
                                        <td><?= $sm['role']; ?></td>
                                        <td><?php if($sm['is_active'] === '1') { ?>
                                            <span class="badge bg-success">Aktif</span>
                                            <?php } else { ?>
                                            <span class="badge bg-danger">In Aktif</span>
                                            <?php } ?>
                                        </td>
                                        <td><?= date('d F Y',$sm['date_created']); ?></td>
                                        <td>
                                            <a class="badge bg-primary"
                                                data-bs-target="#editMenuModal<?= $sm['id_user'];?>"
                                                data-bs-toggle="modal"><i class="bi bi-pencil"></i></a>

                                            <a href="" class="badge bg-danger"
                                                data-bs-target="#hapus<?= $sm['id_user'];?>" data-bs-toggle="modal"><i
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

            <!-- modal tambah -->
            <div class="modal fade" id="tambah" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('settings/user') ?>" method="post">
                                <div class="form-group">
                                    <label for="nama" class="col-form-label">Nama :</label>
                                    <input type="text" class="form-control border" name="nama" id="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="id_subbagian" class="col-form-label">Sub Bagian :</label>
                                    <select name="id_subbagian" id="id_subbagian" class="form-control" required>
                                        <option value=""></option>
                                        <?php foreach ($subbagiann as $m) : ?>
                                        <option value="<?= $m['id_subbagian']; ?>"><?= $m['nama_subbagian']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-form-label">Email :</label>
                                    <input type="email" class="form-control border" name="email" id="email" required>
                                </div>

                                <label for="password1" class="col-form-label">Password :</label>
                                <div class="input-group">
                                    <input type="password" id="password1" name="password1" class="form-control"
                                        placeholder="">
                                    <span class="input-group-text" id="togglePassword">
                                        <i class="bi bi-eye-slash" id="eyeIcon"></i>
                                    </span>
                                </div>
                                <small class="text-danger"><?= form_error('password1');?></small>

                                <label for="password2" class="col-form-label">Ulangi Password :</label>
                                <div class="input-group">
                                    <input type="password" id="password2" name="password2" class="form-control"
                                        placeholder="">
                                    <span class="input-group-text" id="togglePassword2">
                                        <i class="bi bi-eye-slash" id="eyeIcon2"></i>
                                    </span>
                                </div>
                                <small class="text-danger"><?= form_error('password2');?></small>

                                <div class="form-group">
                                    <label for="role_id" class="col-form-label">Role :</label>
                                    <select name="role_id" id="role_id" class="form-control">
                                        <option value=""></option>
                                        <?php foreach ($role as $m) : ?>
                                        <option value="<?= $m['role_id']; ?>"><?= $m['role']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="is_active"
                                            id="is_active" checked>
                                        <label class="form-check-label" for="is_active">
                                            Aktif ?
                                        </label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Keluar</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Tambah-->

            <!-- modal Edit -->
            <?php $no = 0; 
                 foreach ($userr as $sm) : $no++ ;?>
            <div class="modal fade" id="editMenuModal<?= $sm['id_user'];?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('settings/edit_user') ?>" method="post">
                                <div class="form-group">
                                    <input type="hidden" name="id_user" value="<?= $sm['id_user']?>">
                                    <label for="nama" class="col-form-label">Nama :</label>
                                    <input type="text" class="form-control border" name="nama" id="nama"
                                        value="<?= $sm['nama'];?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="id_subbagian" class="col-form-label">Sub Bagian :</label>
                                    <select name="id_subbagian" id="id_subbagian" class="form-control" required>
                                        <option value=""></option>
                                        <?php foreach($subbagiann as $stat):?>
                                        <option value="<?= $stat['id_subbagian']?>"
                                            <?php if ($stat['id_subbagian'] == $sm['id_subbagian']) : ?>
                                            selected<?php endif; ?>>
                                            <?= $stat['nama_subbagian']?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-form-label">Email :</label>
                                    <input type="email" class="form-control border" name="email" id="email"
                                        value="<?= $sm['email']?>" required>
                                </div>

                                <label for="password1" class="col-form-label">Password :</label>
                                <div class="input-group">
                                    <input type="password" id="password1" name="password1" class="form-control"
                                        placeholder="">
                                    <span class="input-group-text" id="togglePasswordedit">
                                        <i class="bi bi-eye-slash" id="eyeIconedit"></i>
                                    </span>
                                </div>
                                <small class="text-danger"><?= form_error('password1');?></small>

                                <label for=" password2" class="col-form-label">Ulangi Password :</label>
                                <div class="input-group">
                                    <input type="password" id="password2" name="password2" class="form-control"
                                        placeholder="">
                                    <span class="input-group-text" id="togglePasswordedit2">
                                        <i class="bi bi-eye-slash" id="eyeIconedit2"></i>
                                    </span>
                                </div>
                                <small class="text-danger"><?= form_error('password2');?></small>

                                <div class="form-group">
                                    <label for="role_id" class="col-form-label">Role :</label>
                                    <select name="role_id" id="role_id" class="form-control">
                                        <option value=""></option>
                                        <?php foreach ($role as $m) : ?>
                                        <option value="<?= $m['role_id']?>"
                                            <?php if ($m['role_id'] == $sm['role_id']) : ?> selected<?php endif; ?>>
                                            <?= $m['role']?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="is_active"
                                            id="is_active" checked>
                                        <label class="form-check-label" for="is_active">
                                            Aktif ?
                                        </label>
                                    </div>
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
            <?php endforeach; ?>
            <!-- End Edit-->

            <!-- modal hapus -->
            <?php $no = 0; 
                 foreach ($userr as $sm) : $no++ ;?>
            <div class="modal fade" id="hapus<?= $sm['id_user'];?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Hapus Sub Menu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="post"
                                action="<?php echo base_url('settings/hapussubmenu')?>">
                                <div class="modal-body">
                                    <p>Anda yakin mau menghapus <b><?php echo $sm['title'];?> ?</b></p>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $sm['id'];?>">
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
    <?php $this->load->view('template/footer')?>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <?php $this->load->view('template/js')?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordInputs = [document.getElementById('password1'), document.getElementById('password2')];
        const eyeIcons = [document.getElementById('eyeIcon'), document.getElementById('eyeIcon2'), document
            .getElementById('eyeIconedit'), document.getElementById('eyeIconedit2')
        ];
        const togglePasswords = [document.getElementById('togglePassword'), document.getElementById(
            'togglePassword2'), document.getElementById('togglePasswordedit'), document.getElementById(
            'togglePasswordedit2')];

        togglePasswords.forEach((togglePassword, index) => {
            togglePassword.addEventListener('click', function() {
                const type = passwordInputs[index].getAttribute('type') === 'password' ?
                    'text' : 'password';
                passwordInputs[index].setAttribute('type', type);

                // Ganti ikon mata terbuka/tutup di sini (Opsional)
                eyeIcons[index].classList.toggle('bi-eye');
                eyeIcons[index].classList.toggle('bi-eye-slash');
            });
        });
    });
    </script>


</body>

</html>