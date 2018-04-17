<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of newPHPClass
 *
 * @author Nicodemo Valerio <nicodemovalerio@gmail.com>
 */
class Dbhelper extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_recipes($user_id)
    {
        $this->db->order_by('name');
        $where = array('user_id' => $user_id);
        $result = $this->db->get_where('recipe', $where);
        return $result->result_array();
    }

    public function get_recipe_foods($user_id, $recipe_id)
    {
        $this->db->select('recipe.name, recipe.instructions, '
                . 'recipe.portions, recipe.weight, '
                . 'recipe_food.recipe_id, recipe_food.quantity, recipe_food.food_id, '
                . 'food.food, food.carb, food.prot, food.fat, food.alcohol, food.price');
        $this->db->from(array('recipe'));
        $this->db->join('recipe_food', 'recipe_food.recipe_id=recipe.id');
        $this->db->join('food', 'recipe_food.food_id=food.id');
        $where = array('recipe.id' => $recipe_id, 'recipe.user_id' => $user_id);
        $this->db->where($where);
        $this->db->order_by('food.food');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_meal_recipes($user_id, $meal_id)
    {
        $this->db->select('recipe.id, recipe.name, recipe.portions, recipe.weight');
        $this->db->from(array('recipe'));
        $this->db->join('meal_recipe', 'meal_recipe.recipe_id=recipe.id');
        $this->db->join('meal', 'meal_recipe.meal_id=meal.id');
        $this->db->where('meal.id', $meal_id);
        $this->db->where('meal.user_id', $user_id);
        $this->db->order_by('recipe.name');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_meal_foods($user_id, $meal_id)
    {
        $this->db->select('food.*, meal_food.quantity');
        $this->db->from(array('food'));
        $this->db->join('meal_food', 'meal_food.food_id=food.id');
        $this->db->join('meal', 'meal_food.meal_id=meal.id');
        $this->db->where('meal.id', $meal_id);
        $this->db->where('meal.user_id', $user_id);
        $this->db->order_by('food.food');
        $result = $this->db->get();
        return $result->result_array();
    }

}
