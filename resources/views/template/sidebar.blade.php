
<section>
    <ul id="slide-out" class="side-nav fixed">
        <li class="light-green">
            <br>
            <div class="center-align">
                <img src="/images/profile.png" class="circle hoverable" height="120" width="120">
            </div>
            <div>
                <a href="#" class="dropdown-link center-align" data-activates="dropdown2">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <ul id="dropdown2" class="dropdown-content">
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>

        </li>
        @ability('ADMIN-USER,REG-EMPLOYEE,MANAGER-EMPLOYEE','dash_page')
            <li class="bold"><a href="/"><i class="material-icons waves-effect waves-teal">dashboard</i>Dashboard</a></li>
        @endability

        @ability('REG-EMPLOYEE,MANAGER-EMPLOYEE', 'customer_page')
            <li class="bold"><a href="/customerPage"><i class="material-icons waves-effect waves-teal">perm_identity</i>Customers</a></li>
        @endability

        @ability('REG-EMPLOYEE,MANAGER-EMPLOYEE', 'loan_page')
            <li class="bold"><a href="/loanPage"><i class="material-icons">assignment</i>Loans List</a></li>
        @endability

        @ability('REG-EMPLOYEE,MANAGER-EMPLOYEE', 'inv_page')
            <li class="bold"><a href="/investments"><i class="material-icons">attach_money</i>Investments</a></li>
        @endability

        @role('MANAGER-EMPLOYEE')
            <li class="bold"><a href="/addFile"><i class="material-icons waves-effect waves-teal">perm_media</i>File Manager</a></li>
        @endrole
        @role('ADMIN-USER')
        <li class="no-padding" >
            <ul class="collapsible" data-collapsible="accordion" style="padding-left:15px;">
                <li>
                    <a class="collapsible-header">
                        <i class="material-icons waves-effect waves-teal">storage</i>Database
                    </a>
                    <div class="collapsible-body no-padding">
                        <ul class="">
                            <li><a href="#">Loans Approve</a></li>
                            <li><a href="#">Customers</a></li>
                            <li><a href="#">Ledgers</a></li>
                            <li><a href="#">Loans</a></li>
                            <li><a href="#">Notifications</a></li>
                            <li><a href="#">Password_resets</a></li>
                            <li><a href="#">Payments</a></li>
                            <li><a href="#">Permissions</a></li>
                            <li><a href="#">Permission Roles</a></li>
                            <li><a href="#">Roles</a></li>
                            <li><a href="#">Role User</a></li>
                            <li><a href="#">Users</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
        @endrole
        <li class="no-padding" >
            <ul class="collapsible" data-collapsible="accordion" style="padding-left:15px;">
                <li>
                    <a class="collapsible-header">
                        <i class="material-icons waves-effect waves-teal">settings</i>Settings
                    </a>
                    <div class="collapsible-body no-padding">
                        <ul class="">
                            @ability('REG-USER', 'user_prof_page,pass_page')
                                <li><a href="/userSet">User Profile</a></li>
                                <li><a href="/passSet">Password settings</a></li>
                            @endability
                            @role('ADMIN-USER')
                                <li><a href="/userList">User List</a></li>
                                <li><a href="/rolesPrev">Roles and Priveleges</a></li>
                            @endrole
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</section>


