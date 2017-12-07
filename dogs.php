<?php include 'includes/config.php'?>
<?php get_header();?>
<h3>dogs</h3>
<?php

$sql = "select * from dogs";

$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
if (mysqli_num_rows($result) > 0)//at least one record!
{//show results
	while ($row = mysqli_fetch_assoc($result))
    {
	   echo "<p>";
	   echo "DogID: <b>" . $row['DogID'] . "</b><br />";
	   echo "Breed: <b>" . $row['Breed'] . "</b><br />";
	   echo "Trainability: <b>" . $row['Trainability'] . "</b><br />";
       echo '<img src="uploads/dog' . $id . '.jpg" />';
	   echo "</p>";
    }
}else{//no records
	echo '<div align="center">What! No dogs?  There must be a mistake!!</div>';
}

@mysqli_free_result($result); #releases web server memory
@mysqli_close($iConn); #close connection to database



    
    
?>    
<?php get_footer();?>