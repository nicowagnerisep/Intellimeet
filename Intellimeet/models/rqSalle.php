<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 2019-05-14
 * Time: 14:23
 */

function recupereSalle($bdd){
    $req = $bdd->prepare("SELECT nomsalle FROM salles WHERE etat=0 ");
    $req->execute();
    $i = 1;
    while($row = $req->fetch()){
        echo '<option value='.$i.'>'.$row["nomsalle"].'</option>';
        $i = $i+1;
    }
}

function recupereCapteur($bdd,$salle){
    $req=$bdd->prepare('SELECT * FROM capteurs INNER JOIN salles ON salles.id=capteurs.salle_id WHERE salles.nomsalle=?');
    var_dump($req);
    $req->execute(array($salle));

    while($data= $req->fetch()){

        echo 'Nom: '.$data['nom'].'<br>';
        var_dump($data);


    }
}
function nameToId($bdd, $table, $name){
    if ($table=='salles'){
        $req=$bdd->prepare('SELECT id FROM salles WHERE nomsalle=?');
        $req->execute(array($name));

    }else {
        $req=$bdd->preapre('SELECT id FROM ? WHERE nom=?');
        $req->execute(array($table,$name));
    }
    $data=$req->fetchAll();
    return $data;
    var_dump($data);
}
function addCapteur($bdd,$salle,$nomCapteur){
    $idCapteur= nameToId($bdd,'capteurs', $nomCapteur);
    $req->prepare('INSERT INTO capteurs VALUES ');
}

function recupereAllSalle($bdd){
    $req=$bdd->prepare("SELECT * FROM salles");
    $req->execute();

    while($data = $req->fetch()){
        if($data['etat']==0){
            $etatSalle= 'libre';
        } else{
            $etatSalle='reservée';
        }
        echo'Nom '.$data['nomsalle'].'<br> Etat: '.$etatSalle.'<br>'.recupereCapteur($bdd,$data['nomsalle']);
    }
}

function recupereDate($bdd,$salle){
    $req= $bdd-> prepare("SELECT date FROM reservation   INNER JOIN salles ON reservation.salle_id = salles.id  WHERE NOT salle.nomsalle=?");
    $req->execute(array($salle));
    while($row = $req->fetch()){
        echo '<option value='.$i.'>'.$row["date"].'</option>';
        $i = $i+1;
    }
}

function recupereUneSalle($bdd,$salle){
    $req = $bdd->prepare("SELECT nomsalle FROM salles WHERE etat=0 ");

}