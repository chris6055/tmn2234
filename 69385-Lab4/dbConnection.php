<!--server validation -->
<?php

//    function test_input($data) {
//        $data = trim($data);
//        $data = stripslashes($data);
//        $data = htmlspecialchars($data);
//        return $data;
//      }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $firstname= ($_POST['firstName']);
        $lastname= ($_POST['lastName']);
        $email= ($_POST['email']);
        $phonenumber= ($_POST['phoneNumber']);
        $password= ($_POST['password']);
        $password2= ($_POST['password2']);
        $state= ($_POST['state']);
        //$gender= test_input($_POST['gender']);
        $radio1= false;
        $radio2= false;

        //firstname
        if (empty($firstname)){
            $firstname = false;
            echo "<script>alert('First name cannot be empty. Form not submitted, please try again.')</script>";
			exit();
        }else{
            if (!preg_match("/^[a-zA-Z\s]+$/", $firstname)){
                $firstname = false;
                echo "<script>alert('Invalid first name. Form not submitted, please try again.')</script>";
				exit();
            }
            $firstname = true;
        }

        //last name
        if (empty($lastname)){
            $lastname = false;
            echo "<script>alert('Last name cannot be empty. Form not submitted, please try again.')</script>";
			exit();
        }else{
            if (!preg_match("/^[a-zA-Z\s]+$/", $lastname)){
                $lastname = false;
                echo "<script>alert('Invalid last name. Form not submitted, please try again.')</script>";
				exit();
            }
            $lastname = true;
        }

        //email
        if (empty($_POST["email"])){
            $email = false;
			echo "<script>alert('Email cannot be empty. Form not submitted, please try again.')</script>";
			exit();
        }else{
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$email = false;
				echo "<script>alert('Invalid email format. Form not submitted, please try again.')</script>";
				exit();
			}
			$email = true;
        }

        //phone number
        if (empty($_POST["phoneNumber"])){
            $phonenumber = false;
			echo "<script>alert('Mobile number cannot be empty. Form not submitted, please try again.')</script>";
			exit();
        }else{
            if (!preg_match("/^(\+?6?01)[0|1|2|3|4|6|7|8|9]\-*[0-9]{7,8}$/", $phonenumber)){
				$phonenumber = false;
				echo "<script>alert('Invalid Malaysian mobile number. Form not submitted, please try again.')</script>";
				exit();
			}
			$phonenumber = true;
        }

        //password
        if (empty($_POST["password"])){
            $password = false;
			echo "<script>alert('Password cannot be empty. Form not submitted, please try again.')</script>";
			exit();
        }else{
            if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6}$/", $password)){
			$password = false;
            echo "<script>alert('Invalid password. Required 6 digits length, contain ONE upppercase, ONE lowercase, ONE special character, numbers and no space. Form not submitted, please try again.')</script>";
			exit();
			}
			$password = true;
        }

        //confirm password
        if (empty($_POST["password2"])){
            $password2 = false;
			echo "<script>alert('Confirm password cannot be empty. Form not submitted, please try again.')</script>";
			exit();
        }else{
            if ($password2 != $password){
            $password2 = false;
			echo "<script>alert('Passwords does not match. Form not submitted, please try again.')</script>";
			exit();
			}
			$password2 = true;
        }

        //state
        if ($state===""){
			$state= false;
            echo "<script>alert('Please choose a state. Form not submitted, please try again.')</script>";
			exit();
        }
		else{
			$state= true;
		}

        //gender and tnc
        if(!isset($_POST['gender'])){
            $radio1= false;
			echo "<script>alert('Please select your gender. Form not submitted, please try again.')</script>";
			exit();
        }else {
            $radio1= true;
        }
        if(!isset($_POST['tnc'])){
            $radio2= false;
			echo "<script>alert('Please agree term and condition. Form not submitted, please try again.')</script>";
			exit();
        }else {
            $radio2= true;
        }
    }

	if ($firstname == true && $lastname == true && $email == true && $phonenumber == true && $password == true && $password2 == true && $state == true && $radio1 == true && $radio2 == true){
        $firstname= ($_POST['firstName']);
        $lastname= ($_POST['lastName']);
        $email= ($_POST['email']);
        $phonenumber= ($_POST['phoneNumber']);
        $password= ($_POST['password']);
        $password2= ($_POST['password2']);
        $state= ($_POST['state']);
        $gender= ($_POST['gender']);
        //Database connection
        $conn = new mysqli ('localhost', 'p1-admin', 'dummy123', 'myDB');
        if ($conn->connect_error){
            die('Connection Failed : ' .$conn->connect_error);
        }
        else{
            $stmt = $conn->prepare("INSERT INTO myUser(firstname, lastname, email, phonenumber, password, state, gender)
                VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssisss", $firstname, $lastname,  $email, $phonenumber, $password, $state, $gender);
            $stmt->execute();
            echo "<script>alert('Registration successfully.')</script>";
            
        }
	}
    else{
        echo"<script>alert('Form not submitted, please try again.')</script>";
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Web Based Lab 4
	</title>
	<style type= "text/css">
		table, th, td {border: 1px solid black;}
	</style>
</head>
<body>
	<h2>Log Information.</h2>
	<table style="width:100%">
	  <tr>
		<th>UserID</th>
		<th>Email</th>
		<th>Login date and time</th>
		<th>Duration</th>
		<?php 
			$sql = "SELECT myUser.userID, myUser.email, myuserlog.login_date_time, myuserlog.duration FROM myUser INNER JOIN myUserLog ON myUser.userID = myUserLog.user_id ORDER BY myUserLog.login_date_time";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0){
				while ($row = $result->fetch_assoc()){
					echo "<tr><td>" .$row['userID']."</td><td>".$row['email']."</td><td>".$row['login_date_time']."</td><td>".$row['duration']."</td></tr>";
				}
			}else{
				echo "0 results";
			}
			$stmt->close();
			$conn->close();
		?>
	  </tr>
	</table>
	<br>
	<br>
	
	
</body>
</html>