<?php 
    require('database.php');
    $query = 'SELECT * from customers ORDER BY customerID';
    $statement = $db->prepare($query);
    $statement->execute(); // customers list
    $customers = $statement->fetchAll();
    $statement->closeCursor();

    $query = 'SELECT DISTINCT reference FROM customers';
    $statement = $db->prepare($query);
    $statement->execute(); // reference list
    $references = $statement->fetchAll();
    $statement->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>2DT Bookstore - Join Mailing List</title>
    <link rel="stylesheet" href="style/mailing_list.css">
    <link href="style/images/favicon.ico" rel="icon" type="image/x-icon" />
    <script type="text/javascript" language="javascript" src="style/js/mailing_list.js"></script>  
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
              <img src="style/images/logo.png" alt="logo" width="70"/>
            </div>
            <nav>
                <ul>
                    <li><a class="active" href="contact.php">Back to Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <form action="add_customer.php" method="POST">
            <div class="table">
                <div id="title">Join Mailing List</div>
    
                <div>First Name:</div>
                <div><input class="filling-box" name="firstname" type="text" maxlength="30" minlength="2" required></div>
                
                <div>Last Name:</div>
                <div><input class="filling-box" name="lastname" type="text" maxlength="30" minlength="2" required></div>

                <div>Email:</div>
                <div><input class="filling-box" name="email" type="email" maxlength="35" required></div>

                <div>Address:</div>
                <div><input class="filling-box" name="address" type="text" maxlength="255" minlength="1" required></div>

                <div>State:</div>
                <select id="state" name="state" required>
                    <option class="filling-box" value="" selected="selected">-- Select State -- </option>
                </select>
                
                <div>City:</div>
                <select id="city" name="city" required>
                    <option class="filling-box" value="" selected="selected">-- Select City -- </option>
                </select>

                <div>Zip-code:</div>
                <div><input class="filling-box" name="zip" type="text" maxlength="5" minlength="5" required></div>
                
                <div>How did you hear about us?</div>
                <div>
                    <input class="filling-box" list="genre-choice" name="hear" maxlength="255" minlength="5" required>
                    <datalist id="genre-choice">
                        <?php foreach ($references as $reference) :?> 
                        <option value="<?php echo $reference['reference']; ?>">
                            <?php echo $reference['reference']; ?>
                        </option>
                        <?php endforeach ?>
                    </datalist>
                </div>

                <div id="last">
                    <input type="submit" value="Submit Information" id="btn">
                    <script>
                        function checkName() {
                            alert("Thank you for joining 2DT Bookstore's mailing list!");
                        }
                        const btn = document.querySelector("#btn");
                        btn.addEventListener("click", checkName);
                    </script>
                </div>
            </div>
        </form>
    </main>

    <footer>

    </footer>
</body>
</html>