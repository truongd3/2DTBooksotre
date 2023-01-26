<?php
require('database.php');
$query = 'SELECT * from bookCategories ORDER BY bookCategoryID';
$statement = $db->prepare($query);
$statement->execute();
$category_names = $statement->fetchAll();
$statement->closeCursor();

$query = 'SELECT * from books ORDER BY bookCategoryID';
$statement = $db->prepare($query);
$statement->execute();
$rows = $statement->fetchAll();
$statement->closeCursor();

$name = filter_input(INPUT_POST, 'name'); // input type - name
$genre = filter_input(INPUT_POST, 'genre'); // input type - genre
$description = filter_input(INPUT_POST, 'description'); // input type - name
$code = filter_input(INPUT_POST, 'code'); // input type - genre
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT); // input type - name

$category_id = 1; // for the bookCategories table
foreach ($category_names as $category_name) {
    if ($category_name['bookCategoryName'] == $genre) {
        break;
    }
    $category_id += 1;
}

$error = "Information already existed: ";
$book_id = 1;
foreach ($rows as $row) { // for the books table
    if ($row['bookName'] == $name) {
        $error = $error . ' name # ';
    }
    if ($row['bookCode'] == $code) {
        $error = $error . ' code # ';
    }
    $book_id += 1;
}

if ($error != "Information already existed: ") {
    $error = $error . '<a class="active" href="create.php">Type again</a>.';
    include('error.php');
} else {
    if ($category_id == sizeof($category_names) + 1) { // insert new category
        require_once('database.php'); // insert new category
        $query = 'INSERT INTO bookCategories
                (bookCategoryID, bookCategoryName)
            VALUES
                (:category_id, :genre)';
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->bindValue(':genre', $genre);
        $statement->execute();
        $statement->closeCursor();
    }

    require_once('database.php'); // insert new category
    $query = 'INSERT INTO books
                (bookID, bookCategoryID, bookCode, bookName, description, price, dateAdded)
            VALUES
                (:book_id, :category_id, :code, :name, :description, :price, NOW())';
    $statement = $db->prepare($query);
    $statement->bindValue(':book_id', $book_id);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':price', $price);
    $statement->execute();
    $statement->closeCursor();

    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Book Create</title>
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
            <h1>New Book Created Successfully</h1>
        </main>
    
        <footer></footer>
    </body>
    </html>';
}
?>
