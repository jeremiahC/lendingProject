
<section>
    <ul id="slide-out" class="side-nav fixed">
        <li class="light-green">
            <div class="center-align">
                <img src="/images/profile.png" class="circle hoverable" height="120" width="120">
            </div>
            <div>
                <a href="#" class="" data-toggle="dropdown" role="button" aria-expanded="false" >
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>

        </li>
        <li class="bold"><a href="/"><i class="material-icons waves-effect waves-teal">dashboard</i>Dashboard</a></li>
        @if(Auth::user()->role_id !== 3)
            <li class="bold"><a href="/customerPage"><i class="material-icons waves-effect waves-teal">perm_identity</i>Customers</a></li>
            <li class="bold"><a href="/payLoan"><i class="material-icons waves-effect waves-teal">payment</i>Pay Loan</a></li>
        @endif
        <li class="bold"><a href="/addFile"><i class="material-icons waves-effect waves-teal">perm_media</i>File Manager</a>


        </li>
    </ul>
</section>


