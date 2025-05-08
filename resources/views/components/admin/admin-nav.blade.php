<nav class="topnav navbar navbar-light">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fa-solid fa-bars"></i>
    </button>
    <ul class="nav">
        {{-- <li class="nav-item">
            <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="dark">
                <i class="fe fe-sun fe-16"></i>
            </a>
        </li> --}}

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="avatar avatar-sm mt-2">
                    @isset($organization->logo)
                        <img src="{{ asset('storage/' . $organization->logo) }}" alt="..."
                            class="avatar-img rounded-circle">
                    @else
                        <img src="{{ asset('img/logo.png') }}" alt="..." class="avatar-img rounded-circle">
                    @endisset
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{ route('change.password') }}">Change Password</a>
                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
            </div>
        </li>
    </ul>
</nav>
<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ route('dashboard') }}">
                <div class="avatar avatar-sm">
                    <img src="{{ asset('images/se_logo.png') }}" alt="" class="avatar-img" srcset="">
                </div>
            </a>
        </div>

        {{-- <p class="text-muted nav-heading mt-4 mb-1">
            <span>Admin Panel</span>
        </p> --}}

        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100" @if (route('dashboard') == url()->current()) active @endif>
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fa-solid fa-house"></i>
                    <span class="ml-3 item-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item w-100" @if (route('organization.index') == url()->current()) active @endif>
                <a class="nav-link" href="{{ route('organization.index') }}">
                    <i class="fa-solid fa-building"></i>
                    <span class="ml-3 item-text">Organization</span>
                </a>
            </li>
            <li class="nav-item w-100" @if (route('banner.index') == url()->current()) active @endif>
                <a class="nav-link" href="{{ route('banner.index') }}">
                    <i class="fa-solid fa-image"></i>
                    <span class="ml-3 item-text">Banner</span>
                </a>
            </li>
            <li class="nav-item w-100" @if (route('header.index') == url()->current()) active @endif>
                <a class="nav-link" href="{{ route('header.index') }}">
                    <i class="fa-solid fa-circle-info"></i>
                    <span class="ml-3 item-text">Homepage Headers</span>
                </a>
            </li>
            <li class="nav-item w-100" @if (route('pageTitle.index') == url()->current()) active @endif>
                <a class="nav-link" href="{{ route('pageTitle.index') }}">
                    <i class="fa-solid fa-circle-question"></i>
                    <span class="ml-3 item-text">Page Titles</span>
                </a>
            </li>
            <li class="nav-item w-100" @if (route('about.index') == url()->current()) active @endif>
                <a class="nav-link" href="{{ route('about.index') }}">
                    <i class="fa-solid fa-building"></i>
                    <span class="ml-3 item-text">About</span>
                </a>
            </li>

            {{-- <li class="nav-item w-100" @if (route('service.index') == url()->current()) active @endif>
                <a class="nav-link" href="{{ route('service.index') }}">
                    <i class="fas fa-tools"></i>
                    <span class="ml-3 item-text">Services</span>
                </a>
            </li> --}}
            <li class="nav-item w-100" @if (route('category.index') == url()->current()) active @endif>
                <a class="nav-link" href="{{ route('category.index') }}">
                    <i class="fas fa-clipboard-list"></i>
                    <span class="ml-3 item-text">Course Categories</span>
                </a>
            </li>
            <li class="nav-item w-100" @if (route('program.index') == url()->current()) active @endif>
                <a class="nav-link" href="{{ route('program.index') }}">
                    <i class="fas fa-clipboard-list"></i>
                    <span class="ml-3 item-text">Courses</span>
                </a>
            </li>
            <li class="nav-item w-100" @if (route('school.index') == url()->current()) active @endif>
                <a class="nav-link" href="{{ route('school.index') }}">
                    <i class="fa-solid fa-school"></i>
                    <span class="ml-3 item-text">Partners</span>
                </a>
            </li>

            <li class="nav-item w-100" @if (route('event.index') == url()->current()) active @endif>
                <a class="nav-link" href="{{ route('event.index') }}">
                    <i class="fa-regular fa-calendar-days"></i>
                    <span class="ml-3 item-text">Events</span>
                </a>
            </li>

            <li class="nav-item w-100" @if (route('team.index') == url()->current()) active @endif>
                <a class="nav-link" href="{{ route('team.index') }}">
                    <i class="fa-solid fa-users-gear"></i>
                    <span class="ml-3 item-text">Our Teams</span>
                </a>
            </li>

            <li class="nav-item w-100" @if (route('video.index') == url()->current()) active @endif>
                <a class="nav-link" href="{{ route('video.index') }}">
                    <i class="fa-solid fa-video"></i>
                    <span class="ml-3 item-text">Video</span>
                </a>
            </li>

            <li class="nav-item w-100" @if (route('blog.index') == url()->current()) active @endif>
                <a class="nav-link" href="{{ route('blog.index') }}">
                    <i class="fa-regular fa-newspaper"></i>
                    <span class="ml-3 item-text">Blogs</span>
                </a>
            </li>

            <li class="nav-item w-100" @if (route('gallery.index') == url()->current()) active @endif>
                <a class="nav-link" href="{{ route('gallery.index') }}">
                    <i class="fa-solid fa-images"></i>
                    <span class="ml-3 item-text">Gallery</span>
                </a>
            </li>

            <li class="nav-item w-100" @if (route('setting.index') == url()->current()) active @endif>
                <a class="nav-link" href="{{ route('setting.index') }}">
                    <i class="fa-solid fa-gear"></i>
                    <span class="ml-3 item-text">Setting</span>
                </a>
            </li>
            <li class="nav-item w-100" @if (route('testimonial.index') == url()->current()) active @endif>
                <a class="nav-link" href="{{ route('testimonial.index') }}">
                    <i class="fa-solid fa-message"></i>
                    <span class="ml-3 item-text">Testimonials</span>
                </a>
            </li>
            <li class="nav-item w-100" @if (route('message.index') == url()->current()) active @endif>
                <a class="nav-link" href="{{ route('message.index') }}">
                    <i class="fa-solid fa-envelope"></i>
                    <span class="ml-3 item-text">Message</span>
                </a>
            </li>
            <li class="nav-item w-100" @if (route('newsletter.index') == url()->current()) active @endif>
                <a class="nav-link" href="{{ route('newsletter.index') }}">
                    <i class="fa-solid fa-envelope"></i>
                    <span class="ml-3 item-text">Newsletter</span>
                </a>
            </li>

        </ul>

    </nav>
</aside>
