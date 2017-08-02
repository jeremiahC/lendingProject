
<table class="responsive-table">
    <thead>
    <tr>
        <th></th>
        <th>Date Prepared</th>
        <th>Amount</th>
        <th>Customer Name</th>
        <th>Prepared By</th>
        <th>Action</th>
    </tr>
    </thead>

    <tbody id="loans">
    @foreach($investments as $inv)
        @if(empty($inv->amount))
            <tr>
                <td>{{$inv->id}}</td>
                <td>{{$inv->date_prep}}</td>
                <td>{{$inv->amt_app}}</td>
                <td>{{$inv->customer->fname ." ". $inv->customer->lname }}</td>
                <td>{{$inv->prep_by}}</td>
                <td><a class="btn" href="/investments/show/{{$inv->id}}">view</a></td>
            </tr>
        @endif
    @endforeach

    </tbody>
</table>



