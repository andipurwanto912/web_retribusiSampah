<?php

class userapiModel extends CI_Model
{
    protected $user_table = 'tb_user';

    /**
     * user register
     * @param: array user data
     */
    public function insert_user(array $data)
    {
        $this->db->insert($this->user_table, $data);
        return $this->db->insert_id();
    }

    public function user_login($email, $password)
    {
        $this->db->where('email', $email);
        $q = $this->db->get($this->user_table);

        if ($q->num_rows()) {
            $user_pass = $q->row('password');
            if (password_verify($password, $user_pass)) {
                return $q->row();
            }
            return FALSE;
        } else {
            return FALSE;
        }
    }
}
