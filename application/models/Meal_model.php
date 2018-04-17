<?php

/**
 * Meal model Class
 *
 * A meal is a set of recipes and foods - e.g. carbonara pasta (recipe), steak & salad (foods)
 * 
 * @author Nicodemo Valerio  <nicodemovalerio@gmail.com>
 */
class Meal_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->library('dbhelper');
        $this->load->library('datahelper');
    }

    public function set_meals()
    {
        $this->load->helper('url');
        $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'portions' => $this->input->post('portions'),
            'user_id' => $this->input->post('user-id')
        );
        $this->db->insert('meal', $data);
        $meal_id = $this->db->insert_id();
        for ($i = 1; $i <= $this->input->post('number-of-recipes'); $i++)
        {
            $recipe_id = "recipe-id-" . $i;
            $recipe_data = array('recipe_id' => $this->input->post($recipe_id),
                'meal_id' => $meal_id,
                'user_id' => $this->input->post('user-id'),);
            $this->db->insert('meal_recipe', $recipe_data);
        }
        for ($i = 1; $i <= $this->input->post('number-of-ingredients'); $i++)
        {
            //$food_id, $qty_id, $meal_id, user-id
            $this->_insert_meal_ingredient($this->input->post("food-id-" . $i),
                    $this->input->post("quantity-" . $i), $meal_id,
                    $this->input->post('user-id'));
        }
        return $meal_id;
    }

    public function update($meal_id)
    {
        $this->load->helper('url');
        $data = array(
            'name' => $this->input->post("name"),
            'description' => $this->input->post("description"),
            'portions' => $this->input->post("portions"),
            'user_id' => $this->input->post("user-id")
        );
        $this->db->update('meal', $data, array('id' => $meal_id));
        for ($i = 1; $i <= $this->input->post("number-of-recipes"); $i++)
        {
            $this->_update_meal_recipe($this->input->post("recipe-id-" . $i),
                    $this->input->post("deleted-recipe-id-" . $i), $meal_id,
                    $this->input->post("user-id"));
        }
        for ($i = 1; $i <= $this->input->post("number-of-ingredients"); $i++)
        {
            $this->_update_meal_ingredient($this->input->post("food-id-" . $i),
                    $this->input->post("quantity-" . $i), $meal_id,
                    $this->input->post('user-id'));
        }
    }

    public function delete($id)
    {
        $this->load->helper('url');
        $this->db->delete('meal', array('id' => $id));
    }

    public function get_foods()
    {
        $result = $this->db->get('food');
        return $result->result_array();
    }

    public function get_recipes($user_id)
    {
        $result = $this->db->get_where('recipe', array('user_id' => $user_id));
        return $result->result_array();
    }

    public function get_meals($user_id, $meal_id = NULL)
    {
        if ($meal_id === NULL)
        {
            $this->db->order_by('id', 'DESC');
            $query = $this->db->get_where('meal', array('user_id' => $user_id));
            return $query->result_array();
        }
        else
        {
            $query = $this->db->get_where('meal',
                    array('id' => $meal_id, 'user_id' => $user_id));
            return $query->row_array();
        }
    }

    public function get_meal_foods($user_id, $meal_id)
    {
        return $this->dbhelper->get_meal_foods($user_id, $meal_id);
    }

    public function get_meal_recipes($user_id, $meal_id)
    {
        return $this->dbhelper->get_meal_recipes($user_id, $meal_id);
    }

    public function get_totals($meal_id, $user_id, $meal_portions)
    {
        $meal_recipes = $this->dbhelper->get_meal_recipes($user_id, $meal_id);
        $meal_foods = $this->dbhelper->get_meal_foods($user_id, $meal_id);
        $totals = $this->datahelper->create_totals();
        foreach ($meal_recipes as $recipe)
        {
            $totals['weight']['final']+=($recipe['weight'] / $recipe['portions']) * $meal_portions;
            $recipe_foods = $this->dbhelper->get_recipe_foods($user_id,
                    $recipe['id']);
            foreach ($recipe_foods as $ingredient)
            {
                $this->datahelper->update_totals($totals, $ingredient,
                        $meal_portions);
            }
        }
        foreach ($meal_foods as $food)
        {
            $this->datahelper->update_totals_from_food($totals, $food);
        }
        $totals['portions'] = $meal_portions;
        $this->datahelper->update_partials($totals);
        return $totals;
    }

    /*
     * private functions
     */

    private function _insert_meal_ingredient($food_id, $quantity, $meal_id,
            $user_id)
    {
        $ingredients_data = array(
            'food_id' => $food_id,
            'meal_id' => $meal_id,
            'quantity' => $quantity,
            'user_id' => $user_id
        );
        $this->db->insert('meal_food', $ingredients_data);
    }

    private function _update_meal_recipe($recipe_id, $deleted_recipe_id,
            $meal_id, $user_id)
    {
        $recipe_data = array('meal_id' => $meal_id,
            'user_id' => $user_id);
        if (!empty($recipe_id))
        {
            $recipe_data['recipe_id'] = $recipe_id;
            $this->db->replace('meal_recipe', $recipe_data);
        }
        if (!empty($deleted_recipe_id))
        {
            $recipe_data['recipe_id'] = $deleted_recipe_id;
            $this->db->delete('meal_recipe', $recipe_data);
        }
    }

    private function _update_meal_ingredient($food_id, $quantity, $meal_id,
            $user_id)
    {
        //$food_id = "food-id-" . $i;
        //$quantity = $this->input->post("quantity-" . $i);
        $where = array(
            'food_id' => $food_id,
            'meal_id' => $meal_id,
            'user_id' => $user_id
        );
        if ($quantity === '0')
        {
            $this->db->delete('meal_food', $where);
        }
        else
        {
            $where['quantity'] = $quantity;
            $this->db->replace('meal_food', $where);
        }
    }

}
