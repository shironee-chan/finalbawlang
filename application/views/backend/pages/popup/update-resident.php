<!-- Main Content 
<div id="content">
<div class="container">
<h1>Edit Resident</h1>

<?php echo validation_errors(); ?>
    <form method="post" action="<?php echo base_url('index.php/dashboard/update-resident/'.$resident_data->resident_id); ?>">
    <div class="form-group">
        <label> First Name </label>
        <input type="text" value="<?php echo $resident_data->first_name; ?>" name="first_name" class="form-control"/>
        <span><?= form_error('firstname') ?></span>
</div>

<div class="form-group">
        <label> Last Name </label>
        <input type="text" value="<?php echo $resident_data->last_name; ?>" name="last_name" class="form-control"/>
        <span><?= form_error('lastname') ?></span>
</div>

<div class="form-group">
        <label> Birth Date </label>
        <input type="date" value="<?php echo $resident_data->birth_date; ?>" name="birth_date" class="form-control"/>
        <span><?= form_error('birth_date') ?></span>
</div>
<div class="form-group">
    <butaton type="button" name="updatebtn" class="btn btn-primary"> Update Resident </button>
</div>
</form>
</div>
</div>-->

<!-- Main Content -->
<div id="content">
    <div class="container">
        <br>
        <br>
        <br>
        <h1 class="text-center">EDIT RESIDENT INFORMATION</h2>
        <br>
        <br>
<?php echo validation_errors();?>
        <form method="post" action="<?php echo base_url('index.php/dashboard/update-resident/'.$resident_data->resident_id); ?>">
            <div class="form-row">
            <div class="form-group col-md-2">
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" value="<?php echo $resident_data->first_name; ?>" id="firstname" class="form-control" required/>
        <span class="text-danger"><?=form_error('firstname')?></span>
      </div>
      <div class="form-group col-md-2">
        <label for="middlename">Middle Name:</label>
        <input type="text" id="middlename" name="middlename" value="<?php echo $resident_data->middlename; ?>" id="middlename" class="form-control" required/>
        <span class="text-danger"><?=form_error('middlename')?></span>
      </div>
      <div class="form-group col-md-2">
        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" value="<?php echo $resident_data->last_name; ?>" id="lastname" class="form-control" required/>
        <span class="text-danger"><?=form_error('lastname')?></span>
      </div>
      <div class="form-group col-md-2">
        <label for="nameex">Name Extension:</label>
        <input type="text" id="nameex" name="nameex" value="<?php echo $resident_data->nameex; ?>" id="nameex" class="form-control" />
        <span class="text-danger"><?=form_error('nameex')?></span>
      </div>
</div>
<div class="form-row">
      <div class="form-group col-md-4">
        <label for="birth_date">Birth Date:</label>
        <input type="date" id="birth_date" name="birth_date" value="<?php echo $resident_data->birth_date; ?>" id="birth_date" class="form-control" required/>
        <span class="text-danger"><?=form_error('birth_date')?></span>
      </div>
      <div class="form-group col-md-4">
        <label for="birth_date">Birth Place:</label>
        <input type="text" id="birthplace" name="birthplace" value="<?php echo $resident_data->birthplace; ?>" id="birthplace" class="form-control" required/>
        <span class="text-danger"><?=form_error('birthplace')?></span>
      </div>
</div>
      <div class="form-row">
      <div class="form-group col-md-2">
        <label for="purok">Purok:</label>
        <select id="purok" name="purok" value="<?php echo $resident_data->purok; ?>" id="purok" class="form-control" required>
        <option value="">-- Select Purok --</option>
          <option value="Purok 1">Purok 1</option>
          <option value="Purok 2">Purok 2</option>
          <option value="Purok 3">Purok 3</option>
          <option value="Purok 4">Purok 4</option>
          <option value="Purok 5">Purok 5</option>
          <option value="Purok 6">Purok 6</option>
          <option value="Purok 7">Purok 7</option>
</select>
<span class="text-danger"><?=form_error('purok')?></span>
      </div>
      <div class="form-group col-md-2">
        <label for="barangay">Barangay:</label>
        <select id="barangay" name="barangay" value="<?php echo $resident_data->barangay; ?>" id="barangay" class="form-control" required>
        <option value="">-- Select Barangay --</option>
          <option value="Agsoso">Agsoso</option>
          <option value="Badbad Occidental">Badbad Occidental</option>
          <option value="Badbad Oriental">Badbad Oriental</option>
          <option value="Bagacay Katipunan">Bagacay Katipunan</option>
          <option value="Bagacay Saong">Bagacay Saong</option>
          <option value="Bahi">Bahi</option>
          <option value="Basac">Basac</option>
          <option value="Basdacu">Basdacu</option>
          <option value="Basdio">Basdio</option>
          <option value="Biasong">Biasong</option>
          <option value="Bongco">Bongco</option>
          <option value="Bugho">Bugho</option>
          <option value="Cabacongan">Cabacongan</option>
          <option value="Cabadug">Cabadug</option>
          <option value="Cabug">Cabug</option>
          <option value="Calayugan Norte">Calayugan Norte</option>
          <option value="Canmaag">Canmaag</option>
          <option value="Cambaquiz">Cambaquiz</option>
          <option value="Campatud">Campatud</option>
          <option value="Candaigan">Candaigan</option>
          <option value="Canhangdon Occidental">Canhangdon Occidental</option>
          <option value="Canhangdon Oriental">Canhangdon Oriental</option>
          <option value="Canigaan">Canigaan</option>
          <option value="Canmanoc">Canmanoc</option>
          <option value="Cansuagwit">Cansuagwit</option>
          <option value="Cansubayon">Cansubayon</option>
          <option value="Catagbacan Handig">Catagbacan Handig</option>
          <option value="Catagbacan Norte">Catagbacan Norte</option>
          <option value="Catagbacan Sur">Catagbacan Sur</option>
          <option value="Cantam-is Bago">Cantam-is Bago</option>
          <option value="Cantaongon">Cantaongon</option>
          <option value="Cantumocad">Cantumocad</option>
          <option value="Cantam-is Baslay">Cantam-is Baslay</option>
          <option value="Cogon Norte (Pob.)">Cogon Norte (Pob.)</option>
          <option value="Cogon Sur">Cogon Sur</option>
          <option value="Cuasi">Cuasi</option>
          <option value="Genomoan">Genomoan</option>
          <option value="Lintuan">Lintuan</option>
          <option value="Looc">Looc</option>
          <option value="Mocpoc Norte">Mocpoc Norte</option>
          <option value="Mocpoc Sur">Mocpoc Sur</option>
          <option value="Nagtuang">Nagtuang</option>
          <option value="Napo (Pob.)">Napo (Pob.)</option>
          <option value="Nueva Vida">Nueva Vida</option>
          <option value="Panangquilon">Panangquilon</option>
          <option value="Pantudlan">Pantudlan</option>
          <option value="Pig-ot">Pig-ot</option>
          <option value="Moto Norte (Pob.)">Moto Norte (Pob.)</option>
          <option value="Moto Sur (Pob.)">Moto Sur (Pob.)</option>
          <option value="Pondol">Pondol</option>
          <option value="Quinobcoban">Quinobcoban</option>
          <option value="Sondol">Sondol</option>
          <option value="Song-on">Song-on</option>
          <option value="Talisay">Talisay</option>
          <option value="Tan-awan">Tan-awan</option>
          <option value="Tangnan">Tangnan</option>
          <option value="Taytay">Taytay</option>
          <option value="Ticugan">Ticugan</option>
          <option value="Tiwi">Tiwi</option>
          <option value="Tontonan">Tontonan</option>
          <option value="Tubodacu">Tubodacu</option>
          <option value="Tubodio">Tubodio</option>
          <option value="Tubuan">Tubuan</option>
          <option value="Ubayon">Ubayon</option>
          <option value="Ubojan">Ubojan</option>
        </select>
        <span class="text-danger"><?=form_error('barangay')?></span>
      </div>
      <div class="form-group col-md-2">
        <label for="municipality">Municipality:</label>
        <input type="text" id="municipality" name="municipality" value="<?php echo $resident_data->municipality; ?>" id="municipality" class="form-control" required/>
        <span class="text-danger"><?=form_error('municipality')?></span>
      </div>
      <div class="form-group col-md-2">
        <label for="province">Province:</label>
        <input type="text" id="province" name="province" value="<?php echo $resident_data->province; ?>" id="province" class="form-control" required/>
        <span class="text-danger"><?=form_error('province')?></span>
      </div>
      </div>
      <div class="form-row">
      <div class="form-group col-md-2">
        <label for="sex">Sex:</label>
        <select id="sex" name="sex" value="<?php echo $resident_data->sex; ?>" id="sex" class="form-control" required>
        <option value="">-- Select Sex --</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
        <span class="text-danger"><?=form_error('sex')?></span>
      </div>
      <div class="form-group col-md-2">
        <label for="civil_status">Civil Status:</label>
        <select id="civil_status" name="civil_status" value="<?php echo $resident_data->civil_status; ?>" id="civil_status" class="form-control" required>
        <option value="">-- Select Civil Status --</option>
          <option value="Single">Single</option>
          <option value="Married">Married</option>
          <option value="Separated">Separated</option>
          <option value="Divorced">Divorced</option>
          <option value="Widowed">Widowed</option>
        </select>
        <span class="text-danger"><?=form_error('civil_status')?></span>
      </div>
      <div class="form-group col-md-1">
        <label for="height">Height:</label>
        <input type="text" id="height" name="height" value="<?php echo $resident_data->height; ?>" id="height" class="form-control" required/>
        <span class="text-danger"><?=form_error('height')?></span>
      </div>
      <div class="form-group col-md-1">
        <label for="weight">Weight:</label>
        <input type="text" id="weight" name="weight" value="<?php echo $resident_data->weight; ?>" id="weight" class="form-control" required/>
        <span class="text-danger"><?=form_error('weight')?></span>
      </div>
      <div class="form-group col-md-2">
        <label for="btype">Blood Type:</label>
        <select id="btype" name="btype" value="<?php echo $resident_data->btype; ?>" id="btype" class="form-control" required>
        <option value="">-- Select Blood Type --</option>
          <option value="A+">A+</option>
          <option value="A-">A-</option>
          <option value="B+">B+</option>
          <option value="B-">B-</option>
          <option value="O+">O+</option>
          <option value="O-">O-</option>
          <option value="AB+">AB+</option>
          <option value="AB-">AB-</option>
</select>
        <span class="text-danger"><?=form_error('btype')?></span>
      </div>
</div>
<div class="form-row">
      <div class="form-group col-md-2">
        <label for="nationality">Nationality:</label>
        <input type="text" id="nationality" name="nationality" value="<?php echo $resident_data->nationality; ?>" id="nationality" class="form-control" required/>
        <span class="text-danger"><?=form_error('nationality')?></span>
      </div>
      <div class="form-group col-md-2">
        <label for="religion">Religion:</label>
        <input type="text" id="religion" name="religion" value="<?php echo $resident_data->religion; ?>" id="religion" class="form-control" required/>
        <span class="text-danger"><?=form_error('religion')?></span>
      </div>
      <div class="form-group col-md-2">
        <label for="contact">Contact #:</label>
        <input type="text" id="contact" name="contact" value="<?php echo $resident_data->contact; ?>" id="contact" class="form-control" required/>
        <span class="text-danger"><?=form_error('contact')?></span>
      </div>
      <div class="form-group col-md-2">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $resident_data->email; ?>" id="email" class="form-control" required/>
        <span class="text-danger"><?=form_error('email')?></span>
      </div>
</div>
<div class="form-row">
<div class="form-group col-md-2">
        <label for="educ">Educational Attainment:</label>
        <select id="educ" name="educ" value="<?php echo $resident_data->educ; ?>" class="form-control" required>
        <option value="">-- Select Educational Attainment --</option>
          <option value="No schooling completed">No schooling completed</option>
          <option value="Elementary Graduate">Elementary Graduate</option>
          <option value="Elementary Undergraduate">Elementary Undergraduate</option>
          <option value="Highschool Graduate">Highschool Graduate</option>
          <option value="Highschool Undergraduate">Highschool Undergraduate</option>
          <option value="College Graduate">College Graduate</option>
          <option value="College Undergraduate">College Undergraduate</option>
          <option value="Vocational">Vocational</option>
          <option value="Bachelor's Degree">Bachelor's Degree</option>
          <option value="Master Degree">Master Degree</option>
          <option value="Doctorate Degree">Doctorate Degree</option>
</select>
        <span class="text-danger"><?=form_error('educ')?></span>
      </div>
      <div class="form-group col-md-2">
        <label for="occupation">Occupation:</label>
        <input type="occupation" id="occupation" name="occupation" value="<?php echo $resident_data->occupation; ?>" class="form-control" required/>
        <span class="text-danger"><?=form_error('occupation')?></span>
      </div>
      <div class="form-group col-md-2">
        <label for="monthly">Monthly Income:</label>
        <input type="monthly" id="monthly" name="monthly" value="<?php echo $resident_data->monthly; ?>" class="form-control" required/>
        <span class="text-danger"><?=form_error('monthly')?></span>
      </div>
</div>
<div class="form-row">
      <div class="form-group col-md-4">
        <label for="land">Land Ownership Status:</label>
        <select id="land" name="land" value="<?php echo $resident_data->land; ?>" class="form-control" required>
        <option value="">-- Select Ownership Status --</option> 
        <option value="Owned">Owned</option>
          <option value="Landless">Landless</option>
          <option value="Tenant">Tenant</option>
          <option value="Caretaker">Caretaker</option>
        </select>
        <span class="text-danger"><?=form_error('land')?></span>
      </div>
      <div class="form-group col-md-4">
        <label for="house">House Ownership:</label>
        <select id="house" name="house" value="<?php echo $resident_data->house; ?>" class="form-control" required>
        <option value="">-- Select Ownership Status --</option>
          <option value="Own House">Own House</option>
          <option value="Renting">Renting</option>
          <option value="Living with Parents">Living with Parents</option>
        </select>
        <span class="text-danger"><?=form_error('house')?></span>
      </div>
      </div>
            <div class="form-group text-center">
            <button class="btn btn-primary" onclick="showNotification()">Save</button>
            </div>
        </form>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>