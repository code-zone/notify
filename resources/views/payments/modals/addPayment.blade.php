    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Student Payment</h4>
            </div>
            <form action="{{ route('payments.save', $student->id) }}" method="post">
                <div class="modal-body">
                    <div class="row">
                       {{csrf_field()}}
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-1">
                                <label>Amount</label>
                                <input type="number" name="amount" class="form-control" placeholder="Enter Amount Received">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-1">
                                <label for="exampleInputEmail1">Transaction Number</label>
                                <input name="trn" type="text" class="form-control" placeholder="Enter the transaction refenece number for the Payment">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Process</button>
                </div>
            </form>
        </div>
    </div>