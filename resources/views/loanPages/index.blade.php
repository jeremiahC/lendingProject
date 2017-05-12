@extends('layout')

@section('content')

    <h3>Loan Page</h3>
    <div class="row">
        <div class="col s12 m12 l11">
            <div class="card blue white-text">
                <div class="card-title">Pending Loans</div>
                @if(count($loans) > 0)
                    <div class="card-content articles">
                        @include('loanPages.pending')
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s12 m12 l11">
            <div class="card red lighten-1">
                <div class="card-title">Loans To be Approved</div>
                @if(count($amounts) > 0)
                <div class="card-content">
                    @include('loanPages.forappr')
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s12 m12 l11">
            <div class="card">
                <div class="card-title">Approved Loans</div>
                <div class="card-content">
                    <table class="responsive-table">
                        <thead>
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
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('body').on('click', '.pagination a', function(e) {
                e.preventDefault();

                var url = $(this).attr('href');
                getArticles(url);
                window.history.pushState("", "", url);
            });

            function getArticles(url) {
                $.ajax({
                    url : url
                }).done(function (data) {
                    $('.articles').html(data);
                }).fail(function () {
                    alert('Articles could not be loaded.');
                });
            }
        });
//            $.ajax({
//                url: '/loanPage/show',
//                type: 'get',
//                success: function (data) {
//                    var loans = $.parseJSON(data);
//                    var txt = "";
//
//                    for(x in loans){
//                        txt += "<tr>";
//                        txt += "<td>" + loans[x].date_prep + "</td>";
//                        txt += "<td>" + loans[x].amt_app + "</td>";
//                        txt += "<td>" + loans[x].customer_id + "</td>";
//                        txt += "<td>" + loans[x].prep_by + "</td>";
//                        txt += "<td><a class='btn' href='/show/loan/" + loans[x].id + "'>view</a></td>"
//                        txt += "</tr>";
//                    }
//
//                    $('#loans').append(txt);
//
//                },
//                error: function (data) {
//                  console.log(data);
//                }
//            });
//
//            $.ajax({
//                url: '/loanPage/showAppr',
//                type: 'get',
//                success: function (data) {
//                    var loans = $.parseJSON(data);
//                    var txt = "";
//
//                    for(x in loans){
//                        if(loans[x].approved !== null){
//                            txt += "<tr>";
//                            txt += "<td>" + loans[x].approved + "</td>";
//                            txt += "<td>" + loans[x].amt_apr + "</td>";
//                            txt += "<td>" + loans[x].transaction + "</td>";
//                            txt += "<td>" + loans[x].interest + "</td>";
//                            txt += "<td><a class='btn' href='/show/loan/" + loans[x].loan_id + "'>view</a></td>"
//                            txt += "</tr>";
//                        }
//                    }
//
//                    $('#apprloans').append(txt);
//
//                },
//                error: function (data) {
//                    console.log(data);
//                }
//            });
    </script>
@endsection