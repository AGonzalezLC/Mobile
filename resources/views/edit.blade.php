<form action="post" v-on:submit.prevent="updateMobile(fillMobile.id)">
<div class="modal fade" id="edit" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit number</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="number">Numero de telefono</label>
        <input type="text" maxlength="9" name="number" class="form-control" v-model="fillMobile.number">
        <label for="user_id">Id usuario</label>
        <input type="number" maxlength="1" name="id_user" class="form-control" v-model="fillMobile.id" >
        <span v-for="error in errors" class="text-danger">@{{ error }}</span>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Guardar"></input>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</form>