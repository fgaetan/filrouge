<?php
class Utils
{
  public static function upload($extensions, $fichier, $chemin)
  {
    $file_name = $fichier['name'];
    $file_size = $fichier['size'];
    $file_tmp = $fichier['tmp_name'];
    $file_ext = strtolower(pathinfo($fichier['name'], PATHINFO_EXTENSION));

    $uploadOk = false; // par defaut false avant que je fasse les controles
    $errors = ""; // chaine contient les messages d'erreurs s'il y en a

    $pattern = "/^[\p{L}\w\s\-\.]{3,}$/";
    if (!preg_match($pattern, $file_name)) {
      $errors .= "Nom de fichier non valide. <br/>";
    }

    if (!in_array($file_ext, $extensions)) {
      $errors .= "Extension non autorisée. <br/>";
    }

    if ($file_size > 3000000) {
      $errors .= "La taille du fichier ne doit pas dépasser 3 Mo. <br/>";
    }

    $file_name = substr(md5($fichier['name']), 10) . ".$file_ext";

    while (file_exists("uploads/$file_name")) {
      $file_name = substr(md5($file_name), 10) . ".$file_ext";
    }

    if ($errors === "") {
      if (move_uploaded_file($file_tmp,  $chemin . $file_name)) {
        $uploadOk = true;
        return ["uploadOk" => $uploadOk, "file_name" => $file_name, "errors" => $errors];
      } else {
        $errors .= "Echec de l'upload. <br/>";
      }
    }

    return ["uploadOk" => false, 'file_name' => '', 'errors' => "Aucun fichier n'est uploadé.<br>$errors"];
  }
}
