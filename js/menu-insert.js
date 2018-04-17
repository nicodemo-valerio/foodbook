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
var mealQuantity = 1;

$(document).ready(function () {
    $("#button-add-meal").click(function () {
        var selectedMeal = $('#select-meal :selected').text();
        var selectedMealId = $('#select-meal').val();
        $('#select-meal :selected').attr('disabled', 'true');
        var inputMeal = '<input type="hidden" name="meal-id-' + mealQuantity + '" value="' + selectedMealId + '"/>';
        $("#button-add-meal").after("<br>", inputMeal, selectedMeal);
        $("#id-number-of-meals").attr("value", mealQuantity);
        mealQuantity++;
    });
});

