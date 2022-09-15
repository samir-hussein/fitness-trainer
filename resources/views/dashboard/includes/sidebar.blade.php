        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="/" class="app-brand-link d-block m-auto h-100">
                    <span class="app-brand-logo demo h-100">
                        <img src="/images/logo.png" alt="" style="height: 100%;object-fit:contain">
                    </span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <!-- Dashboard -->
                <li class="menu-item home">
                    <a href="{{ route('dashboard.home') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                        <div data-i18n="Analytics">Dashboard</div>
                    </a>
                </li>
                <li class="menu-item slider">
                    <a href="{{ route('dashboard.slider') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-detail"></i>
                        <div data-i18n="Analytics">Slider</div>
                    </a>
                </li>
                <li class="menu-item result-slider">
                    <a href="{{ route('dashboard.result.slider') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-detail"></i>
                        <div data-i18n="Analytics">Result Slider</div>
                    </a>
                </li>
                <li class="menu-item about">
                    <a href="{{ route('dashboard.about') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-detail"></i>
                        <div data-i18n="Analytics">About</div>
                    </a>
                </li>
                <li class="menu-item services">
                    <a href="{{ route('dashboard.services') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-detail"></i>
                        <div data-i18n="Analytics">Services for sale</div>
                    </a>
                </li>
                <li class="menu-item books">
                    <a href="{{ route('dashboard.books') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-detail"></i>
                        <div data-i18n="Analytics">E-Books</div>
                    </a>
                </li>
                <li class="menu-item packages">
                    <a href="{{ route('dashboard.packages') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-detail"></i>
                        <div data-i18n="Analytics">Follow-up packages</div>
                    </a>
                </li>
                <li class="menu-item books-clients">
                    <a href="{{ route('dashboard.clients.books') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-detail"></i>
                        <div data-i18n="Analytics">Books clients <span
                                class="badge badge-center rounded-pill bg-primary d-none" id="books_clients"></span>
                        </div>
                    </a>
                </li>
                <li class="menu-item new-clients">
                    <a href="{{ route('dashboard.clients.new') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-detail"></i>
                        <div data-i18n="Analytics">New clients <span
                                class="badge badge-center rounded-pill bg-primary d-none" id="clients"></span></div>
                    </a>
                </li>
                <li class="menu-item current-clients">
                    <a href="{{ route('dashboard.clients.current') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-detail"></i>
                        <div data-i18n="Analytics">Current clients</div>
                    </a>
                </li>
                <li class="menu-item old-clients">
                    <a href="{{ route('dashboard.clients.old') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-detail"></i>
                        <div data-i18n="Analytics">Old clients</div>
                    </a>
                </li>
                <li class="menu-item future-clients">
                    <a href="{{ route('dashboard.clients.future') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-detail"></i>
                        <div data-i18n="Analytics">Future clients</div>
                    </a>
                </li>
            </ul>
        </aside>
        <!-- / Menu -->
