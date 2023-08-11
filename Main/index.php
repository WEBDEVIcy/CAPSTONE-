<?php
// Check if the user is logged in
if (!isset($_COOKIE['username'])) {
    header("Location: index.php");
    exit();
}
?>


<!doctype html>
<html lang="en">
<head>
  <title>RizJourney</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="shortcut icon" href="../Landing/assets/images/logo.png" type="image/x-icon">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="./Rizal_Works/assets/css/styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../Landing/assets/css/style.css">
  <link rel="stylesheet" href="../Setting/assets/css/style.css">
  <link rel="stylesheet" href="../Main/Rizal_Works/Pages/book1/assets/css/style.css">
</head>
<body>

  

<div class="wrapper d-flex align-items-stretch">
  <nav id="sidebar" style="background-color: var(--old-rose);">
    <div class="custom-menu">
      <button type="button" id="sidebarCollapse" class="bi bi-arrow-right-square" style="background: none; border: none; font-size: 30px; margin-top:-20px; color: var(--old-rose);">
      </button>
    </div>

    
    <div class="img bg-wrap text-center py-4" style="background-image: url(images/bg_1.jpg); border-top-left-radius: 20px; border-top-right-radius: 20px;">
      <div class="user-logo">
        <div class="img" style="background-image: url(images/profile.png);"></div>
        <h3>
        <?php echo $_COOKIE['username']; ?>
        </h3>

      </div>
    </div>
    <ul class="list-unstyled components mb-5">
      <li class="active home-link"> <!-- Added the "home-link" class for Home link -->
        <a href="#"><span class="fa fa-home mr-3"></span> Home</a>
      </li>
      <li>
        <a id="rizalWorksLink"><span class="fa fa-book mr-3"></span> Rizal Works</a>
      </li>
      <li>
        <a id="rizalLifeLink"><span class="fa fa-bookmark mr-3"></span> Rizal Life</a>
      </li>
      


    </ul>
  </nav>
  <br><br><br>
  <div class="sign-out-button position-absolute top-0 end-0 mt-4 me-4" style="margin-left: 1200px;">
    <a href="../Login_Page/index.php"  style="color: black; padding: 8px;  border-radius: 10px; font-size: 15px; color: var(--old-rose); "> Sign Out</a>

    <li>
      <a id="setting"><span class="fa fa-cog mr-3" style="margin-left: 20px;">
    </span></a>
    </li>
</div>



  <!-- Page Content  -->
  <div id="content" class="p-4 p-md-5 pt-5">
    <p class="section-subtitle">Welcome To RizaJourney</p>

<h2 class="h2 section-title has-underline">
  Let's Learn History
  <span class="span has-before"></span>
</h2>

<div>
  <p class="section-subtitle">Jose Rizal's Famous Books</p>

  <br>

  <main class="page-content">
    <div class="cards imgworks">
        <div class="content">
            <h2 class="works_title text-white">Noli Me Tangere</h2>
            <p class="description">Love, injustice, and revolution in Spanish colonial Philippines, revealed through poignant characters.</p>
            <a href="http://localhost/Capstone/Main/Rizal_Works/Pages/book1/index.php" class="btn">Read Now</a>
        </div>
    </div>

    <div class="cards imgworks">
        <div class="content">
            <h2 class="works_title text-white">El Filibusterismo</h2>
            <p class="description">Passion, vengeance, and rebellion ignite in the sequel to Noli Me Tangere.</p>
            <button class="btn" disabled>Coming Soon</button>
        </div>
    </div>

    <div class="cards imgworks">
        <div class="content">
            <h2 class="works_title text-white">Mi Último Adiós</h2>
            <p class="description">Poem by Jose Rizal, farewell to homeland, sparks patriotism.</p>
            <button class="btn" disabled>Coming Soon</button>
        </div>
    </div>

    <div class="cards imgworks">
        <div class="content">
            <h2 class="works_title text-white">Makamisa</h2>
            <p class="description">Unfinished novel by Jose Rizal, explores societal issues, lost manuscript.</p>
            <button class="btn" disabled>Coming Soon</button>
        </div>
    </div>
</main>

  </div>

  <br>

  <p class="section-subtitle">RizJourney - Book List</p>

  <br>

  <div class="card-body list" style="background-color: var(--old-rose_30); ">

    <!-- Form for adding new books -->
    <form id="addBookForm">
      <div class="form-group">
        <h2 class="h2 section-title">
          Book Title  </h2>
        <input type="text" class="form-control" id="bookTitle" required>
      </div>
      <button type="submit" class=" quiz-button " style="margin-left: 320px; margin-top: 30px; margin-bottom: 20px;">Add Book</button>
    </form>
  
    <!-- Table to display the list of books -->
    <div class="table-responsive">
      <table class="table mt-4">
        <thead>
          <tr>
            <th>Action</th>
            <th>Book Title</th>
          </tr>
        </thead>
        <tbody id="bookList">
          <!-- This area will be populated dynamically using JavaScript -->
        </tbody>
      </table>
    </div>
  </div>
  







</div>


  </div>
</div>



<div class="footer-bottom">
        <p class="copyright">
          &copy; 2023 All right reserved ❤ RizJourney.
        </p>
      </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>
  // Store the original content of the "Home" page when the page loads
  var originalContent;

  $(document).ready(function() {
    originalContent = $('#content').html();
  });

  // Function to load Rizal Works content using AJAX
  function loadRizalWorksContent() {
    $.ajax({
      url: './Rizal_Works/index.php',
      type: 'GET',
      success: function (response) {
        $('#content').html(response);
      },
      error: function () {
        alert('Failed to load Rizal Works content.');
      }
    });
  }

  // Function to load Rizal Life content using AJAX
  function loadRizalLifeContent() {
    // Replace the URL below with the actual destination for Rizal Life content
    $.ajax({
      url: './Rizal_Life/index.php',
      type: 'GET',
      success: function (response) {
        $('#content').html(response);
      },
      error: function () {
        alert('Failed to load Rizal Life content.');
      }
    });
  }

  // Function to load Settings content using AJAX
  function loadSettingsContent() {
    // Replace the URL below with the actual destination for Settings content
    $.ajax({
      url: './Setting/index.php',
      type: 'GET',
      success: function (response) {
        $('#content').html(response);
      },
      error: function () {
        alert('Failed to load Settings content.');
      }
    });
  }

  // Event listener for clicking on the "Home" link (Restores the original content)
  $('.home-link').on('click', function (e) {
    e.preventDefault();
    $('#content').html(originalContent);
  });

  // Event listener for clicking on the "Rizal Works" link
  $('#rizalWorksLink').on('click', function (e) {
    e.preventDefault();
    loadRizalWorksContent();
  });

  // Event listener for clicking on the "Rizal Life" link
  $('#rizalLifeLink').on('click', function (e) {
    e.preventDefault();
    loadRizalLifeContent();
  });

  // Event listener for clicking on the "Setting" link
  $('#setting').on('click', function (e) {
    e.preventDefault();
    loadSettingsContent();
  });


  // Get the button element
const sidebarButton = document.getElementById('sidebarCollapse');

// Add a click event listener to the button
sidebarButton.addEventListener('click', function() {
  // Toggle the 'flipped' class on the button
  this.classList.toggle('flipped');
});


   // Sample initial data
const initialBooks = [];

// Function to render the book list
function renderBooks(books) {
  const bookListContainer = document.getElementById('bookList');
  bookListContainer.innerHTML = '';

  books.forEach(book => {
    const row = document.createElement('tr');
    row.innerHTML = `
      <td>${book.title}</td>
      <td>
        <button class="btn btn-sm btn-danger" onclick="deleteBook(${book.id})">Delete</button>
      </td>
    `;
    bookListContainer.appendChild(row);
  });
}

// Function to add a new book
function addBook(event) {
  event.preventDefault();

  const bookTitleInput = document.getElementById('bookTitle');
  const newBookTitle = bookTitleInput.value.trim();

  if (newBookTitle !== '') {
    const newBook = { id: Date.now(), title: newBookTitle };
    initialBooks.push(newBook);
    renderBooks(initialBooks);

    // Clear the input field after adding
    bookTitleInput.value = '';
  }
}

// Function to delete a book
function deleteBook(bookId) {
  const updatedBooks = initialBooks.filter(book => book.id !== bookId);
  initialBooks.length = 0; // Clear the existing array
  initialBooks.push(...updatedBooks); // Add the filtered books back to the array
  renderBooks(updatedBooks);
}

// Event listener for form submit
document.getElementById('addBookForm').addEventListener('submit', addBook);

// Initial render of books
renderBooks(initialBooks);



</script>

</body>
</html>


