<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <!-- QUERY MENU -->
        <?php 
            $role_id = $this->session->userdata('role_id');
            $queryMenu = "SELECT `user_menu`.`id` ,`menu`
            FROM `user_menu` JOIN `user_access_menu`
            ON `user_menu`.`id` = `user_access_menu`.`menu_id`
            WHERE `user_access_menu`.`role_id` = $role_id
            ORDER BY `user_access_menu`.`menu_id` ASC
            ";
        $menu = $this->db->query($queryMenu)->result_array();
        
        ?>
        <!-- LOOPING MENU  -->
        <?php foreach($menu as $m) :?>

        <li class="nav-heading">
            <?= $m['menu'];?>
        </li>
        <!-- SIPKAN SUB-MENU SESUAI MENU -->
        <?php
        $menuId = $m['id'];
            $querySubMenu = "SELECT * 
                              FROM `user_sub_menu`
                              WHERE `menu_id` = $menuId
                              AND `is_active`= 1
            "; 

        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>
        <?php foreach($subMenu as $sm): ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url($sm['url'])?>">
                <i class="<?= $sm['icon']?>"></i>
                <span><?= $sm['title']?></span>
            </a>
        </li><!-- End beranda Nav -->
        <?php endforeach;?>

        <?php endforeach;?>





        <li class=" nav-item">
            <a class="nav-link collapsed" href="users-profile.html">
                <i class="bi bi-bank2"></i>
                <span>Nama Apotek</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-file-earmark-medical-fill"></i><span>Obat</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="forms-elements.html">
                        <i class="bi bi-circle"></i><span>Satuan Obat</span>
                    </a>
                </li>
                <li>
                    <a href="forms-layouts.html">
                        <i class="bi bi-circle"></i><span>Data Obat</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-heading">TRANSAKSI</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.html">
                <i class="bi bi-layer-backward"></i>
                <span>Obat Masuk</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-faq.html">
                <i class="bi bi-layer-forward"></i>
                <span>Obat Keluar</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->


        <li class="nav-heading">REPORT</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-error-404.html">
                <i class="bi bi-printer-fill"></i>
                <span>Cetak Laporan</span>
            </a>
        </li><!-- End Error 404 Page Nav -->

        <li class="nav-heading">Users</li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?=  base_url('profile')?>">
                <i class="bi bi-people-fill"></i>
                <span>My Profile</span>
            </a>
        </li><!-- End Blank Page Nav -->

        <li class="nav-heading">settings</li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-blank.html">
                <i class="bi bi-people-fill"></i>
                <span>User Management</span>
            </a>
        </li><!-- End Blank Page Nav -->
    </ul>

</aside><!-- End Sidebar-->