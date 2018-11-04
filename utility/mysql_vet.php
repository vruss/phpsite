<?php
$servername = "localhost";
$username = "phpmyadmin";
$password = "mysql";
$dbname = "vet_hospital";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

// Query
$sql = "SELECT * FROM Custumers";
$result = $conn->query($sql);

// Print result
printCustomers($result);

$sql = "SELECT * FROM Employees";
$result = $conn->query($sql);

echo "<br>";
printEmployees($result);

$sql = "SELECT * FROM Pets";
$result = $conn->query($sql);

echo "<br>";
printPets($result);

$sql = "SELECT * FROM Visits";
$result = $conn->query($sql);

echo "<br>";
printVisits($result);

$conn->close();

function printCustomers($result)
{
    if ($result->num_rows > 0)
    {
        echo "<h5>Customers</h5>";
        echo "<table id='tables'><tr><th>ID</th><th>Type</th><th>Customer Name</th><th>Street</th><th>City</th><th>State</th><th>Zip Code</th><th>Phone Number</th><th>Fax Number</th></tr>";
        // output data of each row
        while ($row = $result->fetch_assoc())
        {
            echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["Type of Customer"] . "</td><td>" . $row["Customer Name"] . "</td><td>" . $row["Street"] . "</td><td>" . $row["City"] . "</td><td>" . $row["State"] . "</td><td>" . $row["Zip Code"] . "</td><td>" . $row["Phone Number"] . "</td><td>" . $row["Fax Number"] . "</td></tr>";
        }
        echo "</table>";
    }
    else
    {
        echo "0 results";
    }
}
function printEmployees($result)
{
    if ($result->num_rows > 0)
    {
        echo "<h5>Employees</h5>";
        echo "<table id='tables'><tr><th>ID</th><th>Last Name</th><th>First Name</th><th>Educational Degree</th><th>Hire Date</th><th>Address</th><th>City</th><th>State</th><th>Zip</th><th>Home Phone</th></tr>";
        // output data of each row
        while ($row = $result->fetch_assoc())
        {
            echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["Last Name"] . "</td><td>" . $row["First Name"] . "</td><td>" . $row["Educational Degree"] . "</td><td>" . $row["Hire Date"] . "</td><td>" . $row["Address"] . "</td><td>" . $row["City"] . "</td><td>" . $row["State"] . "</td><td>" . $row["Zip"] . "</td><td>" . $row["Home Phone"] . "</td></tr>";
        }
        echo "</table>";
    }
    else
    {
        echo "0 results";
    }
}
function printPets($result)
{
    if ($result->num_rows > 0)
    {
        echo "<h5>Pets</h5>";
        echo "<table id='tables'><tr><th>ID</th><th>OwnerID</th><th>Name</th><th>Type of Animal</th><th>Breed</th><th>Date of Birth</th><th>Gender</th></tr>";
        // output data of each row
        while ($row = $result->fetch_assoc())
        {
            echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["CustomerID"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["Type of Animal"] . "</td><td>" . $row["Breed"] . "</td><td>" . $row["Date of Birth"] . "</td><td>" . $row["Gender"] . "</td></tr>";
        }
        echo "</table>";
    }
    else
    {
        echo "0 results";
    }
}
function printVisits($result)
{
    if ($result->num_rows > 0)
    {
        echo "<h5>Visits</h5>";
        echo "<table id='tables'><tr><th>ID</th><th>CustomerID</th><th>PetID</th><th>VeterinarianID</th><th>Visit Date</th><th>Treatment / Medication</th><th>Price</th></tr>";
        // output data of each row
        while ($row = $result->fetch_assoc())
        {
            echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["CustomerID"] . "</td><td>" . $row["PetID"] . "</td><td>" . $row["VeterinarianID"] . "</td><td>" . $row["Visit Date"] . "</td><td>" . $row["Treatment / Medication"] . "</td><td>" . $row["Price"] . "</td></tr>";
        }
        echo "</table>";
    }
    else
    {
        echo "0 results";
    }
}
?>
