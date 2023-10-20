<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">WA Xera</span>
        </a>

        <ul class="sidebar-nav">

            <li class="sidebar-item">
                <a class="sidebar-link" href="index.html">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item {{ url()->current() == route('backend-lists') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('backend-lists') }}">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Lists</span>
                </a>
            </li>


            <li class="sidebar-item {{ url()->current() == route('backend-contacts') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('backend-contacts') }}">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Contacts</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="pages-sign-in.html">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Inbox</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('backend-templates') }}">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Templates</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('backend-campaigns') }}">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Send Messages</span>
                </a>
            </li>
            <li class="sidebar-item {{ url()->current() == route('backend-campaigns') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('backend-campaigns') }}">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Campaigns</span>
                </a>
            </li>

        </ul>

    </div>
</nav>
