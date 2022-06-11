<div class="jumbotron"></div>

<div class="avatar">
  <label for="browse_image" class="btn-icon">
    <i class="fa fa-camera edit-button-icon"></i>
  </label>
  <input type="file" name="foto_profile" class="button-edit-camera" id="browse_image">
  <img src="<?= base_url('Front/assets/img/team/foto_profile/' . $profile['foto_profile']) ?>" alt="">
  <div id="open-modal"></div>
</div>

<div class="tesk-welcome">
  <h1> <b>Welcome</b> <?= $profile['nama_admin'] ?></h1>
  <small><?= $profile['email_admin'] ?></small>
</div>
<div class="button-edit mt-2">
  <button type="button" class="btn btn-edit" onclick="edit('<?= $profile['id_admin'] ?>')">Edit Profile</button>

</div>

<!-- Modal -->
<div id="uploadImageModal" class="modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body d-flex justify-content-center">
        <div class="image-croppie mb-3">
          <div id="image_demo"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" style="background-color: #3fa400;" id="crop_image">Simpan</button>
      </div>
    </div>
  </div>
</div>


<!-- JS  -->
<script>
  function edit(id_admin) {
    $.ajax({
      type: "post",
      url: "<?= base_url('Admin_smanar/Profile/modal_edit_profile') ?>",
      data: {
        id_admin: id_admin
      },
      dataType: "json",
      success: function(response) {
        $('.view-modal-edit').html(response.success).show();
        $('#modal-edit-profile').modal('show');
      }
    });
  }


  // Crooppie
  $(document).ready(function() {
    $image_crop = $('#image_demo').croppie({
      enableExif: true,
      viewport: {
        width: 200,
        height: 200,
        type: 'circle'
      },
      boundary: {
        width: 300,
        height: 300
      }
    });

    $('#browse_image').on('change', function() {
      var reader = new FileReader();
      reader.onload = function(event) {
        $image_crop.croppie('bind', {
          url: event.target.result
        }).then(function() {
          console.log('Jquery bind complete')
        })
      }

      reader.readAsDataURL(this.files[0]);
      $('#uploadImageModal').modal('show');
    });


    $('#crop_image').click(function() {
      $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
      }).then(function(image) {

        $.ajax({
          type: "post",
          url: "<?= base_url('Admin_smanar/Profile/update_foto_profile') ?>",
          data: {
            "image": image
          },
          beforeSend: function() {
            $('#crop_image').attr('disable', 'disabled')
            $('#crop_image').html('<i class="fa fa-spin fa-spinner"></i>')
          },
          complete: function() {
            $('#crop_image').removeAttr('disable')
            $('#crop_image').html('Simpan')
          },
          dataType: "json",
          success: function(response) {
            $('#uploadImageModal').modal('hide');

            swal({
              title: 'Berhasil',
              text: response.dump,
              type: 'success',
              confirmButtonClass: 'btn btn-success',
            })

            getDataAdmin();
          }
        });

      })



    })



  });
</script>
<!-- CSS -->
<style>
  .button-edit-camera {
    display: none;
  }

  .edit-button-icon {

    font-size: 15pt;
    color: white;

  }

  .btn-icon:hover {
    cursor: pointer;
  }

  .btn-icon {
    border-radius: 100%;
    padding: 10px 12px;
    background-color: #3fa400;
    position: absolute;
    margin-left: 140px;
    margin-top: 140px;
  }

  .profile_detail {
    text-align: center;
  }

  .jumbotron {
    height: 250px;
    background: url('<?= base_url("Front/assets/img/bg.jpg") ?>');
  }


  .avatar {
    position: relative;
    margin-top: -130px;

  }

  .avatar img {
    border-radius: 100%;
    border: 7px solid white;

    width: 200px;

  }

  .btn-edit {
    border: 1px solid #3fa400;
  }

  .btn-edit:hover {
    background-color: #3fa400;
    color: white;
  }
</style>