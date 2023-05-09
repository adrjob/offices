<x-page-template bodyClass='g-sidenav-show  bg-gray-200'>
    <x-auth.navbars.sidebar activePage="turkey" activeItem="turkey" activeSubitem="">
    </x-auth.navbars.sidebar>    
    <x-layout country="Istanbul" action="/office/istanbul/store"/>
    <x-plugins></x-plugins>
    @push('js')
    <script src="{{ asset('assets') }}/js/plugins/perfect-scrollbar.min.js"></script>    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
  
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    
    <script>
    
    function delete_row(id) {
        // var lnk = "http://yoursite.com/delete";
        if(confirm("Are you sure you want to delete this Record?")){
            $.ajax({
                url: '/api/istanbul/' + id,
                type: 'DELETE',
            })
            .done(function() {
                console.log("success");
                table.ajax.url('/api/istanbul/').load();                
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
        }
    }

    var table = $('#example').DataTable({
        ajax: '/api/istanbul/',
        // searching: false,
        columns: [
            { data: 'id' },            
            { data: 'description' },
            { data: 'total' },
            { data: 'created_at' }
        ],
        columnDefs: [
            {
                targets: [4],
                render: function (data, type, row) {                    
                    var abreform = '<form>'
                    var primeiro = '<a rel="tooltip" class="btn bg-gradient-success btn-sm myCustomButton" href="#" onclick="delete_row(' + row.id + ')" data-original-title=""title=""><i class="material-icons">edit</i><div class="ripple-container"></div></a>';
                    var segundo = '<a rel="tooltip" class="btn bg-gradient-danger btn-sm myCustomButton" href="#" onclick="delete_row(' + row.id + ')" data-original-title=""title=""><i class="material-icons">close</i><div class="ripple-container"></div></a>';
                    var terceiro = '<a rel="tooltip" class="btn bg-gradient-info btn-sm myCustomButton" href="#" onclick="delete_row(' + row.id + ')" data-original-title=""title=""><i class="material-icons">upload</i><div class="ripple-container"></div></a>';
                    var fechaform = '</form>'                    
                    return (   
                        abreform + primeiro + segundo + terceiro + fechaform                                          
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
    $( api.column( 2 ).footer() ).html(
        api.column( 2 ).data().reduce( function ( a, b ) {
            console.log(typeof b)
            return Number(a) + Number(b);
        }, 0 )
    );
  }        
    })

    $('#search-month').on('change', function () {
        table.ajax.url('/api/istanbul/' + this.value ).load();                
    });        
    </script>
    @endpush
</x-page-template>