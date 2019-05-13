<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 2019-05-07
 * Time: 20:46
 */

require '../models/dbConnect.php';

$reponse = $bdd->query('SELECT etat FROM salles');
$t=1;
while ($donnees = $reponse->fetch())
{
    if($donnees['etat']==0){

        $color='green';
        switch ($t) {
            case 1:
                $colors1=$color;

                break;
            case 2:
                $colors2=$color;

                break;
            case 3:
                $colors3=$color;

                break;
            case 4:
                $colors4=$color;

                break;
            case 5:
                $colors5=$color;

                break;
            case 6:
                $colors6=$color;

                break;
            case 7:
                $colors7=$color;

                break;
            case 8:
                $colors8=$color;

                break;
        }
        $t++;

    }else{

        $color='red';
        switch ($t) {
            case 1:
                $colors1=$color;

                break;
            case 2:
                $colors2=$color;

                break;
            case 3:
                $colors3=$color;

                break;
            case 4:
                $colors4=$color;

                break;
            case 5:
                $colors5=$color;

                break;
            case 6:
                $colors6=$color;

                break;
            case 7:
                $colors7=$color;

                break;
            case 8:
                $colors8=$color;

                break;
        }
        $t++;
    }
}
$reponse->closeCursor();

require '../views/listeOffView.php';





