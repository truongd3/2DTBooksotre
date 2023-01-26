<?php
    require('database.php');
    
    $query = 'SELECT bookID, bookName, description, bookCategoryID, price, dateAdded FROM books ORDER BY bookID';
    $statement = $db->prepare($query);
    $statement->execute();
    $all_book_info = $statement->fetchAll();
    $statement->closeCursor();

    $size = sizeof($all_book_info);

    $query = 'SELECT * FROM bookCategories ORDER BY bookCategoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $all_categories = $statement->fetchAll();
    $statement->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>2DT Bookstore - Home</title>
    <link rel="stylesheet" href="style/home.css">
    <link rel="stylesheet" href="style/styles.css">
    <link href="style/images/favicon.ico" rel="icon" type="image/x-icon"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
</head>
<body>
  <header>
    <div class="container">
      <div class="logo"><img src="style/images/logo_white.png" alt="logo" width="70"/></div>
      <nav>
        <ul>
          <li><a class="active" href="home.php">Home</a></li>
          <li><a href="create.php">Create</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- begin loop -->
  <?php foreach ($all_book_info as $book) :
    echo 
        '<div class="popup-screen" id="popup' . $book["bookID"] . '">
            <div class="popup-box">
                <i class="fas fa-times close-btn" onclick="close_clicked(' . $book["bookID"] . ')"></i>
                <script type="text/javascript" language="javascript" src="style/js/home.js"></script>
                <h2 id="popup-title">' . $book["bookName"] . '</h2>
                <p id="popup-description">Description: ' . $book["description"] . '</p>
                <p id="popup-category">Category: ' . $all_categories[$book['bookCategoryID'] - 1]['bookCategoryName'] . '</p>
                <p id="popup-price">Price: $' . $book["price"] . '</p>
                <p id="popup-dateadded">Date added: ' . substr($book["dateAdded"], 5, 5) . '-' . substr($book["dateAdded"], 0, 4) . '</p>
            </div>
        </div>';?> 
    <?php endforeach ?>
    <!-- end loop -->

    <!-- <div class="popup-screen">
        <div class="popup-box">
            <i class="fas fa-times close-btn" onclick="close_clicked()"></i>
            <script type="text/javascript" language="javascript" src="style/js/home.js"></script>

            <p id="popup-dateadded">Date added</p>
            <a href="create.php" class="btn">Add more books</a>
        </div>
    </div> -->
    
    <main class="formain">
        <h4><i class="material-symbols-outlined" style="font-size:28px;">minimize</i><i class="material-symbols-outlined" style="font-size:28px;">minimize</i><i class="material-symbols-outlined" style="font-size:28px;">minimize</i> Welcome to <i class="material-symbols-outlined" style="font-size:28px;">minimize</i><i class="material-symbols-outlined" style="font-size:28px;">minimize</i><i class="material-symbols-outlined" style="font-size:28px;">minimize</i></h4>
        <h1>2DT Bookstore</h1>
        <h3>"The book's value does not fade away because the student leaves it unopened." - B Ray</h3>
        <div class="description">
            <p>2DT Bookstore is managed by Truong Dang. Purchases made online or in store at the 2DT Bookstore benefit 
                the students that are abandoned or have poor living condition in Vietnam. Once you own a book, read and 
                cherish it so that the book can be as valuable as possible. If your books are not in use anymore, 2DT 
                Bookstore accepts donations.</p>
        </div>

        <hr>

        <h2>Highlights in 2DT Bookstore</h2>
        <section class="cards">
            <article class="card">
                <a href="#">
                    <figure class="thumbnail">
                        <img src="style/images/book/0133128911.jpg" alt="placeholder">
                    </figure>
                    <div class="card-content">
                        <ul class="moredetail">
                            <li><strong>Title:</strong> Basics of WEB DESIGN HTML5 & CSS3</li>
                            <li><strong>Genre:</strong> Technology</li>
                            <li><strong>Price:</strong> $19.99</li>
                        </ul>
                    </div>
                    <div class="card-actions">
                        <span class='button'>See More</span>
                    </div>  
                </a>
            </article>          
                  
            <article class="card">
                <a href="#">
                    <figure class="thumbnail">
                        <img src="style/images/book/0132145375.jpg" alt="placeholder">
                    </figure>
                    <div class="card-content">
                        <ul class="moredetail">
                            <li><strong>Title:</strong> Database Processing: Fundamentals, Design, and Implementation</li>
                            <li><strong>Genre:</strong> Technology</li>
                            <li><strong>Price:</strong> $14.19</li>
                        </ul>
                    </div>
                    <div class="card-actions">
                        <span class='button'>See More</span>
                    </div>
                </a>
            </article>

            <article class="card">
                <a href="#">
                    <figure class="thumbnail">
                        <img src="style/images/book/013336092X.jpg" alt="placeholder">
                    </figure>
                    <div class="card-content">
                        <ul class="moredetail">
                            <li><strong>Title:</strong> Starting Out with C++: Early Objects</li>
                            <li><strong>Genre:</strong> Technology</li>
                            <li><strong>Price:</strong> $10.79</li>
                        </ul>
                    </div>
                    <div class="card-actions">
                        <span class='button'>See More</span>
                    </div>
                </a>
            </article>           

            <article class="card">
                <a href="#">
                <script type="text/javascript" language="javascript" src="style/js/home.js"></script>
                    <figure class="thumbnail"><img src="style/images/book/0133485080.jpg" alt="placeholder"></figure>
                    <div class="card-content">
                        <ul class="moredetail">
                            <li><strong>Title:</strong> Introduction to Engineering Analysis</li>
                            <li><strong>Genre:</strong> Technology</li>
                            <li><strong>Price:</strong> $13.79</li>
                        </ul>
                    </div>
                    <div class="card-actions"><span class='button'>See More</span></div>
                </a>
            </article>
            <!-- begin loop -->
            <?php foreach ($all_book_info as $book) :
                echo 
                '<article class="card" id="book'. $book['bookID'] .'">
                    <a id="'. $book['bookID'] .'" onclick="a_clicked('. $book['bookID'] .')">
                        <figure class="thumbnail"><img id="booknew'. $book['bookID'] .'" src="style/images/book/book' . $book['bookID'] . '.jpeg" alt="placeholder"></figure>
                        <div class="card-content">
                            <ul class="moredetail">
                                <li><strong>Title:</strong> ' . $book['bookName'] . '</li>
                                <li><strong>Genre:</strong> ' . $all_categories[$book['bookCategoryID'] - 1]['bookCategoryName'] . '</li>
                                <li><strong>Price:</strong> $' . $book['price'] . '</li>
                            </ul>
                        </div>
                        <div class="card-actions">
                            <span class="button">See More</span>
                        </div>
                    </a>
                </article>';?> 
            <?php endforeach ?>
            <!-- end loop -->
        </section>

        <div class="card-actions">
            <button id="load-more" onclick="LoadMore()">Load More</button> 
            <br><br>
            <div>Showing <span id="index">4</span> of <?php echo ($size + 4) ?> books</div>
            <script type="text/javascript" language="javascript" src="style/js/home.js"></script>
        </div>
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
            <p>copyright &copy;2023 2DT Bookstore. Designed by <span>2DT</span></p>
        </div>
    </footer>
</body>
</html>