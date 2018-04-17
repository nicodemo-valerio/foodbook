<?php
/**
 * User Class
 * 
 * @author Nicodemo Valerio <nicodemovalerio@gmail.com>
 */
class User_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_user_id($username)
    {
        $query = $this->db->get_where('user', array('username' => $username));
        return $query->row_array();
    }

    public function get_user($id)
    {
        $query = $this->db->get_where('user', array('id' => $id));
        return $query->row_array();
    }

    public function sign_in()
    {
        $where = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        );
        $query = $this->db->get_where('user', $where);
        return $query->row_array();
    }

    public function set_users()
    {
        $this->load->helper('url');
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'height' => $this->input->post('height'),
            'weight' => $this->input->post('weight'),
            'weight_goal' => $this->input->post('weight_goal')
        );
        return $this->db->insert('user', $data);
    }

    public function update_users($id)
    {
        $this->load->helper('url');
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'height' => $this->input->post('height'),
            'weight' => $this->input->post('weight'),
            'weight_goal' => $this->input->post('weight_goal')
        );
        return $this->db->update('user', $data, array('id' => $id));
    }

}
