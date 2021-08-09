// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    dom :'Bfrtip',
    buttons : [
      {
        extends : 'pdf',
        oriented: 'landscape',
        pageSize: 'a4',
        title: 'Data Karyawan',
        download: 'open'
      },
      'excel','print','copy'
    ]
  });
});
