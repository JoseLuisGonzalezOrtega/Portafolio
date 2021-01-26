<div>
     <form method="POST" action="index.php?control=controllogin&operacio=login">
                <p>Sign in</p>   
                <input type="text" name="username"><br>
                <input type="text" name="password"><br>	
                <button type="submit">Sign in</button><br>
     </form>       
            
     <?php
           if (isset($_SESSION['missatge'] )) {               
                echo $_SESSION['missatge'];    
                unset( $_SESSION['missatge']);
                
           }
    ?>
           
      
</div>
