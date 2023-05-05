<x-page-template bodyClass='bg-gray-200'>

    <!-- Navbar -->
    <nav
        class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
        <x-auth.navbars.navs.guest p='' btn='bg-gradient-primary' textColor='text-white' svgColor='white'>
        </x-auth.navbars.navs.guest>
    </nav>
    <!-- End Navbar -->
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100 "
        style="background-color: #0a1c30">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-5">
                <div class="row signin-margin">
                    <div class="col-lg-5 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">                            
                            <div class="card-body text-center">
                                <h6>You can login with these 4 user types:</h6>
                                <ol>
                                    <li class="text-sm font-weight-normal">Username <strong>admin@material.com</strong> and Password
                                        <strong>secret</strong></li>
                                    <li class="text-sm font-weight-normal">Username <strong>dubai@vanciscapital.com</strong> and Password
                                       <strong>secret</strong></li>
                                    <li class="text-sm font-weight-normal"> Username <strong>turkey@vanciscapital.com</strong> and Password
                                        <strong>secret</strong></li>
                                    <li class="text-sm font-weight-normal"> Username <strong>vanuatu@vanciscapital.com</strong> and Password
                                        <strong>secret</strong></li>

                                </ol>
                                <form role="form" method="POST" action="{{ route('login') }}" class="text-start">
                                    @csrf
                                    @if (Session::has('status'))
                                    <div class="alert alert-success alert-dismissible text-white" role="alert">
                                        <span class="text-sm">{{ Session::get('status') }}</span>
                                        <button type="button" class="btn-close text-lg py-3 opacity-10"
                                            data-bs-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif

                                    <div class="input-group input-group-dynamic mt-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name='email'
                                            value='admin@material.com'>
                                    </div>
                                    @error('email')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror

                                    <div class="input-group input-group-dynamic mt-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name='password' value='secret'>
                                    </div>
                                    @error('password')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror                                   
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-warning w-100 my-4 mb-2" style="background-color: #9a752f !important;">
                                        Signin</button>
                                    </div>                                                                  
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-auth.footers.guest.basic-footer textColor='text-white'></x-auth.footers.guest.basic-footer>
        </div>
    </main>
    @push('js')
    <script src="{{ asset('assets') }}/js/plugins/jquery-3.6.0.min.js"></script>
    <script>
        $(function () {
    
            function checkForInput(element) {
    
                const $label = $(element).parent();
    
                if ($(element).val().length > 0) {
                    $label.addClass('is-filled');
                } else {
                    $label.removeClass('is-filled');
                }
            }
            var input = $(".input-group input");
            input.focusin(function () {
                $(this).parent().addClass("focused is-focused");
            });

            $('input').each(function () {
                checkForInput(this);
            });

            $('input').on('change keyup', function () {
                checkForInput(this);
            });
    
            input.focusout(function () {
                $(this).parent().removeClass("focused is-focused");
            });
        });
    
    </script>
    
    @endpush
</x-page-template>
