@extends('layout')

@section('content')
    <form class="row" method="post" action="/storeTransaction">
        {{csrf_field()}}
        <input type="text" value="{{$id}}" name="customer_id" hidden>
        <h4>New Transaction</h4>
        <div class="col s12 m12 l11">
            <div class="card">
                <div class="card-content">
                    <div class="row" id="trasaction">
                        <div class="col s12 m5 l5">
                            <label>Amount</label>
                            <input type="text" class="amount" name="amount">
                        </div>
                        <div class="col s12 m5 l5">
                            <label>transaction</label>
                            <input type="text" name="transaction">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <h5>Total:<span id="total"></span></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right">
                <button class="btn" id="add_trans">add</button>
                <button type="submit" class="btn">submit</button>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#add_trans').click(function () {
                $('#trasaction').append(
                    '<div class="col s12 m5 l5">' +
                    '<label>Amount</label>' +
                    '<input type="text" class="amount" name="amount">' +
                    '</div>' +
                    '<div class="col s12 m5 l5">' +
                    '<label>transaction</label>' +
                    '<input type="text" name="transaction">' +
                    '</div>');
            });

            $('.amount').keyup(function () {
                $('#total').html($(this).val());
            });
        });

    </script>
@endsection