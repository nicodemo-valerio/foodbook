$(document).ready(function () {
    var ingredientsSelected = $("#id-number-of-ingredients").attr("value");
    ingredientsSelected++;
    //when add ingredient create new inputs
    $("#button-add-ingredient").click(function () {
        var selectedIngredient = $('#select-ingredient :selected').text();
        var selectedIngredientId = $('#select-ingredient').val();
        $('#select-ingredient :selected').attr('disabled', 'true');
        var newRow = '<tr><td>' + selectedIngredient + '</td>';
        var inputIngredient = '<td><input type="hidden" name="food-id-' + ingredientsSelected + '" value="' + selectedIngredientId + '"/>';
        var inputQuantity = '<input type="text" name="quantity-' + ingredientsSelected + '" id="input-quantity-' + ingredientsSelected + '" value=""/></td><td>&nbsp;</td></tr>';

        $("#tr-add-ingredient").after(newRow.concat(inputIngredient).concat(inputQuantity));
        var inputQuantityTag = $("#input-quantity-" + ingredientsSelected);
        inputQuantityTag.focusout(function () {
            inputQuantityTag.attr("value", $(this).val());
        });
        $("#id-number-of-ingredients").attr("value", ingredientsSelected);
        ingredientsSelected++;
    });

    //when remove ingredient is clicked the par is hidden
    $("[id^='remove-ingredient-']").click(function () {
        var removeId = $(this).attr('id');
        var ingredientNumber = removeId.substr(18, removeId.lenght);
        var parId = "#tr-ingredient-" + ingredientNumber;
        $(parId).hide();
        $("#quantity-" + ingredientNumber).attr("value", '0');
    });
});