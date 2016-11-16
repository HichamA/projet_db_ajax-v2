<div class="jumbotron">
	  <h1>Hey! Salut mon ami !!!</h1>
	  <p> Tou aimes les pôtates ?</p>
	  <p><a class="btn btn-primary btn-lg" href="https://www.youtube.com/watch?v=hJgQCbRsq-I" target="_blank" role="button">Learn more</a></p>
</div>

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Esch-Belval</div>
  <div class="panel-body">
	Lister ici les sessions de formation webforce3 par date pour Esch
  </div>
  <!-- Table -->
  <table class="table">
  <thead>
    <tr class="info">
      <th>Session </th>
      <th>Date de début</th>
      <th>Date de fin</th>
      <th>Effectif</th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($session as $key => $currentSession) : ?>
      <tr>
        <td><a href="list.php?session=<?= $currentSession['tra_id'] ?>"> Session <?= $currentSession['tra_id'] ?></a></td>
        <td><a href="list.php?session=<?= $currentSession['tra_id'] ?>"><?= $currentSession['tra_start_date'] ?></a></td>
        <td><a href="list.php?session=<?= $currentSession['tra_id'] ?>"><?= $currentSession['tra_end_date'] ?></a></td>
      <td><a href="list.php?session=<?= $currentSession['tra_id'] ?>"><?= $currentSession['nb'] ?></a></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
  </table>
</div>