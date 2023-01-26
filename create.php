<?php 
    require('database.php');
    
    $query = 'SELECT * from bookCategories ORDER BY bookCategoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>2DT Bookstore - Create</title>
    <link rel="stylesheet" href="style/create.css">
    <link href="style/images/favicon.ico" rel="icon" type="image/x-icon"/>
    <script type="text/javascript" language="javascript" src="style/js/create.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
              <img src="style/images/logo_black.png" alt="logo" width="70"/>
            </div>
            <nav>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a class="active" href="create.php">Create</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <h1>Create New Book</h1>
        <form action="add_book.php" method="POST" id="create_form">
            <div class="table">
                <div id="title">Enter New Book Information</div>
    
                <div>Book Name:</div>
                <div><input class="filling-box" name="name" type="text"  maxlength="255" minlength="1" required></div>
                
                <div>Category:</div>
                <div>
                    <input class="filling-box" list="genre-choice" type="text" name="genre" maxlength="20" minlength="4" required>
                    <datalist id="genre-choice">
                        <?php foreach ($categories as $category) :?> 
                        <option value="<?php echo $category['bookCategoryName']; ?>">
                            <?php echo $category['bookCategoryName']; ?>
                        </option>
                        <?php endforeach ?>
                    </datalist>
                </div>
                
                <div>Brief Description:</div>
                <div><textarea name="description" rows="4" cols="30" placeholder="Type description here" maxlength="255" minlength="15"></textarea></div>
                
                <div>Book Code:</div>
                <div><input class="filling-box" name="code" maxlength="10" minlength="6" placeholder="6-10 characters" required></div>
                
                <div>Price:</div>
                <div><input class="filling-box" id="price" name="price" type="number" step="0.01" min="2" maxlength="10" oninput="javascript: if ((this.value.length > this.maxLength) && (this.value.charAt(this.maxLength))=='.') this.value = this.value.substring(0, this.maxLength); else if ((this.value.length > this.maxLength) && (this.value.charAt(this.maxLength-1))=='.') this.value = this.value.substring(0, this.maxLength-1); else if (this.value.length > this.maxLength) this.value = this.value.substring(0, this.maxLength);" required></div>
            
                <div><input type="reset" value="Clear Information"></div>
                <div><input type="submit" value="Submit New Book" onclick="CheckPrice()"></div>
            </div>
        </form>

        <a href="books.php" id="mailing-list-btn">View All Books</a>
    </main>

    <footer>
        <div class="footer-content">
            <h3>2DT Bookstore</h3>
            <p>Thank you for visiting! We propably update our website in the future.</p>
            <ul class="socials">
                <li><a href="https://www.facebook.com/ducthuansidco"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://www.linkedin.com/in/2dt/"><i class="fa fa-linkedin-square"></i></a></li>
                <li><a href="https://www.instagram.com/2dtkingslayer/"><i class="fa fa-instagram"></i></a></li>
                <li><a href="https://www.youtube.com/channel/UC8suz7ZRvQ8mSRlu65ogJ1w"><i class="fa fa-youtube"></i></a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>copyright &copy; 2023 2DT Bookstore. Designed by <span>2DT</span></p>
        </div>
    </footer>
</body>
</html>