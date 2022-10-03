<?php

class AppointsModel {

    protected $db;

    public static function newAppoint($name, $source_id, $cpf, $birthdate, $professional_id)
    {
        try {
            $db = new PDO("mysql:dbname=feegow_db;host=localhost", "root", "");
            $sql = $db->prepare( 'INSERT INTO appoints (special_id, professional_id, name, cpf, source_id, birthdate, date_time)  values (:special_id, :professional_id, :name, :cpf, :source_id, :birthdate, :date_time)' );
            $sql->bindValue( ':special_id' , 0);
            $sql->bindValue( ':professional_id' , $professional_id );
            $sql->bindValue( ':name' , $name );
            $sql->bindValue( ':cpf' , $cpf );
            $sql->bindValue( ':source_id' , $source_id );
            $sql->bindValue( ':birthdate' , $birthdate );
            $sql->bindValue( ':date_time' , date("Y-m-d H:i:s") );
            $sql->execute();
        } catch ( Exception  $th ) {
            die($th->getMessage());
        }
    }

}
?>