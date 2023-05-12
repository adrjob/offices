@props(['bodyClass'])
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets') }}/img/apple-icon.png">
  <link rel="icon" type="image/png" href="https://vanciscapital.com/wp-content/uploads/2022/11/cropped-Vancis-Capital-New-Logo-2022-White-Gold-Recovered.png">
  <title>
    Vancis Offices
  </title>

  <!--     Metas    -->
  @if (env('IS_DEMO'))
    <meta name="keywords" content="creative tim, updivision, html dashboard, laravel, material, html css dashboard laravel, laravel material dashboard laravel, laravel material dashboard laravel pro, laravel material dashboard, laravel material dashboard pro, material admin, laravel dashboard, laravel dashboard pro, laravel admin, web dashboard, bootstrap 5 dashboard laravel, bootstrap 5, css3 dashboard, bootstrap 5 admin laravel, material dashboard bootstrap 5 laravel, frontend, responsive bootstrap 5 dashboard, material dashboard, material laravel bootstrap 5 dashboard" />
    <meta name="description" content="Fullstack tool for building Laravel apps with hundreds of UI components and ready-made CRUDs" />
    <meta itemprop="name" content="Material Dashboard 2 PRO Laravel by Creative Tim & UPDIVISION" />
    <meta itemprop="description" content="Fullstack tool for building Laravel apps with hundreds of UI components and ready-made CRUDs" />
    <meta itemprop="image" content="https://s3.amazonaws.com/creativetim_bucket/products/158/original/material-dashboard-pro-laravel.jpg" />
    <meta name="twitter:card" content="product" />
    <meta name="twitter:site" content="@creativetim" />
    <meta name="twitter:title" content="Material Dashboard 2 PRO Laravel by Creative Tim & UPDIVISION" />
    <meta name="twitter:description" content="Fullstack tool for building Laravel apps with hundreds of UI components and ready-made CRUDs" />
    <meta name="twitter:creator" content="@creativetim" />
    <meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/158/original/material-dashboard-pro-laravel.jpg" />
    <meta property="fb:app_id" content="655968634437471" />
    <meta property="og:title" content="Material Dashboard 2 PRO Laravel by Creative Tim & UPDIVISION" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://www.creative-tim.com/live/material-dashboard-pro-laravel" />
    <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/158/original/material-dashboard-pro-laravel.jpg" />
    <meta property="og:description" content="Fullstack tool for building Laravel apps with hundreds of UI components and ready-made CRUDs" />
    <meta property="og:site_name" content="Creative Tim" />
  @endif

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('assets') }}/css/nucleo-icons.css" rel="stylesheet" />
  <link href="{{ asset('assets') }}/css/nucleo-svg.css" rel="stylesheet" />
  
  <!-- <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"; rel="stylesheet"/> -->
  <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
  
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets') }}/css/material-dashboard.css?v=3.0.1" rel="stylesheet" />
  <style>
  .btn-vancis {
        background-image: linear-gradient(195deg, #9a752f 0%, #9a752f 100%) !important;
        color: white !important;
  }
  .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
    /* color: white !important; */
    padding: 0 !important;
    border: 1px solid rgba(0, 0, 0, 0.3);
    /* background-image: linear-gradient(195deg, #9a752f 0%, #9a752f 100%) !important; */
}

button.dt-button, div.dt-button, a.dt-button, input.dt-button {
    border-radius: 2px;
    color: white;
    background-image: linear-gradient(195deg, #9a752f 0%, #9a752f 100%) !important;
}

button.dt-button:hover:not(.disabled), div.dt-button:hover:not(.disabled), a.dt-button:hover:not(.disabled), input.dt-button:hover:not(.disabled) {
  background-image: linear-gradient(195deg, #9a752f 0%, #9a752f 100%) !important;
}

button {
  border-radius: 4px;
  background-color: #5ca1e1;
  border: none;
  color: #fff;
  text-align: center;
  font-size: 16px;
  padding: 5;
  width: 80px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 6px;
  box-shadow: 0 10px 20px -8px rgba(0, 0, 0,.7);
}

button{
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

button:after {
  content: '»';
  position: absolute;
  opacity: 0;  
  top: 0px;
  right: -20px;
  transition: 0.5s;
}

button:hover{
  padding-right: 24px;
  padding-left:8px;
}

button:hover:after {
  opacity: 1;
  right: 10px;
}
</style>
</head>

<body class="{{ $bodyClass }}">

{{ $slot }}

<script src="{{ asset('assets') }}/js/core/popper.min.js"></script>
<script src="{{ asset('assets') }}/js/core/bootstrap.min.js"></script>
<script src="{{ asset('assets') }}/js/plugins/smooth-scrollbar.min.js"></script>
<!-- Kanban scripts -->
<script src="{{ asset('assets') }}/js/plugins/dragula/dragula.min.js"></script>
<script src="{{ asset('assets') }}/js/plugins/jkanban/jkanban.js"></script>

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>

@stack('js')
<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('assets') }}/js/material-dashboard.min.js?v=3.0.1"></script>
</body>
</html>
