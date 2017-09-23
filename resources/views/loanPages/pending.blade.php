
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
                <td>
                    <a class="btn" href="/show/loan/{{$loan->id}}">view</a>
                    <a href="/delete/loan{{$loan->id}}" class="btn red delete" onclick="event.preventDefault(); document.getElementById('delete-loan').submit();">
                        Delete
                    </a>
                    <form id="delete-loan" action="/delete/loan{{$loan->id}}" method="post">
                        {{ csrf_field() }}
                    </form>
                </td>
            </tr>
        @endif
    @endforeach

    </tbody>
</table>



