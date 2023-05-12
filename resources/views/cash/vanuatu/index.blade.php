<x-page-template bodyClass='g-sidenav-show  bg-gray-200'>
    <x-auth.navbars.sidebar activePage="vanuatu_cash" activeItem="vanuatu_cash" activeSubitem="">
    </x-auth.navbars.sidebar>    
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-auth.navbars.navs.auth pageTitle="Receivables"></x-auth.navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row mt-4">
                <div class="col-12">
                         @if (Session::has('status'))
                        <div class="alert alert-success alert-dismissible text-white mx-4" role="alert">
                            <span class="text-sm">{{ Session::get('status') }}</span>
                            <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @elseif (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible text-white mx-4" role="alert">
                            <span class="text-sm">{{ Session::get('error') }}</span>
                            <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif                                        
                </div>                   
                <div class="col-12">
                    <div class="card">
                    <div class="card-header">
                            <h5 class="mb-0">Receivables</h5>     
                            <br>
                            <div class="input-group input-group-static mb-4 w-10">
                                <label for="search-month" class="ms-0" style="color: black">Search by Month</label>
                            <select class="form-control" name="search-month" id="search-month">
                            @if($month == 1)
                                <option value="01">Jan</option>
                                @elseif($month == 2)
                                <option value="02">2 - Feb</option>
                                @elseif($month == 3)
                                <option value="03">3 - Mar</option>
                                @elseif($month == 4)
                                <option value="04">4 - Apr</option>
                                @elseif($month == 5)
                                <option value="05">5 - May</option>
                                @elseif($month == 6)
                                <option value="06">6 - Jun</option>
                                @elseif($month == 7)
                                <option value="07">7 - Jul</option>
                                @elseif($month == 8)
                                <option value="08">8 - Aug</option>
                                @elseif($month == 9)
                                <option value="09">9 - Sep</option>
                                @elseif($month == 10)
                                <option value="10">10 - Oct</option>
                                @elseif($month == 11)
                                <option value="11">11 - Nov</option>
                                @else
                                <option value="12">12 - Dez</option>
                                @endif                
                                <option value="01">1 - Jan</option>
                                <option value="02">2 - Feb</option>
                                <option value="03">3 - Mar</option>
                                <option value="04">4 - Apr</option>
                                <option value="05">5 - May</option>
                                <option value="06">6 - Jun</option>
                                <option value="07">7 - Jul</option>
                                <option value="08">8 - Aug</option>
                                <option value="09">9 - Sep</option>
                                <option value="10">10 - Oct</option>
                                <option value="11">11 - Nov</option>
                                <option value="12">12 - Dez</option>
                            </select>
                            </div>                                                      
                        </div>
                        <a data-bs-toggle="modal" data-bs-target="#exampleModalMessage" class="btn btn-vancis btn-sm myCustomButton">Add New<div class="ripple-container"></div></a>
                        <div class="modal fade" id="exampleModalMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessage" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                            <div class="modal-body p-0">
                                <div class="card card-plain">
                                <div class="card-header pb-0 text-center">
                                    <h5 class="">Add New</h5>
                                    <p class="mb-0"></p>
                                </div>
                                <div class="card-body">
                                    <form role="form text-left" autocomplete="off"  method="POST" action="{{ route('cash.vanuatu.store') }}" enctype="multipart/form-data">
                                    @csrf    
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Description</label>
                                        <input type="text" name="description" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" required>
                                    </div>
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Receive</label>
                                        <input type="number" name="receive" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" required>
                                    </div>
                                    <div class="input-group input-group-outline my-3">
                                        <!-- <label class="form-label">Password</label> -->
                                        <input type="file" name="dubaiPath" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
                                    </div>                
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" />                                    
                                    <div class="text-center">
                                    <button type="submit" class="btn btn-round bg-gradient-dark btn-vancis w-100 mt-4 mb-0">Save</button>
                                    </div>
                                    </form>                                    
                                </div>                                
                                </div>
                            </div>
                            </div>
                        </div>
                        </div> 
                        <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-flush" id="example">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Id</th>                                    
                                        <th>Description/Notes</th>                                           
                                        <th>Vatu/VUV</th>                                 
                                        <!-- <th>Spend</th>
                                        <th>Total</th> -->
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th></th>                                    
                                        <th></th>    
                                        <!-- <th></th>
                                        <th></th>                                 -->
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>    
                                     
            </div>
            <x-auth.footers.auth.footer></x-auth.footers.auth.footer>
        </div>
    </main>
    <x-plugins></x-plugins>
    @push('js')
    <script src="{{ asset('assets') }}/js/plugins/perfect-scrollbar.min.js"></script>

    <!-- <script src="{{ asset('assets') }}/js/plugins/datatables.js"></script> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
  
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    
    <script>

function delete_row(id) {
            // var lnk = "http://yoursite.com/delete";
            if(confirm("Are you sure you want to delete this Record?")){
                $.ajax({
                    url: '/api/receivables/vanuatu/' + id,
                    type: 'DELETE',
                })
                .done(function() {
                    console.log("success");
                    table.ajax.url('/api/receivables/vanuatu/').load();                
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
            }
        }


        // var month = new Date().getMonth() + 1;
        var table = $('#example').DataTable({
            ajax: '/api/receivables/vanuatu/',
            // searching: false,
            columns: [
                { data: 'id' },
                { data: 'description' },
                { data: 'receive' },
                { data: 'spend' },                
                { data: 'created_at' }
            ],
            columnDefs: [                                       
                {
                    targets: [2],
                    render: function (data, type, row) {
                        return "<span style='color: green'>" + row.receive + "</span>"

                    }
                },
                // {
                //     targets: [3],
                //     render: function (data, type, row) {
                //         if (row.spend == null) {
                //             return "<span style='color: red'>0</span>"
                //         } else {
                //             return "<span style='color: red'>" + row.spend + "</span>"
                //         }
                //     }
                // },
                // {
                //     targets: [4],
                //     render: function (data, type, row) {
                //         return row.receive - row.spend;
                //     }
                // }, 
                {
                    targets:[3],
                    render: function (data, type, row) {
                        return isNaN(row.created_at) && moment(row.created_at).isValid() ?
                                moment(row.created_at).format('MM/DD/YYYY', 'YYYY/MM/DD')
                                : row.created_at;
                    }
                },               
                {
                    targets: [4],
                    // render: function (data, type, row) {
                    //     if (row.status = 0) {
                    //         return "view";
                    //     } else {
                    //         return "No File";
                    //     }

                    // }
                    render: function (data, type, row) {    
                    if(row.status === 0) {
                        var fazerUpload = '<label for="file-input"><i class="material-icons" style="padding-right: 20px !important; color: green !important">upload</i><div class="ripple-container"></div></label><input id="file-input" type="file" style="display: none"/>'
                    } else {
                        var fazerUpload = '<label for="file-input"><i class="material-icons" style="padding-right: 20px !important; color: red !important">upload</i><div class="ripple-container"></div></label><input id="file-input" type="file" style="display: none"/>'
                    }                


                    // var editar = '<a data-bs-toggle="modal" data-bs-target="#modalEdit" rel="tooltip" class="btn bg-gradient-success btn-sm myCustomButton"><i class="material-icons">edit</i><div class="ripple-container"></div></a>';                    
                    // var editar = '<a onclick="editRow('+row.id+', '+row.status+', '+row.description+', '+row.dubaiPath+')" rel="tooltip" class="btn bg-gradient-success btn-sm myCustomButton"><i class="material-icons">edit</i><div class="ripple-container"></div></a>';                    
                    // onclick="editRow('+row.id+')"
                    var editar = '<a href="/edit-cash/'+row.id+'/vanuatu" rel="tooltip" class="btn bg-gradient-success btn-sm myCustomButton"><i class="material-icons">edit</i><div class="ripple-container"></div></a>';                    

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
            ],
            "footerCallback": function (tfoot, data, start, end, display) {
                var api = this.api();               
                $(api.column(2).footer()).html(
                    api.column(2).data().reduce(function (a, b) {
                        console.log(typeof b)
                        return Number(a) + Number(b);
                    }, 0)
                );             
            }         
        })

        $('#search-month').on('change', function () {
            table.ajax.url('/api/receivables/vanuatu/' + this.value).load();
        });        
    </script>
    @endpush
</x-page-template>
