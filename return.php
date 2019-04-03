
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
          <input type="search" name="text" placeholder="Enter a value"> 
          <input type="submit" value="Search" >
    </form>
<?php
    // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT price, type, address, nBed, nBath, description, zipcode FROM property";
$result = $conn -> query($sql);
echo $_POST['select'];
if($result->num_rows>0 ){
    while($row = $result -> fetch_assoc()){
        echo "<br> Type: ". $row["type"]. " <br> 
        - description: ". $row["description"]. "<br>
        - price: ". $row["price"]. "<br>
        - address: ". $row["address"]. "<br>
        - Bedrooms: ". $row["nBed"]. "<br>
        - Bathrooms: ". $row["nBath"]. "<br>
        - ZipCode: " .$row["zipcode"]."<br>"
        ;
    }
    }
    else { echo "NO RESULTS";
    }
$conn->close();
?>
    </body>
</html>