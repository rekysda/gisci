
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <div class="row">
        <div class="col-lg">
        <?= $this->session->flashdata('message') ?>
        <?php $menu_idv= $getsubmenu['menu_id']; ?> 
        <form action="<?php base_url('menu/submenuedit') ?>" method="post" enctype="multipart/form-data" >
        <div class="form-group">
        <input type="hidden" name="id" value="<?= $getsubmenu['id']; ?>"/>
        <label for="name">Sub Menu*</label>
        <input type="text" class="form-control <?= form_error('title') ? 'is-invalid':'' ?>" id="title"name="title" placeholder="Submenu title" value="<?= $getsubmenu['title']; ?>">
        <div class="invalid-feedback">
									<?= form_error('title') ?>
								</div>
        </div>
        <div class="form-group">
        <label for="name">Menu*</label>
            <select name="menu_id" id="menu_id" class="form-control <?= form_error('menu_id') ? 'is-invalid':'' ?>"> 
            <option value="">== Menu ==</option>
                <?php foreach($menu as $m) : ?>  
             <option value="<?= $m['id']; ?>"<?= $m['id'] == $menu_idv ? ' selected="selected"' : '';?>><?= $m['menu']; ?></option>
                <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">
									<?= form_error('menu_id') ?>
								</div>
        </div>
        <div class="form-group">
        <label for="name">Url*</label>
        <input type="text" class="form-control <?= form_error('url') ? 'is-invalid':'' ?>" id="url"name="url" placeholder="Submenu url" value="<?= $getsubmenu['url']; ?>">
        <div class="invalid-feedback">
									<?= form_error('url') ?>
								</div>
        </div>
        <div class="form-group">
        <label for="name">Icon*</label>
        <input type="text" class="form-control <?= form_error('icon') ? 'is-invalid':'' ?>" id="icon"name="icon" placeholder="Submenu icon" value="<?= $getsubmenu['icon']; ?>">
        <div class="invalid-feedback">
									<?= form_error('icon') ?>
								</div>
        </div>
        <div class="form-group">
        <div class="form-check">
  <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active"
  <?= $getsubmenu['is_active'] == '1' ? 'checked' : '';?> >
  <label class="form-check-label" for="is_active">
    Active?
  </label>
</div>
        
        </div>
							<input class="btn btn-success" type="submit" name="btn" value="Save" />&nbsp; <a href="<?= base_url('menu/submenu');?> " class="btn btn-warning">Cancel</a>
            </form>
            </div>
        </div>
        <hr>
         <!-- Page Heading -->
         <h1 class="h3 mb-3">List </h1>
            <div class="row">
              <div class="col-lg">
        <table class="table table-hover">
  <thead>
    <tr>
    <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Menu</th>
      <th scope="col">Url</th>
      <th scope="col">Icon</th>
      <th scope="col">Active</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    <?php $i=1; ?>
    <?php foreach($subMenu as $sm) : ?>
    <tr>
    <th scope="row"><?= $i;?></th>
    <td><?= $sm['title']; ?></td>
      <td><?= $menu['menu']; ?></td>
      <td><?= $sm['url']; ?></td>
      <td><?= $sm['icon']; ?></td>
      <td><?= $sm['is_active']; ?></td>
      <td>
        <a href="<?= base_url('menu/submenuedit/'.$sm['id']); ?>"class="btn btn-success">edit</a>
        <a href="<?= base_url('menu/submenuhapus/'.$sm['id']); ?>" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...'); " class="btn btn-danger")">delete</a>
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

<!--Modal -->
<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newSubMenuModalLabel">Add New Sub Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu/submenu');?>" method="post">
      <div class="modal-body">
        <div class="form-group">
        <input type="text" class="form-control" id="title"name="title" placeholder="Submenu title">
        </div>
        <div class="form-group">
            <select name="menu_id" id="menu_id"class="form-control">
                <option value="">Select Menu</option>
                <?php foreach($menu as $m) : ?>    
                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
        <input type="text" class="form-control" id="url"name="url" placeholder="Submenu url">
        </div>
        <div class="form-group">
        <input type="text" class="form-control" id="icon"name="icon" placeholder="Submenu icon">
        </div>
        <div class="form-group">
        <div class="form-check">
  <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active"checked>
  <label class="form-check-label" for="is_active">
    Active?
  </label>
</div>
        
        </div>

        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>