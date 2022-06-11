<!-- Modal -->
<div class="modal fade" id="modal-edit-jumpeng" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('Admin_smanar/Tampilan/update_data_jumpeng', ['class' => 'form_update_data_jumpeng']) ?>
      <?= csrf_field(); ?>
      <div class="modal-body">
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <input type="hidden" name="id_jumpeng" value="<?= $id_jumpeng ?>">
              <label for="">Penghuni</label>
              <input type="text" name="penghuni" class="form-control" id="penghuni" value="<?= $penghuni ?>" readonly>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="">Penghuni</label>
              <input type="number" name="jumlah" class="form-control" id="jumlah" value="<?= $jumlah ?>">
            </div>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="btn-simpan">Update</button>
        </div>


        <?= form_close() ?>
      </div>
    </div>
  </div>


  <script>
    $(document).ready(function() {

      $('.form_update_data_jumpeng').submit(function(e) {
        e.preventDefault();

        $.ajax({
          url: $(this).attr('action'),
          type: 'post',
          data: $(this).serialize(),
          dataType: 'json',
          beforeSend: function() {
            $('#btn-simpan').attr('disable', 'disabled')
            $('#btn-simpan').html('<i class="fa fa-spin fa-spinner"></i>')
          },
          complete: function() {
            $('#btn-simpan').removeAttr('disable')
            $('#btn-simpan').html('Update')
          },
          success: function(response) {

            swal({
              title: 'Berhasil',
              text: response.success,
              type: 'success',
              confirmButtonClass: 'btn btn-success',
            })

            $('#modal-edit-jumpeng').modal('hide');

            data_jumpeng();
          }



        })
        return false;


      })

    })
  </script>