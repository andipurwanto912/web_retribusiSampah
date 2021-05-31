<?php

function is_logged_in()
{
    $rs = get_instance();

    if (!$rs->session->userdata('email')) {
        redirect('auth');
    } else {
        # code...
        $role_id = $rs->session->userdata('role_id');
        $menu = $rs->uri->segment(1);

        $queryMenu = $rs->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $rs->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}

function checkAccess($role_id, $menu_id)
{
    $rs = get_instance();

    $rs->db->where('role_id', $role_id);
    $rs->db->where('menu_id', $menu_id);
    $result = $rs->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        # code...
        return "checked = 'checked'";
    }
}
