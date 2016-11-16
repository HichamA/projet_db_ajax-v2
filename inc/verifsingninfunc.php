<?php

function verification($emailToto,$passwordToto){
    $sql = '
      SELECT *
      FROM user
      WHERE use_email = :email
      LIMIT 1
    ';
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->bindValue(':email', $emailToto);

    if ($pdoStatement->execute() === false) {
      print_r($pdoStatement->errorInfo());
    }
    else {
      if ($pdoStatement->rowCount() > 0) {
        $resList = $pdoStatement->fetch();
        $hashedPassword = $resList['use_password'];

        // Je vérifie le mot de passe
        if (password_verify($passwordToto, $hashedPassword)) {
          $Ok = 'login ok<br>';
        }
        else {
          $emailpswdErr='bad password or login<br>';
        }
      }
      else {
        $emailKnErr= 'email not known<br>';
      }
    }
  }
}
