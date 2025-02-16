<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar ">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu text-white">
                <li>
                    <a href="/dashboard" class="{{ Request::is('dashboard*') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon fas fa-warehouse"></i>
                        Beranda
                    </a>
                </li>

                @can('roles.index')
                    <!-- <li>
                    <a href="/roles" class="{{ Request::is('roles*') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-check"></i>
                        Roles
                    </a>
                </li> -->
                @endcan

                @can('evaluation.index')
                    <!-- <li class="app-sidebar__heading">SPK</li> -->
                @endcan

                @can('criteria.index')
                    <li>
                        <a href="/criteria" class="{{ Request::is('criteria*') ? 'mm-active' : '' }}">
                            <i class="metismenu-icon  fas fa-window-maximize"></i>
                            Data Kriteria
                        </a>
                    </li>
                @endcan

                {{-- @can('standard_values.index') --}}
                    <li>
                        <a href="/standard_values" class="{{ Request::is('standard_values*') ? 'mm-active' : '' }}">
                            <i class="metismenu-icon  fas fa-window-maximize"></i>
                            Data Ketentuan Nilai
                        </a>
                    </li>
                {{-- @endcan --}}

                @can('sub-criteria.index')
                    <li>
                        <a href="/sub-criteria" class="{{ Request::is('sub-criteria*') ? 'mm-active' : '' }}">
                            <i class="metismenu-icon  fas fa-window-restore"></i>
                            Data Sub Kriteria
                        </a>
                    </li>
                @endcan

                @can('integrity.index')
                    <li>
                        <a href="/integrity" class="{{ Request::is('integrity*') ? 'mm-active' : '' }}">
                            <i class="metismenu-icon fas fa-envelope-open-text"></i>
                            Data Pembobotan Nilai
                        </a>
                    </li>
                @endcan

                @can('users.index')
                    <li>
                        <a href="/users" class="{{ Request::is('users*') ? 'mm-active' : '' }}">
                            <i class="metismenu-icon fas fa-user-tag"></i>
                            Data Karyawan
                        </a>
                    </li>
                @endcan

                @can('evaluation.index')
                    <li>
                        <a href="{{ Auth::user()->role_id == 2 ? url('/evaluation/detail', Auth::id()) : '/evaluation' }}"
                            class="{{ Request::is('evaluation*') ? 'mm-active' : '' }}">
                            <i class="metismenu-icon fas fa-clipboard-check"></i>
                            Data Penilaian
                        </a>
                    </li>
                @endcan


            </ul>
        </div>
    </div>
</div>
