<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Datahelper {

    public function create_totals()
    {
        $totals = array();
        $totals['weight'] = array('tot' => 0, 'portion' => 0, 'final' => 0, 'final_portion' => 0);
        $totals['qty'] = array('tot' => 0, 'portion' => 0);
        $totals['kcal'] = array('tot' => 0, '100g' => 0, 'portion' => 0);
        $totals['carb'] = array('tot' => 0, 'perc' => 0, 'portion' => 0);
        $totals['prot'] = array('tot' => 0, 'perc' => 0, 'portion' => 0);
        $totals['fat'] = array('tot' => 0, 'perc' => 0, 'portion' => 0);
        $totals['alcohol'] = array('tot' => 0, 'perc' => 0, 'portion' => 0);
        $totals['price'] = array('tot' => 0, 'portion' => 0);
        return $totals;
    }

    /*
     * Update the $totals array from a $recipe_food array (name, instructions, portions, weight, recipe_id, quantity, food_id, food, carb, prot, fat, alcohol, price)
     */

    public function update_totals_from_food(&$totals, $food)
    {
        $qty = $food['quantity'] / 100;
        $totals['weight']['tot'] += $food['quantity'];
        $totals['weight']['final'] += $food['quantity'];
        $totals['carb']['tot'] += $food['carb'] * $qty;
        $totals['prot']['tot'] += $food['prot'] * $qty;
        $totals['fat']['tot'] += $food['fat'] * $qty;
        $totals['alcohol']['tot'] += $food['alcohol'] * $qty;
        $totals['price']['tot'] += $food['price'] * $qty * 100;
    }

    public function update_totals(&$totals, $ingredient, $recipe_portions)
    {
        $qty = (($ingredient['quantity'] / 100) / $ingredient['portions']) * $recipe_portions;
        $totals['weight']['tot'] += $qty;
        $totals['carb']['tot'] += $ingredient['carb'] * $qty;
        $totals['prot']['tot'] += $ingredient['prot'] * $qty;
        $totals['fat']['tot'] += $ingredient['fat'] * $qty;
        $totals['alcohol']['tot'] += $ingredient['alcohol'] * $qty;
        $totals['price']['tot'] += $ingredient['price'] * $qty * 100;
    }

    public function update_partials(&$totals)
    {
        $totals['kcal']['tot'] = $this->_get_kcal($totals['carb']['tot'],
                $totals['prot']['tot'], $totals['fat']['tot'],
                $totals['alcohol']['tot']);
        $totals['weight']['final_portion'] = $totals['weight']['final'] / $totals['portions'];
        $totals['weight']['portion'] = $totals['weight']['tot'] / $totals['portions'];
        $totals['kcal']['portion'] = $totals['kcal']['tot'] / $totals['portions'];
        $kcal_no_alcohol = $totals['kcal']['tot'] - ($totals['alcohol']['tot'] * 5.53);
        $totals['carb']['perc'] = ($totals['carb']['tot'] * 400) / $kcal_no_alcohol;
        $totals['carb']['portion'] = $totals['carb']['tot'] / $totals['portions'];
        $totals['prot']['perc'] = ($totals['prot']['tot'] * 400 ) / $kcal_no_alcohol;
        $totals['prot']['portion'] = $totals['prot']['tot'] / $totals['portions'];
        $totals['fat']['perc'] = ($totals['fat']['tot'] * 900) / $kcal_no_alcohol;
        $totals['fat']['portion'] = $totals['fat']['tot'] / $totals['portions'];
        $totals['price']['tot'] = $totals['price']['tot'] / 100;
        $totals['price']['portion'] = $totals['price']['tot'] / $totals['portions'];
        $totals['kcal']['100g'] = ($totals['kcal']['tot'] / $totals['weight']['final']) * 100;
    }

    private function _get_kcal($carb, $prot, $fat, $alcohol)
    {
        return (($carb + $prot) * 4) + ($fat * 9) + ($alcohol * 5.53);
    }

}
