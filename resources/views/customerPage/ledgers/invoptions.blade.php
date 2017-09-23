@role('REG-EMPLOYEE')
<div class="right">
    <a class='dropdown-button btn' href='#' id="dropBtn" data-activates="invoptions">
        <i class="material-icons left">list</i>Options
    </a>
    <!-- Dropdown Structure -->
    <ul id='invoptions' class='dropdown-content'>
        <li><a href="/investments/interest/customer{{$customer->id}}">Interest</a></li>
        <li><a class="modal-trigger" href="#withdraw-modal">Withdraw</a></li>
    </ul>
    <!-- Modal Structure -->
    <div id="withdraw-modal" class="modal">
        <div class="modal-content">
            <h4>Withdrawal Form</h4>
            <form>
                {{csrf_field()}}
                <div class="col s12 m4 l4 input-field">
                    <label for="invbalance">Balance</label>
                    <input type="text" class="" id="invbalance" value="{{$invId->balance}}">
                </div>
                <div class="col s12 m4 l4 input-field">
                    <label for="invamount">Amount</label>
                    <input type="text" class="" id="invamount">
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="modal-action modal-close waves-effect waves-green btn-flat green white-text" id="widthrawBtn">Submit</button>
        </div>
    </div>
</div>
@endrole