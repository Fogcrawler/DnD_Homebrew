<?php
	session_start();
	include "db/db.php";
	include "db/db.php.show"; 
	//include "db/error.php";  
	//echo " $host  $dbname   $user <br />";
	?>

<html><head><title>DnD Homebrew</title>
<style>
body {margin: 0; padding: 0;
background-color: #ffffff;
color:#996633;
font-family:"Arial","sans-serif";color:#700070;font-size:14px;}
pre{margin: 0; padding: 0;font-family:"Arial","sans-serif";color:#000000;font-size:14px;}


#content{
font-family: Arial, Helvetica, sans-serif;
font-size: 16px;
color: #3b242a;
background-color:white;	
position:absolute;
left:350px;
top:250px;
}

div {
    background: linear-gradient(to bottom right, #ff5050 0%, #ccff33 100%);
}

body{
background-image: url('https://cdnb.artstation.com/p/assets/images/images/007/866/467/large/sergey-vasnev-sergey-vasnev-1-187.jpg?1509019057');		
}


</style>
</head>
<body>

<div id = "content">
<form method="post">

&nbsp;	Name of Homebrew: <input type="text" name="name" maxlength="32"> <br />
&nbsp;  <label for="homebrew">Choose your Homebrew type:</label>
 <select name="homebrew" id="homebrew">
    <option value="Items">Items</option>
    <option value="Spells">Spells</option>
    <option value="Races">Races</option>
    <option value="Feats">Feats</option>
    <option value="Monsters">Monsters</option>
    <option value="Subclasses">Subclasses</option>
    <option value="Backgrounds">Backgrounds</option>	
  </select> <br />

<button type="submit">Submit</button>

</form>
<?php  

if(empty($_POST['name'])){  $name_input = "name";  } 
	else {	$name_input=$_POST['name'];	}

if(empty($_POST['homebrew'])){  $homebrew_input = "homebrew";  } 
	else {	$homebrew_input=$_POST['homebrew'];	}	


	//echo "DEBUG FORM $name_input : $class_input<br /> ";
if ( $name_input != "name" ){
//sql input	*******************************	
	//echo "DEBUG made it past if $hostname $username  <br />"; 		

	if(!($connection = mysqli_connect($host,$user, $pass))) die ("Counld not connect to database.");
 
	
	mysqli_select_db( $connection,  $dbname);
	

	$result = mysqli_query ($connection,"SELECT CURDATE();");
	$row = mysqli_fetch_row($result);
	$date = $row[0];

	$result = mysqli_query ($connection, "SELECT CURTIME();");
	$row = mysqli_fetch_row($result);
	$time = $row[0];
	
	$str0 = '';
	$str1 = $_SERVER['REMOTE_ADDR'];
	$str2 = $time;
	$str3 = $date;
	$str4 = $name_input;  
	$str5 = $homebrew_input;

//echo " $str4 : $str5 : $homebrew_input <br>"; 
$query = "INSERT INTO `type` (`id`, `ip`, `time`, `date`, `name`, `homebrew`) VALUES (NULL, '$str1', '$str2', '$str3', '$str4', '$str5');";
//used this to debugINSERT INTO `formdata` (`id`, `ip`, `timein`, `datein`, `name`, `number`) VALUES (NULL, '12.0.0.1', 'now', 'now', 'test', '101902901');
	//echo "$query";
	$result = @ mysqli_query ($connection,$query);
		//$result = @ mysqli_query ($connection,$query);			
		mysqli_close($connection);
}
?>
<pre>

<?php
echo "<a href='index2.php'>-NEXT PAGE-</a>";

$_SESSION["name"] = $name_input;

$_SESSION["homebrew"] = $homebrew_input;
?>
</pre>
</div>
</body>
</html>