@extends('layout')

@section('content')
    <div class="row">
        <div class=" col s12 m6 l6 right">
            <div class="card blue accent-1 white-text">
                <div class="card-content">
                    <div class="card-title">Customer Info</div>
                    <div class="center-align">
                        <img class="responsive-img circle" src="/images/profile.png" height="100" width="100">
                        <p>Name: {{$id->customer->fname ." ". $id->customer->lname}}</p>
                        <p>Cell no.: 0{{$id->customer->cell_no}}</p>
                    </div>
                    <a class="btn-floating halfway-fab waves-effect waves-light grey" href="/customerPage/customer{{$id->customer_id}}">
                        <i class="material-icons">pageview</i>
                    </a>
                </div>
            </div>
        </div>
        <div class=" col s12 m6 l6">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Amount Applied</span>
                    <label>Date Prepared</label>
                    <input type="text" value="{{$id->date_prep}}" readonly>
                    <label>Amount Applied</label>
                    <input type="text" value="{{$id->amt_app}}" readonly>
                    <label>Colateral Offered</label>
                    <input type="text" value="{{$id->col_off}}" readonly>
                    <label>Co-Makers</label>
                    <input type="text" value="{{$id->co_makers}}" readonly>
                    <label>Prepared By</label>
                    <input type="text" value="{{$user->name}}" readonly>
                    @if($id->short_term === "yes")
                        <label>for short term "{{$id->months_to_pay}} to pay"</label>
                    @endif
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class=" col s12 m6 l6">
            <div class="card">
                <div class="card-content">
                    @if(empty($id->amount))
                        <div class="grey lighten-3" style="padding:10px;">
                            <a class="btn-floating btn-medium waves-effect waves-light light-green lighten-3 " href="/loan/{{$id->id}}/amountapprove">
                                <i class="material-icons">add</i>
                            </a>
                            Add Amount
                        </div>
                    @else
                        @if($id->amount->approved === null)
                            <span class="card-title">Amount For Approval</span>
                        @else
                            <span class="card-title">Amount Approved</span>
                            <label>Date Approved</label>
                            <input type="text" value="{{$id->amount->approved}}"  class="apprDate" readonly>
                        @endif
                            <label>Amount</label>
                            <input type="text" value="{{$id->amount->amt_apr}}"  class="amtApr" readonly>

                            <label>Interest</label>
                            <input type="text" value="{{$id->amount->interest}}" class="amtApr" readonly>

                            <label>Gives</label>
                            <input type="text" value="{{$id->amount->gives}}" class="amtApr" readonly>

                            <label>Date Start</label>
                            <input type="text" value="{{$id->amount->date_start}}" class="amtApr" readonly>

                            <label>Less</label>
                            <input type="text" value="{{$id->amount->less}}" class="amtApr" readonly>

                            <label>Service Charge</label>
                            <input type="text" value="{{$id->amount->serv_charge}}" class="amtApr" readonly>

                            <label>Notarial</label>
                            <input type="text" value="{{$id->amount->notarial}}" class="amtApr" readonly>

                            <label>Others</label>
                            <input type="text" value="{{$id->amount->others}}" class="amtApr" readonly>

                            <input type="text" value="{{$id->amount->id}}" name="amount_id" id="amount_id" >
                            {{csrf_field()}}
                    @endif
                </div>
            </div>
            <a class="btn" href="/loanPage">Go To Loans</a>
            @if(!empty($id->amount))
                <!-- Dropdown Trigger -->
                    @if($id->amount->approved === null)
                        <a class='dropdown-button btn right red' href='#' data-activates='dropdown1'>Options</a>

                        <!-- Dropdown Structure -->
                        <ul id='dropdown1' class='dropdown-content '>
                            @role('MANAGER-EMPLOYEE')
                                <li><a href="#!" class="green-text" id="approve">Approve</a></li>
                                <li><a href="#!" class="red-text" id="disapprove">Disapprove</a></li>
                            @endrole
                            <li><a href="/loan/{{$id->amount->id}}/edit" class="yellow-text">Edit</a></li>
                        </ul>
                    @endif
            @endif
        </div>
    </div>

@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('.modal').modal();

        $('#approve').click(function () {
            var id = $('#amount_id').val();
            var CSRF_TOKEN = $('input[name="_token"]').val();
            $.ajax({
                url: '/amount/approve',
                type: 'post',
                data: {
                    '_token': CSRF_TOKEN,
                    'amount_id': id
                },
                success: function(data){
                    Materialize.toast('You have Approved this Loan', 5000);
                    console.log(data);
                },
                error: function(data){
                    console.log(data);
                }
            });
        });

        $('#disapprove').click(function () {
            var id = $('#amount_id').val();
            var CSRF_TOKEN = $('input[name="_token"]').val();
            $.ajax({
                url: '/amount/disapprove',
                type: 'post',
                data: {
                    '_token': CSRF_TOKEN,
                    'amount_id': id
                },
                success: function(data){
                    Materialize.toast('You have Dispproved this Loan', 5000);
                    console.log(data);
                },
                error: function(data){
                    console.log(data);
                }
            });
        });
    });
</script>
@endsection