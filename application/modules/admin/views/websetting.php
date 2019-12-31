
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <div class="row">
        <div class="col-lg-6">
        <?= $this->session->flashdata('message') ?>
        <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Is_Active</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; ?>
    <?php foreach($websetting as $ws) : ?>
    <tr>
      <th scope="row"><?= $i;?></th>
      <td><?= $ws['name']; ?></td>
      <td>
        <div class="form-check">
        <input class="form-check-input2" type="checkbox"  <?= 
        check_websetting($ws['name']); ?> 
        data-name="<?= $ws['name']; ?>" data-is_active="<?= $ws['is_active']; ?>"
        >
        </div>
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
