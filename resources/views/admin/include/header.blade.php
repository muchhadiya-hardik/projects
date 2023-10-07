<!-- Page Header -->
<div class="orb-header-container">
    <ul class="navbar-nav">
        <li class="nav-item dropdown d-flex align-items-center justify-content-end mt-2">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                {{ isset(Auth::guard('admin')->user()->name)?Auth::guard('admin')->user()->name:''  }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-light position-absolute p-0">
                {{-- <li>
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        <i class="fa fa-user me-2"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('change.password') }}">
                        <i class="fa fa-refresh me-2" aria-hidden="true"></i>
                        <span>Change password</span>
                    </a>
                </li>
                <li> --}}
                    <form method="POST" action="{{ route('admin::logout') }}">
                        @csrf
                        <a href="route('admin::logout')" class="dropdown-item" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                             <i class="fa fa-sign-out me-2" aria-hidden="true"></i>
                            {{ __('Log Out') }}
                        </a>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</div>

