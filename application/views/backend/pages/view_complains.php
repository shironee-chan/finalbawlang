<div class="container-fluid">
   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Blotter List</h1>
   <p class="mb-4">
    <a class="btn btn-primary" href="<?= base_url('index.php/dashboard/add-complains') ?>"> <i class="fas fa-plus"></i>Add Complains </a>
   </p>
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">List</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
        <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Full Name</th>
      <th scope="col">Address</th>
      <th scope="col">Nationality</th>
      <th scope="col">Age</th>      
      <th scope="col">Sex</th>
      <th scope="col">Contact #</th>
      <th scope="col">Email</th>
      <th scope="col">Full Name</th>
      <th scope="col">Address</th>
      <th scope="col">Nationality</th>
      <th scope="col">Age</th>      
      <th scope="col">Sex</th>
      <th scope="col">Contact #</th>
      <th scope="col">Email</th>
      <th scope="col">Action Taken</th>
      <th scope="col">Status</th>
      <th scope="col">Location of Incidence</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($complains_list as $complains):?>
    <tr>
      <th scope="row"><?= $complains->complains_id ?></th>
      <td><?= $complains->fname ?></td>
      <td><?= $complains->purok ?>,<?= $complains->barangay ?>,<?= $complains->municipality ?>,<?= $complains->province ?>,<?= $complains->country ?></td>
      <td><?= $complains->nationality ?></td>
      <td><?= $complains->age ?></td>
      <td><?= $complains->sex ?></td>
      <td><?= $complains->contact ?></td>
      <td><?= $complains->email ?></td>
      <td><?= $complains->f_name ?> <?= $complains->m_name ?> <?= $complains->l_name ?> <?= $complains->name_ex ?></td>
      <td><?= $complains->prk ?>,<?= $complains->brgy ?>,<?= $complains->mun ?>,<?= $complains->prov ?>,<?= $complains->count ?></td>
      <td><?= $complains->nation ?></td>
      <td><?= $complains->ag ?></td>
      <td><?= $complains->sx ?></td>
      <td><?= $complains->con ?></td>
      <td><?= $complains->em ?></td>
      <td><?= $complains->act ?></td>
      <td><?= $complains->stat ?></td>
      <td><?= $complains->loc ?></td>

      <td>
<button type="button" class="btn btn-primary edit-complains-btn" data-complains="<?= $complains->complains_id ?>">
                           <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-success" data-complains="<?= $complains->complains_id ?>">
                           <i class="fas fa-eye"></i>
                        </button>                      
<button  type="button" class="btn btn-danger  delete-complains-btn" data-complains="<?= $complains->complains_id ?>"><i class="fas fa-trash"></i></button>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
</div>
      </div>
   </div>
</div>

<script>

   /* AJAX  */

    $(document).on('click','.edit-complains-btn',function(){

      var complainsId = this.dataset.complains;

      $.ajax({
          url:'<?= base_url('index.php/dashboard/ajax-update-complains-form') ?>',
          method:'POST',
          data:{
            complains_id: complainsId
          },
          success:function(response){
         
                bootbox.dialog({
                  title: 'Edit Blotter',
                  message:' ',
                  size: 'extra-large'
                }).find('.bootbox-body').html(response);
          }

        });

    });

    $(document).on('click','.delete-complains-btn',function(e){

      var complainsId = this.dataset.complains;

      bootbox.confirm('Are you sure you want to delete this complains',function(answer){

            if(answer==true){

               window.location = '<?= base_url('index.php/dashboard/delete-complains/') ?>'+complainsId;
               
            }

      });


   });

    

</script>