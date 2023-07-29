<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RizJourney</title>
    <link rel="stylesheet" href="./public/css/index.css">
    <link rel="shortcut icon" href="" type="image/x-icon">
</head>
<body>
    <nav class="navbar">
    <!-- first-group -->
    <div class="logo">RizJourney</div>
    <div class="search-bar-container">
        <form method="post" action="">
            <div class="search-bar-wrapper">
                <input type="text" name="search" placeholder="Search RizJourney">
                <button type="submit" class="round-button">Search</button>
            </div>
        </form>
    </div>
    <!-- second-group -->
    <div class="centered-buttons">
        <button><a href="#">Home</a></button>
        <button><a href="#">Biography</a></button>
        <button><a href="#">Works</a></button>
        <button><a href="#">Lessons</a></button>
        <button><a href="#">Resources</a></button>
    </div>
    <!-- last-group -->
    <div class="right-side">
        <div class="welcome-text">Hi, Reader!</div>
        <button class="login-button">Login</button>
        <label class="switch">
        <input type="checkbox" id="toggle" />
        <span class="slider round"></span>
        </label>
    </div>
    </nav>

    <div class="hero">
        <!-- first-item-[image-with-link-icons] -->
        <div class="image-container">
            <img src="./public/images/djr-3.jpg" alt="Hero Image">
            <div class="icon-row">
                <a href="#" class="icon-link"><img src="./public/images/facebook-logo.png" alt="Facebook"></a>
                <a href="#" class="icon-link"><img src="./public/images/share-icon.png" alt="Share"></a>
            </div>
        </div>
        <!-- second-item-[text-and-introduction] -->
        <div class="text-container">
            <h1>Life Lessons You Can Learn From Dr. Jose Rizal<br>Who is Jose Rizal and why is he significant?</h1>
            <p>
                Colleges and universities in the Philippines even require their students<br>
                to take a subject which centers around the life and works of Rizal.<br>
                Every year, the Filipinos celebrate Rizal Day - December 30<br>
                each year - to commemorate his life and works.<br>
                <br>
                <br>
                <br>
            </p>
            <a href="#" class="read-more">Read Full Overview</a>
            <a href="#" class="gallery-button">Gallery</a>
        </div>
    </div>

    <!-- books-section -->
    <?php
    class Book {
        private $title;
        private $author;
        private $image;
        private $buyLink;

        public function __construct($title, $author, $image, $buyLink) {
            $this->title = $title;
            $this->author = $author;
            $this->image = $image;
            $this->buyLink = $buyLink;
        }

        public function getTitle() {
            return $this->title;
        }

        public function getAuthor() {
            return $this->author;
        }

        public function display() {
            echo '<div class="book-card">';
            echo '<img src="' . $this->image . '" alt="' . $this->title . '">';
            echo '<h2>' . $this->title . '</h2>';
            echo '<p>' . $this->author . '</p>';
            echo '<a href="' . $this->buyLink . '" class="buy-button">Buy</a>';
            echo '<button class="save-book-button">Save Book</button>';
            echo '</div>';
        }
    }

    // [search-for-books]
    function searchBooks($keyword, $books) {
        $results = array();

        foreach ($books as $book) {
            // Check if the book title or author contains the keyword
            if (stripos($book->getTitle(), $keyword) !== false || stripos($book->getAuthor(), $keyword) !== false) {
                $results[] = $book;
            }
        }

        return $results;
    }

    // create-an-array-of-books
    $books = array(
        new Book("Noli Me Tangere", "Dr. Jose P. Rizal", "./public/images/noli-me-tangere.jpg", "buy-link1"),
        new Book("El Felibusterismo", "Dr. Jose P. Rizal", "./public/images/el-filibusterismo.jpg", "buy-link2"),
        new Book("The Reign of Greed", "Dr. Jose P. Rizal", "./public/images/the-reign-of-greed-el-filibusterismo.jpg", "buy-link1"),
        new Book("The Philippines a Century Hence", "Dr. Jose P. Rizal", "./public/images/the-philippines-a-century-hence.jpg", "buy-link1"),
        new Book("The Indolence of the Filipino", "Dr. Jose P. Rizal", "./public/images/the-indolence-of-the-filipino.jpg", "buy-link1"),
        new Book("Friars and Filipinos", "Dr. Jose P. Rizal", "./public/images/friars-and-filipinos.jpg", "buy-link1"),
        new Book("The Monkey and the Turtle", "Dr. Jose P. Rizal", "./public/images/the-monkey-and-the-turtle.jpg", "buy-link1"),
    );
    ?>

    <div class="heading-bs"><h3>Rizal Books You Might Also Enjoy</h3></div>
    <div class="books-section">
        <div class="book-group">
            <?php
        // display-the-books-[using-the-book-class]
        foreach ($books as $book) {
            $book->display();
        }
        ?>
        </div>
    </div>

    <!-- heading-[for-the-text] -->
    <div class="related-subjects">
        <h3>Related Subjects</h3>
        <a href="#" class=""><img src="" alt="">Fiction</a>&nbsp;&nbsp;&nbsp;
        <a href="#" class=""><img src="" alt="">Literature & Fiction</a>
    </div>

    <!-- display-search-results -->
    <?php
    if (isset($_POST['search'])) {
        $searchKeyword = $_POST['search'];
        $searchResults = searchBooks($searchKeyword, $books);

        if (!empty($searchResults)) {
            echo '<h3>Search Results:</h3>';
            echo '<div class="book-group">';
            foreach ($searchResults as $book) {
                $book->display();
            }
            echo '</div>';
        } else {
            echo '<p>No matching books found.</p>';
        }
    }
    ?>

    <!-- contact-section -->
    <div class="heading"><h3>Contact Us</h3></div>
    <div class="contact-section">
        <div class="map-container">
            <!-- google-maps-[iframe-code] -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d246093.91450299483!2d120.3176328701677!3d15.472733306010335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3396c63f4ab68e0d%3A0x13f9415d7a5bfd4b!2sTarlac%20City%2C%20Tarlac!5e0!3m2!1sen!2sph!4v1689904995360!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="contact-form-container">
            <form class="contact-form" action="submit_form.php" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <!-- footer-section -->
    <div class="footer">
        <div class="footer-group">
            <!-- first-div-[image-container] -->
            <div class="footer-item ftr-image-container">
                <img src="./public/images/lantern-1.png" alt="Logo">
            </div>

            <!-- second-div-[about-us] -->
            <div class="footer-item">
                <h3>About Us</h3>
                <a href="#">Our Team</a>
            </div>

            <!-- third-div-[my-account] -->
            <div class="footer-item">
                <h3>My Account</h3>
                <a href="#">Settings</a><br><br>
                <a href="#">Saved Book</a>
            </div>

            <!-- fourth-div-[follow-us] -->
            <div class="footer-item">
                <h3>Follow Us</h3>
                <div class="social-icons">
                    <a href="#" class="social-icon"><img src="./public/images/facebook-logo-1.png" alt="Facebook"></a>
                    <a href="#" class="social-icon"><img src="./public/images/twitter-logo.png" alt="Twitter"></a>
                    <a href="#" class="social-icon"><img src="./public/images/instagram-logo.png" alt="Instagram"></a>
                </div>
            </div>
        </div>

        <!-- fifth-div-[copyright] -->
        <div class="footer-item copyright-container">
            <p>&copy; 2023 RizJourney</p>
        </div>
    </div>
</body>
</html>