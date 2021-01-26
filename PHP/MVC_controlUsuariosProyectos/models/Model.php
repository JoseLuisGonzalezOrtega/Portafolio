<?php
class Model {

    protected $bd;
    protected $usuari="root";
    protected $password="";
    protected $taula;

    function __construct() {
		 
		try {
			
			$this->bd = new PDO('mysql:host=localhost;dbname=projectes', 
					 $this->usuari, $this->password);  	   

		} catch (PDOException $e) {
			print "Error: " . $e->getMessage() . "<br/>";
			die();
		}

    }

    public function getAll() {
	 $sql = "select * from ".$this->taula;	
         
    	 $ordre = $this->bd->prepare($sql);	
         $ordre->execute();   
         $res = $ordre->fetchAll(PDO::FETCH_ASSOC); 
         return $res;
    }

    public function get($codi) {
	    $sql="select * from ".$this->taula." where codi=:codi";  
        $ordre = $this->bd->prepare($sql);	 
        $ordre->bindValue(':codi',$codi);  
        $ordre->execute();   
        $res = $ordre->fetch(PDO::FETCH_ASSOC);
	
        return $res;
   }

    public function esborrar($codi) {
	 $sql ="delete from ".$this->taula." where codi=:codi";
         $ordre = $this->bd->prepare($sql);	 
         $ordre->bindValue(':codi',$codi);		   
	 $res = $ordre->execute();
         return $res;
    }
    
    public function numeroPagines($num_regs) {

        $sql = "select count(*) from ".$this->taula;
        $resultat = $this->bd->prepare($sql);
        $resultat->execute();
        $reg = $resultat->fetch(); // recuperem el registre
        $total_prods = $reg[0]; // la informaciÃ³ estarÃ  
        // en la primera posiciÃ³ del array
        $total_pags = ceil($total_prods / $num_regs);
        return $total_pags;
    }

    public function getPagina($pagina, $numRegs) {
        $inici = ($pagina - 1) * $numRegs;
        $sentencia = $this->bd->prepare("SELECT * from ".$this->taula." LIMIT :ini, :numr");
        $sentencia->bindValue(':ini', $inici, PDO::PARAM_INT);
        $sentencia->bindValue(':numr', $numRegs, PDO::PARAM_INT);
        $sentencia->execute();
        $resultat = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }

}

?>
