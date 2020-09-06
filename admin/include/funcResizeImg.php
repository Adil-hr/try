<?php


//déclaration du tableau des tailles voulues pour le redimensionnement des images, avec les préfixes des noms de fichiers correspondants en clé
$sizeArray = [
    'xl' => [1200, 800],
    'lg' => [800, 600],
    'md' => [600, 400],
    'sm' => [200, 150]
];

function resizeImg($param_file, $param_path, $param_size)
{
    $sourceFile = $param_path . $param_file; //on mémorise le chemin et le nom du fichier source pour améliorer la lisibilité du code

    if (file_exists($sourceFile)) { //on s'assure que le fichier existe bien
        $sourceSize = getimagesize($sourceFile); //on récupère les dimensions de l'image source sous forme de tableau
        $ext = substr($param_file, strrpos($param_file, ".") + 1); //on récupère l'extension du fichier
        switch ($ext) { //selon le type de fichier, on appelle la fonction appropriée pour ouvrir l'image source dans une variable
            case 'gif':
                $sourceImg = imagecreatefromgif($sourceFile);
                break;
            case 'png':
                $sourceImg = imagecreatefrompng($sourceFile);
                break;
            default:
                $sourceImg = imagecreatefromjpeg($sourceFile);
                break;
        }

        foreach ($param_size as $key => $value) { //pour chaque format d'image voulu
            $destX = $value[0]; //on récupère la largeur de l'image de destination
            $destY = $value[1]; //on récupère la hauteur de l'image de destination
            $destPrefix = $key . '_'; //on récupère le préfixe pour le nom de fichier
            $destFile = $param_path . $destPrefix . $param_file; //on mémorise le chemin et le nom du fichier de destination pour améliorer la lisibilité du code

            if ($sourceSize[0] > $destX || $sourceSize[1] > $destY) { //si l'image source n'est pas plus petite que les dimensions voulues, on resize
                if ($sourceSize[0] > $sourceSize[1]) { //si la largeur est plus grande que la hauteur, l'image source est au format portrait
                    $destY = floor($destX * $sourceSize[1] / $sourceSize[0]); //on recalcule la hauteur de l'image de destination pour qu'elle respecte le ratio (les proportions) de l'image source
                } else { //sinon, elle est au format paysage
                    $destX = floor($destY * $sourceSize[0] / $sourceSize[1]); //on recalcule la largeur de l'image de destination pour qu'elle respecte le ratio (les proportions) de l'image source
                }
                $destImg = imagecreatetruecolor($destX, $destY); //on crée une image vierge aux dimensions calculée précédemment

                imagecopyresampled($destImg, $sourceImg, 0, 0, 0, 0, $destX, $destY, $sourceSize[0], $sourceSize[1]); //on copie et redimensionne le contenu de l'image source dans l'image destination
                switch ($ext) { //selon le type de fichier, on appelle la fonction appropriée pour enregistrer l'image sur le serveur
                    case 'gif':
                        imagegif($destImg, $destFile);
                        break;
                    case 'png':
                        imagepng($destImg, $destFile);
                        break;
                    default:
                        imagejpeg($destImg, $destFile);
                        break;
                }
                $destImg = NULL; //on vide la variable de l'image de destination pour libérer de la mémoire
                unset($destImg); //on supprime la variable de l'image de destination pour libérer de la mémoire
            } else { //si l'image source est plus petite que la taille voulue, on se contente de copier et renommer l'image pour ne pas l'étirer et la déformer.
                copy($sourceFile, $destFile);
            }
        }
        unlink($sourceFile); //on supprime l'image originale pour libérer de l'espace sur le serveur
    }
}
