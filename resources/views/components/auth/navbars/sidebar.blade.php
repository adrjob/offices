@props(['activePage', 'activeItem', 'activeSubitem'])
<style>
    .bg-gradient-dark1 {
        background-color: #0a1c30 !important;        
    }
    .navbar-vertical .navbar-nav > .nav-item .nav-link.active {
        color: #fff;
        border-right-width: 0;
        border-bottom-width: 0;
        background-color: #9a752f !important;
    }
</style>
<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark1"
    id="sidenav-main" style="margin: 0px !important; border-radius: 0px !important; background-image: linear-gradient(195deg, #0a1c30 0%, #0a1c30 100%) !important;">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 d-flex align-items-center text-wrap" href="{{ route('dashboard') }}">
            <img src="https://vanciscapital.com/wp-content/uploads/2022/11/cropped-Vancis-Capital-New-Logo-2022-White-Gold-Recovered.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-2 font-weight-400 text-white">Vancis Finance</span>
        </a>
    </div>
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">            
            <hr class="horizontal light mt-0">                
                @can('viewAny', App\Models\Dubai::class)
                <li class="nav-item">
                <a href="{{ route('office.dubai') }}"
                        class="nav-link text-white {{ $activePage == 'dubai' ? ' active ' : '' }} "
                        aria-controls="dubai" role="button" aria-expanded="false" onMouseOver="this.style.color='#0F0'">
                        <!-- <i class="material-icons-round opacity-10">dashboard</i> -->
                        <img src="https://flagcdn.com/20x15/ae.png" alt="">
                        <span class="nav-link-text ms-2 ps-1">Dubai Expenses</span>
                    </a>                                            
                </li>
                @endcan

                @can('viewAny', App\Models\Dubai::class)
                <li class="nav-item">
                <a href="{{ route('cash.dubai') }}"
                        class="nav-link text-white {{ $activePage == 'cash_dubai' ? ' active ' : '' }} "
                        aria-controls="cash_dubai" role="button" aria-expanded="false" onMouseOver="this.style.color='#0F0'">
                        <!-- <i class="material-icons-round opacity-10">dashboard</i> -->
                        <img src="https://flagcdn.com/20x15/ae.png" alt="">
                        <span class="nav-link-text ms-2 ps-1">Receivables</span>
                    </a>                                            
                </li>
                @endcan

                @can('viewAny', App\Models\Turkey::class)
                <li class="nav-item">  
                    <a href="{{ route('office.turkey') }}"
                        class="nav-link text-white {{ $activePage == 'turkey' ? ' active ' : '' }} "
                        aria-controls="turkey" role="button" aria-expanded="false">
                        <!-- <i class="material-icons-round opacity-10">dashboard</i> -->
                        <img src="https://flagcdn.com/20x15/tr.png" alt="">
                        <span class="nav-link-text ms-2 ps-1">Istanbul Expenses</span>
                    </a>
                </li>    
                @endcan

                @can('viewAny', App\Models\Turkey::class)
                <li class="nav-item">
                <a href="{{ route('cash.istanbul') }}"
                        class="nav-link text-white {{ $activePage == 'cash_istanbul' ? ' active ' : '' }} "
                        aria-controls="cash_istanbul" role="button" aria-expanded="false" onMouseOver="this.style.color='#0F0'">
                        <!-- <i class="material-icons-round opacity-10">dashboard</i> -->
                        <img src="https://flagcdn.com/20x15/tr.png" alt="">
                        <span class="nav-link-text ms-2 ps-1">Receivables</span>
                    </a>                                            
                </li>
                @endcan

                @can('viewAny', App\Models\Vanuatu::class)
                <li class="nav-item"> 
                    <a href="{{ route('office.vanuatu') }}"
                        class="nav-link text-white {{ $activePage == 'vanuatu' ? ' active ' : '' }} "
                        aria-controls="vanuatu" role="button" aria-expanded="false">
                        <!-- <i class="material-icons-round opacity-10">dashboard</i> -->
                        <img src="https://flagcdn.com/20x15/vu.png" alt="">
                        <span class="nav-link-text ms-2 ps-1">Vanuatu Expenses</span>
                    </a>
                </li>       
                @endcan  

                @can('viewAny', App\Models\Vanuatu::class)
                <li class="nav-item">  
                    <a href="{{ route('cash.vanuatu') }}"
                        class="nav-link text-white {{ $activePage == 'vanuatu_cash' ? ' active ' : '' }} "
                        aria-controls="vanuatu_cash" role="button" aria-expanded="false">
                        <!-- <i class="material-icons-round opacity-10">dashboard</i> -->
                        <img src="https://flagcdn.com/20x15/vu.png" alt="">
                        <span class="nav-link-text ms-2 ps-1">Receivables</span>
                    </a>
                </li>    
                @endcan

                @can('viewAny', App\Models\User::class)
                <li class="nav-item">
                <a href="{{ route('users') }}"
                        class="nav-link text-white {{ $activePage == 'user-profile' ? ' active ' : '' }} "
                        aria-controls="dubai" role="button" aria-expanded="false" onMouseOver="this.style.color='#0F0'"
                        style="margin-left: 12px">
                        <i class="material-icons-round opacity-10">settings</i>
                        <!-- <img src="https://flagcdn.com/20x15/ae.png" alt=""> -->
                        <span class="nav-link-text ms-2 ps-1">Settings</span>
                    </a>                                            
                </li>
                @endcan
                
                
                <li class="nav-item">
                <a href="{{ route('user-profile') }}"
                        class="nav-link text-white {{ $activePage == 'laravel-examples' ? ' active ' : '' }} "
                        aria-controls="dubai" role="button" aria-expanded="false" onMouseOver="this.style.color='#0F0'"
                        style="margin-left: 12px">
                        <i class="material-icons-round opacity-10">group</i>
                        <!-- <img src="https://flagcdn.com/20x15/ae.png" alt=""> -->
                        <span class="nav-link-text ms-2 ps-1">User</span>
                    </a>                                            
                </li>
                
        </ul>
    </div>
    <!-- <div class="sidenav-footer w-100 bottom-0 mt-2 ">
        <div class="mx-3">
            <a class="btn bg-gradient-primary w-100"
                href="https://www.creative-tim.com/product/material-dashboard-pro-laravel" target="_blank" type="button">Buy Now</a>
        </div>
        <div class="mx-3">
            <a class="btn bg-gradient-primary w-100" href="../../documentation/getting-started/installation.html" target="_blank">View documentation</a>
        </div>
        <div class="mx-3">
            <a class="btn bg-gradient-primary w-100" href="https://www.creative-tim.com/product/material-dashboard-laravel" target="_blank">Get Free Version</a>
        </div>
    </div> -->
</aside>
