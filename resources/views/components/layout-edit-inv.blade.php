<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-auth.navbars.navs.auth pageTitle="Edit {{$country}}"></x-auth.navbars.navs.auth>
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
                          
                        
                    </div>
                </div>    
                                     
            </div>
            <x-auth.footers.auth.footer></x-auth.footers.auth.footer>
        </div>
    </main>
    