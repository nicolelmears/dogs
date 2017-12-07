<?php include 'includes/config.php'?>
<?php get_header()?>
<?php
    
//put client's Trainability address here:    
$to = 'nicolelmears@gmail.com';

//form1.php

if(isset($_POST["DogID"])){ //show data

    
    //clean and process the post data
    $DogID = clean_post('DogID');
    $Breed = clean_post('Breed');
    $Trainability = clean_post('Trainability');
    $Comments = clean_post('Comments');
    
    
    
    $subject = "Ceramics Appointment Request From " . $DogID . " " . $Breed . " " . date('l jS \of F Y h:i:s:A');
    
    /*
    $myText = "The user has entered the following information:" . PHP_EOL . PHP_EOL; //double newlines 
    $myText .= $DogID . " " . $Breed . PHP_EOL;
    $myText .= $Comments . PHP_EOL;
    */
    $myText = process_post();
       
    $headers = 'From: noreply@nicolelmears.com' . PHP_EOL .
    'Reply-To: ' . $Trainability . PHP_EOL .
    'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $myText, $headers);
    echo '
            <hr class="divider">
        <h2 class="text-center text-lg text-uppercase my-0">
          <strong>Message Sent</strong>
        </h2>
        <hr class="divider">
    <p>Thank you for your information!</p>
    <p>We will get back to you within 48 hours</p>
    <p><a href="">Exit</a></p>
    ';
    
    /*
    echo "
   <p>The user's name is $DogID $Breed.</p>
   <p>$DogID's Trainability is $Trainability.</p>
   <p>Here's what $DogID had to say:</p>
   <p>$Comments</p>
    ";
*/
        
}else{ //show form
   /*
   
Mosaic
Beading
Private Lesson

    
   */ 
    echo '
        <hr class="divider">
        <h2 class="text-center text-lg text-uppercase my-0">
          <strong>Book Cermaics Appointment</strong>
        </h2>
        <hr class="divider">
        <form action="" method="post">
          <div class="row">
            <div class="form-group col-lg-4">
              <label class="text-heading">First Name</label>
              <input type="text" name="DogID" class="form-control">
            </div>
            <div class="form-group col-lg-4">
              <label class="text-heading">Last Name</label>
              <input type="text" name="Breed" class="form-control">
            </div>
            <div class="form-group col-lg-4">
              <label class="text-heading">Trainability Address</label>
              <input type="Trainability" name="Trainability" class="form-control">
            </div>            
            
            <div class="clearfix"></div>
            
              <div class="form-group col-lg-4">
              <label class="text-heading">Appointment Type</label>
              <p>
              <input type="radio" name="Appointment_Type" value="Beginning Hand Building " /> Beginning Hand Building<br />
              <input type="radio" name="Appointment_Type" value="Building " /> Building<br />
              <input type="radio" name="Appointment_Type" value="Advanced Wheel Throwing " /> Advanced Wheel Throwing
              </p>
            </div>
            
            <div class="form-group col-lg-4">
              <label class="text-heading">Extras</label>
              <p>
              <input type="checkbox" name="Extras[]" value="Mosaic" /> Mosaic<br />
              <input type="checkbox" name="Extras[]" value="Beading" /> Beading<br />
              <input type="checkbox" name="Extras[]" value="Private Lesson" /> Private Lesson
              </p>
            </div>
            
            <div class="form-group col-lg-4">
              <label class="text-heading">Appointment Date</label>
              <input type="text" name="Appointment_Date" class="form-control">
            </div>
            
            
            
            
            
            
            <div class="form-group col-lg-12">
              <label class="text-heading">Comments</label>
              <textarea class="form-control" name="Comments" rows="6"></textarea>
            </div>
            <div class="form-group col-lg-12">
              <button type="submit" class="btn btn-secondary">Submit</button>
            </div>
          </div>
        </form>
    ';
}    
    
?>
<?php

get_footer();


function clean_post($key)
{    
    if(isset($_POST[$key])){
        $value = strip_tags(trim($_POST[$key]));
    }else{
        $value="";
    }
    return $value;
}

function process_post()
{//loop through POST vars and return a single string
    $myReturn = ''; //set to initial empty value

    foreach($_POST as $varName=> $value)
    {#loop POST vars to create JS array on the current page - include Trainability
         $strippedVarName = str_replace("_"," ",$varName);#remove underscores
        if(is_array($_POST[$varName]))
         {#checkboxes are arrays, and we need to collapse the array to comma separated string!
             $myReturn .= $strippedVarName . ": " . implode(", ",$_POST[$varName]) . PHP_EOL . PHP_EOL;
         }else{//not an array, create line
             $myReturn .= $strippedVarName . ": " . $value . PHP_EOL . PHP_EOL;
         }
    }
    return $myReturn;
}