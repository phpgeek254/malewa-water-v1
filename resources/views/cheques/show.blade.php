<!-- Modal Structure -->
<div id="cheque_details_{{ $cheque->id }}" class="modal">
    <div class="modal-content center">
        <h4>Cheque Detail</h4>
        <table class="striped">
            <tr>
                <th> Cheque Number</th>
                <td>{{ strtoupper($cheque->check_number) }}</td>
            </tr>
            <tr>
                <th> Payed To</th>
                <td>{{ $cheque->payed_to }}</td>
            </tr>
            <tr>
                <th> Amount</th>
                <td>{{ $cheque->amount }}</td>
            </tr>
            <tr>
                <th> Purpose</th>
                <td>{{ $cheque->purpose }}</td>
            </tr>
            <tr>
                <th> Created By</th>
                <td>{{ $cheque->user_id == 0 ? 'N/A' : $ckeck->user->name }}</td>
            </tr>
            <tr>
                <th> Created</th>
                <td>{{ $cheque->created_at->diffForHumans() }}</td>
            </tr>
            <tr>
                <th> Updated</th>
                <td>{{ $cheque->updated_at->diffForHumans() }}</td>
            </tr>
        </table>
    </div>
    <div class="modal-footer center">
        <a class='btn left' id='print_cheque' href="#"><i class="fa fa-print white-text"></i> Print</a>
        <a href="#" class="waves-effect white-text waves-green btn modal-action modal-close">Close</a>
    </div>
</div>

<div class="card-action">

</div>
