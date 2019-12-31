
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <div class="row">
        <div class="col-lg-8">
        <?= $this->session->flashdata('message') ?>
        
        <form action="<?php base_url('menu/editMenu') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="name">Menu*</label>
								<input class="form-control <?php echo form_error('menu') ? 'is-invalid':'' ?>"
								 type="text" name="menu" value="<?= $getmenu['menu']; ?>"/>
                 <input type="hidden" name="id" value="<?= $getmenu['id']; ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('menu') ?>
								</div>
							</div>
							<input class="btn btn-success" type="submit" name="btn" value="Update" />&nbsp; <a href="<?= base_url('menu');?> " class="btn btn-warning">Cancel</a>
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
      <th scope="col">Menu</th>
      <th scope="col" class="text-right">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; ?>
    <?php foreach($menu as $m) : ?>
    <tr>
      <th scope="row"><?= $i;?></th>
      <td><?= $m['menu']; ?></td>
      <td class="text-right" >
        <a href="<?= base_url('menu/editMenu/'.$m['id']); ?>"class="btn btn-success">edit</a>
        <a href="<?= base_url('menu/hapusMenu/'.$m['id']); ?>" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...'); " class="btn btn-danger">delete</a>
     </td>
    </tr>
<?php $i++; ?>
<?php endforeach; ?>
  </tbody>
</table>
          </div>

        </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->