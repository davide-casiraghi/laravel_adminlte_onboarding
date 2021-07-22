<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

        <li class="nav-item">
            <a href="{{route('companies.index')}}" class="nav-link {{ (request()->routeIs('companies*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-building"></i>
                <p>
                    Companies
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('employees.index')}}" class="nav-link {{ (request()->routeIs('employees*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-tie"></i>
                <p>
                    Employees
                </p>
            </a>
        </li>
    </ul>
</nav>