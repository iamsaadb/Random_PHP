
<?php
$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "gatorhousing";


//SUPERGLOBALS


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

    <h1> SEARCH RESULTS: </h1> <br><br>
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
$search = $_POST['search'];
if ($search==NULL) {
    $sql = "SELECT price, type, address, nBed, nBath, description, zipcode FROM property";
}
else {
    $sql = "SELECT price, type, address, nBed, nBath, description, zipcode FROM property WHERE zipcode = '$search'";
}

$result = $conn -> query($sql);
$select = $_POST['select'];

echo $search;
if($result->num_rows>0 ){
    while($row = $result -> fetch_assoc()){
        //$imageData = $row["image"];
        if ($row["type"]==$select || $select=="All"){
            if ($search!=NULL && $row['zipcode']==$search ){
                echo "<br> Type: ". $row["type"]. " <br> 
                - description: ". $row["description"]. "<br>
                - price: ". $row["price"]. "<br>
                - address: ". $row["address"]. "<br>
                - Bedrooms: ". $row["nBed"]. "<br>
                - Bathrooms: ". $row["nBath"]. "<br>
                - ZipCode: " .$row["zipcode"]."<br>";  
            }
            else {
                echo "<br> Type: ". $row["type"]. " <br> 
                - description: ". $row["description"]. "<br>
                - price: ". $row["price"]. "<br>
                - address: ". $row["address"]. "<br>
                - Bedrooms: ". $row["nBed"]. "<br>
                - Bathrooms: ". $row["nBath"]. "<br>
                - ZipCode: " .$row["zipcode"]."<br>";
                
            }

        }
     
    }}
    else { echo "NO RESULTS";
    }
$conn->close();
?>
    </body>
</html>