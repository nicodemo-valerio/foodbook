/* 
 * Copyright (C) Error: on line 4, column 33 in Templates/Licenses/license-lgpl21.txt
 The string doesn't match the expected date/time format. The string to parse was: "19/12/2015". The expected format was: "MMM d, yyyy". nicodemo.
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301  USA
 */
var ingredientsSelected = 1;
var recipesSelected = 1;
$(document).ready(function () {
    $("#button-add-recipe").click(function () {
        var selectedRecipe = $('#select-recipe :selected').text();
        var selectedRecipeId = $('#select-recipe').val();
        $('#select-recipe :selected').attr('disabled', 'true');
        var inputRecipe = '<input type="hidden" name="recipe-id-' + recipesSelected + '" value="' + selectedRecipeId + '"/>';
        $("#button-add-recipe").after("<br>", inputRecipe, selectedRecipe);
        $("#id-number-of-recipes").attr("value", recipesSelected);
        recipesSelected++;
    });

    $("#button-add-ingredient").click(function () {
        var selectedIngredient = $('#select-ingredient :selected').text();
        var selectedIngredientId = $('#select-ingredient').val();
        $('#select-ingredient :selected').attr('disabled', 'true');
        var label = "<label>" + selectedIngredient + "</label>";
        var inputIngredient = '<input type="hidden" name="food-id-' + ingredientsSelected + '" value="' + selectedIngredientId + '"/>';
        var inputQuantity = '<input type="text" name="quantity-' + ingredientsSelected + '" id="input-quantity-' + ingredientsSelected + '" value="0"/> g';
        $("#button-add-ingredient").after("<br>", inputIngredient, label, inputQuantity);
        var inputQuantityTag = $("#input-quantity-" + ingredientsSelected);
        inputQuantityTag.focusout(function () {
            inputQuantityTag.attr("value", $(this).val());
        });
        $("#id-number-of-ingredients").attr("value", ingredientsSelected);
        $("#select-ingredients");
        ingredientsSelected++;
    });
});

