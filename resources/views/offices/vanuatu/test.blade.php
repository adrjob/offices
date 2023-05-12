<x-page-template bodyClass='g-sidenav-show  bg-gray-200'>
    <x-auth.navbars.sidebar activePage="vanuatu" activeItem="vanuatu" activeSubitem="">
    </x-auth.navbars.sidebar>    
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-auth.navbars.navs.auth pageTitle="Invoices Vanuatu"></x-auth.navbars.navs.auth>
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
                            <h5 class="mb-0">Invoices Vanuatu</h5>     
                            <div>
                            <label class="ms-0" for="search-month">Search By Month</label>    
                            <select class="form-control" name="search-month" id="search-month">
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
                            <!-- <h6>
                                Total This Month (AED): {{$total}}
                            </h6>                        -->
                        </div>
                        <button type="button" class="btn bg-gradient-dark btn-vancis mb-3" data-bs-toggle="modal" data-bs-target="#exampleModalMessage">Add New</button>
                        <div class="modal fade" id="exampleModalMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessage" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                            <div class="modal-body p-0">
                                <div class="card card-plain">
                                <div class="card-header pb-0 text-center">
                                    <h5 class="">Add New Invoice</h5>
                                    <p class="mb-0"></p>
                                </div>
                                <div class="card-body">
                                    <form role="form text-left" autocomplete="off"  method="POST" action="{{ route('office.vanuatu.store') }}" enctype="multipart/form-data">
                                    @csrf    
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Description</label>
                                        <input type="text" name="description" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" required>
                                    </div>
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Amount</label>
                                        <input type="number" name="total" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" required>
                                    </div>
                                    <div class="input-group input-group-outline my-3">
                                        <!-- <label class="form-label">Password</label> -->
                                        <input type="file" name="dubaiPath" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" required>
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
                                        <th>Description</th>    
                                        <th>Amount</th>                                
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th></th>                                    
                                        <th></th>    
                                        <th>Total</th>                                
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
    
    // var month = new Date().getMonth() + 1;
    

    var table = $('#example').DataTable({
        ajax: '/api/vanuatu/',
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
                    return "<a href='/storage/" + row.dubaiPath + "' target='_blank'><i class='material-icons'>visibility</i></a>";
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
            // console.log(typeof b)
            return Number(a) + Number(b);
        }, 0 )
    );
  }        
    })

    $('#search-month').on('change', function () {
        table.ajax.url('/api/vanuatu/' + this.value ).load();                
    });        
    </script>
    @endpush
</x-page-template>
