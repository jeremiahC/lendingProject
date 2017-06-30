<table class="responsive-table striped black-text">
    <thead class="green">
    <tr>
        <th data-field="id" class="t-heads">
            Name
            <i class="material-icons right icon-hover sort" data-sort="name">sort_by_alpha</i>
        </th>
        <th data-field="name" class="t-heads">Cell No.</th>
        <th data-field="price" class="t-heads">No. of Loans</th>
        <th data-field="action" class="t-heads">Action</th>
    </tr>
    </thead>

    <tbody class="list">
    @foreach($customers as $customer)
        <tr>
            <td class="name">{{$customer->lname.", ".$customer->fname." ".substr($customer->mname,-6,1)}}.</td>
            <td>0{{$customer->cell_no}}</td>
            <td>{{count($customer->loan)}}</td>
            <td><a href="/customerPage/customer{{$customer->id}}" class="btn waves-effect waves-light green">view</a></td>
        </tr>
    @endforeach
    </tbody>
</table>

{{$customers->links()}}