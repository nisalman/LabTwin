jQuery(document).ready(function () {

    jQuery('select[name="building_id"]').on('change', function () {
        var buildingID = jQuery(this).val();
        if (buildingID) {
            jQuery.ajax({
                url: 'getRooms/' + buildingID,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    jQuery('select[name="room_id"]').empty();
                    jQuery.each(data, function (key, value) {
                        $('select[name="room_id"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        } else {
            $('select[name="room_id"]').empty();
        }
    });

    jQuery('select[name="room_id"]').on('change', function () {
        var roomID = jQuery(this).val();
        if (roomID) {
            jQuery.ajax({
                url: 'getPlaces/' + roomID,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    jQuery('select[name="place_id"]').empty();
                    jQuery.each(data, function (key, value) {
                        $('select[name="place_id"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        } else {
            $('select[name="place_id"]').empty();
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
            // Handle success, e.g., show a success message to the user
        },
        error: function (error) {
            console.log(error.responseJSON);
            // Handle errors, e.g., display error messages to the user
        }
    });
});
// Close the current modal
$('#printBarCodeModal').modal('hide');

// Open the new modal
$('#newModal').modal('show');



