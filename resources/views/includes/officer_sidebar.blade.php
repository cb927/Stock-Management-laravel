<aside class="app-navbar">
    <!-- begin sidebar-nav -->
    <div class="sidebar-nav scrollbar scroll_light">
        <ul class="metismenu " id="sidebarNav">
            <li>
                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                    <i class="nav-icon ti ti-rocket"></i>
                    <span class="nav-title">Vehicle Management</span>
                </a>
                <ul aria-expanded="false">
                    <li> <a href="/">Vehicle list</a> </li>
                    <li> <a href="{{route('vehicle.add')}}">Add New Vehicle</a> </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                    <i class="nav-icon ti ti-rocket"></i>
                    <span class="nav-title">Driver Management</span>
                </a>
                <ul aria-expanded="false">
                    <li> <a href="{{route('drivers')}}">Driver list</a> </li>
                    <li> <a href="{{route('driver.add')}}">Add New Driver</a> </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- end sidebar-nav -->
</aside>