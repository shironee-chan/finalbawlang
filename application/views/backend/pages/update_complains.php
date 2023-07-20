<!-- Main Content -->
<div id="content">
  <div class="container">
   <h1 class="h3 mb-4">Edit Blotter</h1>
    <form method="POST">
</br> </br> 
    <h2 class="h4 mb-5">Complainants Details</h2>
    <form method="POST" action="<?php echo base_url('index.php/dashboard/update-complains/'.$complains_data->complains_id); ?>"> 
    <div class="form-row">
       
      <div class="form-group col-md-6">
        <label for="fname">Full Name:</label>
        <input type="text" id="fname" name="fname" value="<?php echo $complains_data->fname; ?>" class="form-control" required/>
        <span class="text-danger"><?=form_error('fname')?></span>
      </div>
</div>
      <div class="form-row">
      <div class="form-group col-md-2">
        <label for="purok">Purok:</label>
        <select id="purok" name="purok" value="<?php echo $complains_data->purok; ?>" class="form-control" required>
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
        <select id="barangay" name="barangay" value="<?php echo $complains_data->barangay; ?>" class="form-control" required>
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
        <input type="text" id="municipality" name="municipality" value="<?php echo $complains_data->municipality; ?>" class="form-control" />
        <span class="text-danger"><?=form_error('municipality')?></span>
      </div>
      <div class="form-group col-md-2">
        <label for="province">Province:</label>
        <input type="text" id="province" name="province" value="<?php echo $complains_data->province; ?>" class="form-control" required/>
        <span class="text-danger"><?=form_error('province')?></span>
      </div>
      </div>
      <div class="form-row">
      <div class="form-group col-md-2">
        <label for="country">Country:</label>
        <input type="text" id="country" name="country" value="<?php echo $complains_data->country; ?>" class="form-control" required/>
        <span class="text-danger"><?=form_error('country')?></span>
      </div>
      <div class="form-group col-md-2">
        <label for="nationality">Nationality:</label>
        <input type="text" id="nationality" name="nationality" value="<?php echo $complains_data->nationality; ?>" class="form-control" required/>
        <span class="text-danger"><?=form_error('nationality')?></span>
      </div>
      <div class="form-group col-md-2">
        <label for="age">Age:</label>
        <input type="text" id="age" name="age" value="<?php echo $complains_data->age; ?>" class="form-control" required/>
        <span class="text-danger"><?=form_error('age')?></span>
      </div>
      <div class="form-group col-md-2">
        <label for="sex">Sex:</label>
        <select id="sex" name="sex" value="<?php echo $complains_data->sex; ?>" class="form-control" required>
        <option value="">-- Select Sex --</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
        <span class="text-danger"><?=form_error('sex')?></span>
      </div>
</div>
<div class="form-row">
      <div class="form-group col-md-4">
        <label for="contact">Contact #:</label>
        <input type="text" id="contact" name="contact" value="<?php echo $complains_data->contact; ?>" class="form-control" required/>
        <span class="text-danger"><?=form_error('contact')?></span>
      </div>
      <div class="form-group col-md-4">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo $complains_data->email; ?>" class="form-control" required/>
        <span class="text-danger"><?=form_error('email')?></span>
      </div>
</div>
</br> </br> 
    <h2 class="h4 mb-5">Complainee Details</h2>
        <div class="form-row">
       
      <div class="form-group col-md-2">
        <label for="f_name">First Name:</label>
        <input type="text" id="f_name" name="f_name" value="<?php echo $complains_data->f_name; ?>" class="form-control" required/>
        <span class="text-danger"><?=form_error('f_name')?></span>
      </div>
      <div class="form-group col-md-2">
        <label for="m_name">Middle Name:</label>
        <input type="text" id="m_name" name="m_name" value="<?php echo $complains_data->m_name; ?>" class="form-control" required/>
        <span class="text-danger"><?=form_error('m_name')?></span>
      </div>
      <div class="form-group col-md-2">
        <label for="l_name">Last Name:</label>
        <input type="text" id="l_name" name="l_name" value="<?php echo $complains_data->l_name; ?>" class="form-control" required/>
        <span class="text-danger"><?=form_error('l_name')?></span>
      </div>
      <div class="form-group col-md-2">
        <label for="name_ex">Name Extension:</label>
        <input type="text" id="name_ex" name="name_ex" value="<?php echo $complains_data->name_ex; ?>" class="form-control" />
        <span class="text-danger"><?=form_error('name_ex')?></span>
      </div>
</div>
      <div class="form-row">
      <div class="form-group col-md-2">
        <label for="prk">Purok:</label>
        <select id="prk" name="prk" value="<?php echo $complains_data->prk; ?>" class="form-control" required>
        <option value="">-- Select Purok --</option>
          <option value="Purok 1">Purok 1</option>
          <option value="Purok 2">Purok 2</option>
          <option value="Purok 3">Purok 3</option>
          <option value="Purok 4">Purok 4</option>
          <option value="Purok 5">Purok 5</option>
          <option value="Purok 6">Purok 6</option>
          <option value="Purok 7">Purok 7</option>
</select>
<span class="text-danger"><?=form_error('prk')?></span>
      </div>
      <div class="form-group col-md-2">
        <label for="brgy">Barangay:</label>
        <select id="brgy" name="brgy" value="<?php echo $complains_data->brgy; ?>" class="form-control" required>
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
        <span class="text-danger"><?=form_error('brgy')?></span>
      </div>
      <div class="form-group col-md-2">
        <label for="mun">Municipality:</label>
        <input type="text" id="mun" name="mun" value="<?php echo $complains_data->mun; ?>" class="form-control" />
        <span class="text-danger"><?=form_error('mun')?></span>
      </div>
      <div class="form-group col-md-2">
        <label for="prov">Province:</label>
        <input type="text" id="prov" name="prov" value="<?php echo $complains_data->prov; ?>" class="form-control" required/>
        <span class="text-danger"><?=form_error('prov')?></span>
      </div>
      </div>
      <div class="form-row">
      <div class="form-group col-md-2">
        <label for="count">Country:</label>
        <input type="text" id="count" name="count" value="<?php echo $complains_data->count; ?>" class="form-control" required/>
        <span class="text-danger"><?=form_error('count')?></span>
      </div>
      <div class="form-group col-md-2">
        <label for="nation">Nationality:</label>
        <input type="text" id="nation" name="nation" value="<?php echo $complains_data->nation; ?>" class="form-control" required/>
        <span class="text-danger"><?=form_error('nation')?></span>
      </div>
      <div class="form-group col-md-2">
        <label for="ag">Age:</label>
        <input type="text" id="ag" name="ag" value="<?php echo $complains_data->ag; ?>" class="form-control" required/>
        <span class="text-danger"><?=form_error('ag')?></span>
      </div>
      <div class="form-group col-md-2">
        <label for="sx">Sex:</label>
        <select id="sx" name="sx" value="<?php echo $complains_data->sx; ?>" class="form-control" required>
        <option value="">-- Select Sex --</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
        <span class="text-danger"><?=form_error('sx')?></span>
      </div>
</div>
<div class="form-row">
      <div class="form-group col-md-4">
        <label for="con">Contact #:</label>
        <input type="text" id="con" name="con" value="<?php echo $complains_data->con; ?>" class="form-control" required/>
        <span class="text-danger"><?=form_error('con')?></span>
      </div>
      <div class="form-group col-md-4">
        <label for="em">Email:</label>
        <input type="text" id="em" name="em" value="<?php echo $complains_data->em; ?>" class="form-control" required/>
        <span class="text-danger"><?=form_error('em')?></span>
      </div>
</div>
<div class="form-row">
      <div class="form-group col-md-2">
      <label for="act">Action Taken:</label>
      <select id="act" name="act" class="form-control" required>
      <option value="">-- Select Option --</option>
          <option value="1st Option">1st Option</option>
          <option value="2nd Option">2nd Option</option>
          <option value="3rd Option">3rd Option</option>
        </select>
        <span class="text-danger"><?=form_error('act')?></span>
      </div>
      <div class="form-group col-md-2">
      <label for="stat">Status:</label>
      <select id="stat" name="stat" class="form-control" required>
      <option value="">-- Select Status --</option>
          <option value="Solved">Solved</option>
          <option value="Unsolve">Unsolve</option>
        </select>
        <span class="text-danger"><?=form_error('stat')?></span>
      </div>
      <div class="form-group col-md-4">
      <label for="loc">Location of Incidence:</label>
        <input type="loc" id="loc" name="loc" class="form-control" required/>
        <span class="text-danger"><?=form_error('loc')?></span>
      </div>
      </div>
<div class="form-group text-center">
                <button class="btn btn-primary" onclick="showNotification()">Add Complains</button>
            </div>
        </form>
    </div>
</div>