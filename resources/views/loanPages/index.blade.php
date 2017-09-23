@extends('layout')

@section('content')

    <h3>Loan Page</h3>
    <div class="row">
        <div class="col s12 m12 l11">
            <div class="card">
                <div class="card-title">Pending Loans</div>
                    <div class="card-content articles">
                        @include('loanPages.pending')
                    </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s12 m12 l11">
            <div class="card grey lighten-2">
                <div class="card-title">Loans To be Approved</div>
                <div class="card-content">
                    @include('loanPages.forappr')
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s12 m12 l11">
            <div class="card">
                <div class="card-title">Approved Loans</div>
                <div class="card-content">
                    <table class="responsive-table scroll">
                        <thead id="apprHead">
                        <tr>
                            <th>Date Approved</th>
                            <th>Amount</th>
                            <th>Transaction</th>
                            <th>Interest</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody id="apprloans">
                            @foreach($amounts as $amount)
                                @if($amount->approved !== null)
                                    <tr>
                                        <td>{{$amount->approved}}</td>
                                        <td>{{$amount->amt_apr}}</td>
                                        <td>{{$amount->transaction}}</td>
                                        <td>{{$amount->interest}}</td>
                                        <td><a class="btn" href="/show/loan/{{$amount->loan_id}}">view</a></td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed-action-btn click-to-toggle">
        <a class="btn-floating btn-large red">
            <i class="large material-icons">settings</i>
        </a>
        <ul>
            <li>
                <a class="btn-floating green" id="delete">
                    <i class="material-icons">delete</i>
                </a>
            </li>

        </ul>
    </div>
@endsection

@section('script')
    <script>
        // Change the selector if needed
        var $table = $('.scroll'),
            $bodyCells = $table.find('tbody tr:first').children(),
            colWidth;

        // Adjust the width of thead cells when window resizes
        $(window).resize(function() {
            // Get the tbody columns width array
            colWidth = $bodyCells.map(function() {
                return $(this).width();
            }).get();

            // Set the width of thead columns
            $table.find('thead tr').children().each(function(i, v) {
                $(v).width(colWidth[i]);
            });
        }).resize(); // Trigger resize handler

        $('.delete').hide();
        $('#delete').click(function () {
            $('.delete').show();
        });
    </script>
@endsection