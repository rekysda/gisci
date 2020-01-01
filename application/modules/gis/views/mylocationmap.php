
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <div class="row">
        <div class="col-lg-12">
            Langitude <?= $langitude ?><br>
            Longitude <?= $longitude ?><br>
            <a href="<?= base_url('gis/mylocation')?>"class="btn btn-info">Kembali</a><br><br>
        <?php echo $map['html']; ?>

</div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->"