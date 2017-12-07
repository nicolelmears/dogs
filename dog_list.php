<?php
/**
 * demo_list_pager.php demonstrates a list page that paginates data across 
 * multiple pages
 * 
 * This page uses a Pager class which processes a mysqli SQL statement 
 * and spans records across multiple pages. 
 * 
 * @package nmPager
 * @author Bill Newman <williamnewman@gmail.com>
 * @version 3.2 2015/11/24
 * @link http://www.newmanix.com/
 * @license http://www.apache.org/licenses/LICENSE-2.0 v. 3.0
 * @see MyAutoLoader.php
 * @see Pager.php 
 * @todo none
 */

require 'includes/config.php'; #provides configuration, pathing, error handling, db credentials 
require 'includes/Pager.php'; #allows pagination 
# SQL statement
$sql = "select * from dogs";

#Fills <title> tag  
$title = 'dog List/View/Pager';
$config->loadhead .='<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';

# END CONFIG AREA ---------------------------------------------------------- 

get_header(); #header must appear before any HTML is printed by PHP
?>

<?php
#reference images for pager
$prev = '<img src="' . $config->virtual_path . '/images/arrow_prev.gif" border="0" />';
$next = '<img src="' . $config->virtual_path . '/images/arrow_next.gif" border="0" />';

#Create a connection
# connection comes first in mysqli (improved) function
$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));


# Create instance of new 'pager' class
$myPager = new Pager(2,'',$prev,$next,'');
$sql = $myPager->loadSQL($sql,$iConn);  #load SQL, pass in existing connection, add offset
$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));

if(mysqli_num_rows($result) > 0)
{//show records

    while($row = mysqli_fetch_assoc($result))
    {
        echo '<p>';
        echo 'DogID: <b>' . $row['DogID'] . '</b> ';
        echo 'Breed: <b>' . $row['Breed'] . '</b> ';
        echo 'Trainability: <b>' . $row['Trainability'] . '</b> ';
        
        echo '<a href="dog_view.php?id=' . $row['dogID'] . '">' . $row['DogID'] . '</a>';
        
        echo '<img src="' . $config->virtual_path . '/uploads/dog' . dbOut($row['dogID']) . '_thumb.jpg" />';
        
        echo '</p>';
    }    

}else{//inform there are no records
    echo '<p>There are currently no dogs</p>';
}

if(mysqli_num_rows($result) > 0)
{#records exist - process
	if($myPager->showTotal()==1){$itemz = "dog";}else{$itemz = "dogs";}  //deal with plural
    echo '<p align="center">We have ' . $myPager->showTotal() . ' ' . $itemz . '!</p>';
	while($row = mysqli_fetch_assoc($result))
	{# process each row
          echo '<p align="center">
            <a href="' . $config->virtual_path . '/dog_view.php?id=' . (int)$row['DogID'] . dbOut($row['Breed']) . '">' . '</a>
            </p>';
	}
	//the showNAV() method defaults to a div, which blows up in our design
    echo $myPager->showNAV();//show pager if enough records 
    
    //the version below adds the optional bookends to remove the div design problem
    //echo $myPager->showNAV('<p align="center">','</p>');
}else{#no records
    echo "<p align=center>What! No dogs?  There must be a mistake!!</p>";	
}
@mysqli_free_result($result);
@mysqli_close($iConn);

get_footer();
?>
