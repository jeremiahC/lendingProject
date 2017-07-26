
<header>
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper white">
                <a href="#" class="green-text text-darken-2 brand-logo" id="logo">Rodred Lending</a>
                <a href="#" data-activates="slide-out" id="button" class="button-collapse green-text text-darken-2"><i class="material-icons">menu</i></a>

                <div id="markasread" onclick="markNotificationRead()">
                    <a class='dropdown-button right green-text text-darken-2' href='#' data-activates='dropdown1'>
                        <span class="new badge">{{count(auth()->user()->unreadNotifications)}}</span>
                        <i class="material-icons">notifications_none</i>
                    </a>
                    <!-- Dropdown Structure -->
                    <ul id='dropdown1' class='dropdown-content'>
                        @forelse(auth()->user()->unreadNotifications as $notification)
                            @include('template.notifications.' .snake_case(class_basename($notification->type)))
                            @empty
                            <a href="#"><li>No Unread Notifications</li></a>
                        @endforelse
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
