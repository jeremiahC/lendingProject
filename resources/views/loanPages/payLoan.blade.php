@extends('layout')

@section('content')
    <div class="row">
        <div class="col s12 m12 l12">
            <h4>Pay Loan</h4>
            <div class="row">
                <form class="col s12 m12 l6" method="post" action="/pay">
                    {{csrf_field()}}
                    <input type="text" value="{{$id->id}}" id="customer_id" hidden>
                    {{--<input type="text" value="{{$ledId}}" id="led_id" hidden>--}}
                    <div class="card-panel">
                        <div class="row">
                            <div class="input-field">
                                <input type="text" value="{{$id->fname . " " .$id->lname}}" readonly>
                                <label>Customer's Name</label>
                            </div>

                            <div class="input-field col s12 m12 l12">
                                <select name="payment_for" id="payment_for">
                                    <option value="" disabled selected>Choose your option</option>
                                    <option value="interest">Interest</option>
                                    <option value="balance">Balance</option>
                                </select>
                                <label>Payment for</label>
                            </div>
                            <div class="input-field col s12 m12 l12">
                                <input type="text" class="validate" id="amount">
                                <label for="amount">Amount</label>
                            </div>
                            <div class="input-field col s12 m12 l12">
                                <div class="row">
                                    <div class="col s5 m5 l5">
                                        <label>Mode for Payemnt</label>
                                    </div>
                                    <div class="col s m5 l5">
                                        <input type="radio" id="cash" name="mode" value="no">
                                        <label for="cash">Cash</label>
                                        <input type="radio" id="check" name="mode" value="yes">
                                        <label for="check">Check</label>

                                        <input type="text" id="check_no" class="validate" name="check_serial" disabled>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <button id="pay" type="button" class="btn right">Pay</button>
                </form>
                <div class="col s12 m12 l5">
                    <div class="card-panel">
                        <table>
                            <thead>
                            <tr>
                                <th>Running Balance</th>
                                <th>Running Interest</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>eclair</td>
                                    <td>$0.87</td>
                                </tr>
                            </tbody>
                        </table>


                    </div>
                    <a href="#" class="btn col s12">Print View</a>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
<script>
    $('select').material_select();

    $('input[type="radio"]').change(function(){

        if($(this).val() === 'yes'){
            $('#check_no').removeAttr('disabled');
        }else{
            $('#check_no').attr('disabled', 'disabled');
        }

    });

    $('#pay').click(function () {
        var customer_id = $('#customer_id').val();
        var amount = $('#amount').val();
        var CSRF_TOKEN = $('input[name="_token"]').val();
        var payment_for = $('#payment_for').val();
        var ledId = $('#led_id').val();

        $.ajax({
            url: '/pay',
            type: 'post',
            data: {
                '_token': CSRF_TOKEN,
                'customer_id':  customer_id,
                'amount':   amount,
                'payment_for': payment_for,
                'ledId': ledId
            },
            success: function (data) {
                console.log(data);
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
</script>
    @endsection

