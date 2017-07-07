<div class="row">
    <div class="col s12 m12 l11">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Ledger</span>
                <table class="striped responsive-table">
                    <thead>
                    <tr>
                        <th data-field="id" class="center-align">Date</th>
                        <th data-field="name" class="center-align">Transaction</th>
                        <th data-field="price" class="center-align">Add Loan</th>
                        <th data-field="price" class="center-align">Amount</th>
                        <th data-field="price" class="center-align">Interest</th>
                        <th data-field="price" class="center-align">Payments</th>
                        <th data-field="price" class="center-align">Balance</th>
                        <th data-field="price" class="center-align">Received</th>
                        <th data-field="price" class="center-align">Approved</th>
                    </tr>
                    </thead>

                    <tbody id="ledger">

                    @foreach($customer->ledger as $myLoans)
                        <tr class="ledger">
                            <td>{{$myLoans->date}}</td>
                            <td>{{$myLoans->transaction}}</td>
                            <td id="addLoan">{{$myLoans->loan}}</td>
                            <td id="amount">{{$myLoans->amount}}</td>
                            <td id="interest">{{$myLoans->interest}}</td>
                            <td id="payment">{{$myLoans->payments}}</td>
                            <td class="balance">{{$myLoans->balance}}</td>
                            <td id="received"></td>
                            <td></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
        @role('REG-EMPLOYEE')
        <div class="right">
            <a class='dropdown-button btn' href='#' id="dropBtn" data-activates='dropdown1'>
                <i class="material-icons left">list</i>Options
            </a>
            <!-- Dropdown Structure -->
            <ul id='dropdown1' class='dropdown-content'>
                <li id="interest">
                    <span>Interest</span>
                </li>
                <li>
                    <a href="/customer{{$customer->id}}/payLoan/{{$ledgerId}}">Pay</a>
                </li>
                <li>
                    <a href="/newTransaction/{{$customer->id}}">New Transaction</a>
                </li>
            </ul>

        </div>
        @endrole
    </div>

</div>