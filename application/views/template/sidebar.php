<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <!-- QUERY MENU -->
        <?php 
            $role_id = $this->session->userdata('role_id');
            $queryMenu = "SELECT `user_menu`.`id` ,`menu`
            FROM `user_menu` JOIN `user_access_menu`
            ON `user_menu`.`id` = `user_access_menu`.`menu_id`
            WHERE `user_access_menu`.`role_id` = $role_id
            ORDER BY `user_menu`.`urutan` ASC
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
            FROM `user_sub_menu` JOIN `user_menu` 
              ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
           WHERE `user_sub_menu`.`menu_id` = $menuId
             AND `user_sub_menu`.`is_active` = 1
             ORDER BY `user_sub_menu`.`urutan` ASC
            "; 

        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach($subMenu as $sm): ?>
        <?php if($title == $sm['title']):?>
        <li class="nav-item ">
            <a class="nav-link" href="<?= base_url($sm['url'])?>">
                <?php else:?>
                <a class="nav-link collapsed" href="<?= base_url($sm['url'])?>">
                    <?php endif;?>
                    <i class="<?= $sm['icon']?>"></i>
                    <span><?= $sm['title']?></span>
                </a>
        </li>

        <!-- End beranda Nav -->
        <?php endforeach;?>

        <?php endforeach;?>
        <li class="nav-item">
            <a class="nav-link collapsed text-danger" href="<?= base_url('LoginController/logout')?>">
                <i class="bi bi-box-arrow-right"></i>
                <span>Keluar</span>
            </a>
        </li><!-- End Blank Page Nav -->


    </ul>

</aside><!-- End Sidebar-->