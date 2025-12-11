<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Barber Shop Admin Dashboard">
    <meta name="author" content=" BarberShop">
    <meta name="keywords" content="barber, shop, admin, dashboard, management">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="/assets/img/icons/icon-48x48.png" />

    <title>Mini BarberShop Admin Dashboard</title>

    <link href="/assets/css/admin.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
<div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="/admin/dashboard">
                <span class="align-middle text-uppercase fs-4">Mini BarberShop Admin</span>
            </a>

            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Main
                </li>

                <li class="sidebar-item active">
                    <a class="sidebar-link" href="/admin/dashboard">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('admin.bookings.index')}}">
                        <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Appointments</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('admin.pricing.index')}}">
                        <i class="align-middle" data-feather="dollar-sign"></i> <span class="align-middle">Pricing & Plan</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('admin.services.index')}}">
                        <i class="align-middle" data-feather="scissors"></i> <span class="align-middle">Services</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('admin.workingHour.index')}}">
                        <i class="align-middle" data-feather="watch"></i> <span class="align-middle">Working Hours</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('admin.barber.index')}}">
                        <i class="align-middle" data-feather="user-check"></i> <span class="align-middle">Barbers</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    Business
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/admin/dashboard">
                        <i class="align-middle" data-feather="credit-card"></i> <span class="align-middle">Payments</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route("admin.gallery.index")}}">
                        <i class="align-middle" data-feather="image"></i> <span class="align-middle">Gallery</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/admin/dashboard">
                        <i class="align-middle" data-feather="clock"></i> <span class="align-middle">Schedule</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    System
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/admin/dashboard">
                        <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Settings</span>
                    </a>
                </li>
            </ul>

            <div class="sidebar-cta">
                <div class="sidebar-cta-content">
                    <strong class="d-inline-block mb-2">Need Help?</strong>
                    <div class="mb-3 text-sm">
                        Contact support for assistance with your barber shop management.
                    </div>
                    <div class="d-grid">
                        <a href="/admin/dashboard" class="btn btn-primary">Contact Support</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="main">
        <nav class="navbar navbar-expand navbar-light navbar-bg">
            <a class="sidebar-toggle js-sidebar-toggle">
                <i class="hamburger align-self-center"></i>
            </a>

            <div class="navbar-collapse collapse">
                <ul class="navbar-nav navbar-align">
                    <li class="nav-item dropdown">
                        <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
                            <div class="position-relative">
                                <i class="align-middle" data-feather="bell"></i>
                                <span class="indicator">3</span>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
                            <div class="dropdown-menu-header">
                                3 New Notifications
                            </div>
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-2">
                                            <i class="text-success" data-feather="calendar"></i>
                                        </div>
                                        <div class="col-10">
                                            <div class="text-dark">New Appointment</div>
                                            <div class="text-muted small mt-1">John Doe booked a haircut for 2:00 PM</div>
                                            <div class="text-muted small mt-1">5m ago</div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-2">
                                            <i class="text-warning" data-feather="user-x"></i>
                                        </div>
                                        <div class="col-10">
                                            <div class="text-dark">Barber Unavailable</div>
                                            <div class="text-muted small mt-1">Mike is sick today</div>
                                            <div class="text-muted small mt-1">1h ago</div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-2">
                                            <i class="text-primary" data-feather="dollar-sign"></i>
                                        </div>
                                        <div class="col-10">
                                            <div class="text-dark">Payment Received</div>
                                            <div class="text-muted small mt-1">$45 from Robert Johnson</div>
                                            <div class="text-muted small mt-1">2h ago</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-menu-footer">
                                <a href="#" class="text-muted">Show all notifications</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
                            <div class="position-relative">
                                <i class="align-middle" data-feather="message-square"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
                            <div class="dropdown-menu-header">
                                <div class="position-relative">
                                    Customer Messages
                                </div>
                            </div>
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-2">
                                            <img src="/assets/img/avatars/avatar-5.jpg" class="avatar img-fluid rounded-circle" alt="Sarah Wilson">
                                        </div>
                                        <div class="col-10 ps-2">
                                            <div class="text-dark">Sarah Wilson</div>
                                            <div class="text-muted small mt-1">Can I reschedule my appointment?</div>
                                            <div class="text-muted small mt-1">15m ago</div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-2">
                                            <img src="/assets/img/avatars/avatar-2.jpg" class="avatar img-fluid rounded-circle" alt="David Brown">
                                        </div>
                                        <div class="col-10 ps-2">
                                            <div class="text-dark">David Brown</div>
                                            <div class="text-muted small mt-1">Do you offer beard trimming?</div>
                                            <div class="text-muted small mt-1">1h ago</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-menu-footer">
                                <a href="#" class="text-muted">Show all messages</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                            <i class="align-middle" data-feather="settings"></i>
                        </a>

                        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                            <img src="/assets/img/avatars/avatar.jpg" class="avatar img-fluid rounded me-1" alt="Admin User" /> <span class="text-dark">Admin User</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
                            <a class="dropdown-item" href="reports.html"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="settings.html"><i class="align-middle me-1" data-feather="settings"></i> Settings</a>
                            <a class="dropdown-item" href="help.html"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Log out</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="content">
            <div class="container-fluid p-0">

                <h1 class="h3 mb-3"><strong>BarberShop</strong> Dashboard</h1>

                <div class="row">
                    <div class="col-xl-6 col-xxl-5 d-flex">
                        <div class="w-100">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col mt-0">
                                                    <h5 class="card-title">Today's Appointments</h5>
                                                </div>

                                                <div class="col-auto">
                                                    <div class="stat text-primary">
                                                        <i class="align-middle" data-feather="calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <h1 class="mt-1 mb-3">{{$todayAppointments}}</h1>
                                            <div class="mb-0">
                                                <span class="text-success">+12%</span>
                                                <span class="text-muted">Since yesterday</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col mt-0">
                                                    <h5 class="card-title">Total Customers</h5>
                                                </div>

                                                <div class="col-auto">
                                                    <div class="stat text-primary">
                                                        <i class="align-middle" data-feather="users"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <h1 class="mt-1 mb-3">{{$customerCount}}</h1>
                                            <div class="mb-0">
                                                <span class="text-success">+8%</span>
                                                <span class="text-muted">Since last month</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col mt-0">
                                                    <h5 class="card-title">Revenue</h5>
                                                </div>

                                                <div class="col-auto">
                                                    <div class="stat text-primary">
                                                        <i class="align-middle" data-feather="dollar-sign"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <h1 class="mt-1 mb-3">$1205</h1>
                                            <div class="mb-0">
                                                <span class="text-success">+15%</span>
                                                <span class="text-muted">Since last week</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col mt-0">
                                                    <h5 class="card-title">Available Barbers</h5>
                                                </div>

                                                <div class="col-auto">
                                                    <div class="stat text-primary">
                                                        <i class="align-middle" data-feather="user-check"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <h1 class="mt-1 mb-3">4</h1>
                                            <div class="mb-0">
                                                <span class="text-danger">-1</span>
                                                <span class="text-muted">1 on leave</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-xxl-7">
                        <div class="card flex-fill w-100">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Weekly Appointments</h5>
                            </div>
                            <div class="card-body py-3">
                                <div class="chart chart-sm">
                                    <canvas id="chartjs-dashboard-line"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
                        <div class="card flex-fill w-100">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Service Popularity</h5>
                            </div>
                            <div class="card-body d-flex">
                                <div class="align-self-center w-100">
                                    <div class="py-3">
                                        <div class="chart chart-xs">
                                            <canvas id="chartjs-dashboard-pie"></canvas>
                                        </div>
                                    </div>

                                    <table class="table mb-0">
                                        <tbody>
                                        <tr>
                                            <td>Haircut</td>
                                            <td class="text-end">156</td>
                                        </tr>
                                        <tr>
                                            <td>Beard Trim</td>
                                            <td class="text-end">89</td>
                                        </tr>
                                        <tr>
                                            <td>Hair Wash</td>
                                            <td class="text-end">67</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
                        <div class="card flex-fill w-100">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Today's Schedule</h5>
                            </div>
                            <div class="card-body px-4">
                                <div id="today-schedule" style="height:350px;">
                                    <!-- Schedule content would go here -->
                                    <div class="text-center py-5">
                                        <i class="align-middle text-muted" data-feather="calendar" style="width: 48px; height: 48px;"></i>
                                        <p class="text-muted mt-2">Today's appointment schedule</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Barber Schedule</h5>
                            </div>
                            <div class="card-body d-flex">
                                <div class="align-self-center w-100">
                                    <div class="chart">
                                        <div id="datetimepicker-dashboard"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-8 col-xxl-9 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Today's Appointments</h5>
                            </div>
                            <table class="table table-hover my-0">
                                <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th class="d-none d-xl-table-cell">Time</th>
                                    <th class="d-none d-xl-table-cell">Service</th>
                                    <th>Barber</th>
                                    <th class="d-none d-md-table-cell">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($todayAppointment as $appointment)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm me-2">
                                                    <div class="avatar-title rounded bg-primary bg-opacity-10 text-primary">
                                                        {{ strtoupper(substr($appointment->customer_name, 0, 1)) }}
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="fw-bold">{{ $appointment->customer_name }}</div>
                                                    <div class="text-muted small">{{ $appointment->customer_phone }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="d-none d-xl-table-cell">
                                            {{ \Carbon\Carbon::parse($appointment->time)->format('h:i A') }}
                                        </td>
                                        <td class="d-none d-xl-table-cell">
                                            {{ $appointment->service->name ?? 'N/A' }}
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div>{{ $appointment->barber->name ?? 'N/A' }}</div>
                                            </div>
                                        </td>
                                        <td class="d-none d-md-table-cell">
                                            @php
                                                $statusColors = [
                                                    'pending' => 'warning',
                                                    'confirmed' => 'success',
                                                    'cancelled' => 'danger',
                                                    'completed' => 'info',
                                                    'no-show' => 'secondary'
                                                ];
                                                $color = $statusColors[$appointment->status] ?? 'secondary';
                                            @endphp
                                            <span class="badge bg-{{ $color }}">
                                              {{ ucfirst($appointment->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4">
                                            <div class="text-muted">
                                                <i class="align-middle" data-feather="calendar" style="width: 48px; height: 48px;"></i>
                                                <p class="mt-2">No appointments for today</p>
                                                <a href="{{ route('admin.bookings.create') }}" class="btn btn-sm btn-primary mt-2">
                                                    <i class="align-middle" data-feather="plus"></i> Create Appointment
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-xxl-3 d-flex">
                        <div class="card flex-fill w-100">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Monthly Revenue</h5>
                            </div>
                            <div class="card-body d-flex w-100">
                                <div class="align-self-center chart chart-lg">
                                    <canvas id="chartjs-dashboard-bar"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>

        <footer class="footer">
            <div class="container-fluid">
                <div class="row text-muted">
                    <div class="col-6 text-start">
                        <p class="mb-0">
                            <strong>BarberShop Admin</strong> &copy; 2025
                        </p>
                    </div>
                    <div class="col-6 text-end">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a class="text-muted" href="support.html">Support</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-muted" href="help.html">Help Center</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<script src="/assets/js/admin.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
        var gradient = ctx.createLinearGradient(0, 0, 0, 225);
        gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
        gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
        // Line chart - Weekly Appointments
        new Chart(document.getElementById("chartjs-dashboard-line"), {
            type: "line",
            data: {
                labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                datasets: [{
                    label: "Appointments",
                    fill: true,
                    backgroundColor: gradient,
                    borderColor: window.theme.primary,
                    data: [12, 15, 18, 14, 22, 28, 20]
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                tooltips: {
                    intersect: false
                },
                hover: {
                    intersect: true
                },
                plugins: {
                    filler: {
                        propagate: false
                    }
                },
                scales: {
                    xAxes: [{
                        reverse: false,
                        gridLines: {
                            color: "rgba(0,0,0,0.0)"
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            stepSize: 5
                        },
                        display: true,
                        borderDash: [3, 3],
                        gridLines: {
                            color: "rgba(0,0,0,0.0)"
                        }
                    }]
                }
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Pie chart - Service Popularity
        new Chart(document.getElementById("chartjs-dashboard-pie"), {
            type: "pie",
            data: {
                labels: ["Haircut", "Beard Trim", "Hair Wash"],
                datasets: [{
                    data: [156, 89, 67],
                    backgroundColor: [
                        window.theme.primary,
                        window.theme.warning,
                        window.theme.danger
                    ],
                    borderWidth: 5
                }]
            },
            options: {
                responsive: !window.MSInputMethodContext,
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                cutoutPercentage: 75
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Bar chart - Monthly Revenue
        new Chart(document.getElementById("chartjs-dashboard-bar"), {
            type: "bar",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Revenue ($)",
                    backgroundColor: window.theme.primary,
                    borderColor: window.theme.primary,
                    hoverBackgroundColor: window.theme.primary,
                    hoverBorderColor: window.theme.primary,
                    data: [1200, 1350, 1420, 1380, 1560, 1620, 1480, 1720, 1850, 1920, 2100, 2248],
                    barPercentage: .75,
                    categoryPercentage: .5
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false
                        },
                        stacked: false,
                        ticks: {
                            stepSize: 500
                        }
                    }],
                    xAxes: [{
                        stacked: false,
                        gridLines: {
                            color: "transparent"
                        }
                    }]
                }
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
        var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
        document.getElementById("datetimepicker-dashboard").flatpickr({
            inline: true,
            prevArrow: "<span title=\"Previous month\">&laquo;</span>",
            nextArrow: "<span title=\"Next month\">&raquo;</span>",
            defaultDate: defaultDate
        });
    });
</script>

</body>
</html>
