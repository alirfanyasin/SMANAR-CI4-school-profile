<footer class="footer">
  <!-- © 2018 Annex by Mannatthemes. -->
  © Copyright <strong><span>Smanar</span></strong>. All Rights Reserved <?= date('Y') ?>
</footer>

</div>
<!-- End Right content here -->

</div>
<!-- END wrapper -->


<!-- jQuery  -->

<script src="<?= base_url('Back-end/Admin-template') ?>/assets/js/popper.min.js"></script>
<script src="<?= base_url('Back-end/Admin-template') ?>/assets/js/bootstrap.min.js"></script>
<script src="<?= base_url('Back-end/Admin-template') ?>/assets/js/modernizr.min.js"></script>
<script src="<?= base_url('Back-end/Admin-template') ?>/assets/js/detect.js"></script>
<script src="<?= base_url('Back-end/Admin-template') ?>/assets/js/fastclick.js"></script>
<script src="<?= base_url('Back-end/Admin-template') ?>/assets/js/jquery.slimscroll.js"></script>
<script src="<?= base_url('Back-end/Admin-template') ?>/assets/js/jquery.blockUI.js"></script>
<script src="<?= base_url('Back-end/Admin-template') ?>/assets/js/waves.js"></script>
<script src="<?= base_url('Back-end/Admin-template') ?>/assets/js/jquery.nicescroll.js"></script>
<script src="<?= base_url('Back-end/Admin-template') ?>/assets/js/jquery.scrollTo.min.js"></script>

<script src="<?= base_url('Back-end/Admin-template') ?>/assets/plugins/skycons/skycons.min.js"></script>
<script src="<?= base_url('Back-end/Admin-template') ?>/assets/plugins/raphael/raphael-min.js"></script>
<script src="<?= base_url('Back-end/Admin-template') ?>/assets/plugins/morris/morris.min.js"></script>

<script src="<?= base_url('Back-end/Admin-template') ?>/assets/pages/dashborad.js"></script>


<!-- Sweet-Alert  -->
<script src="<?= base_url('Back-end/Admin-template') ?>/assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
<script src="<?= base_url('Back-end/Admin-template') ?>/assets/pages/sweet-alert.init.js"></script>

<!-- Required datatable js -->
<script src="<?= base_url('Back-end/Admin-template') ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('Back-end/Admin-template') ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?= base_url('Back-end/Admin-template') ?>/assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?= base_url('Back-end/Admin-template') ?>/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('Back-end/Admin-template') ?>/assets/plugins/datatables/jszip.min.js"></script>
<script src="<?= base_url('Back-end/Admin-template') ?>/assets/plugins/datatables/pdfmake.min.js"></script>
<script src="<?= base_url('Back-end/Admin-template') ?>/assets/plugins/datatables/vfs_fonts.js"></script>
<script src="<?= base_url('Back-end/Admin-template') ?>/assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="<?= base_url('Back-end/Admin-template') ?>/assets/plugins/datatables/buttons.print.min.js"></script>
<script src="<?= base_url('Back-end/Admin-template') ?>/assets/plugins/datatables/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="<?= base_url('Back-end/Admin-template') ?>/assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?= base_url('Back-end/Admin-template') ?>/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="<?= base_url('Back-end/Admin-template') ?>/assets/pages/datatables.init.js"></script>

<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
<!-- Quild Text Editor -->
<!-- <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script> -->

<!--Summernote js-->
<!-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script> -->

<!-- Croppie JS -->
<script src="<?= base_url('Front/assets/Croppie-2.6.4/croppie.js') ?>"></script>

<!-- App js -->
<script src="<?= base_url('Back-end/Admin-template') ?>/assets/js/app.js"></script>
<script>
  /* BEGIN SVG WEATHER ICON */
  if (typeof Skycons !== 'undefined') {
    var icons = new Skycons({
        "color": "#fff"
      }, {
        "resizeClear": true
      }),
      list = [
        "clear-day", "clear-night", "partly-cloudy-day",
        "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
        "fog"
      ],
      i;

    for (i = list.length; i--;)
      icons.set(list[i], list[i]);
    icons.play();
  };

  // scroll

  $(document).ready(function() {

    $("#boxscroll").niceScroll({
      cursorborder: "",
      cursorcolor: "#cecece",
      boxzoom: true
    });
    $("#boxscroll2").niceScroll({
      cursorborder: "",
      cursorcolor: "#cecece",
      boxzoom: true
    });



  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    // Data Tables
    $('#example').DataTable({
      "scrollX": true
    });
    // $('#datatable').DataTable();
  });
</script>

</body>

</html>