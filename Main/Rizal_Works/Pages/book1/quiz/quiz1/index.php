<!DOCTYPE html>
<html>
<head>
    <title>Quiz</title>
    <link rel="stylesheet" href="./styles.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <br>  <br>  <br>  <br>  <br>  <br>
    <div class="container mt-sm-5 my-1">
        <div class="question ml-sm-5 pl-sm-5 pt-2">
            <div class="py-2 h5"><b id="question"></b></div>
            <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                <label class="options">
                    <input type="radio" name="radio" value="a">
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>
        <div class="d-flex align-items-center pt-3">
            <div id="prev">
                <button class="btn previous" style="margin-left: 20px; background-color: hsl(357, 37%, 62%); color: white;">Previous</button>
            </div>
            <div class="ml-auto mr-sm-5 button">
                <button class="btn Next" id="next" style="border: 1px solid hsl(357, 37%, 62%); color: hsl(357, 37%, 62%);"><span>Next</span></button>
            </div>
        </div>
        <div class="text-center mt-3" id="result" style="display: none;">
            <h3>Your score: <span id="score"></span> out of <span id="total"></span></h3>
            <a href="../../index.php"><button class="btn Next" id="nextChapter" style="margin-left: 950px; border: 1px solid hsl(357, 37%, 62%); color: hsl(357, 37%, 62%);"><span>Next Chapter</span></button></a>
        </div>
    </div>

    <script>
        // Function to fetch quiz data from the JSON file
        function fetchQuizData() {
            return fetch('quiz_data.json')
                .then(response => response.json())
                .then(data => data.questions)
                .catch(error => {
                    console.error('Error loading quiz data:', error);
                    return [];
                });
        }

        function showQuestion(questionIndex) {
            const question = quiz[questionIndex];
            const questionText = question.question;
            const choices = question.choices;

            document.getElementById('question').innerText = `Q. ${questionText}`;

            const optionsContainer = document.getElementById('options');
            optionsContainer.innerHTML = '';

            for (const [key, value] of Object.entries(choices)) {
                const label = document.createElement('label');
                label.className = 'options';
                label.innerText = value;

                const radioInput = document.createElement('input');
                radioInput.type = 'radio';
                radioInput.name = 'radio';
                radioInput.value = key;

                const span = document.createElement('span');
                span.className = 'checkmark';

                label.appendChild(radioInput);
                label.appendChild(span);

                optionsContainer.appendChild(label);
            }
        }

        function showNextQuestion() {
            if (currentQuestionIndex < quiz.length - 1) {
                currentQuestionIndex++;
                showQuestion(currentQuestionIndex);
            } else {
                document.getElementById('result').style.display = 'block';
                document.getElementById('question').style.display = 'none';
                document.getElementById('options').style.display = 'none';
                document.getElementById('prev').style.display = 'none';
                document.getElementById('next').style.display = 'none';
                showResult();
            }
        }

        function showPreviousQuestion() {
            if (currentQuestionIndex > 0) {
                currentQuestionIndex--;
                showQuestion(currentQuestionIndex);
            }
        }

        function showResult() {
            const totalQuestions = quiz.length;
            document.getElementById('score').innerText = score;
            document.getElementById('total').innerText = totalQuestions;
        }

        function calculateScore(selectedAnswer) {
            const correctAnswer = quiz[currentQuestionIndex].answer;
            if (selectedAnswer === correctAnswer) {
                score++;
            }
        }

        function resetQuiz() {
            currentQuestionIndex = 0;
            score = 0;
            document.getElementById('result').style.display = 'none';
            document.getElementById('question').style.display = 'block';
            document.getElementById('options').style.display = 'block';
            document.getElementById('prev').style.display = 'block';
            document.getElementById('next').style.display = 'block';
            showQuestion(currentQuestionIndex);
        }

        let quiz = [];
        let currentQuestionIndex = 0;
        let score = 0;

        // Load the quiz data and initialize the quiz
        fetchQuizData()
            .then(data => {
                quiz = data;
                showQuestion(currentQuestionIndex);

                document.getElementById('prev').addEventListener('click', showPreviousQuestion);

                const submitButton = document.getElementById('next');
                submitButton.addEventListener('click', () => {
                    const selectedOption = document.querySelector('input[name="radio"]:checked');
                    if (selectedOption) {
                        const selectedAnswer = selectedOption.value;
                        calculateScore(selectedAnswer);
                        showNextQuestion();
                    }
                });
            });
    </script>

</body>
</html>
