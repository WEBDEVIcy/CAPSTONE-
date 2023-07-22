<!DOCTYPE html>
<html>
<head>
    <title>Quiz</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1 class="quiz-title text-center">Welcome to the Quiz!</h1>
        <div class="card quiz-card">
            <div class="card-body">
                <form method="post">
                    <?php
                    function present_question($question_data, $question_number) {
                        echo '<h3 class="card-title">Question ' . $question_number . ':</h3>';
                        echo '<p class="card-text">' . $question_data['question'] . '</p>';
                        foreach ($question_data['choices'] as $index => $choice) {
                            echo '<div class="form-check">';
                            echo '<input type="radio" class="form-check-input" name="q' . $question_number . '" id="q' . $question_number . 'choice' . ($index + 1) . '" value="' . ($index + 1) . '">';
                            echo '<label class="form-check-label" for="q' . $question_number . 'choice' . ($index + 1) . '">' . $choice . '</label>';
                            echo '</div>';
                        }
                    }

                    function start_quiz($quiz_data) {
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $score = 0;
                            foreach ($quiz_data as $index => $question) {
                                $user_choice = isset($_POST['q' . ($index + 1)]) ? intval($_POST['q' . ($index + 1)]) : null;
                                $correct_answer_index = array_search($question['answer'], ['a', 'b', 'c', 'd']);
                                if ($user_choice === $correct_answer_index + 1) {
                                    $score++;
                                }
                            }
                            echo '<h2 class="card-title text-center">Quiz finished! Your score: ' . $score . '/' . count($quiz_data) . '</h2>';
                        } else {
                            foreach ($quiz_data as $index => $question) {
                                present_question($question, $index + 1);
                            }
                            echo '<button type="submit" class="btn btn-primary quiz-submit-btn">Submit Answers</button>';
                        }
                    }

                    function load_quiz_data($file_path) {
                        $quiz_json = file_get_contents($file_path);
                        $quiz_data = json_decode($quiz_json, true);
                        return $quiz_data['quiz'];
                    }

                    $quiz_data = load_quiz_data('quiz_data.json');
                    start_quiz($quiz_data);
                    ?>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
