
    <div class="modal fade" id="modal-default{{$role->id}}" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Voire le role: <em>{{$role->name}}</em> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <p>{{$role->name}}</p>
                 <!---->
                <div>
                    <div class="form-group">
                        <strong>Permissions:</strong>
                    
                        @if(!empty($rolePermissions))
                            @foreach($rolePermissions as $v)
                            {{($v)}}
                                <label class="badge badge-dark">{{ $v->name }},</label>
                            @endforeach
                        @endif
                    </div>
                </div>
                <!---->
            </div>
           
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>


