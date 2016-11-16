
<div class="row">
  <div class="col-md-3">

   </div>
  	<div class="col-md-6">
		<form action="" method="post" class="form-horizontal form-group">
			<fieldset>
				<legend>Ajout d'un étudiant</legend>
				<input class="form-control" type="text" name="studentName" value="" placeholder="Nom">*<br />
				<span class="error"><?php echo $nomError;?></span>
	  			<br>
				<input class="form-control" type="text" name="studentFirstname" value="" placeholder="Prénom">*<br />
				<span class="error"> <?php echo $prenomError;?></span>
	  			<br>
				<input class="form-control" type="email" name="studentEmail" value="" placeholder="E-mail">*<br />
				<span class="error"> <?php echo $emailError;?></span>
	  			<br>
				<input class="form-control" type="date" name="studentBirhtdate" value="" placeholder="Date de naissance (aaaa-mm-jj)">*<br />
				<span class="error"> <?php echo $birthdateError;?></span>
	  			<br>
				Ville de résidence :<br />
				<select class="form-control" name="cit_id">
					<option value="0">choisissez :</option>
					<?php foreach ($citiesList as $key=>$value) :?>
					<option value="<?= $key ?>"><?= $value ?></option>
					<?php endforeach; ?>
				</select>*<br />
				<span class="error"> <?php echo $citIdError;?></span>
	  			<br>
				Nationalité :<br />
				<select class="form-control" name="cou_id">
					<option value="0">choisissez :</option>
					<?php foreach ($countriesList as $key=>$value) :?>
					<option value="<?= $key ?>"><?= $value ?></option>
					<?php endforeach; ?>
				</select>*<br />
				<span class="error"> <?php echo $couIdError;?></span>
	  			<br>
				Sympathie :<br />
				<select class="form-control" name="stu_friendliness">
					<option value="">choisissez :</option>
					<?php foreach ($friendlinessList as $key=>$value) :?>
					<option value="<?= $key ?>"><?= $value ?></option>
					<?php endforeach; ?>
				</select><br />
				<span class="error"> <?php echo $sympathieError;?></span>
	  			<br>
				<input type="submit" value="Valider" align="center" class="btn btn-success btn-block" ><br />
			</fieldset>
		</form>
		<br>
	</div>
  <div class="col-md-3 "></div>
</div>