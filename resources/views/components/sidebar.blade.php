<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item {{ Request::is('dashboard') ? 'selected' : '' }}"> <a class="sidebar-link" href="index.html"
                        aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                            class="hide-menu">Dashboard</span></a></li>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Menu utama</span></li>

                <li class="sidebar-item {{ Request::is('dashboard/barang*') ? 'selected' : '' }}"> <a class="sidebar-link" href="/dashboard/barang"
                        aria-expanded="false"><i data-feather="box" class="feather-icon"></i><span
                            class="hide-menu">Barang
                        </span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link" href="/dashboard"
                        aria-expanded="false"><i data-feather="pocket" class="feather-icon"></i><span
                            class="hide-menu">Lelang
                        </span></a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>