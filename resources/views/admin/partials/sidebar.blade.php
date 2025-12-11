<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/admin/dashboard">
            <span class="align-middle text-uppercase fs-4">Mini BarberShop Admin</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">Main</li>

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

            <li class="sidebar-header">Business</li>

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

            <li class="sidebar-header">System</li>

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
