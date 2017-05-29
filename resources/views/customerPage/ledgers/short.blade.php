<div class="row">
    <div class="col s12 m12 l11">
        <div class="card">
            <div class="card-content">

                        <span class="card-title">
                            @foreach($customer->loans as $amount)
                                Amount: {{$amount->amt_apr}} php
                                <br>
                                Interest: {{$amount->interest/100 * $amount->amt_apr}}
                                <br>
                                Date: {{$amount->approved}}
                                <br>
                                For {{$loans->months_to_pay}} months
                            @endforeach
                        </span>
                <table class="striped responsive-table">
                    <thead>
                    <tr>
                        <th data-field="date" class="center-align">Date</th>
                        <th data-field="gives" class="center-align">Gives</th>
                        <th data-field="withdraw" class="center-align">Withdraw</th>
                        <th data-field="deduction" class="center-align">Deduction</th>
                        <th data-field="net" class="center-align">Net</th>
                        <th data-field="signature" class="center-align">Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($customer->ledger as $ledger)
                        <tr>
                            <td>{{$ledger->date}}</td>
                            <td class="gives">{{$ledger->gives}}</td>
                            <td>{{$ledger->withdraw}}</td>
                            <td>{{$ledger->deduction}}</td>
                            <td>{{$ledger->net}}</td>
                            <td><a class="btn" href="/customer{{$customer->id}}/payLoan/{{$ledger->id}}">pay</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                    <h5>Total:<span id="gives"></span></h5>

            </div>
        </div>
    </div>
</div>