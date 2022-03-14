
    <div class="modal fade" id="modal-default{{$collecte->id}}" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Voire la collecte: <em>{{$collecte->titre}}</em> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <p>{{$collecte->titre}}</p>
                <p>{{$collecte->description}}</p>
                <div>
                    <img id ="output" src="{{Storage::url($collecte->image)}}" style="border: 2px solid gray;border-radius:5px;width:200px;height:200px">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>

    </div>


