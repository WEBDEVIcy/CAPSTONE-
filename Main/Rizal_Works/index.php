
<p class="section-subtitle">Jose Rizal Work's</p>

<h2 class="h2 section-title has-underline">
  Read some chapter 
  <span class="span has-before"></span>
</h2>

<main class="page-content">
    <?php
$books = array(
    array(
        "title" => "Noli Me Tangere",
        "description" => "Love, injustice, and revolution in Spanish colonial Philippines, revealed through poignant characters.",
        "link" => "http://localhost/Capstone/Main/Rizal_Works/Pages/book1/index.php"
    ),
    array(
        "title" => "El Filibusterismo",
        "description" => "Passion, vengeance, and rebellion ignite in the sequel to Noli Me Tangere."
    ),
    array(
        "title" => "La Solidaridad",
        "description" => "Filipino reformist newspaper advocating for change during Spanish rule."
    ),
    array(
        "title" => "Mi Último Adiós",
        "description" => "Poem by Jose Rizal, farewell to homeland, sparks patriotism."
    ),
    array(
        "title" => "Makamisa",
        "description" => "Unfinished novel by Jose Rizal, explores societal issues, lost manuscript."
    ),
    array(
        "title" => "The Reign of Greed",
        "description" => "Sequel to Noli Me Tangere by Jose Rizal, critiques corruption."
    ),
    array(
        "title" => "Si Pagong at si Matsing",
        "description" => "Filipino fable. Turtle and monkey. Wise strategy triumphs over cunning."
    ),
    array(
        "title" => "Junto Al Pasig",
        "description" => "Romantic tale. Spanish era. Intrigues and secrets. Adventures along Pasig River."
    )
);

foreach ($books as $book) {
    echo '<div class="cards imgworks">';
    echo '<div class="content">';
    echo '<h2 class="works_title text-white">' . $book["title"] . '</h2>';
    echo '<p class="description">' . $book["description"] . '</p>';
    // Check if the link is available for this book
    if (isset($book["link"])) {
        echo '<a href="' . $book["link"] . '" class="btn">Read Now</a>';
    } else {
        echo '<button class="btn" disabled>Coming Soon</button>';
    }
    echo '</div>';
    echo '</div>';
}
?>
</main>


</body>
</html>
