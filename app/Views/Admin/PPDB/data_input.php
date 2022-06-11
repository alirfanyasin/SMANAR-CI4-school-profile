<div class="container" style="margin-bottom: 100px;">
  <div class="row d-flex justify-content-center">
    <div class="col-md-8 col-12">
      <div class="card ">
        <div class="card-body">
          <form action="#">
            <?php foreach ($data_input as $dain) : ?>

              <?php if ($dain['type_input'] == 'paragraf') : ?>
                <div class="form-group">
                  <label for=""><?= $dain['label_input'] ?></label>
                  <div class="row">
                    <div class="col-10">
                      <textarea name="<?= $dain['nama_input'] ?>" class="form-control" cols="30" <?= $dain['required_input'] ?> rows="6"></textarea>
                    </div>
                    <div class="col-2"> <button type="button" onclick="hapus('<?= $dain['id_input'] ?>')" class="btn btn-danger text-white"><i class="fa fa-trash"></i></button></div>
                  </div>
                </div>

              <?php elseif ($dain['type_input'] == 'radio') : ?>
                <div class="form-group">
                  <div class="row">
                    <div class="col-10">
                      <input type="<?= $dain['type_input'] ?>" name="<?= $dain['nama_input'] ?>" class="mb-2" <?= $dain['required_input'] ?>>
                      <label for=""><?= $dain['label_input'] ?></label>
                    </div>
                    <div class="col-2"> <button type="button" onclick="hapus('<?= $dain['id_input'] ?>')" class="btn btn-danger text-white"><i class="fa fa-trash"></i></button></div>
                  </div>
                </div>
              <?php else : ?>
                <div class="form-group">
                  <label for=""><?= $dain['label_input'] ?></label>
                  <div class="row">
                    <div class="col-10">
                      <input type="<?= $dain['type_input'] ?>" name="<?= $dain['nama_input'] ?>" class="form-control mb-2" <?= $dain['required_input'] ?>>
                    </div>
                    <div class="col-2"> <button type="button" onclick="hapus('<?= $dain['id_input'] ?>')" class="btn btn-danger text-white"><i class="fa fa-trash"></i></button></div>
                  </div>
                </div>
              <?php endif; ?>

            <?php endforeach; ?>
            <div class="form-group">
              <button type="submit" class="btn btn-block text-white" style="background-color: #3fa400;" name="daftar" id="btn-daftar">Daftar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>

<script>
  function hapus(id_input) {
    $.ajax({
      type: "post",
      url: '<?= base_url('Admin_smanar/Form/detele_input') ?>',
      data: {
        id_input: id_input
      },
      dataType: "json",
      success: function(response) {
        swal({
          title: 'Berhasil',
          text: response.success,
          type: 'success',
          confirmButtonClass: 'btn btn-success',
        })
        get_input()
      }
    });
  }
</script>