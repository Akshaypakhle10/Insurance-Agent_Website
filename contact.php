<!DOCTYPE html>
<html> 
<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="utf-8"/>
    <meta name="description" content="">
    <meta name="author" content="">

    <title>INVESTMENT ADVISOR</title>

    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" />
    <link rel="stylesheet" href="css/jquery.fancybox-1.3.4.css" type="text/css" />

</head>
<body>
	<!-- header-wrap -->
<div id="header-wrap">
    <header>

        <hgroup>
            <h1><a href="index.html"> INVESTMENT ADVISOR</h1></a>
            
        </hgroup>
         <nav>
            <ul id="navigation">
                <li><a href="#main">Home</a></li>
                <li><a href="#services">Services</a></li>
               <!-- <ul>
                        <li><a href="#">Endowment Plan</a></li>
                        <li><a href="#">Children Plan</a></li>
                        <li><a href="#">Money Back Plan</a></li>
                        <li><a href="#">Single Premium Plan</a></li>
                        <li><a href="#">Term Plan</a></li>
                        <li><a href="#">Pension Plan</a></li>
                        <li><a href="#">Health Plan</a></li>
                </ul>
                <li><a href="#styles">Styles</a></li> 
                <li><a href="#portfolio">Our Works</a></li>-->
                <li><a href="#about-us">About Us</a></li>
                
                <li><a href="#contact">Contact Us</a></li>
            </ul>
        </nav>

    </header>
</div>


<div class="content-wrap">

    <!-- main -->
    <section id="main">

<?php

$F_NameErr = $L_NameErr = $Ph_noErr = $EmailErr="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(empty($_POST["fname"]))
    {
        $F_NameErr = "Name is Required";
    }
    else
    {
        $fname = test_input($_POST["fname"]);

        //check if name only contains letters and whitespace
        if(!preg_match("/^[a-zA-Z]*$/", $fname))
        {
            $F_NameErr="Only letters and white space allowed";
        }
    }

    if(empty($_POST["lname"]))
    {
        $L_NameErr = "Last Name is Required";
    }
    else
    {
        $lname = test_input($_POST["lname"]);

        //check if name only contains letters and whitespace
        if(!preg_match("/^[a-zA-Z]*$/", $lname))
        {
            $L_NameErr="Only letters and white space allowed";
        }
    }




    if(empty($_POST["phno"]))
    {
        $Ph_noErr = "Phone Number is Required";
    }
    else
    {
        $phno = test_input($_POST["phno"]);

        //check if name only contains number
        if(!preg_match("/^[0-9]*$/", $phno))
        {
            $Ph_noErr="Only Number allowed";
        }
    }




    if(empty($_POST["email"]))
    {
        $EmailErr = "Name is Required";
    }
    else
    {
        $email = test_input($_POST["email"]);

        //check if name only contains letters and whitespace
        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            $EmailErr="Invaild Email format";
        }
    }

}
function test_input($data)
{
    $data=trim($data) ;
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}


?>

<h2> Contact Details</h2>
<br>
<p> <span class ="error"> * required field.</span></p>
<br>
<form method ="post" action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> ">

Name :<input type="text" name ="fname" value ="<?php echo $fname; ?>">   
<span class "error">* <?php echo  $F_NameErr; ?> </span> <br><br>

Last Name :<input type="text" name ="lname" value ="<?php echo $lname; ?>">   
<span class "error">* <?php echo  $L_NameErr; ?> </span> <br><br>

Phno :<input type="number" name ="phno" value ="<?php echo $phno; ?>">   
<span class "error">* <?php echo  $Ph_noErr; ?> </span> <br><br>

Last Name :<input type="text" name ="email" value ="<?php echo $email; ?>">   
<span class "error">* <?php echo  $EmailErr; ?> </span> <br><br>

<input type = "submit" name = "submit" value = "Submit">

</form>

<?php

    $host = "localhost";
    $user = "root";
    $pass ="";
    $db = "agent";
    $con = mysqli_connect($host,$user,$pass,$db);


    if(!$con)
        die("Connection is not done...".mysqli_error());
    else
    {

      mysqli_select_db($con,"agent");

      if(isset($_POST['submit']))
      {
        header("Location:index.html");
        $query ="insert into clientinfo values('$fname','$lname','$phno','$email','')";

        $res = mysqli_query($con,$query);

        if(!$res)
            die("record is not inserted...".mysqli_error($con));

        else
        {
            echo"<br> Thank You, We will contact you shortly.";
           
        }
      }

    }

?>




</section>
</div>







</body>
</html>