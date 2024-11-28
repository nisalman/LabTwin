$(document).ready(function() {

    $('#defectButton').click(function(e) {
        e.preventDefault(); // Prevent the default button behavior

        // Get the current defect status from the data attribute and toggle it
        var defectStatus = $(this).data('defect-status') == 1 ? 0 : 1;

        // Get the item ID from the data attribute
        var insId = $(this).data('instrument-id');

        // Get the CSRF token value
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Perform AJAX request
        $.ajax({
            url: '/update-status/' + insId,
            method: 'POST',
            data: {
                status: defectStatus,
                insId: insId,
                _token: csrfToken
            },
            success: function(response) {

                // Update defect status data attribute
                 $('#defectButton').data('defect-status', defectStatus);

                // Update button text and background color
                $('#defectButton').text(defectStatus == 1 ? 'Perfect' : 'Defect')
                    .css('background-color', defectStatus == 1 ? '#00f80c' : '#fcc207');

                var iconClass = defectStatus == 1 ? 'icofont-warning-alt' : 'icofont-check-circled';
                var iconColor = defectStatus == 1 ? '#ee3131' : '#009dff';
                var tooltipTitle = defectStatus == 1 ? 'Defective' : 'Perfect';

                $('#defectIcon').removeClass().addClass(iconClass).css('color', iconColor).attr('title', tooltipTitle);

                // Hide or show the defective overlay based on defect status
                if (defectStatus == 1) {
                    $('.defective-overlay').css('display', 'block'); // Hide the overlay
                } else {
                    $('.defective-overlay').css('display', 'none'); // Show the overlay
                }
                if (defectStatus == 0) {
                    $('.defective-overlay').css('display', 'none'); // Hide the overlay
                } else {
                    $('.defective-overlay').css('display', 'block'); // Show the overlay
                }


                // Show toastr notification
                var toastrMessage = defectStatus == 1 ? 'Status updated to Defect' : 'Status updated to Perfect';
                toastr.success(toastrMessage);
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(error);
            }
        });


    });
});


