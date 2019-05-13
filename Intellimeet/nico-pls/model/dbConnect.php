<?php
class dbConnect
{
    public static function query($queryString)
    {
        try {
            $db = new PDO('mysql:host=localhost;dbname=domhouse', 'root', '');
            $req = $db->query($queryString);
            $result = $req->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        } catch (exception $e) {
            die('Erreur ' . $e->getMessage());
        }
    }
}