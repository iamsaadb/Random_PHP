
<?php
$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "gatorhousing";
// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} ?>

<html>
    <header>
       <title>
        Form 1
       </title> 
    </header>
    <body center>
     <form method=POST action="return.php">
     <select name="select">
            <option  value="All">All</option>
            <option  value="Apartment">Apartment</option>
            <option  value="Condo">Condo</option>
            <option  value="House">House</option>
            <option  value="Studio">Studio</option>
          </select>
          <input type="search" name="search"  placeholder="Enter a value"> 
          <input type="submit" value="Search" >
    </form>
    </body>
</html>
