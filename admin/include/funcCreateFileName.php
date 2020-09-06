<?php 
function createFileName($param_str, $param_path, $param_ext, $param_size)
{
    $result = $param_str; //on récupère la chaine de caractères passée en paramètre, on la stocke dans une variable sur laquelle on va travailler
    $tabKO  = ['^', '%', '$', '£', '=', '+', '@', '<', '>', '[', ']', '|', '{', '}', '~', '&', '\\', '/', ':', ',', '§', '¤', '*', '€', '_', '!', '?', '#', ';', '\'', '"', ' ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ']; //ondéfinitlalistedescaractèresàremplacer
    $tabOK  = ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '-', '', '', '', '', '-', '', '-', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y']; //ondéfinitlalistedescaractèresderemplacement
    $exist  = true; //on définit une variable de type booléen qui va déterminer si on doit continuer ou stopper la boucle while

    $result = strtolower(str_replace($tabKO, $tabOK, $result)); //on remplace les caractères à remplacer par les caractères de remplacement dans $result, et on passe la valeur en minuscule
    $i = 0; //on déclare un compteur qu'on initialise à 0

    while ($exist) { //tant exist est vraie, c'est à dire tant qu'on ne l'a pas passée à false
        $exist = false; //on passe existe à false pour éviter une boucle infinie
        foreach ($param_size as $key => $value) { //pour chaque case du tableau des tailles, c'est à dire pour chaque préfixe possible
            if (file_exists($param_path . $key . '_' . $result . ($i > 0 ? '-' . $i : '') . '.' . $param_ext)) {
                $exist = true; //Si le fichier avec le préfixe $key et le nom $result existe, on passe existe à true, pour continuer à boucler
            }
        }
        if ($exist) {
            $i++;
        } //si on a trouvé un fichier avec le même nom, on incrémente le compteur
    }
    if ($i > 0) { //si on a déjà un fichier du même nom, on concatène le nom avec le suffixe (compteur)
        $result .= '-' . $i;
    }
    return $result . "." . strtolower($param_ext); //on renvoie la nom de fichier et son extension (en minuscule)
}
?>