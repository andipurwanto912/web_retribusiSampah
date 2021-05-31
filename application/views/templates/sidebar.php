<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">RETRIBUSI SAMPAH</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">RS</a>
        </div>
        <ul class="sidebar-menu">
            <!-- query menu -->
            <?php
            $role_id = $this->session->userdata('role_id');
            $queryMenu = "SELECT `user_menu`.`id`, `menu` 
                            FROM `user_menu` JOIN `user_access_menu`
                              ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                            WHERE `user_access_menu`.`role_id` = $role_id
                          ORDER BY `user_access_menu`.`menu_id` ASC
                            ";
            $menu = $this->db->query($queryMenu)->result_array();
            ?>

            <!-- LOOPING MENU -->
            <?php foreach ($menu as $m) : ?>
                <li class="menu-header">
                    <?= $m['menu']; ?>
                </li>

                <!-- SIAPKAN SUB MENU SESUAI MENU -->
                <?php
                $menuId = $m['id'];
                $querySubMenu = "SELECT * FROM `user_sub_menu` JOIN `user_menu`
                                ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                             WHERE `user_sub_menu`.`menu_id` = {$m['id']}
                               AND `user_sub_menu`.`is_active` = 1
                                ";
                $subMenu = $this->db->query($querySubMenu)->result_array();
                ?>

                <?php foreach ($subMenu as $sm) : ?>
                    <?php if ($title == $sm['title']) : ?>
                        <li class="nav-item active">
                        <?php else : ?>
                        <li class="nav-item">
                        <?php endif; ?>
                        <a href="<?= base_url($sm['url']); ?>" class="nav-link pb-0">
                            <i class="<?= $sm['icon']; ?>"></i>
                            <span><?= $sm['title']; ?></span>
                        </a>
                        </li>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </ul>
    </aside>
</div>