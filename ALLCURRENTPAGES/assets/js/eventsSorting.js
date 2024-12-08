$(document).ready(function() {
    function fetchEvents() {
        var search = $('#search').val();
        var sortBy = $('#sort_by').val();

        $.ajax({
            type: 'GET',
            url: 'home1.php',
            data: {
                search: search,
                sort_by: sortBy
            },
            success: function(response) {
                // update table w new data
                $('#form_info').html(response);
            }
        });
    }

    // trigger search on click 
    $('#searchButton').on('click', function() {
        event.preventDefault();  // prevent form from submitting normally
        fetchEvents();
    });

    // trigger sort on change of sort_by dropdown 
    $('#sortButton').on('click', function() {
        event.preventDefault();  // prevent form from submitting normally
        fetchEvents();
    });

    // Automatically refresh events when the user types in search box
    $('#search').on('input', function() {
        fetchEvents();
    });
});