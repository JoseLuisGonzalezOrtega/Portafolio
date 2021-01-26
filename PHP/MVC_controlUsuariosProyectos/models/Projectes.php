<?php
include_once 'Model.php';

class Projectes extends Model{
    
   protected $taula="projectes";

  

    public function afegir($nom,$descripcio,$dataInici,$dataFi,$estat) {
 	$sql ="insert into projectes(nom,descripcio,dataInici,dataFi,estat) values 
			 (:nom,:descripcio,:dataInici,:dataFi,:estat)";
	$ordre = $this->bd->prepare($sql);	 
	$ordre->bindValue(':nom',$nom);
	$ordre->bindValue(':descripcio',$descripcio);
	$ordre->bindValue(':dataInici',$dataInici);
	$ordre->bindValue(':dataFi',$dataFi);
	$ordre->bindValue(':estat',$estat);
	$res = $ordre->execute(); 
        return $res;

    }


    public function actualitzar($codi,$nom,$descripcio,$dataInici,$dataFi,$estat) {
 	$sql ="update projectes set nom=:nom,descripcio=:descripcio, dataInici=:dataInici, dataFi=:dataFi, estat=:estat 
             where codi=:codi";
	$ordre = $this->bd->prepare($sql);	 
        $ordre->bindValue(':codi',$codi);
	$ordre->bindValue(':nom',$nom);
	$ordre->bindValue(':descripcio',$descripcio);
	$ordre->bindValue(':dataInici',$dataInici);
	$ordre->bindValue(':dataFi',$dataFi);
	$ordre->bindValue(':estat',$estat);
	
	$res = $ordre->execute(); 
        return $res;

    }





}

?>
