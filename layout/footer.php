<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="../index.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<!-- <script src="../vendor/datatable/dataTables.bootstrap4.min.js"></script> -->
<!-- <script src="../vendor/DataTables/datatables.min.js"></script> -->

<script type="text/javascript" src="../vendor/DataTables/JSZip-2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="../vendor/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="../vendor/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="../vendor/DataTables/DataTables-1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../vendor/DataTables/DataTables-1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="../vendor/DataTables/Buttons-1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="../vendor/DataTables/Buttons-1.7.1/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript" src="../vendor/DataTables/Buttons-1.7.1/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="../vendor/DataTables/Buttons-1.7.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="../vendor/DataTables/Buttons-1.7.1/js/buttons.print.min.js"></script>

<!-- Page level custom scripts -->
<!-- <script src="../js/demo/datatables-demo.js"></script> -->

<!-- ckeditor -->
<script src="../vendor/ckeditor/ckeditor.js"></script>

<!-- search dropdown -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script type="text/javascript">
    $('selectpicker').selectpicker();
</script>

<script type="text/javascript">
    function checkAll(ele) {
        var checkboxes = document.getElementsByTagName('input');
        if (ele.checked) {
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = true;
                }
            }
        } else {
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = false;
                }
            }
        }
    }
</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#image").change(function() {
        readURL(this);
    });
</script>
<script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 4000);
    });
</script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            columnDefs: [{
                "searchable": false,
                "orderable": false,
                "targets": 0
            }],
            "order": [1, "asc"]
        });
    });
    // $(document).ready(function() {
    //     $('#absensi').DataTable({
    //         lengthChange: false,
    //         dom: 'Bfrtip',
    //         buttons: [{
    //                 extend: 'pdf',
    //                 customize: function(win) {
    //                     $(win.document.body)
    //                         .css('font-size', '12pt');


    //                     $(win.document.body).find('table')
    //                         .addClass('compact')
    //                         .css('font-size', 'inherit');
    //                 },
    //                 title: 'Data Karyawan',
    //                 orientation: 'landscape',
    //                 pageSize: 'LEGAL'

    //             },
    //             {
    //                 extend: 'excel',
    //                 title: 'Data Karyawan'
    //             },
    //             {
    //                 extend: 'csv',
    //                 title: 'Data Karyawan'
    //             }
    //         ],
    //         columnDefs: [{
    //             "searchable": false,
    //             "orderable": false,
    //             "targets": 6
    //         }]
    //     });
    //     table.buttons().container()
    //         .appendTo('#example_wrapper .col-md-6:eq(0)');
    // });
</script>
<script>
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
</script>
<script>
    $(document).ready(function() {
        var nama = document.getElementById("tgl_cetak");
        var table = $('').DataTable({
            lengthChange: false,
            dom: 'Bfrtip',
            buttons: [{
                    title: nama,
                    extend: 'pdf',
                    orientation: 'landscape',
                    pageSize: 'LEGAL'

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
</script>
</body>

</html>