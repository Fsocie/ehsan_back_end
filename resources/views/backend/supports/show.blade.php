
    <div class="modal fade" id="modal-default{{$support->id}}" style="display: none;" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Voire le support : {{$support->nom_support}} </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>

          <div class="modal-body">
              
              <div class="row">
                  <div class="col-md-6">
                      <p>Nom du support : <label for="">{{$support->nom_support}}</label></p></label>
                  </div>
              </div>
              
          </div>
          <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>

  </div>


