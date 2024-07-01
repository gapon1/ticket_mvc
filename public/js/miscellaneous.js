$(document).ready(function () {

//==========  Script for Miscellaneous Widget  ===========
    // Rounds to two decimal places
    $(document).on('input', '.miscellaneous-price, .miscellaneous-quantity', function () {
        // Find the closest row container
        let $row = $(this).closest('.sub-form');
        // Parse the cost and quantity values as floats and default to 0 if NaN
        let cost = parseFloat($row.find('.miscellaneous-price').val()) || 0;
        let quantity = parseFloat($row.find('.miscellaneous-quantity').val()) || 0;
        // Calculate the total for the row
        let total = cost * quantity;
        // Update the total input in the current row
        $row.find('.miscellaneous-total').val(total.toFixed(2)); // Rounds to two decimal places
        $row.find('.miscellaneous-sub_total').val(total.toFixed(2)); // Rounds to two decimal places
    });

    // Function to calculate and update the sub-total
    function updateSubTotal() {
        let subTotal = 0;
        // Loop through each total field and add the value to subTotal
        $('.miscellaneous-total').each(function () {
            let value = parseFloat($(this).val()) || 0;
            subTotal += value;
        });
        // Update the sub-total field
        $('.miscellaneous-sub_total').val(subTotal.toFixed(2)); // Assuming the Sub-Total field has the ID 'sub-total'
    }

    $(document).on('input', '.miscellaneous-price, .miscellaneous-quantity', updateSubTotal);
    updateSubTotal();
//==========END:: Script for Miscellaneous Widget  ===========

//========== Ajax script for Dynamic adding Miscellaneous blocks  ===========
    // Change block position
    $('#ticket-form-dynamic').insertBefore('#miscellaneous-widget'); // Moves the '#block-to-move' before '#target-element'

    let counter = 0;
    let ticketId = $('#misc_ticket_id').val();
    $(document).on('click', '.add-sub-form', function () {
        $('<div>', {id: 'sub-forms-container_main',}).appendTo('#sub-forms-container');
        counter++;
        $.ajax({
            url: '/miscellaneousAddBlock?index&counter=' + counter + '&ticketId=' + ticketId, // Adjust URL as needed
            type: 'post',
            data: {index: counter},
            success: function (data) {
                $('.add-sub-form').prop('disabled', true);
                $('#sub-forms-container_main').append(data);
            }
        });
    });

    // Create new entity
    $(document).on('click', '#save_dynamic', function (e) {
        e.preventDefault();
        $(".form-group").removeClass("has-error");
        $(".help-block").remove();
        $.ajax({
            url: '/createMiscellaneous?ticketId=' + ticketId,
            type: 'POST',
            dataType: "html",
            data: $('#ticket-form-dynamic-sub').serialize(),
            success: function (data) {
                try {
                    // Try to parse the variable as JSON
                    let jsonObject = JSON.parse(data);
                    if (jsonObject.errors.description) {
                        $("#description-group").addClass("has-error");
                        $("#description-group").append(
                            '<div class="help-block">' + jsonObject.errors.description + "</div>"
                        );
                    }
                    if (jsonObject.errors.cost) {
                        $("#cost-group").addClass("has-error");
                        $("#cost-group").append(
                            '<div class="help-block">' + jsonObject.errors.cost + "</div>"
                        );
                    }
                    if (jsonObject.errors.price) {
                        $("#price-group").addClass("has-error");
                        $("#price-group").append(
                            '<div class="help-block">' + jsonObject.errors.price + "</div>"
                        );
                    }
                    if (jsonObject.errors.quantity) {
                        $("#quantity-group").addClass("has-error");
                        $("#quantity-group").append(
                            '<div class="help-block">' + jsonObject.errors.quantity + "</div>"
                        );
                    }
                } catch (e) {
                    $('#sub-forms-container_main').remove();
                    $('#misc_container').replaceWith(data); // Replace the content
                    $('.add-sub-form').prop('disabled', false);
                    updateSubTotal();
                }
            }
        });
    });

    // Add trigger click for main EDIT button
    $(document).on('click', '#save-dynamic-form', function (e) {
        $('#save-dynamic-form-misc').trigger('click');
    });

    //Update new entity
    $(document).on('click', '#save-dynamic-form-misc', function (e) {
        e.preventDefault();
        $.ajax({
            url: '/miscellaneous/update-miscellaneous?ticketId=' + ticketId,
            type: 'POST',
            data: $('#ticket-form-dynamic').serialize(),
            success: function (data) {
                // $('#exampleModal .modal-body').html(data);
                // $('#exampleModal').modal('show');
            }
        });
    })

    // Delete block
    $(document).on('click change', '.remove-sub-form', function (e) {
        let blockId = $(this).attr('id')
        e.preventDefault();
        $.ajax({
            url: '/deleteMiscellaneous?id=' + blockId,
            type: 'POST',
            data: $('#ticket-form').serialize(),
            success: function (data) {
                $('#sub-forms-container').html(data);
            }
        });
    });

    // Dynamic binding for removing a sub-form
    $(document).on('click', '.remove-sub-form', function () {
        $(this).closest('.sub-form').fadeOut('slow', function () {
            $(this).remove();
            updateSubTotal();
            $('.add-sub-form').prop('disabled', false);
        });
    });

//==========END:: Ajax script for Dynamic adding Miscellaneous blocks  ===========

});