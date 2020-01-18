
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <div class="row">
        <img src="<?= base_url('assets/img/denahrumah.jpg')?>" usemap='#petaku'>
<map name="petaku" id="petaku">
<area  shape="poly" coords="284,75,396,77,396,194,284,192"href="#"title="Kamar Tamu"data-maphilight='{"stroke":false,"fillColor":"ff0000","fillOpacity":1,"alwaysOn":true}' >
<area  shape="poly" coords="401,374,516,380,517,405,398,406"href="#"title="Teras"data-maphilight='{"stroke":false,"fillColor":"ff0000","fillOpacity":1,"alwaysOn":true}' >
</map>
        <div class="col-lg-6">
        <?= $this->session->flashdata('message') ?>
        
        <form action="<?php base_url('gis') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="name">Nama*</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								 type="text" name="nama" value="<?= set_value('nama'); ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Position*</label>
								<input class="form-control <?php echo form_error('position') ? 'is-invalid':'' ?>"
								 type="text"id="position" name="position" value="<?= set_value('position'); ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('position') ?>
								</div>
							</div>
						
							<input class="btn btn-success" type="submit" name="btn" value="Save" />&nbsp; <a href="<?= base_url('gis');?> " class="btn btn-warning">Cancel</a>&nbsp; <a href="<?= base_url('gis/mapmarker');?> " class="btn btn-info">Lihat Peta</a>
            </form>
            <div id="log"></div>
        </div>
</div>
<script>
$(document).ready(function() {
    $("img").on("click", function(event) {
        var x = event.pageX - this.offsetLeft;
        var y = event.pageY - this.offsetTop;
        alert("X,Y Coordinate: " + x + "," + y);
    });
});

</script>
        <hr>
<!-- Page Heading -->
<h1 class="h3 mb-3 text-gray-800">List </h1>
            <div class="row">
              <div class="col-lg-8">
          <div class="table-responsive">        
        <table class="table table-hover"id="dataTable" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Posisi</th>
      <th scope="col" class="text-right">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; ?>
    <?php foreach($ismap as $dt) : ?>
    <tr>
      <th scope="row"><?= $i;?></th>
      <td><?= $dt['nama']; ?></td>
      <td><?= $dt['position']; ?></td>
      <td class="text-right" >
        <a href="<?= base_url('poly/hapusismap/'.$dt['id']); ?>" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...'); " class="btn btn-danger")">delete</a>
     </td>
    </tr>
<?php $i++; ?>
<?php endforeach; ?>
  </tbody>
</table>
          </div>

        </div>

        </div>
         <!-- Page Heading -->      
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->