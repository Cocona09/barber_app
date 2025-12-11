<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Barber Shop Admin Dashboard">
    <meta name="author" content="BarberShop">
    <meta name="keywords" content="barber, shop, admin, dashboard, management">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="/assets/img/icons/icon-48x48.png" />

    <title>Mini BarberShop Admin Dashboard</title>

    <link href="/assets/css/admin.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
<div class="wrapper">
    @include('admin.partials.sidebar')

    <div class="main">
        @include('admin.partials.navbar')

        <main class="content">
            @yield('content')
        </main>

        @include('admin.partials.footer')
    </div>
</div>

<script src="/assets/js/admin.js"></script>
@yield('scripts')
</body>
</html>
