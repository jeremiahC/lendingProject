<table class="striped responsive-table">
    <thead>
    <tr>
        <th data-field="id" class="center-align">Date</th>
        <th data-field="name" class="center-align">Transaction</th>
        <th data-field="price" class="center-align">Withdraw</th>
        <th data-field="price" class="center-align">Deposit</th>
        <th data-field="price" class="center-align">Interest</th>
        <th data-field="price" class="center-align">Balance</th>
        <th data-field="price" class="center-align">Signature</th>
    </tr>
    </thead>

    <tbody id="ledger">

    @foreach($customer->invledger as $myInvestment)
        <tr class="ledger">
            <td>{{$myInvestment->date}}</td>
            <td>{{$myInvestment->transaction}}</td>
            <td id="addLoan">{{$myInvestment->withdraw}}</td>
            <td id="amount">{{$myInvestment->deposit}}</td>
            <td id="interest">{{$myInvestment->interest}}</td>
            <td id="payment">{{$myInvestment->balance}}</td>
            <td class="balance">{{$myInvestment->signature}}</td>
            <td id="received"></td>
            <td></td>
        </tr>
    @endforeach

    </tbody>
</table>