
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <div class="row">
        <div class="col-lg-8">
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
								<label for="name">Latitude*</label>
								<input class="form-control <?php echo form_error('latitude') ? 'is-invalid':'' ?>"
								 type="text" name="latitude" value="<?= set_value('latitude'); ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('latitude') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Longitude*</label>
								<input class="form-control <?php echo form_error('longitude') ? 'is-invalid':'' ?>"
								 type="text" name="longitude" value="<?= set_value('longitude'); ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('longitude') ?>
								</div>
							</div>
							<input class="btn btn-success" type="submit" name="btn" value="Save" />&nbsp; <a href="<?= base_url('gis');?> " class="btn btn-warning">Cancel</a>
            </form>
        </div>
        </div>
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
      <th scope="col" class="text-right">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; ?>
    <?php foreach($lokasi as $dt) : ?>
    <tr>
      <th scope="row"><?= $i;?></th>
      <td><?= $dt['nama']; ?></td>
      <td class="text-right" >
        <a href="<?= base_url('gis/editLokasi/'.$dt['id']); ?>"class="btn btn-success">edit</a>
        <a href="<?= base_url('gis/hapusLokasi/'.$dt['id']); ?>" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...'); " class="btn btn-danger")">delete</a>
     </td>
    </tr>
<?php $i++; ?>
<?php endforeach; ?>
  </tbody>
</table>
          </div>

        </div>

        </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->