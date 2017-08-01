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
    @foreach($investamount as $invamt)
        @if($invamt->approved === null)
            <tr>
                <td>{{$invamt->amt_apr}}</td>
                <td>{{$invamt->transaction}}</td>
                <td>{{$invamt->interest}}</td>
                <td><a class="btn" href="/investments/show/{{$invamt->investments_id}}">view</a></td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
