<?php
require('database.php');
$query = 'SELECT * from customers ORDER BY customerID';
$statement = $db->prepare($query);
$statement->execute(); // customers list
$customers = $statement->fetchAll();
$statement->closeCursor();

$firstname = filter_input(INPUT_POST, 'firstname'); // input type - first name
$lastname = filter_input(INPUT_POST, 'lastname'); // input type - last name
$email = filter_input(INPUT_POST, 'email'); // input type - email
$address = filter_input(INPUT_POST, 'address'); // input type - address
$city = filter_input(INPUT_POST, 'city'); // input type - city
$state = filter_input(INPUT_POST, 'state'); // input type - state
$zip = filter_input(INPUT_POST, 'zip'); // input type - zip
$reference = filter_input(INPUT_POST, 'hear');

$customer_id = 1;
$error = "";
foreach ($customers as $customer) { // for the books table
    if ($customer['emailAddress'] == $email) {
        $error = 'Email has already been used! <a class="active" href="mailing_list.php">Use different email</a>.';
    }
    $customer_id += 1;
}

if ($firstname == null || $firstname == false || $lastname == null || $lastname == false || $email == null || $email == false || $address == null || $address == false || $city == null || $city == false || $state == null || $state == false || $zip == null || $zip == false || $reference == null || $reference == false) {
    $error = "Invalid input! Check all fields again.";
    include('error.php');
} else if ($error != "") {
    include('error.php');
} else {
    require_once('database.php'); // insert new category
    $query = 'INSERT INTO customers
                (customerID, firstName, lastName, emailAddress, streetAddress, city, state, zipCode, reference, dateAdded)
            VALUES
                (:customerID, :firstName, :lastName, :emailAddress, :streetAddress, :city, :state, :zipCode, :reference, NOW())';
    $statement = $db->prepare($query);
    $statement->bindValue(':customerID', $customer_id);
    $statement->bindValue(':firstName', $firstname);
    $statement->bindValue(':lastName', $lastname);
    $statement->bindValue(':emailAddress', $email);
    $statement->bindValue(':streetAddress', $address);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':zipCode', $zip);
    $statement->bindValue(':reference', $reference);
    $statement->execute();
    $statement->closeCursor();

    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Mailing List</title>
        <link rel="stylesheet" href="style/create.css">
        <link href="style/images/favicon.ico" rel="icon" type="image/x-icon" />
    </head>
    <body>
        <header>
            <div class="container">
                <div class="logo">
                  <img src="style/images/logo.png" alt="logo" width="70"/>
                </div>
                <nav>
                    <ul>
                        <li><a href="home.php">Home</a></li>
                        <li><a href="create.php">Create</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </header>
    
        <main>
            <h1>Customer Joined Successfully</h1>
        </main>
    
        <footer>

        </footer>
    </body>
    </html>';
}
?>
