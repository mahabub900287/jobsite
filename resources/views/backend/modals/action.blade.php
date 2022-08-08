<div class="modal effect-scale" id="action-modal"  aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content position-relative">
            <div class="modal-loader position-absolute h-100 d-none w-100">
                <img src="{{ asset('img/table-loading.svg') }}" class="position-absolute" alt="">
            </div>
            <div class="modal-header border-bottom-0">
                <h6 class="mb-0 modal-title"></h6>
            </div>
            <div class="modal-body">
                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                <div class="form-group">
                    <x-form.textarea name="note" labelName="Note (optional)" rows="3" placeholder="Send a note...."></x-form.textarea>
                </div>
            </div>
            <div class="modal-footer pt-0 border-top-0">
                <button class="btn ripple btn-sm btn-primary action-submit-btn" type="button"><i class="fas fa-check fa-sm"></i> Confirm</button>
                <button class="btn ripple btn-sm btn-danger" aria-label="Close" class="close" data-dismiss="modal" type="button"><i class="fas fa-times fa-sm"></i> Cancel</button>
            </div>
        </div>
    </div>
</div>
