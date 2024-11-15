<div class="dashboard__left dashboard-left-content">
    <div class="dashboard__left__main">
        <div class="dashboard__left__close close-bars"><i class="fa-solid fa-times"></i></div>
        <div class="dashboard__top">
            <div class="dashboard__top__logo">
                <a href="index.html">
                    <img class="main_logo" src="{{ asset('html/assets/img/logo.webp') }}" alt="logo">
                    <img class="iocn_view__logo" src="{{ asset('html/assets/img/Favicon.png') }}" alt="logo_icon">
                </a>
            </div>
        </div>
        <div class="dashboard__bottom mt-5">
            <div class="dashboard__bottom__search mb-3">
                <input class="form--control  w-100" type="text" placeholder="Search here..." id="search_sidebarList">
            </div>
            <ul class="dashboard__bottom__list dashboard-list">
                <li
                    class="dashboard__bottom__list__item show open  {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}"><i class="material-symbols-outlined">dashboard</i>
                        <span class="icon_title">Dashboard</span></a>
                    {{-- <ul class="submenu">
                        <li class="dashboard__bottom__list__item selected">
                            <a href="{{ route('dashboard') }}">Default</a>
                        </li>
                    </ul> --}}
                </li>
                <li
                    class="dashboard__bottom__list__item {{ request()->routeIs('country.view', 'country.edit', 'country.add') ? 'active' : '' }}">
                    <a href="{{ route('country.view') }}"><span class="icon_title">Country</span></a>
                </li>
                <li
                    class="dashboard__bottom__list__item {{ request()->routeIs('state.view', 'state.edit', 'state.add') ? 'active' : '' }}">
                    <a href="{{ route('state.view') }}"><span class="icon_title">State</span></a>
                </li>
                <li
                    class="dashboard__bottom__list__item {{ request()->routeIs('city.view', 'city.edit', 'city.add') ? 'active' : '' }}">
                    <a href="{{ route('city.view') }}"><span class="icon_title">City</span></a>
                </li>
                <li class="dashboard__bottom__list__item">
                    <a id="logOutBtn"><i class="material-symbols-outlined">logout</i> <span class="icon_title">Log
                            Out</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
