$(document).ready(function () {
//========== Ajax script for Ticket Form  ===========
    // Customer change
    $('#customer-dropdown').change(function () {
        var customerId = $(this).val();
        $.ajax({
            url: "/jobDropdown?customer_id=" + customerId,
            type: 'post',
            dataType: 'html',
            data: {customer_id: customerId},
            success: function (data) {
                $('#job-dropdown').removeClass("no_active").empty().append($('<option>').text('Select Job'));
                var parsedData = typeof data === 'object' ? data : JSON.parse(data); // Safety check
                $.each(parsedData, function (index, value) {
                    $('#job-dropdown').append($('<option>').attr('value', index).text(value));
                });
            }
        });
    });

    // Job change
    $('#job-dropdown').change(function () {
        var jobId = $(this).val();
        $.ajax({
            url: '/locationDropdown?job_id=' + jobId,
            type: 'post',
            dataType: 'html',
            data: {job_id: jobId},
            success: function (data) {
                $('#location-dropdown').removeClass("no_active").empty().append($('<option>').text('Select Location/LSD'));
                var parsedData = typeof data === 'object' ? data : JSON.parse(data); // Safety check
                $.each(parsedData, function (index, value) {
                    $('#location-dropdown').append($('<option>').attr('value', index).text(value));
                });
            }
        });
    });
//==========END:: Ajax script for Ticket Form  ===========
    //Update general form
    $('#general_form').on('submit', function (e) {
        e.preventDefault();
        validateSelect();
        $.ajax({
            url: '/update',
            type: 'POST',
            dataType: "html",
            data: $(this).serialize(),
            success: function (data) {
            }
        });
    })

    function validateSelect() {
        var isValid = true;

        if ($('#job-dropdown').val() === 'Select Job') {
            $('#job-dropdown').addClass('is-invalid');
            isValid = false;
        } else {
            $('#job-dropdown').removeClass('is-invalid');
        }

        if ($('#location-dropdown').val() === 'Select Location/LSD') {
            $('#location-dropdown').addClass('is-invalid');
            isValid = false;
        } else {
            $('#location-dropdown').removeClass('is-invalid');
        }

        if (isValid) {
            $('#successModal').modal('show');
        }
    }


});