<!-- Modal -->
<div class="modal fade" id="modal-tambah-form-input" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Form Input</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Admin_smanar/Form/simpan_input') ?>" method="POST" class="form_tambah_input" enctype="multipart/form-data">

        <?= csrf_field(); ?>

        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="type">Type</label>
                <select name="type_input" id="type" class="form-control" required id="type">
                  <option selected disabled>Pilih Type</option>
                  <option value="text">Text</option>
                  <option value="file">File</option>
                  <option value="date">Date</option>
                  <option value="time">Time</option>
                  <option value="paragraf">Paragraf</option>
                  <option value="radio">Radio</option>
                  <option value="number">number</option>
                </select>
                <div class="invalid-feedback error_type"></div>

              </div>

              <div class="form-group">
                <label for="label_input">Nama Label</label>
                <input type="text" name="label_input" autocomplete="off" required class="form-control" id="label_input">
              </div>
              <div class="form-group">
                <label for="nama_input">Nama</label>
                <input type="text" name="nama_input" autocomplete="off" required class="form-control" id="nama_input">
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm-4">
                    <input type="checkbox" name="required_input" autocomplete="off" value="required" id="required_input">
                    <label for="required_input">Wajib di isi</label>
                  </div>
                </div>

              </div>

            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="btn-simpan">Simpan</button>
        </div>

      </form>

    </div>
  </div>
</div>


<script>
  $(document).ready(function() {
    $('.form_tambah_input').submit(function(e) {
      e.preventDefault();

      $.ajax({
        type: "post",
        url: $(this).attr('action'),
        data: $(this).serialize(),
        dataType: "json",
        beforeSend: function() {
          $('#btn-simpan').attr('disable', 'disabled');
          $('#btn-simpan').html('<i class="fa fa-spin fa-spinner"></i>')
        },
        complete: function() {
          $('#btn-simpan').removeAttr('disable');
          $('#btn-simpan').html('Simpan');
        },
        success: function(response) {
          swal({
            title: 'Berhasil',
            text: response.success,
            type: 'success',
            confirmButtonClass: 'btn btn-success',
          })
          $('#modal-tambah-form-input').modal('hide');
          get_input()
        }
      });
      return false;
    })
  })
</script>