<div class="row">
    <div class="col s12 m6 l6">
        <div class="card">
            <div class="card-content">
                <div class="row">
                    <img src="/images/profile.png" class="circle hoverable profile" height="150" width="150">
                </div>
                <div class="row center-align">
                    <div class="col s12 m12 l12">
                        <b>Full Name:</b>
                        {{$customer->fname. " " .substr($customer->mname,-6,1).". ".$customer->lname}}
                    </div>
                    <div class="col s12 l12">
                        <b>Birthday:</b>
                        {{$customer->birthday}}
                    </div>
                    <div class="col s12 l12">
                        <b>Cellphone No.:</b>
                        +63{{$customer->cell_no}}
                    </div>
                    <div class="col s12 l12">
                        <b>Home Address:</b>
                        {{$customer->home_add}}
                    </div>
                    <div class="col s12 l12">
                        <b>Company Address:</b>
                        {{$customer->comp_add}}
                    </div>
                </div>
            </div>
            @role('REG-EMPLOYEE')
            <div class="card-action">
                <a href="/customerPage/customer{{$customer->id}}/edit" id="editBtn">Edit Profile<i class="material-icons left">edit</i></a>
                <a href="/delete/customer{{$customer->id}}" class="delete" onclick="event.preventDefault(); document.getElementById('delete-cust').submit();">
                    Delete Profile
                </a>
                <form id="delete-cust" action="/delete/customer{{$customer->id}}" method="post">
                    {{ csrf_field() }}
                </form>
            </div>
            @endrole
        </div>
    </div>

    <div class="col s12 m5 l5">
        <div class="card orange accent-3 white-text">
            <div class="card-content">
                <span>Total Loans</span>
                <h3>{{$customer->loans->count()}}</h3>
            </div>
        </div>
    </div>
    <div class="col s12 m5 l5">
        <div class="card deep-purple accent-1 white-text">
            <div class="card-content">
                <span>Total</span>
                <h3>{{$customer->loans->count()}}</h3>
            </div>
        </div>
    </div>
</div>



