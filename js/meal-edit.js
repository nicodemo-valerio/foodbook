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
$(document).ready(function () {
    $("#button-add-recipe").click(function () {
        var numberOfRecipesSelected = $("#id-number-of-recipes").attr("value");
        numberOfRecipesSelected++;
        var selectedRecipe = $('#select-recipe :selected').text();
        var selectedRecipeId = $('#select-recipe').val();
        $('#select-recipe :selected').attr('disabled', 'true');
        var inputRecipe = "<input type=\"hidden\" name=\"recipe-id-" + numberOfRecipesSelected + "\" value=\"" + selectedRecipeId + "\"/>";
        $("#button-add-recipe").after("<br>", inputRecipe, selectedRecipe);
        $("#id-number-of-recipes").attr("value", numberOfRecipesSelected);
    });

    $("#button-add-ingredient").click(function () {
        var numberOfIngredientsSelected = $("#id-number-of-ingredients").attr("value");
        numberOfIngredientsSelected++;
        var selectedIngredient = $('#select-ingredient :selected').text();
        var selectedIngredientId = $('#select-ingredient').val();
        $('#select-ingredient :selected').attr('disabled', 'true');
        var inputIngredient = '<input type="hidden" name="food-id-' + numberOfIngredientsSelected + '" value="' + selectedIngredientId + '"/>';
        var inputQuantity = '<input type="text" name="quantity-' + numberOfIngredientsSelected + '" id="quantity-' + numberOfIngredientsSelected + ' value="' + selectedIngredient + '"/>';
        var newTableRow = '<tr><td>' + selectedIngredient + inputIngredient + '</td><td>' + inputQuantity + '</td></tr>';
        $("#row-add-ingredient").after(newTableRow);
        var inputQuantityTag = $("#input-quantity" + numberOfIngredientsSelected);
        inputQuantityTag.focusout(function () {
            inputQuantityTag.attr("value", $(this).val());
        });
        $("#id-number-of-ingredients").attr("value", numberOfIngredientsSelected);
    });

    //click on link remove recipe, change id of recipe-id- to deleted-recipe-id
    $("[id^='remove-recipe-']").click(function () {
        var recipeId = $(this).attr('id');
        var recipeNumber = recipeId.substr(14);
        var recipeId = "#li-recipe-" + recipeNumber;
        $(recipeId).hide();
        $("#recipe-id-" + recipeNumber).attr("name", 'deleted-recipe-id-' + recipeNumber);
    });

    //click on link remove ingredient, hide the table row and set quantity input=0
    $("[id^='remove-ingredient-']").click(function () {
        var removeId = $(this).attr('id');
        var ingredientNumber = removeId.substr(18);
        var tableRowId = "#tr-ingredient-" + ingredientNumber;
        $(tableRowId).hide();
        $("#quantity-" + ingredientNumber).attr("value", '0');
    });
});

