<div class="modal fade" id="modal-danger{{$role->id}}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h5 class="modal-title">Supprimé le role : {{$role->titre}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Etes-vous sur de vouloir supprimé ce role???</p>
            </div>
            <div class="modal-footer justify-content-between">
      
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <form action="{{route('roles.destroy', $role->id) }}" method="post">
                    @csrf
                    @method("delete")
                    <button class="btn btn-danger start_chat" title="delete"><i class="fas fa-trash"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>