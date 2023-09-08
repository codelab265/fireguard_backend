<div class="modal fade" id="delete{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <form method="POST" action="{{ route('delete', ['id' => $id]) }}">
            @csrf
            @method('delete')
            <div class="form-group">
                <label class="sr-only" for="page">Hidden input label</label>
                <input type="hidden" class="form-control" name="page" id="page" value="{{ $page }}">

            </div>
            <input type="hidden" class="form-control" name="id" id="id" value="{{ $id }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">DELETE MODAL</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this item?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Continue</button>
                </div>
            </div>
        </form>
    </div>
</div>
