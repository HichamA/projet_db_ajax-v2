
<div class="row">
  <div class="col-md-3">

   </div>
  	<div class="col-md-6">
		<form action="" method="post" class="form-horizontal form-group" enctype="multipart/form-data">
		<?php if (isset($studentInfo) && sizeof($studentInfo) > 0) : ?>
			<fieldset>
			<?php foreach ($studentInfo as $info) : ?>
				<legend>Modifier les information de <?= $value['stu_fname']. ' '.$value['stu_lname'] ?>
				</legend>
				<input type="hidden" name="submitFile" value="1" />
				<input class="form-control" type="text" name="studentName" value="<?= $info['stu_lname'] ?>" placeholder="Nom">*
				<span class="error"><?php echo $nomError;?></span>
	  			<br/><br/>
				<input class="form-control" type="text" name="studentFirstname" value="<?= $info['stu_fname'] ?>" placeholder="Prénom">*
				<span class="error"> <?php echo $prenomError;?></span>
	  			<br/><br/>
				<input class="form-control" type="email" name="studentEmail" value="<?= $info['stu_email'] ?>" placeholder="E-mail">*
				<span class="error"> <?php echo $emailError;?></span>
	  			<br/><br/>
				<input class="form-control" type="date" name="studentBirhtdate" value="" placeholder="Date de naissance (aaaa-mm-jj)">*
				<span class="error"> <?php echo $birthdateError;?></span>
	  			<br/><br/>
				Ville de résidence :<br />
				<select class="form-control" name="cit_id">
					<option value="">choisissez :</option>
					<?php foreach ($citiesList as $key=>$value) :?>
					<option  value="<?= $key ?>"
					<?php
						if ($info['cit_id'] == $key) {
							echo ' selected="selected" ';
						}
					?>
					><?= $value ?></option>
					<?php endforeach; ?>
				</select>*
				<span class="error"> <?php echo $citIdError;?></span>
	  			<br/><br/>
				Nationalité :<br />
				<select class="form-control" name="cou_id">
					<option value="">choisissez :</option>
					<?php foreach ($countriesList as $key=>$value) :?>
					<option value="<?= $key ?>"
					<?php
						if ($info['cou_id'] == $key) {
							echo ' selected="selected" ';
						}
					?>
					><?= $value ?></option>
					<?php endforeach; ?>
				</select>*
				<span class="error"> <?php echo $couIdError;?></span>
	  			<br/><br/>
				Sympathie :<br />
				<select class="form-control" name="stu_friendliness">
					<option value="">choisissez :</option>
					<?php foreach ($friendlinessList as $key=>$value) :?>
					<option value="<?= $key ?>"><?= $value ?></option>
					<?php endforeach; ?>
				</select>
				<span class="error"> <?php echo $sympathieError;?></span>
	  			<br/><br/>
	  			<input type="file" name="fileForm" id="fileForm" />
	  			<div class="well">
		  			<span class="error"> <?php echo $fileError;?></span>
		  			<span class="error"><?php echo $fileExtError;?></span>
		  			<span class="error"><?php echo $sizeError;?></span>
		  			<span class="error"><?php echo $msg;?></span>
		  		</div>
				<p class="help-block">Seul les extensions jpg, jpeg, gif, svg, png sont autorisées</p>
				<br />

				<input type="submit" value="Valider" align="center" class="btn btn-success btn-block" ><br />
			<?php endforeach; ?>
			</fieldset>

		<?php else :?>
		aucun étudiant
		<?php endif; ?>	
		</form>
		<br>
	</div>
  <div class="col-md-3 "></div>
</div>