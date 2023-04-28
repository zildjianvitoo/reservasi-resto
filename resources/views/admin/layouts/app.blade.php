<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin Roemah Elektro</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('admin_asset/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
@include('admin.layouts.nav')
<div id="layoutSidenav">
    @include('admin.layouts.sidenav')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
{{--                <h1 class="mt-4">Dashboard</h1>--}}
{{--                <ol class="breadcrumb mb-4">--}}
{{--                    <li class="breadcrumb-item active">Dashboard</li>--}}
{{--                </ol>--}}
                <div class="mb-4"></div>
                @yield('content')
            </div>
        </main>
        @include('admin.layouts.footer')
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('admin_asset/js/scripts.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('admin_asset/js/datatables-simple-demo.js') }}"></script>
</body>
</html>
