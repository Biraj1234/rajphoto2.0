<div class="modal fade" id="adjustments" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="{{ route('frontend.adjustment.store') }}" method="POST">
            <div class="modal-content">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Adjustment</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label class="form-label" for="">Closing Balance</label>
                        <input type="text" readonly id="closing" class="form-control"
                            value="{{ $closingBalance }}">
                    </div>

                    {{-- Cash In drawer --}}
                    <div class="form-group">
                        <label class="form-label" for="">Cash In Drawer</label>
                        <input type="number" class="form-control" name="closing_balance" id="closing_balancee"
                            value="">
                    </div>

                    {{-- Adjustment --}}
                    <div class="form-group">
                        <label class="form-label" for="">Adjustment</label>
                        <input type="text" class="form-control" name="adjusted_amount" value="" id="adjustment"
                            readonly>
                    </div>

                    <input type="hidden" name="date" class="current_date" value="">


                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-sm btn-success">
                        <i class="fa fa-save"></i> {{ translate('Save') }}
                    </button>

                    <button type="reset" class="btn btn-sm btn-secondary">
                        <i class="fa fa-save"></i> Clear
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>