<div class="container-fluid">
   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Resident List</h1>
   <p class="mb-4">
    <a class="btn btn-primary" href="<?= base_url('index.php/dashboard/add-resident') ?>"> <i class="fas fa-user-plus"></i> Add Resident </a>
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
      <th scope="col">Birth Date</th>
      <th scope="col">Birth Place</th>
      <th scope="col">Address</th>
      <th scope="col">Contact #</th>
      <th scope="col">Sex</th>
      <th scope="col">Civil Status</th>
      <th scope="col">Height</th>
      <th scope="col">Weight</th>
      <th scope="col">Blood Type</th>
      <th scope="col">Nationality</th>
      <th scope="col">Religion</th>
      <th scope="col">Email</th>
      <th scope="col">Educational Attainment</th>
      <th scope="col">Occupation</th>
      <th scope="col">Monthly Income</th>
      <th scope="col">Land Owernership Status</th>
      <th scope="col">House Ownership</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php $counter = 1;?>
    <?php foreach($resident_list as $resident):?>
    <tr>
      <td><?= $counter ?></td>
      <td><?= $resident->first_name ?> <?= $resident->middlename ?> <?= $resident->last_name ?> <?= $resident->nameex ?></td>
      <td><?= $resident->birth_date ?></td>
      <td><?= $resident->birthplace ?></td>
      <td><?= $resident->purok ?>,<?= $resident->barangay ?>,<?= $resident->municipality ?>,<?= $resident->province ?></td>
      <td><?= $resident->contact ?></td>
      <td><?= $resident->sex ?></td>
      <td><?= $resident->civil_status ?></td>
      <td><?= $resident->height ?></td>
      <td><?= $resident->weight ?></td>
      <td><?= $resident->btype ?></td>
      <td><?= $resident->nationality ?></td>
      <td><?= $resident->religion ?></td>
      <td><?= $resident->email ?></td>
      <td><?= $resident->educ ?></td>
      <td><?= $resident->occupation ?></td>
      <td><?= $resident->monthly ?></td>
      <td><?= $resident->land ?></td>
      <td><?= $resident->house ?></td>
      <td>
      <button type="button" class="btn btn-primary edit-resident-btn" data-resident="<?= $resident->resident_id ?>">
                           <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-success" data-resident="<?= $resident->resident_id ?>">
                           <i class="fas fa-eye"></i>
                        </button>                      
<button  type="button" class="btn btn-danger  delete-resident-btn" data-resident="<?= $resident->resident_id ?>"><i class="fas fa-trash"></i></button>
    </tr>
    </td>
    </tr>
    <?php $counter++;?>
    <?php endforeach;?>
  </tbody>
</table>
</div>
      </div>
   </div>
</div>
<script>
/* AJAX  */

$(document).on('click','.edit-resident-btn',function(){

  var residentId = this.dataset.resident;

  $.ajax({
      url:'<?= base_url('index.php/dashboard/ajax-update-resident-form') ?>',
      method:'POST',
      data:{
        resident_id: residentId
      },
      success:function(response){
     
            bootbox.dialog({
              title: 'Edit Resident',
              message:' ',
              size: 'extra-large'
            }).find('.bootbox-body').html(response);
      }

    });

});

$(document).on('click','.delete-resident-btn',function(e){

  var residentId = this.dataset.resident;

  bootbox.confirm('Are you sure you want to delete this resident',function(answer){

        if(answer==true){

           window.location = '<?= base_url('index.php/dashboard/delete-resident/') ?>'+residentId;
           
        }

  });


});


</script>