<?php
//Validation 
		$nameerr=$fnameerr1=$lnameerr=$usernameerr=$addresserr=$emailerr=$phonerr=$passerr="";
		$flag=true;
		$flag1=true;
		$f_name=$l_name=$gender=$dob=$mobno=$email=$address=$username=$password=$cpassword="";
		if(isset($_POST['submit']))
		{
			$f_name= $_POST['firstname'];
			$l_name= $_POST['lastname'];
			$gender = $_POST['gender'];
			$dob = $_POST['dob'];
			$mobno = $_POST['mobno'];
			$email = $_POST['email'];
			$address = $_POST['address'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$cpassword = $_POST['password1'];
			if(empty($f_name))
		{
			$nameerr="Can't be empty";
			echo $nameerr . '<br>';
			$flag=false;
		}
		elseif(!preg_match("/^[A-Za-z]+$/",$f_name))
		{
			$fnameerr1= "Must contain characters only";
			echo $fnameerr1 . '<br>';
			$flag = false;
			$flag1=false;
		}
		if(empty($l_name))
		{
			$nameerr="can't be empty";
			echo $nameerr . '<br>';
			$flag=false;
		}
		elseif(!preg_match("/^[A-Za-z]+$/",$l_name))
		{
			$lnameerr= "Must contain characters only";
			echo $lnameerr . '<br>';
			$flag = false;
			$flag1=false;
		}
		if(empty($email))
		{
			$emailerr= "Email compulsory";
			echo $emailerr . '<br>';
			$flag=false;
		}	
		if(empty($address))
		{
			$addresserr= "Address compulsory";
			echo $addresserr . '<br>';
			$flag=false;
		}
		if(empty($username))
		{
			$usernameerr= "Username compulsory";
			echo $usernameerr . '<br>';
			$flag=false;
		}	
			
		if(empty($mobno))
		{
			$phonerr = "Enter mobile number";
			echo $phonerr . '<br>';
			$flag=false;
		}
		elseif(strlen($mobno)!=10 || !preg_match("/^[0-9]+$/",$mobno))
		{
			$phonerr = "Invalid number";
			echo $phonerr . '<br>';
			$flag=false;
		}
		if(empty($password)|| empty($cpassword))
		{
			$passerr = "Password is compulsory";
			echo $passerr . '<br>';
			$flag=false;
		}
		elseif(strlen($password)< 8)
		{
			$passerr = "Password too short";
			echo $passerr . '<br>';
			$flag=false;
		}
		elseif($password != $cpassword)
		{
			$passerr = "Passwords don't match";
			echo $passerr . '<br>';
			$flag=false;
		}
		
	
		}

if($flag == true)
{
	// Create connection
	$conn = mysqli_connect("localhost","root","","form");

	// Check connection
	if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
			}
	
			$sql = "INSERT INTO Registration 
			VALUES ('$f_name','$l_name','$gender','$dob','$mobno','$email','$address','$username','$password')";
	
	if (mysqli_query($conn, $sql)) {
			echo "New record created successfully.";
			} 
	else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		mysqli_close($conn);

}


//Display user information
	/*if($flag==true)
		{

			echo "Name is ". $f_name." ".$l_name.'<br>';
			echo"You gender is ".$gender.'<br>';
			echo "You were born on ".$dob. '<br>';
			echo "We can ring you at ". $mobno .'<br>';
			echo "Your email-id ". $email .'<br>';
			echo "You stay at ". $address .'<br>';
			echo "We know you as ". $username .'<br>';
		}*/
?>