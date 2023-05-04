<x-page-template bodyClass='g-sidenav-show  bg-gray-200'>
    <x-auth.navbars.sidebar activePage="dubai" activeItem="dubai" activeSubitem="">
    </x-auth.navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-auth.navbars.navs.auth pageTitle="Invoices Dubai"></x-auth.navbars.navs.auth>
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
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h5 class="mb-0">Invoices Dubai</h5>     
                            <h6>
                                Total This Month (AED): {{$total}}
                            </h6>                       
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
                                    <form role="form text-left" autocomplete="off"  method="POST" action="{{ route('office.dubai.store') }}" enctype="multipart/form-data">
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
                        <div class="table-responsive">
                            <table class="table table-flush" id="datatable-basic">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ID</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Description</th>                                        
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Amount</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Created At</th>                                                                               
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Created By</th>                                                                                 
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>                                          
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dubai as $dbInv)
                                        <tr>
                                            <td>{{$dbInv->id}}</td>
                                            <td>{{$dbInv->description}}</td>
                                            <td>{{$dbInv->total}}</td>
                                            <td>{{$dbInv->created_at}}</td>                                            
                                            <td>{{$dbInv->getCreatedBy($dbInv->user_id)}}</td>
                                            <td>
                                                <a 
                                                href="{{asset('storage/'.$dbInv->dubaiPath)}}"
                                                target="_blank"
                                                > 
                                                <i class="material-icons">visibility</i>                                                
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
            <x-auth.footers.auth.footer></x-auth.footers.auth.footer>
        </div>
    </main>
    <x-plugins></x-plugins>
    @push('js')
    <script src="{{ asset('assets') }}/js/plugins/perfect-scrollbar.min.js"></script>

    <script src="{{ asset('assets') }}/js/plugins/datatables.js"></script>
    <script>
        const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
            searchable: true,
            fixedHeight: true
        });

    </script>
    @endpush
</x-page-template>
