<table class="responsive-table">
    <thead>
    <tr>
        <th>Amount</th>
        <th>Transaction</th>
        <th>Interest</th>
        <th>Action</th>
    </tr>
    </thead>

    <tbody id="apprloans">
    @foreach($amounts as $amount)
        @if($amount->approved === null)
            <tr>
                <td>{{$amount->amt_apr}}</td>
                <td>{{$amount->transaction}}</td>
                <td>{{$amount->interest}}</td>
                <td><a class="btn" href="/show/loan/{{$amount->loan_id}}">view</a></td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
