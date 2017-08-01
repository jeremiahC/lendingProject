@extends('layout')

@section('content')
    <div class="row">
        <div class="col s12 m11 l5">
            <div class="card">
                <div class="card-content center">
                    <h4>Interest Form</h4>
                    <div class="row">
                        <form class="row" method="post" action="/invinterest">
                            {{csrf_field()}}
                            <input type="text" name="id" value="{{$id->id}}" hidden>
                            <div class="input-field col s12 m12 l5 center">
                                <input type="text" id="intrate" name="intrate" value="{{$loanIntrate->interest}}">
                                <label for="intrate">Interest Rate:</label>
                            </div>
                            <div class="input-field col s12 m12 l7 center">
                                <input type="text" id="currtBal" name="currtBal" value="{{$currentBal}}">
                                <label for="intrate">Balance:</label>
                            </div>
                            <div class="col s12 m12 l12 center">
                                <label>New Balance:</label>
                                <div class="row">
                                    <h4 id="newBal"></h4>
                                </div>
                            </div>
                            <button class="btn" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var intrate = $('#intrate').val();
        var currtBal = $('#currtBal').val();

        $('#newBal').text(Math.round((intrate/100) * currtBal.replace(',','') + Number(currtBal.replace(',',''))));

        $('#intrate').keyup(function () {
            intrate = $(this).val();
            $('#newBal').text(Math.round((intrate/100) * currtBal.replace(',','') + Number(currtBal.replace(',',''))));
        });
    </script>
@endsection