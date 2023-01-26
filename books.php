<?php 
require('database.php');
$query = 'SELECT * from bookCategories ORDER BY bookCategoryID';
$statement = $db->prepare($query);
$statement->execute();
$category_names = $statement->fetchAll();
$statement->closeCursor();

$query = 'SELECT * from books ORDER BY bookID';
$statement = $db->prepare($query);
$statement->execute();
$rows = $statement->fetchAll();
$statement->closeCursor();
?>

<!DOCTYPE html>
<html>
<head>
    <title>2DT Bookstore - Books List</title>
    <link rel="stylesheet" href="style/books.css">
    <link href="style/images/favicon.ico" rel="icon" type="image/x-icon"/>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo"><img src="style/images/logo.png" alt="logo" width="70"/></div>
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
        <h1>Books List</h1>
        <section>
            <table>
                <tr>
                    <th>Category</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th class="right">Price</th>
                </tr>
 
                <?php foreach ($rows as $row) : ?>
                <tr>
                    <td class="col1"><?php echo $category_names[ $row['bookCategoryID'] - 1 ]['bookCategoryName']; ?></td>
                    <td class="col2"><?php echo $row['bookCode']; ?></td>
                    <td class="col3"><?php echo $row['bookName']; ?></td>
                    <td class="col4"><?php echo $row['description']; ?></td>
                    <td class="col5">$<?php echo $row['price']; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </section>
    </main>
    <footer></footer>
</body>
</html>