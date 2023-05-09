<x-page-template bodyClass='g-sidenav-show  bg-gray-200'>
    <x-auth.navbars.sidebar activePage="turkey" activeItem="turkey" activeSubitem="">
    </x-auth.navbars.sidebar>    
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-auth.navbars.navs.auth pageTitle="Edit"></x-auth.navbars.navs.auth>
        <!-- End Navbar -->
        <style>
            /* .mybutton a {
                background-color: black !important;
            } */
            form a {
                margin: -10px 10px 0px 0px !important;
            }
        </style>
        <x-edit-invoices display="none"/>
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
                                <h4>Edit Invoice</h4>                    
                            </div>
                            <div class="card-body">
                            <form role="form text-left" autocomplete="off"  method="POST" action="{{ route('edit.invoice.update', 'instanbul') }}" enctype="multipart/form-data">
                                @csrf
                            
                            <div class="row">
                                <div class="col-md-6">
                                <div class="input-group input-group-static my-3">
                                    <label >ID</label>
                                    <input type="number" name="id" disabled class="form-control" value="{{$data[0]->id}}">
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="input-group input-group-static my-3">
                                    <label >Description</label>
                                    <input type="text" name="description" class="form-control" value="{{$data[0]->description}}">                                    
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="input-group input-group-static my-3">
                                    <label >Amount</label>                            
                                    <input type="number" name="total" class="form-control" value="{{$data[0]->total}}">
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="input-group input-group-static my-3">
                                    <label >File</label>
                                    <input type="file" name="dubaiPath" class="form-control">
                                </div>
                                </div>
                            </div>
                            <input type="hidden" name="my_id" value="{{$data[0]->id}}">
                            <input type="hidden" name="country" value="istanbul">
                            <button type="submit" class="btn btn-vancis mt-3">Save</button>
                            </form>
                            </div>
                        </div>    
                                     
            </div>
            <x-auth.footers.auth.footer></x-auth.footers.auth.footer>
        </div>
    </main>
    
    <x-plugins></x-plugins>
    @push('js')
    <script src="{{ asset('assets') }}/js/plugins/perfect-scrollbar.min.js"></script>    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
  
    
    <script type="text/javascript">


    </script>
    @endpush
</x-page-template>
