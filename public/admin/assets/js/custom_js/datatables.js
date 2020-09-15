 jQuery(document).ready(function() {
        $('#sample1').DataTable({
            "responsive":true
        });

        var table = $('#example').DataTable({
            "scrollY": "200px",
            "paging": false,
            "bFilter": false,
            "responsive":true
        });

        $('button.toggle-vis').on('click', function(e) {
            e.preventDefault();

            // Get the column API object
            var column = table.column($(this).attr('data-column'));

            // Toggle the visibility
            column.visible(!column.visible());
        });

    });