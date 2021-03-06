
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <div class="row">
        <div class="col-lg-8">
        <?= $this->session->flashdata('message') ?>
        <?php $role_idv= set_value('role_id'); ?> 
        <form action="<?php base_url('admin/userlogin') ?>" method="post" enctype="multipart/form-data" >
        <div class="form-group">
								<label for="name">Username*</label>
								<input class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>"
								 type="text" name="username" value="<?= set_value('username'); ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('username') ?>
								</div>
							</div>
            	<div class="form-group">
								<label for="name">Email*</label>
								<input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>"
								 type="text" name="email" value="<?= set_value('email'); ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('email') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Password*</label>
								<input class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>"
								 type="text" name="password" value=""/>
								<div class="invalid-feedback">
									<?php echo form_error('password') ?>
								</div>
							</div>
              <div class="form-group">
        <label for="role_id">Role*</label>
            <select name="role_id" id="role_id" class="form-control <?= form_error('role_id') ? 'is-invalid':'' ?>"> 
            <option value="">== Role ==</option>
                <?php foreach($role as $r) : ?>  
             <option value="<?= $r['id']; ?>"<?= $r['id'] == $role_idv ? ' selected="selected"' : '';?>><?= $r['role']; ?></option>
                <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">
									<?= form_error('role_id') ?>
								</div>
        </div>
							<div class="form-group">
								<label for="name">Full Name*</label>
								<input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
								 type="text" name="name" value="<?= set_value('name'); ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
							</div>
              <div class="form-group">
        <div class="form-check">
  <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active"checked>
  <label class="form-check-label" for="is_active">
    Active?
  </label>
</div></div>
							<input class="btn btn-success" type="submit" name="btn" value="Save" />&nbsp; <a href="<?= base_url('admin/userlogin');?> " class="btn btn-warning">Cancel</a>
            </form>
        </div>
        </div>
        <hr>
         <!-- Page Heading -->
         <h1 class="h3 mb-3 text-gray-800">List </h1>
            <div class="row">
              <div class="col-lg">
          <div class="table-responsive">        
        <table class="table table-hover"id="dataTable" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username<br>Email</th>
      <th scope="col">Full Name</th>
      <th scope="col">Role</th>
      <th scope="col">Is Active</th>  
      <th scope="col">Image</th>      
      <th scope="col" class="text-right">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; ?>
    <?php foreach($userlogin as $u) : ?>
    <tr>
      <th scope="row"><?= $i;?></th>
      <td><?= $u['username']; ?><br><?= $u['email']; ?></td>
      <td><?= $u['name']; ?></td>
      <td><?= $u['role']; ?></td>
      <td><?= $u['is_active']; ?></td>
      <td><img  width="40" src="<?= base_url('assets/img/profile/').$u['image']; ?>"></td>
      <td class="text-right" >
      <a href="<?= base_url('admin/userdelete/'.$u['id']); ?>" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...'); " class="btn btn-danger")">delete</a>&nbsp;&nbsp;
        <a href="<?= base_url('admin/useredit/'.$u['id']); ?>"class="btn btn-success">edit</a>
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