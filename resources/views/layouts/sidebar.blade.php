<aside class="app-sidebar sidemenu-sidebar">
    <div class="app-sidebar__user">
        <div class="dropdown user-pro-body text-center">
            <div class="user-pic">
                <img src="{{ asset(auth()->user()->photo_url) }}" alt="user-img" class="avatar-xl rounded-circle mb-1">
            </div>
            <div class="user-info">
                <h6 class=" mb-0 font-weight-semibold">{{ auth()->user()->name }}</h6>
                <span class="text-muted app-sidebar__user-name text-sm">{{ auth()->user()->roles->first()->name }}</span>
            </div>
        </div>
    </div>
    <ul class="side-menu">
        <li>
            <a class="side-menu__item" href="{{ route('home') }}"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Home</span></a>
        </li>
        @canany(['company-read', 'company-create', 'company-update', 'company-delete'])
            <li>
                <a class="side-menu__item" href="{{ route('companies.index') }}"><i class="side-menu__icon fe fe-layers"></i><span class="side-menu__label">Companies</span></a>
            </li>
        @endcanany

        @role('Admin')
            <li>
                <a class="side-menu__item" href="{{ route('departments.index') }}"><i class="side-menu__icon fe fe-server"></i><span class="side-menu__label">Departments</span></a>
            </li>
            <li>
                <a class="side-menu__item" href="{{ route('designations.index') }}"><i class="side-menu__icon fe fe-award"></i><span class="side-menu__label">Designations</span></a>
            </li>
            <li>
                <a class="side-menu__item" href="{{ route('users.index') }}"><i class="side-menu__icon fe fe-user"></i><span class="side-menu__label">Users</span></a>
            </li>
            <li>
                <a class="side-menu__item" href="{{ route('attendance-reports.index') }}"><i class="side-menu__icon fe fe-book"></i><span class="side-menu__label">Attendance Reports</span></a>
            </li>
        @endrole

        @unlessrole('Super Admin|Monitor')
            @canany(['leave-read', 'leave-create', 'leave-update', 'leave-delete'])
                <li>
                    <a class="side-menu__item" href="{{ route('leaves.index') }}"><i class="side-menu__icon fe fe-calendar"></i><span class="side-menu__label">Leave Manager</span></a>
                </li>
            @endcanany
        @endunlessrole

        @unlessrole('Super Admin|Admin|Monitor')
            <li>
                <a class="side-menu__item" href="{{ route('individual.attendance.show') }}"><i class="side-menu__icon fe fe-book"></i><span class="side-menu__label">My Attendance</span></a>
            </li>
        @endunlessrole

        @role('Monitor')
            <li>
                <a class="side-menu__item" href="{{ route('monitors.show') }}"><i class="side-menu__icon fe fe-airplay"></i><span class="side-menu__label">Monitor</span></a>
            </li>
        @endrole
    </ul>
</aside>
