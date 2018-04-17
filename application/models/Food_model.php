<?php

/**
 * Food model Class
 *
 * @category    Model
 * @author      Nicodemo Valerio <nicodemovalerio@gmail.com>
 */
class Food_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_totals()
    {
        $foods = $this->get_foods();
        $totals = array();
        foreach ($foods as $food)
        {
            $kcal = ($food['carb'] * 4) + ($food['prot'] * 4) + ($food['fat'] * 9 ) + ($food['alcohol'] * 5.53);
            array_push($totals, $kcal);
        }
        return $totals;
    }

    public function get_food_id($food)
    {
        $query = $this->db->get_where('food', array('name' => $food));
        return $query->row_array();
    }

    public function get_foods($id = FALSE)
    {
        if ($id === FALSE)
        {
            $this->db->order_by('food', 'ASC');
            $query = $this->db->get('food');
            return $query->result_array();
        }
        $query = $this->db->get_where('food', array('id' => $id));
        return $query->row_array();
    }

    public function set_foods()
    {
        $this->load->helper('url');
        $data = array(
            'food' => $this->input->post('food'),
            'carb' => $this->input->post('carb'),
            'prot' => $this->input->post('prot'),
            'fat' => $this->input->post('fat'),
            'alcohol' => $this->input->post('alcohol'),
            'price' => $this->input->post('price')
        );
        return $this->db->insert('food', $data);
    }

    public function update_foods($id)
    {
        $this->load->helper('url');
        $data = array(
            'food' => $this->input->post('food'),
            'carb' => $this->input->post('carb'),
            'prot' => $this->input->post('prot'),
            'fat' => $this->input->post('fat'),
            'alcohol' => $this->input->post('alcohol'),
            'price' => $this->input->post('price')
        );
        return $this->db->update('food', $data, array('id' => $id));
    }

    public function delete($id)
    {
        $this->load->helper('url');
        return $this->db->delete('food', array('id' => $id));
    }

}
