<div class="row gy-4">
  <?php foreach ($data as $dajump) : ?>
    <div class="col-lg-3 col-md-6">
      <div class="count-box">
        <i class="bi bi-people" style="color: #15be56;"></i>
        <div>
          <span data-purecounter-start="0" data-purecounter-end="90" data-purecounter-duration="1" class="purecounter" style="color: gray;"><?= $dajump['jumlah'] ?></span>
          <p><?= $dajump['penghuni'] ?></p>
        </div>
      </div>
    </div>
  <?php endforeach; ?>

</div>