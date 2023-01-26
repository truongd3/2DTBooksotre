<!DOCTYPE html>
<html>
    <!-- the head section -->
    <head>
        <title>Book Create</title>
        <link rel="stylesheet" href="style/home.css">
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
        <h3>There was an error.</h3>
        <h3>Error message: <?php echo $error; ?></h3>
    </main>

    <footer>
        <p>Name: Truong Duc Dang</p>
		<p>Date: December 09, 2022</p>
		<p>Course/Section: IT 202 001</p>
		<p>Semester Project Phase 3</p>
    </footer>
    </body>
</html>