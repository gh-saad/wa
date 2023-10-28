<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('backend-dashboard') }}">
            <span class="align-middle">WA Xera</span>
        </a>

        <ul class="sidebar-nav">

            <li class="sidebar-item {{ url()->current() == route('backend-dashboard') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('backend-dashboard') }}">
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

            <li class="sidebar-item {{ url()->current() == route('backend-blacklist') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('backend-blacklist') }}">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Blacklist</span>
                </a>
            </li>

            <li class="sidebar-item {{ url()->current() == route('backend-inbox') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('backend-inbox') }}">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Inbox</span>
                </a>
            </li>
            <li class="sidebar-item {{ url()->current() == route('backend-inbox-send') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('backend-inbox-send') }}">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Send list</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('backend-templates') }}">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Templates</span>
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
