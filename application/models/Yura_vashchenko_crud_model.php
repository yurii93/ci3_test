<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Yura_vashchenko_crud_model extends CI_Model
{
    const PER_PAGE = 5;

    public function __construct()
    {
        parent::__construct();
    }

    /*
    * Get info about all users
    */
    public function getUsers()
    {
        $limit = '';
        if ($_GET['page'] && intval($_GET['page']) > 0) {
            $limit = ' LIMIT ' . ((intval($_GET['page']) - 1) * self::PER_PAGE) . ',' . self::PER_PAGE . '';
        }

        $where = '';
        if ($_GET['search']) {
            $where = " AND (
                        yurii_users.email LIKE '%" . $this->db->escape_like_str($_GET['search']) . "%'
                        OR yurii_groups.name LIKE '%" . $this->db->escape_like_str($_GET['search']) . "%'
                        )";
        }

        $sql = "SELECT yurii_users.id, yurii_users.email, GROUP_CONCAT(yurii_groups.name ORDER BY yurii_groups.name ASC SEPARATOR  '<br>') as groups
               FROM yurii_users
               LEFT JOIN yurii_users_groups ON yurii_users_groups.user_id = yurii_users.id
               LEFT JOIN yurii_groups ON yurii_users_groups.group_id = yurii_groups.id
               WHERE 1
               {$where}
               GROUP BY yurii_users.id
               {$limit}
                ";

        $result = $this->db->query($sql)->result_array();
        return $result;
    }

    /*
    * Add user
    */
    public function addUser()
    {
        $result = $this->ion_auth->register(
            $this->input->post('email', true),
            $this->input->post('password', true),
            $this->input->post('email', true),
            array(
                'first_name' => $this->input->post('first_name', true),
                'last_name' => $this->input->post('last_name', true)
            ),
            $this->input->post('groups', true)
        );

        return $result;
    }

    /*
    * Get info about all groups
    */
    public function getGroups()
    {
        $result = $this->db->get('yurii_groups')->result_array();
        return $result;
    }

    /*
    * Get info about one user
    */
    public function getUserInfo($id)
    {
        $sql = "SELECT yurii_users.id, yurii_users.first_name, yurii_users.last_name, yurii_users.email, GROUP_CONCAT(yurii_groups.name SEPARATOR  ',') as groups
                FROM yurii_users
                LEFT JOIN yurii_users_groups ON yurii_users_groups.user_id = yurii_users.id
                LEFT JOIN yurii_groups ON yurii_users_groups.group_id = yurii_groups.id
                WHERE yurii_users.id = " . intval($id) . "
                GROUP BY yurii_users.id
                LIMIT 1
                ";

        $result = $this->db->query($sql)->result_array();
        return $result[0];
    }

    /*
    * Update info about user
    */
    public function updateUser($id)
    {
        $id = intval($id);

        $fields = array(
            'first_name' => $this->input->post('first_name',true),
            'last_name' => $this->input->post('last_name',true),
            'email' => $this->input->post('email',true),
        );

        if ($this->input->post('password') && $this->input->post('password') != FALSE) {
            $fields['password'] = $this->input->post('password',true);
        }

        $res1 = $this->ion_auth->update($id, $fields);
        $res2 = $this->ion_auth->remove_from_group(NULL, $id);

        if (isset($_POST['groups']) && $_POST['groups']) {
            $res3 = $this->ion_auth->add_to_group($this->input->post('groups',true), $id);
        }
    }

    /*
    * Delete users and relationships
    */
    public function deleteUser()
    {
        if(!$this->input->get('del')) return false;

        $data = array_map('intval',$this->input->get('del'));

        foreach ($data as $user_id) {
            $this->ion_auth->delete_user($user_id);
        }
    }
}