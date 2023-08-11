
<p class="section-subtitle">Jose Rizal Life</p>

<h2 class="h2 section-title has-underline">
  Read some chapter 
  <span class="span has-before"></span>
</h2>
    
<main class="page-content">
    <?php
    $books = array(
        array(
            "title" => "Origins",
            "description" => " Early influences and formative years that shaped Rizal's character.",
            "link" => "http://localhost/Capstone/Main/Rizal_Works/Pages/book1/index.php"
        ),
        array(
            "title" => "Education",
            "description" => "Pursuit his academic journey, thirst for knowledge, and passion for learning."
        ),
        array(
            "title" => "Awakening",
            "description" => "Experiences that ignited Rizal's nationalistic sentiments and awareness."
        ),
        array(
            "title" => "Exploration",
            "description" => "Rizal's thirst for knowledge led him to explore various fields of study and cultures."
        ),
        array(
            "title" => "Advocacy",
            "description" => "Throughout his life, he passionately advocated for social and political reforms."
        ),
        array(
            "title" => "Resistance",
            "description" => "Rizal bravely resisted oppression and fought for the rights of his fellow countrymen."
        ),
        array(
            "title" => "Visionary",
            "description" => " He had a profound vision for the Philippines' future, envisioning a better nation."
        ),
        array(
            "title" => "Sacrifice",
            "description" => "Rizal's life was marked by selflessness and dedication to his country's cause."
        )
    );

    foreach ($books as $book) {
        echo '<div class="cards imglife">';
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
