@extends('layout')

@section('content')
    <div class="row">
        <div class="col s12 m12 l12">
            <h4>Pay Loan</h4>
            <div class="row">
                <div class="col s12 m12 l6">
                    <div class="card-panel">
                        <div class="row">
                            <div class="input-field">
                                <select name="prep_by" id="prep_by">
                                    <option value="" disabled selected>Choose your option</option>
                                    {{--@foreach($employee as $employees )--}}
                                        {{--<option value="{{$employees->id}}" data-icon="/images/profile.png" class="left circle">{{$employees->fname . " " . $employees->lname}}</option>--}}
                                    {{--@endforeach--}}

                                </select>
                                <label>Customer's Name</label>
                            </div>

                            <div class="input-field col s12 m12 l12">
                                <select name="prep_by" id="prep_by">
                                    <option value="" disabled selected>Choose your option</option>
                                    {{--@foreach($employee as $employees )--}}
                                    {{--<option value="{{$employees->id}}" data-icon="/images/profile.png" class="left circle">{{$employees->fname . " " . $employees->lname}}</option>--}}
                                    {{--@endforeach--}}

                                </select>
                                <label>Payment for</label>
                            </div>
                            <div class="input-field col s12 m12 l12">
                                <input type="text" class="validate" id="fname">
                                <label for="fname">Amount</label>
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
                    <a href="#" class="btn right">Pay</a>
                </div>
                <div class="col s12 m12 l5">
                    <div class="card-panel">
                        <table>
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Running Balance</th>
                                <th>Running Interest</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($loans as $loan)
                            <tr>
                                <td>{{$loan->id}}</td>
                                <td>Eclair</td>
                                <td>$0.87</td>
                            </tr>
                                @endforeach
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
</script>
    @endsection

