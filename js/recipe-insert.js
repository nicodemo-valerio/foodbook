var ingredientsSelected = 1;
$(document).ready(function () {
    $("#button-add-ingredient").click(function () {
        var selectedIngredient = $('#select-ingredient :selected').text();
        var selectedIngredientId = $('#select-ingredient').val();
        $('#select-ingredient :selected').attr('disabled', 'true');
        var label = "<label>" + selectedIngredient + "</label>";
        var inputIngredient = '<input type="hidden" name="food-id-' + ingredientsSelected + '" value="' + selectedIngredientId + '"/>';
        var inputQuantity = '<input type="text" name="quantity-' + ingredientsSelected + '" id="input-quantity' + ingredientsSelected + '" value="0"/> g';
        $("#button-add-ingredient").after("<br>", inputIngredient, label, inputQuantity);
        var inputQuantityTag = $("#input-quantity-" + ingredientsSelected);
        inputQuantityTag.focusout(function () {
            inputQuantityTag.attr("value", $(this).val());
        });
        $("#id-number-of-ingredients").attr("value", ingredientsSelected);
        ingredientsSelected++;
    });
});