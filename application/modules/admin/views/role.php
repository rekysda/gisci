
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <div class="row">
        <div class="col-lg-6">
        <?= $this->session->flashdata('message') ?>
        <form action="<?php base_url('admin/role') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="name">Role*</label>
								<input class="form-control <?= form_error('role') ? 'is-invalid':'' ?>"
								 type="text" name="role" value="<?= set_value('role'); ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('role') ?>
								</div>
							</div>
							<input class="btn btn-success" type="submit" name="btn" value="Save" />&nbsp; <a href="<?= base_url('admin/role');?> " class="btn btn-warning">Cancel</a>
            </form>
        </div>
        </div>
<hr>
<!-- Page Heading -->
<h1 class="h3 mb-3 text-gray-800">List </h1>
            <div class="row">
              <div class="col-lg">
          <div class="table-responsive">        
        <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Role</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; ?>
    <?php foreach($role as $r) : ?>
    <tr>
      <th scope="row"><?= $i;?></th>
      <td><?= $r['role']; ?></td>
      <td>
        <a href="<?= base_url('admin/roleaccess/').$r['id']; ?>"class="btn btn-warning">access</a>
        <a href="<?= base_url('admin/roleedit/').$r['id']; ?>"class="btn btn-success">edit</a>
        <a href="<?= base_url('admin/roledelete/').$r['id']; ?>" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...'); "class="btn btn-danger">delete</a>
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
