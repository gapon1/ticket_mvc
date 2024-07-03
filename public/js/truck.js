$(document).ready(function () {
//==========  Function to calculate the total for each row
    function calculateRowTotal(row) {
        let quantity = parseFloat(row.find('.quantity-truck').val()) || 0;
        let regRate = parseFloat(row.find('.reg-rate-truck').val()) || 0;
        let uom = row.find('.uom-truck').val();
        // Calculate total based on UOM
        let total = uom === 'Fixed' ? regRate : quantity * regRate;
        // Set the total in the current row
        row.find('.total-truck').val(total.toFixed(2));
    }

    // Function to calculate and update the sub-total for all rows
    function calculateSubTotal() {
        let subTotal = 0;
        $('.sub-form-truck').each(function () {
            var total = parseFloat($(this).find('.total-truck').val()) || 0;
            subTotal += total;
        });
        $('#trucks-sub_total').val(subTotal.toFixed(2)); // Assuming you have an input with ID 'sub-total'
    }

    // Event listener for when 'Quantity', 'Reg rate', or 'Uom' changes in a row
    $(document).on('input change', '.quantity-truck, .reg-rate-truck, .uom-truck', function () {
        let row = $(this).closest('.sub-form-truck'); // Assuming each row has class 'truck-row'
        calculateRowTotal(row);
        calculateSubTotal();
    });
    // Initial calculation on page load
    $('.sub-form-truck').each(function () {
        calculateRowTotal($(this));
    });
    calculateSubTotal();
    //==========END:: Script for Truck Widget  ===========

    // // Change block position
    // $('#ticket-form-dynamic-truck').insertBefore('#truck-widget'); // Moves the '#block-to-move' before '#target-element'

//========== Ajax script for Dynamic adding Truck blocks  ===========
    let counter = 0;
    const searchParams = new URLSearchParams(window.location.search);
    let ticketId = searchParams.getAll('id')
    $(document).on('click', '.add-sub-form-truck', function () {
        $('<div>', {id: 'sub-forms-container_main-truck',}).appendTo('#sub-forms-container-truck');
        counter++;
        $.ajax({
            url: '/truckAddBlock?index&counter=' + counter + '&ticketId=' + ticketId, // Adjust URL as needed
            type: 'post',
            data: {index: counter},
            success: function (data) {
                $('.add-sub-form-truck').prop('disabled', true);
                $('#sub-forms-container_main-truck').append(data);
            }
        });
    });

    // Create new entity
    $(document).on('click', '#save_dynamic-truck', function (e) {
        e.preventDefault();
        $(".form-group").removeClass("has-error");
        $(".help-block").remove();
        $.ajax({
            url: '/createTruck?ticketId=' + ticketId,
            type: 'POST',
            dataType: "html",
            data: $('#ticket-form-dynamic-sub-truck').serialize(),
            success: function (data) {
                console.log(data);
                try {
                    // Try to parse the variable as JSON
                    let jsonObject = JSON.parse(data);
                    if (jsonObject.errors.quantity) {
                        $("#quantity-group").addClass("has-error");
                        $("#quantity-group").empty().append(
                            '<div class="help-block">' + jsonObject.errors.quantity + "</div>"
                        );
                    }
                    if (jsonObject.errors.label) {
                        $("#label-group").addClass("has-error");
                        $("#label-group").empty().append(
                            '<div class="help-block">' + jsonObject.errors.label + "</div>"
                        );
                    }
                } catch (e) {
                    $('#sub-forms-container_main-truck').remove();
                    $('#misc_container-truck').replaceWith(data); // Replace the content
                    $('.add-sub-form-truck').prop('disabled', false);
                    $(".modal_custom").fadeOut(5000);
                }
            }
        });
    });

    // Add trigger click for main EDIT button
    $(document).on('click', '#save-dynamic-form', function (e) {
        $('#save-dynamic-form-misc-truck').trigger('click');
    });

    //Update new entity
    $(document).on('click', '#save-dynamic-form-misc-truck', function (e) {
        e.preventDefault();
        $.ajax({
            url: '/updateTruck',
            type: 'POST',
            data: $('#ticket-form-dynamic-truck').serialize(),
            success: function (data) {
                // Success message
            }
        });
    })

    // Delete block
    $(document).on('click change', '.remove-sub-form-truck', function (e) {
        let blockId = $(this).attr('id')
        e.preventDefault();
        $.ajax({
            url: '/deleteTruck?id=' + blockId,
            type: 'POST',
            data: $('#ticket-form-dynamic-truck').serialize(),
            success: function (data) {
                $('#sub-forms-container_main-truck').html(data);
            }
        });
    });
    // Dynamic binding for removing a sub-form
    $(document).on('click', '.remove-sub-form-truck', function () {
        $(this).closest('.sub-form-truck').fadeOut('slow', function () {
            $(this).remove();
            calculateSubTotal();
            $('.add-sub-form-truck').prop('disabled', false);
        });
    });
//==========END:: Ajax script for Dynamic adding Miscellaneous blocks  ===========

});

