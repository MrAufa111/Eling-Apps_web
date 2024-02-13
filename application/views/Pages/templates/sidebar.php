<?php $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(); ?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('Dashboard') ?>" class="brand-link " style="text-decoration: none;">
        <img src="<?= base_url() ?>assets/image/logo.png" alt="AdminLTE Logo" class="brand-image bg-white img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Eling-Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <?php
            $uri = $this->uri->segment(1);
            $role_id = $this->session->userdata('roleid');
            // var_dump($uri);
            $this->db->select('user_menu.id, menu, icon, url, Active');
            $this->db->from('user_menu');
            $this->db->join('user_access_menu', 'user_menu.id = user_access_menu.menu_id');
            $this->db->where('user_access_menu.role_id', $role_id);
            $this->db->order_by('user_access_menu.menu_id', 'ASC');

            $menu = $this->db->get()->result_array();

            ?>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php foreach ($menu as $m) : ?>
                    <?php if ($m['Active'] == 1) : ?>
                        <li class="nav-item ">
                            <a href="<?= base_url($m['url']); ?>" class="nav-link <?= $m['url'] == $uri ? 'active' : '' ?>">
                                <i class="nav-icon <?= $m['icon']; ?>"></i>
                                <p>
                                    <?= $m['menu']; ?>
                                </p>
                            </a>

                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>