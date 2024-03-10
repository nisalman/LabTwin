jQuery(document).ready(function () {

    jQuery('select[name="building_id"]').on('change', function () {
        // Set the 'place_id' to a default value of 0 when 'building_id' changes
        $('select[name="place_id"]').val('0');

        var buildingID = jQuery(this).val();

        if (buildingID) {
            jQuery.ajax({
                url: 'getRooms/' + buildingID,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    console.log(data);

                    if (Array.isArray(data) && data.length === 0) {
                        // If true, set a default value
                        $('select[name="room_id"]').html('<option value="0">No room assigned</option>');
                        // Disable the button
                        $('#change-place').prop('disabled', true);
                        // Empty the 'place_id' select element
                        $('select[name="place_id"]').empty().append('<option value="0">No place assigned</option>');
                    } else {
                        // If not, proceed with the iteration and appending options
                        $('select[name="room_id"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="room_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                        // Enable the button
                        $('#change-place').prop('disabled', false);

                        // Trigger the change event for 'room_id' to update 'place_id'
                        $('select[name="room_id"]').trigger('change');
                    }
                }
            });
        } else {
            $('select[name="room_id"]').empty();
            // Disable the button when building is not selected
            $('#change-place').prop('disabled', true);
            // Empty the 'place_id' select element
            $('select[name="place_id"]').empty().append('<option value="0">No place assigned</option>');
        }
    });

    // Attach an event handler to the change event of the 'room_id' select element
    jQuery('select[name="room_id"]').on('change', function () {
        var roomID = jQuery(this).val();

        if (roomID) {
            jQuery.ajax({
                url: 'getPlaces/' + roomID,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    console.log(data);

                    // Empty the 'place_id' select element
                    jQuery('select[name="place_id"]').empty();

                    if (Array.isArray(data) && data.length === 0) {
                        // If true, display "No place assigned" in the HTML
                        $('select[name="place_id"]').append('<option value="0">No place assigned</option>');
                        // Disable the button
                        $('#change-place').prop('disabled', true);
                    } else {
                        // If not, iterate over the received data and append options to the 'place_id' select element
                        jQuery.each(data, function (key, value) {
                            $('select[name="place_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                        // Enable the button
                        $('#change-place').prop('disabled', false);
                    }
                }
            });
        } else {
            // If 'roomID' is empty, empty the 'place_id' select element and display "No place assigned"
            $('select[name="place_id"]').empty().append('<option value="0">No place assigned</option>');
            // Disable the button
            $('#change-place').prop('disabled', true);
        }
    });

});


$('#barCodeNum').submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        type: 'POST',
        url: 'barcodeNumber',
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
            console.log(data.instrumentCode);
            // Handle success, e.g., show a success message to the Users
        },
        error: function (error) {
            console.log(error.responseJSON);
            // Handle errors, e.g., display error messages to the Users
        }
    });
});
// Close the current modal
$('#printBarCodeModal').modal('hide');

// Open the new modal
$('#newModal').modal('show');



