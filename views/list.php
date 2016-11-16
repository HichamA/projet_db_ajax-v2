<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading"><h2>Liste des étudiants</h2></div>
 
	<?php if (isset($studentListe) && sizeof($studentListe) > 0) : ?>
		<table class="table">
			<thead >
				<tr class="info">
					<td>Nom</td>
					<td>Prénom</td>
					<td>Ville</td>
					<td>Pays</td>
					
				</tr>
			</thead>
			<tbody>
	<?php foreach ($studentListe as $currentEtudiant) : ?>
				<tr>
					<td><a href="student.php?id=<?= $currentEtudiant['stu_id'] ?>"><?= $currentEtudiant['stu_lname'] ?></a></td>
					<td><?= $currentEtudiant['stu_fname'] ?></td>
					<td><?= $currentEtudiant['cit_name'] ?></td>
					<td><?= $currentEtudiant['cou_name'] ?></td>
				</tr>
	<?php endforeach; ?>
			</tbody>
		</table>

	<?php else :?>
		aucun étudiant
	<?php endif; ?>
</div>

<div class="row">
  <div class="col-md-4 col-sm-4 text-left">
	   <button type="submit" name="suivant" class="btn btn-succes btn-sm">
	   <a href="list.php?page=<?= $page - 1 ?>"> &lt;&lt; Prev</a>
	   </button>
   </div>
  <div class="col-md-4 col-sm-4">
  	<form action="" method="get">
		<select class="form-control" name="limit">
			<option value="">choisissez :</option>
			<?php foreach ($limit as $key=>$value) :?>
			<option  value="<?= $key ?>"><?= $value ?></option>
			<?php endforeach; ?>
		</select><br />
	</form>

   </div>
  <div class="col-md-4 col-sm-4 text-right">
	<button type="submit" name="suivant" class="btn btn-succes btn-sm" id="selectLimit">
	   <a href="list.php?page=<?= $page + 1 ?>"> Next &gt;&gt;</a>
	 </button>
</div>
<hr>

