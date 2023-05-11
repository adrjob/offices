<x-page-template bodyClass='g-sidenav-show  bg-gray-200'>
    <x-auth.navbars.sidebar activePage="turkey" activeItem="turkey" activeSubitem="">
    </x-auth.navbars.sidebar>    
    <x-layout country="Istanbul Expenses" dd="Istanbul" action="/office/istanbul/store"/>        
    <x-plugins></x-plugins>
    @push('js')
    <script src="{{ asset('assets') }}/js/plugins/perfect-scrollbar.min.js"></script>    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
  
    <!-- <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    
    <script type="text/javascript">

    function delete_row(id) {
        // var lnk = "http://yoursite.com/delete";
        if(confirm("Are you sure you want to delete this Record?")){            
            $.ajax({
                url: '/api/istanbul/' + id,                                
                type: 'DELETE',
            })
            .done(function() {
                // console.log("success");
                table.ajax.url('/api/istanbul/').load();                
            })
            .fail(function(e) {
                console.log(e);
            })
            .always(function() {
                // console.log("complete");
            });
        }
    }

    function editRow(id) {
        
    }

    var table = $('#example').DataTable({
        ajax: '/api/istanbul/',
        // searching: false,
        columns: [
            // { data: 'id' },            
            { data: 'description' },
            { data: 'total' },
            { data: 'created_at' }
        ],
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        columnDefs: [
            {
                targets: [3],
                render: function (data, type, row) {    
                    if(row.status === 0) {
                        var fazerUpload = '<label for="file-input"><i class="material-icons" style="padding-right: 20px !important; color: green !important">upload</i><div class="ripple-container"></div></label><input id="file-input" type="file" style="display: none"/>'
                    } else {
                        var fazerUpload = '<label for="file-input"><i class="material-icons" style="padding-right: 20px !important; color: red !important">upload</i><div class="ripple-container"></div></label><input id="file-input" type="file" style="display: none"/>'
                    }                


                    var editar = '<a href="/edit-invoice/'+row.id+'/istanbul" rel="tooltip" class="btn bg-gradient-success btn-sm myCustomButton"><i class="material-icons">edit</i><div class="ripple-container"></div></a>';                    

                    var abreform = '<form>'                    
                    var excluir = '<a rel="tooltip" class="btn bg-gradient-danger btn-sm myCustomButton" href="#" onclick="delete_row(' + row.id + ')" data-original-title=""title=""><i class="material-icons">close</i><div class="ripple-container"></div></a>';                    
                    var ver = '<a rel="tooltip" class="btn bg-gradient-info btn-sm myCustomButton" href="/storage/'+row.dubaiPath+'" target="_blank"><i class="material-icons">visibility</i><div class="ripple-container"></div></a>';
                    var fechaform = '</form>'                    
                    if(row.status == 0) {
                        var appInit = abreform + ver + editar  + excluir + fechaform                                          
                    } else {
                        var appInit = abreform + editar  + excluir + fechaform                                                              
                    }                 
                    return (                                  
                        appInit
                    );
                }
            },
            {
                targets: '_all',
                render: function (data, type, row) {
                    if (type === 'display') {
                        return isNaN(data) && moment(data).isValid() ?
                            moment(data).format('MM/DD/YYYY', 'YYYY/MM/DD')
                            : data;
                    }
                    return data;
                }
            }
        ],
        "footerCallback": function( tfoot, data, start, end, display ) {
            var api = this.api();
    $( api.column( 1 ).footer() ).html(
        api.column( 1 ).data().reduce( function ( a, b ) {
            console.log(typeof b)
            return Number(a) + Number(b);
        }, 0 )
    );
  }        
    })

    $('#search-month').on('change', function () {
        table.ajax.url('/api/instabul/' + this.value ).load();                
    });       
    
    
var input = document.getElementsByTagName('input')[1];
input.onclick = function () {
  this.value = null;
};
  
input.onchange = function () {
  console.log(this.value);
};
  

    </script>
    @endpush
</x-page-template>
