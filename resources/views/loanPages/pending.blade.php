
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
    @foreach($loans as $loan)
        @if(empty($loan->amount))
            <tr>
                <td>{{$loan->id}}</td>
                <td>{{$loan->date_prep}}</td>
                <td>{{$loan->amt_app}}</td>
                <td>{{$loan->customer->fname ." ". $loan->customer->lname }}</td>
                <td>{{$loan->prep_by}}</td>
                <td><a class="btn" href="/show/loan/{{$loan->id}}">view</a></td>
            </tr>
        @endif
    @endforeach

    </tbody>
</table>

{{$loans->links()}}

