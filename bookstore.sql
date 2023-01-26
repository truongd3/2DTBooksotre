-- create and select the database
CREATE DATABASE bookstore;
USE bookstore;  -- MySQL command

-- create the tables
CREATE TABLE bookCategories (
    bookCategoryID     INT(11)        NOT NULL   AUTO_INCREMENT,
    bookCategoryName   VARCHAR(255)   NOT NULL,
    PRIMARY KEY (bookCategoryID)
);

CREATE TABLE books (
    bookID             INT(11)        NOT NULL   AUTO_INCREMENT,
    bookCategoryID     INT(11)        NOT NULL,
    bookCode           VARCHAR(10)    NOT NULL   UNIQUE,
    bookName           VARCHAR(255)   NOT NULL,
    description        TEXT           NOT NULL,
    price              DECIMAL(10,2)  NOT NULL,
    dateAdded          DATETIME       NOT NULL,
    PRIMARY KEY (bookID)
);

CREATE TABLE customers (
    customerID         INT            NOT NULL   AUTO_INCREMENT,
    firstName          VARCHAR(60)    NOT NULL,
    lastName           VARCHAR(60)    NOT NULL,
    emailAddress       VARCHAR(255)   NOT NULL   UNIQUE,
    streetAddress      VARCHAR(60)    NOT NULL,
    city               VARCHAR(40)    NOT NULL,
    state              VARCHAR(2)     NOT NULL,
    zipCode            VARCHAR(10)    NOT NULL,
    reference          VARCHAR(60)    NOT NULL,
    dateAdded          DATETIME       NOT NULL,
    PRIMARY KEY (customerID)
);

-- insert data into the database
INSERT INTO bookCategories VALUES  
(1, 'Self-help'),
(2, 'Fantasy'),
(3, 'Adventure'),
(4, 'Romance'),
(5, 'Sci-fi');

INSERT INTO books VALUES 
(1, 1, 'otr111', 'On the Runway', "On the Runway is an outstanding inspirational book by Morning Tony, a very mysterious author that makes netizens and the press very curious. The book On the Runway, aimed at young readers, is a collection of stories posted on his Facebook fanpage. But the content is deliberately selected, completely different from the usual type of prose. In order to guide skills, equip knowledge, and encourage young people's spirit, the book is divided into 3 parts: preparing luggage, in the waiting room, and plane boarding, corresponding respond to the process that the youth has to go through before running on the runway of life, immersing in the vast world. With a humorous, engaging voice and close rustic language, the work also addresses many problems that most young people face in adulthood such as spending and making money, treating people,...", 20.00, '2022-11-11 13:23:44'),
(2, 1, 'whty11', 'What Happened to You?', "Oprah Winfrey and Bruce D. Perry are both capable, likable narrators who are sincerely engaged with their subject matter. The performances of these two humanitarians make this a must-hear for anyone recovering from their traumatic past.", 15.49, '2022-11-11 14:23:44'),
(3, 1, 'tlwc11', 'The Light We Carry', "In an inspiring follow-up to author's critically acclaimed, #1 bestselling memoir Becoming, former First Lady Michelle Obama shares practical wisdom and powerful strategies for staying hopeful and balanced in today's highly uncertain world.", 16.99, '2022-11-11 15:23:44'),
(4, 2, 'ta4242', 'The Alchemist', "The Alchemist is a modern classic, selling millions of copies around the world and transforming the lives of countless readers across generations. Paulo Coelho's masterpiece tells the mystical story of Santiago, an Andalusian shepherd boy who yearns to travel in search of a worldly treasure. His quest will lead him to riches more different — more satisfying — than he ever imagined. Santiago's journey teaches us about the essential wisdom of listening to our hearts, of recognizing opportunity and learning to read the omens strewn along life's path, and, most importantly, to follow our dreams.", 30.00, '2022-11-11 14:55:49'),
(5, 2, 'tbdate', 'They Both Die at the End', "Adam Silvera reminds us that there's no life without death and no love without loss in this devastating yet uplifting story about two people whose lives change over the course of one unforgettable day.", 8.37, '2022-11-12 15:23:44'),
(6, 2, 'tsoaan', 'The Song of Achilles: A Novel', "A thrilling, profoundly moving, and utterly unique retelling of the legend of Achilles and the Trojan War from the bestselling author of Circe", 10.34, '2022-11-12 18:23:44'),
(7, 3, 'way737', 'Where Are You?', "A personalized search-and-find extravaganza, where you're looking for yourself! The first in the Where Are You collection, children will love exploring 6 alternative universes, spotting different versions of themselves - along with oodles of other fun challenges.", 39.99, '2022-11-12 15:23:31'),
(8, 3, 'tacce8', 'The Adventure Challenge: Couples Edition', "With this book as your guide, you and your partner will grow in new levels of your relationship through adventures and experiences you will never forget.", 49.99, '2022-11-13 14:23:44'),
(9, 3, 'taocal', 'The Adventures of Chloe and Logan', "Poems read by Mom. Poems read by Dad. Poems about older sisters and younger brothers and any other combinations you can think of!", 16.99, '2022-11-13 15:23:44'),
(10, 4, 'yfogg4', 'Yellow Flowers on Green Grass', "As one of the best-selling books in Vietnam in 2010, Yellow Flowers on Green Grass was reprinted on the first day of its release, with a total of more than 20,000 copies in print. This is also the opening book for the method of printing multiple editions of a work in Vietnam, with the paperback and hardcover editions being sold in parallel. Yellow Flowers on Green Grass adapted into a movie of the same name by director Victor Vu, premiered in October 2015 with very high box office revenue and attracted much attention from the public.", 20.00, '2022-11-14 10:23:44'),
(11, 4, 'twngok', 'Things We Never Got Over (Knockemout)', "Bearded, bad-boy barber Knox prefers to live his life the way he takes his coffee: Alone. Unless you count his basset hound, Waylon. Knox doesn't tolerate drama, even when it comes in the form of a stranded runaway bride.", 13.67, '2022-11-14 18:03:04'),
(12, 4, 'alht12', 'A Love Hate Thing', "If you love a good enemies-to-lovers trope, run—don't walk—to the nearest bookstore or library near you. — BuzzFeed", 10.99, '2022-11-14 19:21:42'),
(13, 5, 'tirt13', 'The Imperial Radch Trilogy', "Breq was once a starship. Once she was an AI with a vast and ancient metal body and troops of ancillaries, barely animate bodies that all carried her consciousness. Poll judge Ann Leckie has created a massive yet intricate interstellar empire where twisty galactic intrigues and multiple clashing cultures form a brilliant backdrop for the story of a starship learning to be a human being. Your humble editor got a copy of Ancillary Justice when it came out and promptly forced her entire family to read it.", 99.99, '2022-11-14 12:23:04'),
(14, 5, 'tddu14', 'The Dead Djinn Universe', "What a wonderful world P. Djélì Clarke has created here — an Arab world never colonized, where magic-powered trams glide through a cosmopolitan Cairo and where djinns make mischief among humans.", 100.99, '2022-11-15 18:43:40'),
(15, 5, 'twt155', 'The Wormwood Trilogy', "Part of a recent wave of work celebrating and centering Nigerian culture, this trilogy is set in a future where a fungal alien invader has swallowed big global cities, America has shut itself away and gone dark, and a new city, Rosewater, has grown up around a mysterious alien dome in rural Nigeria.", 101.99, '2022-11-14 11:23:44');

INSERT INTO customers VALUES 
(1, 'Truong', 'Dang', 'ddtblock1903@gmail.com', '250 Central Ave', 'Newark', 'NJ', '07103', 'Google Search', '2022-11-20 15:23:31'),
(2, 'Hanh', 'Pham', 'phamthimyhanh@gmail.com', '180 Bleeker St', 'Newark', 'NJ', '07103', 'Google Search', '2022-11-22 15:23:31'),
(3, 'Trang', 'Dang', 'ttd22@njit.edu', '250 Central Ave', 'Newark', 'NJ', '07103', 'Friend', '2022-11-20 16:23:31');

-- Name: Truong Duc Dang
-- Date: December 09, 2022
-- Course/Section: IT 202 001
-- Semester Project Phase 3