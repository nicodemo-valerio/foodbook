<?php

/**
 * Recipe Class
 * 
 * A recipe is a set of ingredients with related quantities and istructions that describe how to cook them
 * 
 * @author Nicodemo Valerio  <nicodemovalerio@gmail.com>
 * 
 */
class Recipe_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->library('dbhelper');
        $this->load->library('datahelper');
    }

    public function get_foods()
    {
        $result = $this->db->get('food');
        return $result->result_array();
    }

    public function get_recipes($userid)
    {
        return $this->dbhelper->get_recipes($userid);
    }

    /*
     * Return an array $totals with the following keys: name, instructions, portions, weight, recipe_id, quantity, food_id, food, carb, prot, fat, alcohol, price
     */
    public function get_recipe_foods($recipe_id = FALSE, $user_id = FALSE)
    {
        return $this->dbhelper->get_recipe_foods($recipe_id, $user_id);
    }

    public function get_recipe($recipe_id, $user_id)
    {
        $recipe_foods = $this->dbhelper->get_recipe_foods($recipe_id, $user_id);
        $totals = $this->_create_recipe_array($recipe_foods);
        foreach ($recipe_foods as $recipe_food)
        {
            $this->datahelper->update_totals_from_food($totals, $recipe_food);
        }
        $totals['weight']['final'] = $recipe_foods[0]['weight'];
        $this->datahelper->update_partials($totals);
        
        return $totals;
    }

    public function set_recipes()
    {
        $this->load->helper('url');
        $weight = $this->input->post('weight');
        $number_of_ingredients = $this->input->post('number-of-ingredients');
        if ($weight === '0')
        {
            for ($i = 1; $i <= $number_of_ingredients; $i++)
            {
                $qty_id = "quantity-" . $i;
                $weight += $this->input->post($qty_id);
            }
        }
        $recipeData = array(
            'name' => $this->input->post('name'),
            'instructions' => $this->input->post('instructions'),
            'portions' => $this->input->post('portions'),
            'weight' => $weight,
            'user_id' => $this->input->post('user-id')
        );
        $this->db->insert('recipe', $recipeData);
        $recipe_id = $this->db->insert_id();
        //insert one row in recipe_food table for every food of the recipe
        //food_id, recipe_id, quantity
        for ($i = 1; $i <= $number_of_ingredients; $i++)
        {
            $food_id = "food-id-" . $i;
            $qty_id = "quantity-" . $i;
            $ingredients_data = array(
                'food_id' => $this->input->post($food_id),
                'recipe_id' => $recipe_id,
                'quantity' => $this->input->post($qty_id),
                'user_id' => $this->input->post('user-id')
            );
            $this->db->insert('recipe_food', $ingredients_data);
        }
        return $recipe_id;
    }

    private function _create_recipe_array($recipe_foods)
    {
        $totals = $this->datahelper->create_totals();
        $totals['ingredients'] = $recipe_foods;
        $totals['name'] = $recipe_foods[0]['name'];
        $totals['id'] = $recipe_foods[0]['recipe_id'];
        $totals['instructions'] = $recipe_foods[0]['instructions'];
        
        $totals['portions'] = $recipe_foods[0]['portions'];
        return $totals;
    }
    
    private function _create_recipe_data()
    {
        $recipeData = array(
            'name' => $this->input->post('name'),
            'instructions' => $this->input->post('instructions'),
            'portions' => $this->input->post('portions'),
            'weight' => $this->input->post('weight'),
            'user_id' => $this->input->post('user-id')
        );
        return $recipeData;
    }

    private function _update_recipe_food($i, $id)
    {
        $food_id = $this->input->post("food-id-" . $i);
        $quantity = $this->input->post("quantity-" . $i);
        $user_id = $this->input->post('user-id');
        $where = array(
            'food_id' => $food_id,
            'recipe_id' => $id,
            'user_id' => $user_id
        );
        if ($quantity === '0')
        {
            $this->db->delete('recipe_food', $where);
        }
        else
        {
            $where['quantity'] = $quantity;
            $this->db->replace('recipe_food', $where);
        }
    }

    public function update_recipes($id)
    {
        $this->load->helper('url');
        $recipeData = $this->_create_recipe_data();
        $this->db->update('recipe', $recipeData, array('id' => $id));
        for ($i = 1; $i <= $this->input->post('number-of-ingredients'); $i++)
        {
            $this->_update_recipe_food($i, $id);
        }
    }

    public function delete($id)
    {
        $this->load->helper('url');
        $this->db->delete('recipe', array('id' => $id));
    }

}
