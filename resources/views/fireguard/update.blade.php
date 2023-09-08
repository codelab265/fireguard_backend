<div class="modal fade" id="update{{ $id }}">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('fireguard.update', ['id' => $id]) }}">
            @csrf
            @method('patch')
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">UPDATE</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <input name="first_name" type="text" class="form-control"
                                    value="{{ $user->first_name }}" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input name="last_name" type="text" class="form-control"
                                    value="{{ $user->last_name }}" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" type="email" class="form-control" value="{{ $user->email }}"
                                    required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input name="phone_number" type="tel" class="form-control"
                                    value="{{ $user->phone_number }}" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Age</label>
                                <input name="age" type="number" class="form-control" value="{{ $user->age }}"
                                    required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" class="form-control" required>
                                    <option value="{{ $user->gender }}">
                                        {{ $user->gender }}
                                    </option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
