<table id="datatable" class="table table-bordered display nowrap" style="width: 100%;">
  <thead>
    <tr>
      <th>Label</th>
      <th>Jumlah</th>
      <th>Aksi</th>
    </tr>
  </thead>


  <tbody>
    <?php foreach ($jml_data as $jumpeng) : ?>
      <tr>
        <td><?= $jumpeng['penghuni'] ?></td>
        <td><?= $jumpeng['jumlah'] ?></td>
        <td>
          <button type="button" class="btn btn-warning btn-edit btn-sm" onclick="edit('<?= $jumpeng['id_jumpeng'] ?>')">
            <i class="fa fa-edit"></i>
          </button>
        </td>

      </tr>
    <?php endforeach; ?>

  </tbody>
</table>

<script>
  $(document).ready(function() {
    $('#datatable').DataTable({
      "scrollX": true
    });

  })

  function edit(id_jumpeng) {
    $.ajax({
      type: 'post',
      url: '<?= base_url('Admin_smanar/Tampilan/modal_edit_jumpeng') ?>',
      data: {

        id_jumpeng: id_jumpeng
      },
      dataType: 'json',
      success: function(response) {
        if (response.success) {
          $('.view-modal-jumpeng').html(response.success).show();
          $('#modal-edit-jumpeng').modal('show');
        }
      }
    })
  }

  // function edit(id_jumpeng) {
  //   $.ajax({
  //     url: '<?= base_url('Admin_smanar/Tampilan/modal_edit_jumpeng') ?>',
  //     type: 'post',
  //     data: {
  //       id_jumpeng: id_jumpeng
  //     },
  //     success: function(response) {
  //       if (response.success) {
  //         $('.view-modal-jumpeng').html(response.success).show();
  //         $('#modal-edit-jumpeng').modal('show');
  //       }
  //     }
  //   })
  // }
</script>