<?php include 'includes/config.php'?>
<?php
if(isset($_GET['day']))
{//from the querystring
    $day = $_GET['day'];    
}else{//from the system clock
    $day = date('l');
    
}



     
?>
<?php get_header();?>
<h3>Daily</h3>
<p>Current contents of the variable day: <?=$day?></p>
<p><a href="?day=Monday">Monday</a></p>
<p><a href="?day=Tuesday">Tuesday</a></p>
<p><a href="?day=Wednesday">Wednesday</a></p>
<p><a href="?day=Thursday">Thursday</a></p>
<p><a href="?day=Friday">Friday</a></p>
<p><a href="?day=Saturday">Saturday</a></p>
<p><a href="?day=Sunday">Sunday</a></p>

<?php

$text = '';
$color = '';
$image = '';
$alt = '';


//retrieves day of week, 'Sunday'
$day = date ('l');



switch($day){
  
    case 'Tuesday':
        $coffee = 'Iced Coffee';
        $image = 'iced-coffee.jpg';
        $color = 'blue';
        $alt = 'Ice Coffee';
    break;
        
     case 'Wednesday':
        $coffee = 'Drip';
        $image = 'drip.jpg';
        $color = 'red';
        $alt = 'Drip';

    break;
        
     case 'Thursday':
        $coffee = 'Cappuccino';
        $image = 'cappuccino.jpg';
        $color = 'purple';
        $alt = 'Cappuccino';

    break;
        
     case 'Friday':
        $coffee = 'Latte';
        $image = 'latte.jpg';
        $color = 'green';
        $alt = 'Latte';

    break;
        
     case 'Saturday':
        $coffee = 'Mocha';
        $image = 'mocha.jpg';
        $color = 'yellow';
        $alt = 'Mocha';

    break;
        
     case 'Sunday':
        $coffee = 'Americano';
        $image = 'americano.jpg';
        $color = 'black';
        $alt = 'Americano';

    break;
    
     case 'Monday':
        $coffee = 'Espresso';
        $image = 'espresso.jpg';
        $color = 'orange';
        $alt = 'Espresso';

    break;
        
    default: //in case of error
        $coffee = 'Iced Coffee';
        $image = 'iced-coffee.jpg';
        $color = 'blue';
        $alt = 'Iced Coffee';

        
}



?>

        <p>
    		 <img src="img/<?=$image?>" alt=<?=$alt?> id="coffee" />
            <strong class="feature"><?=$day?>'s Coffee Special:</strong> <?=$day?>'s daily coffee special is <strong class="feature"><?=$coffee?></strong>, which makes us wish it was always Fall, as this is one of our top sellers!</p>
        <p><span class="feature"><?=$coffee?> is </span> Gluten-free selfies normcore chillwave. Listicle 90's chambray, seitan cold-pressed try-hard Etsy authentic flexitarian vinyl. Meditation bespoke freegan, single-origin coffee cred seitan 90's gentrify brunch Williamsburg squid cold-pressed. Brooklyn readymade Tumblr wayfarers ethical.</p>
        <p><span class="feature">Enjoy Pumpkin Spice with our </span> Polaroid iPhone plaid, Pitchfork Shoreditch paleo. Hashtag keytar chia scenester Pinterest, semiotics tousled food truck. YOLO scenester deep v, taxidermy paleo quinoa McSweeney's Carles VHS mustache Williamsburg gluten-free readymade cold-pressed. Truffaut Thundercats Schlitz, listicle organic Brooklyn paleo squid asymmetrical readymade migas gluten-free Austin.</p>
		 <p>
		 <b>At LargeBuck$ we aspire to: </b>Aesthetic gentrify YOLO McSweeney's typewriter single-origin coffee. Slow-carb hella listicle lomo, Helvetica single-origin coffee butcher stumptown. Chambray try-hard church-key mumblecore, tote bag PBR cardigan. Retro Austin Brooklyn, blog Intelligentsia gentrify jean shorts sartorial bicycle rights gastropub. Aesthetic wayfarers Pitchfork, tattooed Carles quinoa meh leggings distillery pork belly banjo. Umami cred lumbersexual skateboard, pork belly Tumblr vegan letterpress. Fixie bicycle rights butcher chillwave, gluten-free health goth Echo Park locavore whatever.

		 </p>
		<p>
		Gluten-free selfies normcore chillwave. Listicle 90's chambray, seitan cold-pressed try-hard Etsy authentic flexitarian vinyl. Meditation bespoke freegan, single-origin coffee cred seitan 90's gentrify brunch Williamsburg squid cold-pressed. Brooklyn readymade Tumblr wayfarers ethical. Biodiesel VHS Godard High Life, tousled Banksy craft beer. Mlkshk direct trade locavore, mumblecore keytar artisan hashtag fap. Cred cronut Brooklyn, locavore art party small batch PBR semiotics ennui kitsch taxidermy mlkshk stumptown.
		</p>
		<p>
		Polaroid iPhone plaid, Pitchfork Shoreditch paleo. Hashtag keytar chia scenester Pinterest, semiotics tousled food truck. YOLO scenester deep v, taxidermy paleo quinoa McSweeney's Carles VHS mustache Williamsburg gluten-free readymade cold-pressed. Truffaut Thundercats Schlitz, listicle organic Brooklyn paleo squid asymmetrical readymade migas gluten-free Austin. Etsy Wes Anderson 8-bit retro, polaroid synth paleo banh mi before they sold out Vice. Bushwick fap Intelligentsia, whatever Etsy High Life Kickstarter migas retro Banksy YOLO Carles yr raw denim. Gluten-free fixie taxidermy pop-up, actually Kickstarter flannel put a bird on it master cleanse.
		</p>
		<p>
		Text provided by <a href="http://hipsum.co/" target="_blank">Hipster Ipsum</a>
		</p>
     </main>

<?php get_footer ();?>


