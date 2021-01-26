<!DOCTYPE html>
<?php
// UnFormulari.php
 $errors=array();

 function validar_entrada($valor) {
     $valor = trim($valor);
     $valor = stripslashes($valor);
     $valor = htmlspecialchars($valor);
     // futures accions
     return $valor;        
 }

 function mostraError($error) {
    
     global $errors;
     if(isset($errors[$error])) {  
       echo "<div class='alert alert-danger' role='alert'>";
       echo $errors[$error]; 
       echo "</div>";
     } 

 }

$valorsTitulacio = array(
            "DAM"=>"CFGS Desenvolupament aplicacions multiplataforma",
            "ASIX"=>"CFGS Administració de sistemes informàtics",
            "SMX"=>"CFGS Sistemes mutiplataforma i en xarxa",
            "DAW"=>"CFGS Desenvolupament aplicacions web");


/*$errors['Edat']="";
$errors['Password']="";
$errors['Comentari']="";
$errors['Titulacio']="";
$errors['FormaAcces']="";
$errors['Extres']="";
$errors['Idiomes']="";
*/

$edat="";
$password="";
$comentari="Escriu el teu comentari ...";
$titulacio="ASIX";
$formaAcces="PROVA";
$extres=array("futbol");
$idiomes=array();
$data="";

if($_SERVER['REQUEST_METHOD']=="POST") {

 // Validacio Edat
 if(isset($_POST['edat'])) {     
     $edat = $_POST['edat']; 
     $edat = validar_entrada($edat);    
     if($edat!="") { // camp obligatori
        $options = array(
        'options' => array(        
        'min_range' => 0,
        'max_range' => 120));
    
        if(filter_var($edat, FILTER_VALIDATE_INT,$options)!==FALSE){
          // if($edat>=0 && $edat<=120) {     
              
          // }
        }
        else $errors['Edat']="El paràmetre Edat ha de ser un  número entre 1 i 120";
     }
     else $errors['Edat']="El paràmetre Edat és obligatori";
 }
 else $errors['Edat']="El paràmetre Edat no existeix";
 
 // Validacio password
 if(isset($_POST['clau'])) {     
     $password = $_POST['clau']; 
     $password = validar_entrada($password);    
     if($password!="") { // camp obligatori
        
          
     }
     else $errors['Password']="El paràmetre password és obligatori";
 }
 else $errors['Password']="El paràmetre password no existeix";


 // Validacio comentari
 if(isset($_POST['comentari'])) {     
     $comentari = $_POST['comentari']; 
     $comentari = validar_entrada($comentari);    
     if($comentari=="") 
           $errors['Comentari']="El paràmetre comentari és obligatori";
 }
 else $errors['Comentari']="El paràmetre comentari no existeix";

 // Validacio titulacio
 // echo $_POST['titulacio'];
 
 if(isset($_POST['titulacio'])) {     
     $titulacio = $_POST['titulacio']; 
     
     //$valors = array("DAM","ASIX","SMX");
    

     if(!isset($valorsTitulacio[$titulacio]))  
         $errors['Titulacio']="El valor de la titulacio no és correcte";
     
 }
 else $errors['Titulacio']="El paràmetre titulacio no existeix";
 
 
 // Validacio Forma Acces
 //echo $_POST['FormaAcces'];
 
 if(isset($_POST['FormaAcces'])) {     
     $formaAcces = $_POST['FormaAcces']; 
     $valors = array("PROVA","BAT","ESO");
     if(!in_array($formaAcces,$valors))  
         $errors['FormaAcces']="El valor de la forma d'accés no és correcte";
     
 }
 else $errors['FormaAcces']="El paràmetre Forma d'accés no existeix";

 // Validacio Activitat
 if(isset($_POST['extres'])) {   
      $extres = $_POST['extres'];
      $valors = array("futbol","piscina","basquet");
      foreach($extres as $extra) {
	  if(!in_array($extra,$valors)) 
	     $errors['Extres'] ="Un valor $extra seleccionat com extra no és correcte";

      }
 }
 //else $errorFormaAcces="El paràmetre extres no existeix";

 // Validacio idiomes
 if(isset($_POST['idiomes'])) {   
      $idiomes = $_POST['idiomes'];
      $valors = array("anglès","francès","alemany","rus");
      foreach($idiomes as $idioma) {
	  if(!in_array($idioma,$valors)) 
	     $errors['Idiomes'] ="Un valor $idioma seleccionat com idioma no és correcte";

      }
 }
 //else $errorIdiomes="El paràmetre idiomes no existeix";

  if(isset($_POST['data'])) {     
     $data = $_POST['data']; 
          
     $valors = explode('/',$data);

    //
    
     if(count($valors)!=3 ||
       !checkdate (intval($valors[1]) ,intval($valors[0]),intval($valors[2]) ) )
           $errors['Data']="El valor de la data no és correcte";
     
 }
 else $errors['Data']="El paràmetre data no existeix";  



   if(count($errors)==0) 
  {
        // operacions 
        // ...

       header('Location: unFormulari.php');
       exit;
       // echo "TOT BE!!!!!!!!!!!!!!!!!!!!!!!!!!<br>";
  }
  else {

      foreach($errors as $error){
          echo "<li>".$error."</li>";
      }
  }

}
?>

<HTML>

<HEAD>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</HEAD>

<div class="jumbotron text-center">
  <h1>El meu formulari</h1> 
</div>

<div class="container">
    <FORM ACTION="unFormulari.php" METHOD="POST">
    
            <div class="form-group">
              <label>Introdueix la teva Edad:</label> 
              <INPUT TYPE="text" class="form-control" placeholder="escriu una edat" NAME="edat" value="<?php echo $edat;?>">
             <?php mostraError('Edat');?>
            </div>

            <div class="form-group">
              <label> Clau d'accés: </label> 
              <INPUT TYPE="password" class="form-control" NAME="clau" value="<?php echo $password;?>" >
             <?php if(isset($errors['Password'])) {  ?>
             <div class="alert alert-danger" role="alert">
               <?php echo $errors['Password']; ?>
             </div>
             <?php } ?>  

            </div>  
 

   <div class="form-group">
     <label>  Escull una titulació: </label> 
     <?php
        foreach($valorsTitulacio as $pos => $valor) {
           echo "<div class='radio'><label>\n";
           echo "<INPUT TYPE='radio' NAME='titulacio' VALUE='".$pos."'";
               if($titulacio==$pos) echo "CHECKED";
           echo " >\n";
           echo $valor."\n";
           echo "</label></div>\n";
        }

     ?>
   </div>

  
    
    <div class="form-group"> 
   <label>Activitats:</label>
    
    <label class="checkbox-inline">
           <INPUT TYPE="checkbox" NAME="extres[]" VALUE="futbol" 
         <?php if(in_array("futbol",$extres))  echo "CHECKED";  ?>
     >Futbol </label>
    <label class="checkbox-inline">
   <INPUT TYPE="checkbox" NAME="extres[]" VALUE="piscina" 
        <?php if(in_array("piscina",$extres))  echo "CHECKED";  ?>
    >Piscina </label>
    <label class="checkbox-inline">
   <INPUT TYPE="checkbox" NAME="extres[]" VALUE="basquet" 
         <?php if(in_array("basquet",$extres))  echo "CHECKED";  ?>
   >Basquet </label>
     <?php if(isset($errors['Extres'])) echo $errors['Extres']; ?>
    </div>

   <div class="form-group">
   <label>Selecciona la Forma d'acces al cicle formatiu</label>
                <SELECT  class="form-control" NAME="FormaAcces">
                    <OPTION VALUE="PROVA" <?php if($formaAcces=="PROVA") echo "SELECTED";?>
                    >Prova d'accés</OPTION>
                    <OPTION VALUE="BAT"  <?php if($formaAcces=="BAT") echo "SELECTED";?>
                    >Batxillerat</OPTION>
                    <OPTION VALUE="ESO"  <?php if($formaAcces=="ESO") echo "SELECTED";?>
                    >ESO</OPTION>
                </SELECT>
     <?php if(isset($errors['FormaAcces'])) echo $errors['FormaAcces']; ?>
    </div>

   
   <div class="form-group">
   <label>Selecciona els idiomes que saps parlar</label>
   <SELECT MULTIPLE class="form-control"  NAME="idiomes[]">
       <OPTION VALUE="anglès" 
             <?php if(in_array("anglès",$idiomes))  echo "SELECTED";  ?>
          >Anglès</OPTION>
       <OPTION VALUE="francès"
               <?php if(in_array("francès",$idiomes))  echo "SELECTED";  ?>
       >Francès</OPTION>
       <OPTION VALUE="alemany"
             <?php if(in_array("alemany",$idiomes))  echo "SELECTED";  ?>
       >Alemany</OPTION>
       <OPTION VALUE="rus" 
               <?php if(in_array("rus",$idiomes))  echo "SELECTED";  ?>
       >Rus</OPTION>
   </SELECT>
     <?php if(isset($errors['Idiomes'])) echo $errors['Idiomes']; ?>
   </div>

   
 

   <div class="form-group">
   <label>Comentari:</label>
   <TEXTAREA NAME="comentari" class="form-control" rows="5" ><?php echo $comentari;?></TEXTAREA>
   <?php if(isset($errors['Comentari'])) echo $errors['Comentari']; ?>
   </div>

   <div class="form-group">
   <label>Data enviament:</label>
   <INPUT NAME="data" type="text" value="<?php echo $data; ?>">
   <?php if(isset($errors['Data'])) echo $errors['Data']; ?>
   </div>


  
   <button type="submit" class="btn btn-default">Acceptar</button>

</FORM>
</div>

<?php
  
?>


</BODY>
</HTML>