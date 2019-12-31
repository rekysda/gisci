
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <div class="row">
        <div class="col-lg-8">
        <?= $this->session->flashdata('message') ?>
        
        <form action="<?php base_url('gis/editLokasi') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="name">Nama*</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								 type="text" name="nama" value="<?= $getlokasi['nama']; ?>"/>
                 <input type="hidden" name="id" value="<?= $getlokasi['id']; ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
              </div>
							<div class="form-group">
								<label for="name">latitude*</label>
								<input class="form-control <?php echo form_error('latitude') ? 'is-invalid':'' ?>"
								 type="text" id="latitude" name="latitude" value="<?= $getlokasi['latitude']; ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('latitude') ?>
								</div>
              </div>
							<div class="form-group">
								<label for="name">longitude*</label>
								<input class="form-control <?php echo form_error('longitude') ? 'is-invalid':'' ?>"
								 type="text" id="longitude" name="longitude" value="<?= $getlokasi['longitude']; ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('longitude') ?>
								</div>
							</div>
							<input class="btn btn-success" type="submit" name="btn" value="Update" />&nbsp; <a href="<?= base_url('gis');?> " class="btn btn-warning">Cancel</a>&nbsp; <a href="<?= base_url('gis/mapmarker');?> " class="btn btn-info">Lihat Peta</a>
            </form>
        </div>
        </div>
        <hr>
         <!-- Page Heading -->
            <div class="row">
              <div class="col-lg-12">
              <?php echo $map['html']; ?>

        </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->