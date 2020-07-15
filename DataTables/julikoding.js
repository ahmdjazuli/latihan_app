$(document).ready( function () {
        var table = $('#julikoding').DataTable({
          buttons: [
            {
              extend:'pdfHtml5',
              download: 'open',
              pageSize:'LEGAL',
              orientation:'potrait',
              title:'Export to PDF'
            },{
              extend:'print',
              download: 'open',
              title:'Cetak gak nih'
            }],
          dom:
          "<'row'<'col-md-4'B><'col-md-4'l><'col-md-4'f>>" +
          "<'row'<'col-md-12'tr>>" +
          "<'row'<'col-md-5'i><'col-md-7'p>>",
          columnDefs:[
            {
              orderable:false,
              targets:'no-sort'
            }
          ],
          "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Semua"]],
          // "order": [[ 1, "desc" ]],
          "pagingType": "full_numbers",
          "paging":   true,
          "ordering": true,
          "info":     true,
          // "scrollY": "500",
          // "scrollCollapse": true,
          // "scrollX":true,
          "language": {
            "decimal": ",",
            "thousands": ".",
            "lengthMenu": "_MENU_ aja dong",
            "zeroRecords": "Dasar jomblo!",
            "info": "Halaman _START_ - _END_ dari _TOTAL_",
            "infoEmpty": "Zonk!",
            "infoFiltered": "(Tersaring _MAX_ data)",
            "paginate":{
              "first" : "&laquo;",
              "previous" : "&lsaquo;",
              "next" : "&rsaquo;",
              "last" : "&raquo;"
            },
            "search" : "<svg style='width:24px;height:24px' viewBox='0 0 24 24'><path fill='#FFFFFF' d='M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z' /></svg>",
            "processing" : "Sedang santuy...",
            "loadingRecords" : "Kalem..."
          },

        initComplete: function(){
          this.api().columns().every( function() {
            var column = this;
            var select = $('<select class="form-control"><option value=""></option></select>')
              .appendTo( $(column.footer()).empty() )
              .on('change', function(){
                var val = $.fn.dataTable.util.escapeRegex(
                  $(this).val()
                );

                column
                  .search( val ? '^'+val+'$' : '', true, false)
                  .draw();
              });

            column.data().unique().sort().each( function(d, j){
              select.append('<option value="'+d+'">'+d+'</option>')
            });
          });
        }
         
        });
        // table.buttons().container().appendTo('.col-md-4:eq(0)');
    } );