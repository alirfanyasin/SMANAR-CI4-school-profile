<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

  <div class="row">
    <div class="col-sm-12">
      <div class="page-title-box">
        <div class="btn-group float-right">
          <ol class="breadcrumb hide-phone p-0 m-0">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Tambah Blog</li>
          </ol>
        </div>
        <h4 class="page-title">Tambah Blog</h4>
      </div>
    </div>
  </div>
  <!-- end page title end breadcrumb -->
  <form action="<?= base_url('Admin_smanar/Blog/save_blog') ?>" method="POST" enctype="multipart/form-data" class="form_add_blog">
    <div class="row " style="margin-bottom: 100px;">

      <div class="col-xl-8  col-12 mb-4 ">
        <div class="card">
          <div class="card-body">
            <textarea name="content_blog" required id="summernote" class="form-control summernote content-blog" rows="50"></textarea>
            <div class="invalid-feedback error_content_blog"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="img" id="image_demo"></div>
            <div id="uploaded_image"></div>
            <div class="thumbnail">
              <strong>Thumbnail</strong>
              <input type="file" class="form-control mb-3" required accept='image/*' name="thumbnail_blog" id="upload_image" onchange='openFile(event)'>
              <div class="invalid-feedback error_thumbnail_blog"></div>

              <strong>Judul</strong>
              <input type="text" class="form-control mb-3" autocomplete="off" required name="judul_blog" placeholder="Judul Blog" id="judul_blog">
              <div class="invalid-feedback error_judul_blog"></div>

              <strong>Kategori</strong>
              <select name="kategori_blog" id="kategori_blog" class="form-control mb-3">
                <option value="Edukasi">Edukasi</option>
                <option value="Prestasi">Prestasi</option>
                <option value="Kegiatan">Kegiatan</option>
                <option value="Kunjungan">Kunjungan</option>
                <option value="Ekstrakulikuler">Ekstrakulikuler</option>
                <option value="Lainnya">Lainnya</option>
              </select>
              <button type="button" class="btn text-white btn-block" id="btn-upload" style="background-color: #3fa400;">Upload Blog</button>
              <!-- <a href="" class="btn text-white btn-block" >Upload Blog</a> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<script>
  // Summernote
  $('#summernote').summernote({
    placeholder: 'Tulislah content blog disini',
    tabsize: 2,
    height: 520,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'italic', 'clear']],
      // ['font family', ['font family']]
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video', "hr"]],
      ['view', ['fullscreen']]
    ],

    callbacks: {
      onImageUpload: function(files) {
        for (let i = 0; i < files.length; i++) {
          $.upload(files[i]);
        }
      },
      onMediaDelete: function(target) {
        $.delete(target[0].src);
      }
    },
  });

  $.upload = function(file) {
    let out = new FormData();
    out.append('file', file, file.name);
    $.ajax({
      method: 'POST',
      url: '<?php echo site_url('Admin_smanar/Blog/upload_image') ?>',
      contentType: false,
      cache: false,
      processData: false,
      data: out,
      success: function(img) {
        $('.summernote').summernote('insertImage', img);
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.error(textStatus + " " + errorThrown);
      }
    });
  };

  $.delete = function(src) {
    $.ajax({
      method: 'POST',
      url: '<?php echo site_url('Admin_smanar/Blog/delete_image') ?>',
      cache: false,
      data: {
        src: src
      },
      success: function(response) {
        console.log(response);
      }

    });
  };




  // Croppie JS
  $(document).ready(function() {

    $image_crop = $('#image_demo').croppie({
      enableExif: true,
      viewport: {
        width: 270,
        height: 190,
        type: 'square'
      },
      boundary: {
        width: 290,
        height: 250
      }
    });

    $('#upload_image').on('change', function() {
      var reader = new FileReader();
      reader.onload = function(event) {
        $image_crop.croppie('bind', {
          url: event.target.result
        }).then(function() {
          console.log('Jquery bind complete')
        })
      }

      reader.readAsDataURL(this.files[0]);
    });






    $('#btn-upload').click(function() {

      $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
      }).then(function(image) {

        var judul = $('#judul_blog').val();
        var kategori = $('#kategori_blog').val();
        var content = $('#summernote').val();



        $.ajax({
          type: "post",
          url: "<?= base_url('Admin_smanar/Blog/save_blog') ?>",

          data: {
            "image": image,
            "judul": judul,
            "kategori": kategori,
            "content": content
          },
          dataType: "json",
          beforeSend: function() {
            $('#btn-upload').attr('disable', 'disabled')
            $('#btn-upload').html('<i class="fa fa-spin fa-spinner"></i>')
          },
          complete: function() {
            $('#btn-upload').removeAttr('disable')
            $('#btn-upload').html('Upload Blog')
          },
          success: function(response) {
            if (response.error) {
              if (response.error.thumbnail_blog) {
                $('#upload_image').addClass('is-invalid');
                $('.error_thumbnail_blog').html(response.error.thumbnail_blog)
              } else {
                $('#upload_image').removeClass('is-invalid');
              }
              if (response.error.judul_blog) {
                $('#judul_blog').addClass('is-invalid');
                $('.error_judul_blog').html(response.error.judul_blog)
              } else {
                $('#judul_blog').removeClass('is-invalid');
              }
              if (response.error.content_blog) {
                $('.content-blog').addClass('is-invalid');
                $('.error_content_blog').html(response.error.content_blog)
              } else {
                $('.content-blog').removeClass('is-invalid');
              }
            } else {
              swal({
                title: 'Berhasil',
                text: response.success,
                type: 'success',
                confirmButtonClass: 'btn btn-success',
              })

              document.location.href = '<?= base_url('Admin_smanar/Blog') ?>'
            }

          }
        });

      })

    })




  })
</script>
<?= $this->endSection() ?>