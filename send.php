<?php  

		

if (isset($_POST['name']) && isset($_POST['nationalid']) && isset($_POST['phone']) && isset($_POST['states']) && isset($_POST['message']) && isset($_POST['country'])) {
	include 'db_conn.php';

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	$name = validate($_POST['name']);
	$message = validate($_POST['message']);
	$states = validate($_POST['states']);
	$country = validate($_POST['country']);
	$nationalid = validate($_POST['nationalid']);
	$phone = validate($_POST['phone']);

	if (empty($country) || empty($message) || empty($states) || empty($phone) || empty($nationalid	) || empty($name)) {
		header("Location: index.html");
	}else {

		$sql = "INSERT INTO test(name,	phone, message, nationalid, states, country) VALUES('$name', '$phone', '$message', '$nationalid', '$states', '$country')";
		$res = mysqli_query($conn, $sql);

		if ($res) {
			echo 
			'<script type="text/javascript">
           window.location = "invoice.php"
      </script>';
		}else {
			echo "Your message could not be sent!";
		}
	}

}else {
	header("Location: index.html");
}