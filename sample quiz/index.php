<!DOCTYPE html>
<html>
<head>
    <title>Quiz</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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
                <button class="btn btn-primary" style=" margin-left: 20px;">Previous</button>
            </div>
            <div class="ml-auto mr-sm-5">

                <button class="btn btn-success" id="next">Next</button>

            </div>
        </div>
        <div class="text-center mt-3" id="result" style="display: none;">
            <h3>Your score: <span id="score"></span> out of <span id="total"></span></h3>
            <button class="btn btn-success" id="nextChapter" style="display: none; margin-left: 950px;">Next Chapter</button>
        </div>
    </div>

    <script>

        fetch('quiz_data.json')
            .then(response => response.json())
            .then(data => {
                const quiz = data.quiz;
                let currentQuestionIndex = 0;
                let score = 0;

                function showQuestion(questionIndex) {
                    const question = quiz[questionIndex];
                    const questionText = question.question;
                    const choices = question.choices;

                    document.getElementById('question').innerText = `Q. ${questionText}`;

                    const optionsContainer = document.getElementById('options');
                    optionsContainer.innerHTML = '';

                    choices.forEach((choice, index) => {
                        const label = document.createElement('label');
                        label.className = 'options';
                        label.innerText = choice;

                        const radioInput = document.createElement('input');
                        radioInput.type = 'radio';
                        radioInput.name = 'radio';
                        radioInput.value = String.fromCharCode(97 + index); 

                        const span = document.createElement('span');
                        span.className = 'checkmark';

                        label.appendChild(radioInput);
                        label.appendChild(span);

                        optionsContainer.appendChild(label);
                    });
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
                        document.getElementById('nextChapter').style.display = 'block';
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

                const submitButton = document.getElementById('next');
                submitButton.addEventListener('click', () => {
                    const selectedOption = document.querySelector('input[name="radio"]:checked');
                    if (selectedOption) {
                        const selectedAnswer = selectedOption.value;
                        calculateScore(selectedAnswer);
                        showNextQuestion();
                    }
                });


                showQuestion(currentQuestionIndex);

                document.getElementById('prev').addEventListener('click', showPreviousQuestion);


                document.getElementById('nextChapter').addEventListener('click', () => {

                    currentQuestionIndex = 0;
                    score = 0;
                    document.getElementById('result').style.display = 'none';
                    document.getElementById('question').style.display = 'block';
                    document.getElementById('options').style.display = 'block';
                    document.getElementById('prev').style.display = 'block';
                    document.getElementById('next').style.display = 'block';
                    document.getElementById('nextChapter').style.display = 'none';
                    showQuestion(currentQuestionIndex);
                });
            })
            .catch(error => console.error('Error loading quiz data:', error));
    </script>
</body>
</html>
