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
            <span class="ms-2 font-weight-400 text-white">Vancis Finace</span>
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
                        <span class="nav-link-text ms-2 ps-1">Dubai</span>
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
                        <span class="nav-link-text ms-2 ps-1">Turkey</span>
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
                        <span class="nav-link-text ms-2 ps-1">Vanuatu</span>
                    </a>
                </li>       
                @endcan  

                <li class="nav-item">
                <a href="{{ route('user-profile') }}"
                        class="nav-link text-white {{ $activePage == 'user-profile' ? ' active ' : '' }} "
                        aria-controls="dubai" role="button" aria-expanded="false" onMouseOver="this.style.color='#0F0'"
                        style="margin-left: 12px">
                        <i class="material-icons-round opacity-10">settings</i>
                        <!-- <img src="https://flagcdn.com/20x15/ae.png" alt=""> -->
                        <span class="nav-link-text ms-2 ps-1">Settings</span>
                    </a>                                            
                </li>
                
                @can('viewAny', App\Models\Dubai::class)
                <li class="nav-item">
                <a href="{{ route('users') }}"
                        class="nav-link text-white {{ $activePage == 'laravel-examples' ? ' active ' : '' }} "
                        aria-controls="dubai" role="button" aria-expanded="false" onMouseOver="this.style.color='#0F0'"
                        style="margin-left: 12px">
                        <i class="material-icons-round opacity-10">group</i>
                        <!-- <img src="https://flagcdn.com/20x15/ae.png" alt=""> -->
                        <span class="nav-link-text ms-2 ps-1">Users</span>
                    </a>                                            
                </li>
                @endcan

            
            
            <!-- <li class="nav-item">
                <a data-bs-toggle="collapse" href="#LaravelExamples"
                    class="nav-link text-white {{ $activePage == 'laravel-examples' ? ' active ' : '' }}  "
                    aria-controls="LaravelExamples" role="button" aria-expanded="false">
                    <i class="fab fa-laravel"></i>
                    <span class="nav-link-text ms-2 ps-1">Laravel Examples</span>
                </a>
                <div class="collapse {{ $activePage == 'laravel-examples' ? ' show ' : '' }} " id="LaravelExamples">
                    <ul class="nav ">
                        <li class="nav-item {{ $activeItem == 'user-profile' ? ' active ' : '' }}">
                            <a class="nav-link text-white {{ $activeItem == 'user-profile' ? ' active ' : '' }}  "
                                href="{{ route('user-profile') }}">
                                <span class="sidenav-mini-icon"> UP </span>
                                <span class="sidenav-normal  ms-2  ps-1"> User Profile <b class="caret"></b></span>
                            </a>
                        </li>
                        @can('manage-users', App\Models\User::class)
                        <li class="nav-item {{ $activeItem == 'user-management' ? ' active ' : '' }}">
                            <a class="nav-link text-white {{ $activeItem == 'user-management' ? ' active ' : '' }}  "
                                href="{{ route('users') }}">
                                <span class="sidenav-mini-icon"> UM </span>
                                <span class="sidenav-normal  ms-2  ps-1"> User Management <b class="caret"></b></span>
                            </a>
                        </li>
                        <li class="nav-item {{ $activeItem == 'role-management' ? ' active ' : '' }}">
                            <a class="nav-link text-white {{ $activeItem == 'role-management' ? ' active ' : '' }}  "
                                href="{{ route('roles') }}">
                                <span class="sidenav-mini-icon"> RM </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Role Management <b class="caret"></b></span>
                            </a>
                        </li>
                        @endcan
                        @can('manage-items', App\Models\User::class)
                        <li class="nav-item {{ $activeItem == 'category-management' ? ' active ' : '' }}">
                            <a class="nav-link text-white {{ $activeItem == 'category-management' ? ' active ' : '' }}  "
                                href="{{ route('category') }}">
                                <span class="sidenav-mini-icon"> CM </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Category Management <b
                                        class="caret"></b></span>
                            </a>
                        </li>
                        <li class="nav-item {{ $activeItem == 'tag-management' ? ' active ' : '' }}">
                            <a class="nav-link text-white {{ $activeItem == 'tag-management' ? ' active ' : '' }}  "
                                href="{{ route('tag') }}">
                                <span class="sidenav-mini-icon"> TM </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Tag Management <b class="caret"></b></span>
                            </a>
                        </li>
                        @endcan
                        @can('manage-items', App\Models\User::class)
                        <li class="nav-item {{ $activeItem == 'item-management' ? ' active ' : '' }}">
                            <a class="nav-link text-white {{ $activeItem == 'item-management' ? ' active ' : '' }}  "
                                href="{{ route('items') }}">
                                <span class="sidenav-mini-icon"> IM </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Item Management <b class="caret"></b></span>
                            </a>
                        </li>
                        @else
                        <li class="nav-item {{ $activeItem == 'item-management' ? ' active ' : '' }}">
                            <a class="nav-link text-white {{ $activeItem == 'item-management' ? ' active ' : '' }}  "
                                href="{{ route('items') }}">
                                <span class="sidenav-mini-icon"> IM </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Items <b class="caret"></b></span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </div>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder text-white">PAGES</h6>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#pagesExamples"
                    class="nav-link text-white {{ $activePage == 'pages' ? ' active ' : '' }}  "
                    aria-controls="pagesExamples" role="button" aria-expanded="false">
                    <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">image</i>
                    <span class="nav-link-text ms-2 ps-1">Pages</span>
                </a>
                <div class="collapse {{ $activePage == 'pages' ? ' show ' : '' }} " id="pagesExamples">
                    <ul class="nav ">
                        <li class="nav-item ">
                            <a class="nav-link text-white {{ $activeItem == 'profile' ? ' active ' : '' }}  "
                                data-bs-toggle="collapse" aria-expanded="false" href="#profileExample">
                                <span class="sidenav-mini-icon"> P </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Profile <b class="caret"></b></span>
                            </a>
                            <div class="collapse {{ $activeItem == 'profile' ? ' show ' : '' }} " id="profileExample">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-white {{ $activeSubitem == 'profile-overview' ? ' active ' : '' }}  "
                                            href="{{ route('overview') }}">
                                            <span class="sidenav-mini-icon"> P </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Profile Overview </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white {{ $activeSubitem == 'all-projects' ? ' active ' : '' }} "
                                            href="{{ route('projects') }}">
                                            <span class="sidenav-mini-icon"> A </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> All Projects </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white{{ $activeItem == 'users' ? ' active ' : '' }}  "
                                data-bs-toggle="collapse" aria-expanded="false" href="#usersExample">
                                <span class="sidenav-mini-icon"> U </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Users <b class="caret"></b></span>
                            </a>
                            <div class="collapse {{ $activeItem == 'users' ? ' show ' : '' }} " id="usersExample">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-white {{ $activeSubitem == 'reports' ? ' active ' : '' }} "
                                            href="{{ route('reports') }}">
                                            <span class="sidenav-mini-icon"> R </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Reports </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white {{ $activeSubitem == 'new-user' ? ' active ' : '' }} "
                                            href="{{ route('new-user') }}">
                                            <span class="sidenav-mini-icon"> N </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> New User </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white {{ $activeItem == 'account' ? ' active ' : '' }} "
                                data-bs-toggle="collapse" aria-expanded="false" href="#accountExample">
                                <span class="sidenav-mini-icon"> A </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Account <b class="caret"></b></span>
                            </a>
                            <div class="collapse {{ $activeItem == 'account' ? ' show ' : '' }} " id="accountExample">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-white {{ $activeSubitem == 'settings' ? ' active ' : '' }}  "
                                            href="{{ route('settings') }}">
                                            <span class="sidenav-mini-icon"> S </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Settings </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white {{ $activeSubitem == 'billing' ? ' active ' : '' }} "
                                            href="{{ route('billing') }}">
                                            <span class="sidenav-mini-icon"> B </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Billing </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white {{ $activeSubitem == 'invoice' ? ' active ' : '' }} "
                                            href="{{ route('invoice') }}">
                                            <span class="sidenav-mini-icon"> I </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Invoice </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white {{ $activeSubitem == 'security' ? ' active ' : '' }} "
                                            href="{{ route('security') }}">
                                            <span class="sidenav-mini-icon"> S </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Security </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white {{ $activeItem == 'projects' ? ' active ' : '' }} "
                                data-bs-toggle="collapse" aria-expanded="false" href="#projectsExample">
                                <span class="sidenav-mini-icon"> P </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Projects <b class="caret"></b></span>
                            </a>
                            <div class="collapse {{ $activeItem == 'projects' ? ' show ' : '' }} " id="projectsExample">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-white {{ $activeSubitem == 'general' ? ' active ' : '' }} "
                                            href="{{ route('general') }}">
                                            <span class="sidenav-mini-icon"> G </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> General </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white {{ $activeSubitem == 'timeline' ? ' active ' : '' }} "
                                            href="{{ route('timeline') }}">
                                            <span class="sidenav-mini-icon"> T </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Timeline </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white {{ $activeSubitem == 'new-project' ? ' active ' : '' }}  "
                                            href="{{ route('new-project') }}">
                                            <span class="sidenav-mini-icon"> N </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> New Project </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white {{ $activeItem == 'virtual-reality' ? ' active ' : '' }} "
                                data-bs-toggle="collapse" aria-expanded="false" href="#vrExamples">
                                <span class="sidenav-mini-icon"> V </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Virtual Reality <b class="caret"></b></span>
                            </a>
                            <div class="collapse {{ $activeItem == 'virtual-reality' ? ' show ' : '' }} "
                                id="vrExamples">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-white {{ $activeSubitem == 'vr-default' ? ' active ' : '' }} "
                                            href="{{ route('vr-default') }}">
                                            <span class="sidenav-mini-icon"> V </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> VR Default </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white {{ $activeSubitem == 'vr-info' ? ' active ' : '' }} "
                                            href="{{ route('vr-info') }}">
                                            <span class="sidenav-mini-icon"> V </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> VR Info </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item {{ $activeItem == 'pricing-page' ? ' active ' : '' }} ">
                            <a class="nav-link text-white  {{ $activeItem == 'pricing-page' ? ' active ' : '' }}"
                                href="{{ route('pricing-page') }}">
                                <span class="sidenav-mini-icon"> P </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Pricing Page </span>
                            </a>
                        </li>
                        <li class="nav-item {{ $activeItem == 'rtl' ? ' active ' : '' }}">
                            <a class="nav-link text-white  {{ $activeItem == 'rtl' ? ' active ' : '' }} "
                                href="{{ route('rtl') }}">
                                <span class="sidenav-mini-icon"> R </span>
                                <span class="sidenav-normal  ms-2  ps-1"> RTL </span>
                            </a>
                        </li>
                        <li class="nav-item {{ $activeItem == 'widgets' ? ' active ' : '' }}">
                            <a class="nav-link text-white  {{ $activeItem == 'widgets' ? ' active ' : '' }} "
                                href="{{ route('widgets') }}">
                                <span class="sidenav-mini-icon"> W </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Widgets </span>
                            </a>
                        </li>
                        <li class="nav-item  {{ $activeItem == 'charts' ? ' active ' : '' }}">
                            <a class="nav-link text-white {{ $activeItem == 'charts' ? ' active ' : '' }}"
                                href="{{ route('charts') }}">
                                <span class="sidenav-mini-icon"> C </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Charts </span>
                            </a>
                        </li>
                        <li class="nav-item  {{ $activeItem == 'sweet-alerts' ? ' active ' : '' }}">
                            <a class="nav-link text-white {{ $activeItem == 'sweet-alerts' ? ' active ' : '' }}"
                                href="{{ route('sweet-alerts') }}">
                                <span class="sidenav-mini-icon"> S </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Sweet Alerts </span>
                            </a>
                        </li>
                        <li class="nav-item  {{ $activeItem == 'notifications' ? ' active ' : '' }}">
                            <a class="nav-link text-white {{ $activeItem == 'notifications' ? ' active ' : '' }}"
                                href="{{ route('notifications') }}">
                                <span class="sidenav-mini-icon"> N </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Notifications </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#applicationsExamples"
                    class="nav-link text-white {{ $activePage == 'applications' ? ' active ' : '' }}"
                    aria-controls="applicationsExamples" role="button" aria-expanded="false">
                    <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">apps</i>
                    <span class="nav-link-text ms-2 ps-1">Applications</span>
                </a>
                <div class="collapse {{ $activePage == 'applications' ? 'show' : '' }} " id="applicationsExamples">
                    <ul class="nav ">
                        <li class="nav-item {{ $activeItem == 'crm' ? ' active ' : '' }}">
                            <a class="nav-link text-white {{ $activeItem == 'crm' ? ' active ' : '' }}"
                                href="{{ route('crm') }}">
                                <span class="sidenav-mini-icon"> C </span>
                                <span class="sidenav-normal  ms-2  ps-1"> CRM </span>
                            </a>
                        </li>
                        <li class="nav-item {{ $activeItem == 'kanban' ? ' active ' : '' }}">
                            <a class="nav-link text-white {{ $activeItem == 'kanban' ? ' active ' : '' }}"
                                href="{{ route('kanban') }}">
                                <span class="sidenav-mini-icon"> K </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Kanban </span>
                            </a>
                        </li>
                        <li class="nav-item {{ $activeItem == 'wizard' ? ' active ' : '' }} ">
                            <a class="nav-link text-white {{ $activeItem == 'wizard' ? ' active ' : '' }} "
                                href="{{ route('wizard') }}">
                                <span class="sidenav-mini-icon"> W </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Wizard </span>
                            </a>
                        </li>
                        <li class="nav-item {{ $activeItem == 'datatables' ? ' active ' : '' }}">
                            <a class="nav-link text-white {{ $activeItem == 'datatables' ? ' active ' : '' }}"
                                href="{{ route('datatables') }}">
                                <span class="sidenav-mini-icon"> D </span>
                                <span class="sidenav-normal  ms-2  ps-1"> DataTables </span>
                            </a>
                        </li>
                        <li class="nav-item {{ $activeItem == 'calendar' ? ' active ' : '' }}">
                            <a class="nav-link text-white {{ $activeItem == 'calendar' ? ' active ' : '' }}"
                                href="{{ route('calendar') }}">
                                <span class="sidenav-mini-icon"> C </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Calendar </span>
                            </a>
                        </li>
                        <li class="nav-item {{ $activeItem == 'stats' ? ' active ' : '' }}">
                            <a class="nav-link text-white {{ $activeItem == 'stats' ? ' active ' : '' }} "
                                href="{{ route('stats') }}">
                                <span class="sidenav-mini-icon"> S </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Stats </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#ecommerceExamples"
                    class="nav-link text-white {{ $activePage == 'ecommerce' ? ' active ' : '' }} "
                    aria-controls="ecommerceExamples" role="button" aria-expanded="false">
                    <i
                        class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">shopping_basket</i>
                    <span class="nav-link-text ms-2 ps-1">Ecommerce</span>
                </a>
                <div class="collapse {{ $activePage == 'ecommerce' ? ' show ' : '' }} " id="ecommerceExamples">
                    <ul class="nav ">
                        <li class="nav-item">
                            <a class="nav-link text-white {{ $activeItem == 'products' ? ' active ' : '' }}"
                                data-bs-toggle="collapse" aria-expanded="false" href="#productsExample">
                                <span class="sidenav-mini-icon"> P </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Products <b class="caret"></b></span>
                            </a>
                            <div class="collapse {{ $activeItem == 'products' ? ' show ' : '' }}" id="productsExample">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-white {{ $activeSubitem == 'new-product' ? ' active ' : '' }}"
                                            href="{{ route('new-product') }}">
                                            <span class="sidenav-mini-icon"> N </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> New Product </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white {{ $activeSubitem == 'edit-product' ? ' active ' : '' }} "
                                            href="{{ route('edit-product') }}">
                                            <span class="sidenav-mini-icon"> E </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Edit Product </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white {{ $activeSubitem == 'product-page' ? ' active ' : '' }} "
                                            href="{{ route('product-page') }}">
                                            <span class="sidenav-mini-icon"> P </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Product Page </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white {{ $activeSubitem == 'products-list' ? ' active ' : '' }} "
                                            href="{{ route('products-list') }}">
                                            <span class="sidenav-mini-icon"> P </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Products List </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white {{ $activeItem == 'orders' ? ' active ' : '' }}"
                                data-bs-toggle="collapse" aria-expanded="false" href="#ordersExample">
                                <span class="sidenav-mini-icon"> O </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Orders <b class="caret"></b></span>
                            </a>
                            <div class="collapse {{ $activeItem == 'orders' ? ' show ' : '' }}" id="ordersExample">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-white {{ $activeSubitem == 'order-list' ? ' active ' : '' }} "
                                            href="{{ route('list') }}">
                                            <span class="sidenav-mini-icon"> O </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Order List </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white {{ $activeSubitem == 'order-details' ? ' active ' : '' }} "
                                            href="{{ route('details') }}">
                                            <span class="sidenav-mini-icon"> O </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Order Details </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item {{ $activeItem == 'referral' ? ' active ' : '' }}">
                            <a class="nav-link text-white  {{ $activeItem == 'referral' ? ' active ' : '' }}"
                                href="{{ route('referral') }}">
                                <span class="sidenav-mini-icon"> R </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Referral </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#authExamples" class="nav-link text-white "
                    aria-controls="authExamples" role="button" aria-expanded="false">
                    <i
                        class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">content_paste</i>
                    <span class="nav-link-text ms-2 ps-1">Authentication</span>
                </a>
                <div class="collapse " id="authExamples">
                    <ul class="nav ">
                        <li class="nav-item ">
                            <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false"
                                href="#signinExample">
                                <span class="sidenav-mini-icon"> S </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Sign In <b class="caret"></b></span>
                            </a>
                            <div class="collapse " id="signinExample">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-white " href="{{ route('basic-sign-in') }}">
                                            <span class="sidenav-mini-icon"> B </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Basic </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white " href="{{ route('cover-sign-in') }}">
                                            <span class="sidenav-mini-icon"> C </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Cover </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white " href="{{ route('illustration-sign-in') }}">
                                            <span class="sidenav-mini-icon"> I </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Illustration </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false"
                                href="#signupExample">
                                <span class="sidenav-mini-icon"> S </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Sign Up <b class="caret"></b></span>
                            </a>
                            <div class="collapse " id="signupExample">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-white " href="{{ route('basic-sign-up') }}">
                                            <span class="sidenav-mini-icon"> B </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Basic </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white " href="{{ route('cover-sign-up') }}">
                                            <span class="sidenav-mini-icon"> C </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Cover </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white " href="{{ route('illustration-sign-up') }}">
                                            <span class="sidenav-mini-icon"> I </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Illustration </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false"
                                href="#resetExample">
                                <span class="sidenav-mini-icon"> R </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Reset Password <b class="caret"></b></span>
                            </a>
                            <div class="collapse " id="resetExample">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-white " href="{{ route('basic-reset') }}">
                                            <span class="sidenav-mini-icon"> B </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Basic </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white " href="{{ route('cover-reset') }}">
                                            <span class="sidenav-mini-icon"> C </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Cover </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white " href="{{ route('illustration-reset') }}">
                                            <span class="sidenav-mini-icon"> I </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Illustration </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false"
                                href="#lockExample">
                                <span class="sidenav-mini-icon"> L </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Lock <b class="caret"></b></span>
                            </a>
                            <div class="collapse " id="lockExample">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-white " href="{{ route('basic-lock') }}">
                                            <span class="sidenav-mini-icon"> B </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Basic </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white " href="{{ route('cover-lock') }}">
                                            <span class="sidenav-mini-icon"> C </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Cover </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white " href="{{ route('illustration-lock') }}">
                                            <span class="sidenav-mini-icon"> I </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Illustration </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false"
                                href="#StepExample">
                                <span class="sidenav-mini-icon"> 2 </span>
                                <span class="sidenav-normal  ms-2  ps-1"> 2-Step Verification <b
                                        class="caret"></b></span>
                            </a>
                            <div class="collapse " id="StepExample">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-white " href="{{ route('basic-verification') }}">
                                            <span class="sidenav-mini-icon"> B </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Basic </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white " href="{{ route('cover-verification') }}">
                                            <span class="sidenav-mini-icon"> C </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Cover </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white " href="{{ route('illustration-verification') }}">
                                            <span class="sidenav-mini-icon"> I </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Illustration </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false"
                                href="#errorExample">
                                <span class="sidenav-mini-icon"> E </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Error <b class="caret"></b></span>
                            </a>
                            <div class="collapse " id="errorExample">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-white " href="{{ route('404') }}">
                                            <span class="sidenav-mini-icon"> E </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Error 404 </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white " href="{{ route('500') }}">
                                            <span class="sidenav-mini-icon"> E </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Error 500 </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <hr class="horizontal light" />
                <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder text-white">DOCS</h6>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#basicExamples" class="nav-link text-white "
                    aria-controls="basicExamples" role="button" aria-expanded="false">
                    <i
                        class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">upcoming</i>
                    <span class="nav-link-text ms-2 ps-1">Basic</span>
                </a>
                <div class="collapse " id="basicExamples">
                    <ul class="nav ">
                        <li class="nav-item ">
                            <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false"
                                href="#gettingStartedExample">
                                <span class="sidenav-mini-icon"> G </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Getting Started <b class="caret"></b></span>
                            </a>
                            <div class="collapse " id="gettingStartedExample">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-white "
                                            href="../../documentation/getting-started/installation.html"
                                            target="_blank">
                                            <span class="sidenav-mini-icon"> Q </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Quick Start </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white "
                                            href="../../documentation/getting-started/license.html"
                                            target="_blank">
                                            <span class="sidenav-mini-icon"> L </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> License </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white "
                                            href="../../documentation/getting-started/overview.html"
                                            target="_blank">
                                            <span class="sidenav-mini-icon"> C </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Contents </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white "
                                            href="../../documentation/getting-started/build-tools.html"
                                            target="_blank">
                                            <span class="sidenav-mini-icon"> B </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Build Tools </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false"
                                href="#foundationExample">
                                <span class="sidenav-mini-icon"> F </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Foundation <b class="caret"></b></span>
                            </a>
                            <div class="collapse " id="foundationExample">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-white "
                                            href="../../documentation/foundation/colors.html"
                                            target="_blank">
                                            <span class="sidenav-mini-icon"> C </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Colors </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white "
                                            href="../../documentation/foundation/grid.html"
                                            target="_blank">
                                            <span class="sidenav-mini-icon"> G </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Grid </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white "
                                            href="../../documentation/foundation/typography.html"
                                            target="_blank">
                                            <span class="sidenav-mini-icon"> T </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Typography </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white "
                                            href="../../documentation/foundation/icons.html"
                                            target="_blank">
                                            <span class="sidenav-mini-icon"> I </span>
                                            <span class="sidenav-normal  ms-2  ps-1"> Icons </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#componentsExamples" class="nav-link text-white "
                    aria-controls="componentsExamples" role="button" aria-expanded="false">
                    <i
                        class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">view_in_ar</i>
                    <span class="nav-link-text ms-2 ps-1">Components</span>
                </a>
                <div class="collapse " id="componentsExamples">
                    <ul class="nav ">
                        <li class="nav-item ">
                            <a class="nav-link text-white "
                                href="../../documentation/components/alerts.html"
                                target="_blank">
                                <span class="sidenav-mini-icon"> A </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Alerts </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white "
                                href="../../documentation/components/badge.html"
                                target="_blank">
                                <span class="sidenav-mini-icon"> B </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Badge </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white "
                                href="../../documentation/components/buttons.html"
                                target="_blank">
                                <span class="sidenav-mini-icon"> B </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Buttons </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white "
                                href="../../documentation/components/cards.html"
                                target="_blank">
                                <span class="sidenav-mini-icon"> C </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Card </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white "
                                href="../../documentation/components/carousel.html"
                                target="_blank">
                                <span class="sidenav-mini-icon"> C </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Carousel </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white "
                                href="../../documentation/components/collapse.html"
                                target="_blank">
                                <span class="sidenav-mini-icon"> C </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Collapse </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white "
                                href="../../documentation/components/dropdowns.html"
                                target="_blank">
                                <span class="sidenav-mini-icon"> D </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Dropdowns </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white "
                                href="../../documentation/components/forms.html"
                                target="_blank">
                                <span class="sidenav-mini-icon"> F </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Forms </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white "
                                href="../../documentation/components/modal.html"
                                target="_blank">
                                <span class="sidenav-mini-icon"> M </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Modal </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white "
                                href="../../documentation/components/navs.html"
                                target="_blank">
                                <span class="sidenav-mini-icon"> N </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Navs </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white "
                                href="../../documentation/components/navbar.html"
                                target="_blank">
                                <span class="sidenav-mini-icon"> N </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Navbar </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white "
                                href="../../documentation/components/pagination.html"
                                target="_blank">
                                <span class="sidenav-mini-icon"> P </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Pagination </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white "
                                href="../../documentation/components/popovers.html"
                                target="_blank">
                                <span class="sidenav-mini-icon"> P </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Popovers </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white "
                                href="../../documentation/components/progress.html"
                                target="_blank">
                                <span class="sidenav-mini-icon"> P </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Progress </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white "
                                href="../../documentation/components/spinners.html"
                                target="_blank">
                                <span class="sidenav-mini-icon"> S </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Spinners </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white "
                                href="../../documentation/components/tables.html"
                                target="_blank">
                                <span class="sidenav-mini-icon"> T </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Tables </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white "
                                href="../../documentation/components/tooltips.html"
                                target="_blank">
                                <span class="sidenav-mini-icon"> T </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Tooltips </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li> -->
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
