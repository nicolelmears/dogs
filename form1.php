<?php
//form1.php

if(isset($_POST["DogID"])){ //show data
    
    //use var_dump() on the post data to view it:
    /*
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
    */
    $DogID = $_POST["DogID"];
    $Breed = $_POST["Breed"];
    $Trainability = $_POST["Trainability"];
    $Comments = $_POST["comments"];
    
    echo "
   <p>The user's name is $DogID $Breed.</p>
   <p>$DogID's Trainability is $Trainability.</p>
   <p>Here's what $DogID had to say:</p>
   <p>$Comments</p>
    ";

        
  //  echo $_POST["DogID"];
}else{ //show form
    echo '
    <form action="" method="post">
        <label>
        First Name:<br />
        <input type="text" name="DogID" placeholder="Enter your first name here" required="required" tab="10" autofocus /><br />
        </label>
        <br />
         <label>
        Last Name:<br />
        <input type="text" name="Breed" placeholder="Enter your Last name here" required="required" tab="20" /><br />
        </label>
        <br />        
   
        
               <label>
        Trainability:<br />
        <input type="Trainability" name="Trainability" placeholder="Enter your Trainability here" required="required" tab="40" /><br />
        </label>
        <br />
        
             <label>
        Comments:<br />
        <textarea name="comments" placeholder="Comments go here" tab="30"></textarea>
        
        </label>
        <br />
        
        <input type="submit" />        
    </form>
    ';
}