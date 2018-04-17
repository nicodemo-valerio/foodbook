<?php

/**
 * Menu Class
 * 
 * A menu is a set of meals - breakfast, lunch, dinner and snacks
 * 
 * @author Nicodemo Valerio <nicodemovalerio@gmail.com>
 */
class Menu_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->library('dbhelper');
        $this->load->library('datahelper');
    }

    public function get_menus($user_id, $menu_id = NULL)
    {
        if (empty($menu_id))
        {
            $this->db->order_by('date', 'DESC');
            $query = $this->db->get_where('menu', array('user_id' => $user_id));
            return $query->result_array();
        }
        $this->db->select('menu.*, meal.name, menu_meal.meal_id');
        $this->db->from(array('menu'));
        $this->db->join('menu_meal', 'menu_meal.menu_id = menu.id');
        $this->db->join('meal', 'menu_meal.meal_id = meal.id');
        $this->db->where('menu.id', $menu_id);
        $this->db->where('menu.user_id', $user_id);
        $this->db->order_by('menu.date');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function set_menus()
    {
        $this->load->helper('url');
        $data = array(
            'menu' => $this->input->post('name'),
            'date' => $this->input->post('date'),
            'description' => $this->input->post('description'),
            'user_id' => $this->input->post('user-id')
        );
        $this->db->insert('menu', $data);
        $menu_id = $this->db->insert_id();

        //insert selected meals on menu_meal table
        for ($i = 1; $i <= $this->input->post('number-of-meals'); $i++)
        {
            $meal_id = $this->input->post('meal-id-' . $i);
            $data = array('menu_id' => $menu_id, 'meal_id' => $meal_id);
            $this->db->insert('menu_meal', $data);
        }
    }

    public function update($id)
    {
        $this->load->helper('url');
        $data = array(
            'menu' => $this->input->post('name'),
            'date' => $this->input->post('date'),
            'description' => $this->input->post('description'),
            'user_id' => $this->input->post('user-id')
        );
        $this->db->update('menu', $data, array('id' => $id));

        //insert selected meals on menu_meal table
        for ($i = 1; $i <= $this->input->post('number-of-meals'); $i++)
        {
            $meal_id = '0';
            if (NULL !== ($this->input->post('meal-id-' . $i)))
            {
                $meal_id = $this->input->post('meal-id-' . $i);
                $data = array('menu_id' => $id, 'meal_id' => $meal_id);
                $this->db->replace('menu_meal', $data);
            }
            elseif (NULL !== ($this->input->post('deleted-meal-id-' . $i)))
            {
                $meal_id = $this->input->post('deleted-meal-id-' . $i);
                $data = array('menu_id' => $id, 'meal_id' => $meal_id);
                $this->db->delete('menu_meal', $data);
            }
        }
    }

    public function get_meals($user_id)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('meal');
        return $query->result_array();
    }

    public function delete($id)
    {
        $this->load->helper('url');
        $this->db->delete('menu', array('id' => $id));
    }

    /*
     * Private function
     */

    private function _update_totals_from_meals(&$totals, $meal)
    {
        $meal_recipes = $this->dbhelper->get_meal_recipes($_SESSION['id'],
                $meal['id']);
        foreach ($meal_recipes as $recipe)
        {
            $totals['weight']['final']+=($recipe['weight'] / $recipe['portions']) * $meal['portions'];
            $recipe_foods = $this->dbhelper->get_recipe_foods($_SESSION['id'],
                    $recipe['id']);
            foreach ($recipe_foods as $ingredient)
            {
                $this->datahelper->update_totals($totals, $ingredient,
                        $meal['portions']);
            }
        }
        $meal_foods = $this->dbhelper->get_meal_foods($_SESSION['id'],
                $meal['id']);
        foreach ($meal_foods as $ingredient)
        {
            $this->datahelper->update_totals_from_food($totals, $ingredient);
        }
    }

    public function get_totals($user_id, $menu_id)
    {
        $totals = $this->datahelper->create_totals();
        $menu_meals = $this->menu_model->get_menu_meals($user_id, $menu_id);
        foreach ($menu_meals as $meal)
        {
            $this->_update_totals_from_meals($totals, $meal);
            $totals['portions'] = $meal['portions'];
            $this->datahelper->update_partials($totals);
        }

        return $totals;
    }

    public function get_menu_meals($user_id, $menu_id)
    {
        $this->db->select('meal.*');
        $this->db->from(array('meal'));
        $this->db->join('menu_meal', 'menu_meal.meal_id=meal.id');
        $this->db->where('menu_meal.menu_id', $menu_id);
        $this->db->where('meal.user_id', $user_id);
        $result = $this->db->get();
        return $result->result_array();
    }

}
