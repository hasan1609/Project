
    $(document).ready(function() {
        var table = $('#dataKaryawan').DataTable({
            lengthChange: false,
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'print',
                    customize: function(win) {
                        $(win.document.body)
                            .css('font-size', '12pt');


                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    },
                    title: 'Data Karyawan',
                    exportOptions: {
                        columns: [0, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'excel',
                    orientation: 'potrait',
                    pageSize: 'a4',
                    title: 'Data Karyawan',
                    exportOptions: {
                        columns: [0, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'csv',
                    orientation: 'potrait',
                    pageSize: 'a4',
                    title: 'Data Karyawan',
                    exportOptions: {
                        columns: [0, 2, 3, 4, 5]
                    }
                }
            ],
            columnDefs: [{
                "searchable": false,
                "orderable": false,
                "targets": 6
            }]
        });
        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');
    });