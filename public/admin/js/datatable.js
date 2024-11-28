$(document).ready(function () {
    $("#toggleButton").click(function () {
        $("#toggleDiv").toggle();
    });

    // Initialize DataTables
    $('#instrumentsTable').DataTable({
        "pageLength": 10,
        "ordering": true,
        "searching": true,
        "columnDefs": [
            {"orderable": false, "targets": 0}, // Disable ordering for the Image column
        ]
    });


    var selectedRoom = ''; // Initialize a variable to store the selected room name

    var table = new DataTable('#roomsTable', {
        responsive: true,
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        lengthChange: true,
        autoWidth: false,
        layout: {
            topStart: {
                buttons: [
                    'copy',
                    'csv',
                    'excel',
                    {
                        extend: 'pdf',
                        title: function() {
                            return selectedRoom ? selectedRoom : 'All Rooms'; // Set title to selected room or default to 'All Rooms'
                        },
                        customize: function (doc) {
                            doc.content[1].text = selectedRoom ? selectedRoom : 'All Rooms'; // Set the title dynamically in the PDF
                        },
                        exportOptions: {
                            columns: ':not(:first-child)' // Exclude the first column (Room Name) from the export
                        }
                    },
                    'print'
                ]
            }
        }
    });

// Move the Room Name filter beside the Show Entries dropdown
    $('#roomsTable_length').append('&nbsp;&nbsp;&nbsp;');
    $('#roomsTable_length').append($('#roomFilter').closest('div'));

// Apply Room Name Filter
    $('#roomFilter').on('change', function () {
        selectedRoom = $(this).val(); // Update selectedRoom with the selected value
        if (selectedRoom) {
            table.column(0).search('^' + selectedRoom + '$', true, false).draw();
        } else {
            table.column(0).search('').draw();
        }
    });




});