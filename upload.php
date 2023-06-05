<?php
session_start();
require_once 'files/config.php';
if(isset($_FILES['image'])){
  $nick = $_SESSION["name"];
  $title = $_POST['pavadinimas'];
  $describtion = $_POST['aprasymas'];
  $date = date("Y-m-d H:m");
  $file = $_FILES['image'];

  // Tikriname, ar neįvyko klaida įkeliant failą
  if($file['error'] === UPLOAD_ERR_OK){
      $fileName = $file['name'];
      $fileTmpPath = $file['tmp_name'];
      $fileSize = $file['size'];

      // Tikriname, ar failo dydis neviršija 5 MB (5242880 baitų)
      if($fileSize <= 5242880){
          // Aprašome naują failo pavadinimą, kad išvengtume dublikatų
          $newFileName = uniqid('', true) . '_' . $fileName;

          // Nurodome kelias, kuriuo norime išsaugoti paveikslėlį (čia saugome į "uploads" aplanką)
          $uploadPath = 'uploads/' . $newFileName;

          // Įkeliam paveikslėlį į nurodytą vietą
          if(move_uploaded_file($fileTmpPath, $uploadPath)){
              echo 'Paveikslėlis sėkmingai įkeltas.';
              $query = "INSERT INTO photo (id, nick, pavadinimas, aprasymas, laikas, adresas) 
  			  VALUES(NULL, '$nick', '$title', '$describtion', '$date', '$uploadPath')";
  	mysqli_query($conn, $query);
          } else {
              echo 'Įkeliant paveikslėlį įvyko klaida.';
          }
      } else {
          echo 'Failas yra per didelis. Maksimalus leistinas dydis yra 5 MB.';
      }
  } else {
      echo 'Įkeliant paveikslėlį įvyko klaida: ' . $file['error'];
  }
}


header("Location:index.php?nuotraukos");
?>
