$(document).ready(function () {
//==========  Calculate Labour Widget  ===========
//IF Change Position value
    $('#labour-position_id').change(function () {
        let positionId = $(this).val();
        $.ajax({
            url: "/dependent-dropdown/position-dropdown?positionId=" + positionId,
            type: 'post',
            dataType: 'html',
            data: {positionId: positionId},
            success: function (data) {
                var positionsData = JSON.parse(data);
                // Use the code from above to update the HTML elements
                $('#positions-uom').val(positionsData.uom);
                $('#positions-regular_rate').attr('value', positionsData.regular_rate);
                $('#positions-overtime_rate').attr('value', positionsData.overtime_rate);
            }
        });
    });

    // Calculate Rows
    function calculateRowLabour(row) {
        let uom = row.find('.uom-labour').val(); // Assuming the UOM dropdown has the class 'uom'
        let regRate = parseFloat(row.find('.reg-rate-labour').val()) || 0;
        let regHours = parseFloat(row.find('.reg-hours-labour').val()) || 0;
        let overtimeRate = parseFloat(row.find('.overtime-rate-labour').val()) || 0;
        let overtime = parseFloat(row.find('.overtime-labour').val()) || 0;

        let subTotal;
        if (uom === 'Fixed') {
            subTotal = regRate;
        } else {
            subTotal = (regRate * regHours) + (overtimeRate * overtime);
        }

        // Assuming Sub-total for each row has the class 'sub-total'
        row.find('.sub-total-labour').val(subTotal.toFixed(2));
    }

    function calculateTotalSubTotal() {
        var totalSubTotal = 0;
        // Assuming each row has the class 'labour-row'
        $('.sub-form-labour').each(function () {
            var subTotal = parseFloat($(this).find('.sub-total-labour').val()) || 0;
            totalSubTotal += subTotal;
        });
        // Assuming the grand Sub-total has the id 'grand-sub-total'
        $('#grand-sub-total').val(totalSubTotal.toFixed(2));
    }

    // Bind the input event to the reg-rate, reg-hours, overtime-rate, overtime, and UOM fields
    $(document).on('input change', '.reg-rate-labour, .reg-hours-labour, .overtime-rate-labour, .overtime-labour, .uom-labour', function () {
        var row = $(this).closest('.sub-form-labour');
        calculateRowLabour(row);
        calculateTotalSubTotal();
    });

    // Initial calculation on page load
    $('.sub-form-labour').each(function () {
        calculateRowLabour($(this));
    });
    calculateTotalSubTotal();

    // Function to calculate and update the sub-total
    function updateSubTotal() {
        var subTotal = 0;
        // Loop through each total field and add the value to subTotal
        $('.sub-total-labour').each(function () {
            var value = parseFloat($(this).val()) || 0;
            subTotal += value;
        });
        // Update the sub-total field
        $('#grand-sub-total').val(subTotal.toFixed(2)); // Assuming the Sub-Total field has the ID 'sub-total'
    }

//========== END:: Script for Labour Widget  ===========

//========== Work with Labour Widget  ===========
// Change block position
    $('#ticket-form-dynamic-labour').insertBefore('#labour-widget'); // Moves the '#block-to-move' before '#target-element'

    // Ajax script for Dynamic adding Miscellaneous blocks
    let counter = 0;
    const searchParams = new URLSearchParams(window.location.search);
    let ticketId = searchParams.getAll('id')
    $(document).on('click', '.add-sub-form-labour', function () {
        $('<div>', {id: 'sub-forms-container_main-labour',}).appendTo('#sub-forms-container-labour');
        counter++;
        $.ajax({
            url: '/labourAddBlock?index&counter=' + counter + '&ticketId=' + ticketId, // Adjust URL as needed
            type: 'post',
            data: {index: counter},
            success: function (data) {
                $('.add-sub-form-labour').prop('disabled', true);
                $('#sub-forms-container_main-labour').append(data);
            }
        });
    });

    // Create new entity
    $(document).on('click', '#save_dynamic-labour', function (e) {
        e.preventDefault();
        $.ajax({
            url: '/createLabour?ticketId=' + ticketId,
            type: 'POST',
            dataType: "html",
            data: $('#ticket-form-dynamic-sub-labour').serialize(),
            success: function (data) {
                try {
                    // Try to parse the variable as JSON
                    let jsonObject = JSON.parse(data);
                    if (jsonObject.errors.reg_hours) {
                        $("#reg_hours-group").addClass("has-error");
                        $("#reg_hours-group").empty().append(
                            '<div class="help-block">' + jsonObject.errors.reg_hours + "</div>"
                        );
                    }
                } catch (e) {
                    $('#sub-forms-container_main-labour').remove();
                    $('#misc_container-labour').replaceWith(data); // Replace the content
                    $('.add-sub-form-labour').prop('disabled', false);
                    $(".modal_custom").fadeOut(5000);
                    updateSubTotal();
                }
            }
        });
    });

    // Update new entity
    $("#save-dynamic-form-misc-labour").on('click', function (e) {
        e.preventDefault();
        $.ajax({
            url: '/updateLabour',
            type: 'POST',
            dataType: "html",
            data: $('#ticket-form-dynamic-labour').serialize(),
            success: function (data) {
                // Success message
            }
        });
    });

    // Add trigger click for main EDIT button
    $('#save-dynamic-form').on('click', function (e) {
        $('#save-dynamic-form-misc-labour').trigger('click');
    });

    // Delete block
    $(document).on('click change', '.remove-sub-form-labour', function (e) {
        let blockId = $(this).attr('id')
        e.preventDefault();
        $.ajax({
            url: '/deleteLabour?id=' + blockId,
            type: 'POST',
            data: $('#ticket-form-labour').serialize(),
            success: function (data) {
                $('#sub-forms-container_main-labour').html(data);
            }
        });
    });
    // Dynamic binding for removing a sub-form
    $(document).on('click', '.remove-sub-form-labour', function () {
        $(this).closest('.sub-form-labour').fadeOut('slow', function () {
            $(this).remove();
            updateSubTotal();
            $('.add-sub-form-labour').prop('disabled', false);
        });
    });
//==========END:: Work with Labour Widget  ===========

    //Update general form
    $('.position_id').change(function () {
        let positionId = $(this).val();
        $.ajax({
            url: '/selectPositionInfo?position_id=' + positionId,
            type: 'POST',
            dataType: "json",
            data: $(this).serialize(),
            success: function (data) {
                $.each(data, function (index, value) {
                    $(document).on('change', '.sub-form-labour .position_id', function () {
                        let closestForm = $(this).closest('.sub-form-labour');
                        closestForm.find('.reg-hours-labour').val(value.reg_hours);
                        closestForm.find('.labour_uom').val(value.uom);
                        closestForm.find('.reg-rate-labour').val(value.regular_rate);
                        closestForm.find('.overtime-rate-labour').val(value.overtime_rate);
                        closestForm.find('.overtime-labour').val(value.overtime);
                        let row = $(this).closest('.sub-form-labour');
                        calculateRowLabour(row);
                        calculateTotalSubTotal();
                    });
                });
            }
        });
    });
});
