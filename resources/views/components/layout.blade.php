    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-auth.navbars.navs.auth pageTitle="{{$country}}"></x-auth.navbars.navs.auth>
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
                            <h5 class="mb-0">{{ $country }}</h5>   <br>
                            <div class="input-group input-group-static mb-4 w-10">
                                <label for="search-month" class="ms-0" style="color: black">Search by Month</label>
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
                        </div>
                        <x-modal-edit title="Edit Dubai" action="test" dataURL="ok"/>
                        <x-modal dataURL="" action="{{ $action }}" title="{{ $country }}" />
                        <div class="card-body">
                        <x-table-invoices dd="{{$dd}}"/>
                        </div>
                    </div>
                </div>    
                                     
            </div>
            <x-auth.footers.auth.footer></x-auth.footers.auth.footer>
        </div>
    </main>
    