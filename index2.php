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
color: #243b33;
background-color:white;	
position:absolute;
left:350px;
top:250px;
}

label,
textarea {
  font-size: 0.8rem;
  letter-spacing: 1px;
}

textarea {
  padding: 10px;
  max-width: 100%;
  line-height: 1.5;
  border-radius: 5px;
  border: 1px solid #ccc;
  box-shadow: 1px 1px 1px #999;
}

label {
  display: block;
  margin-bottom: 10px;
}

div {
    background: linear-gradient(to bottom right, #ff5050 0%, #ccff33 100%);
}

body{
background-image: url('https://cdnb.artstation.com/p/assets/images/images/007/866/467/large/sergey-vasnev-sergey-vasnev-1-187.jpg?1509019057');		
}

#display-image{
    width: 100%;
    justify-content: center;
    padding: 5px;
    margin: 15px;
</style>
</head>


<body>

<div id = "content">
	

<?php
#echo $_SESSION["name"];
echo $_SESSION["homebrew"];
?>

<form  method="post">

<label for="desc">Please write your about homebrew here....</label>
<textarea name="desc" rows="10" cols="50S">
</textarea> </br>
<button type="submit">Submit</button>
</form>


<?php  
if(empty($_POST['desc'])){  $desc_input = "desc";  } 
	else {	$desc_input=$_POST['desc'];	}

//if(empty($_POST['image'])){  $image_input = "image";  } 
	//else {	$image_input=$_POST['image'];	}	
	

	//echo "DEBUG FORM $name_input : $class_input<br /> ";
if ( $desc_input != "desc" ){
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
	$str4 = $desc_input;
	//$str5 = $image_input;

//echo " $str4 : $str5 : $homebrew_input <br>"; 
$query = "INSERT INTO `desc` (`id`, `ip`, `time`, `date`, `description`) VALUES (NULL, '$str1', '$str2', '$str3', '$str4');";
//used this to debugINSERT INTO `formdata` (`id`, `ip`, `timein`, `datein`, `name`, `number`) VALUES (NULL, '12.0.0.1', 'now', 'now', 'test', '101902901');
	//echo "$query";
	$result = @ mysqli_query ($connection,$query);
		//$result = @ mysqli_query ($connection,$query);			
		mysqli_close($connection);
}
?>

<!-- <div id="display-image">
    <?php
       // $query = " select image from desc ";
       // $result = mysqli_query($dbname, $query);
 
        //while ($data = mysqli_fetch_assoc($result)) {
    ?>
        <img src="./image/<?php //echo $data['image']; ?>">
 
    <?php
        //}
    ?>
    </div> //-->


<pre>
</pre>
<p></p>

</div>
</body>
</html>