
<header>
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper white">
                <a href="#" class="green-text text-darken-2 brand-logo" id="logo">Rodred Lending</a>
                <a href="#" data-activates="slide-out" id="button" class="button-collapse green-text text-darken-2"><i class="material-icons">menu</i></a>
                <ul class="right" id="markasread" onclick="markNotificationsRead()">
                    <!-- Dropdown Trigger -->
                    <li>
                        <a class="dropdown-notif green-text text-darken-2" href="#!" data-activates="dropdown1">
                            <i class="material-icons left notif" style="margin: 0;">notifications</i>
                            <span class="hide-on-small-only">Notification</span>
                            <span class="new badge">{{count(auth()->user()->unreadNotifications)}}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <ul id='dropdown1' class='dropdown-content' >
                @forelse(auth()->user()->unreadNotifications as $notification)
                    @include('template.notifications.' .snake_case(class_basename($notification->type)))
                    @empty
                    <li><a href="#">No Unread Notifications</a></li>
                @endforelse
            </ul>

        </nav>
    </div>
</header>
@if (session('status'))
<div class="alert alert-success">
    <i class="material-icons left">check_circle</i>
    <span>{{ session('status') }}</span>
</div>
@endif
