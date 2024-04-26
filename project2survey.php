<!DOCTYPE html>
<html>

<head>
    <title>Survey: PHP Questions</title>
    <link rel="stylesheet" href="project2styles.css">
</head>

<body class="main-form">

    <form action="project2submit.php" method="post" class="survey">
        <fieldset>
            <label>Enter your email: </label>
            <input type="email" name="email-name" id="email-id" required>

            <label>Enter your password: </label>
            <input type="password" name="pw-name" id="pw-id" required>
        </fieldset>

        <div>
            <label>What age are you? </label>
            <div>
                <label> <input type="radio" name="age" id="age-0" value="0" required>0-12 </label>
            </div>
            <?php
            for ($i = 13; $i < 65; $i += 5) {
                $j = $i + 4;
                echo "<div><label><input type='radio' name='age' id='age-$i' value='$i'>$i-$j </label></div>";
            }
            ?>
            <div>
                <label> <input type="radio" name="age" id="age-68" value="68">68+ </label>
            </div>
        </div>

        <div>
            <select name="gender" id="gender" required>
                <option value="">--Please select your gender--</option>
                <option value="ma">Male</option>
                <option value="fe">Female</option>
                <option value="nb">Nonbinary</option>
                <option value="gf">Genderfluid</option>
                <option value="ag">Agender</option>
                <option value="ot">Choose not to say/Other</option>
            </select>
        </div>

        <div>
            <label> What version of PHP do you use? (only include the main version number) <input type="number"
                    name="version" id="version" min="1" max="9" required> </label>
        </div>

        <div>
            <div>
                Please answer in 120 characters or fewer.
            </div>
            <label> What is your favorite part of PHP?
                <input type="text" name="favorite" id="favorite" required></label>
        </div>

        <button type="submit" name="button-submit-form" id="button-submit-form-id">Submit</button>
    </form>

    <div><a href='project2data.php'>View data page here</a></div>

    <!--Checking for and highlighting any unanswered questions then removing the highlight once answered -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('.survey');

            form.addEventListener('submit', function (event) {
                const inputs = form.querySelectorAll('input[required], select[required]');
                const unansweredQuestions = [];

                // Check for unanswered questions
                for (const input of inputs) {
                    if (input.value === '') {
                        unansweredQuestions.push(input);
                    }
                }
                // Prevent form submission
                if (unansweredQuestions.length > 0) {
                    event.preventDefault();

                    // Highlight unanswered questions
                    for (const input of unansweredQuestions) {
                        input.classList.add('unanswered');
                    }
                } else {
                    // All questions are answered, remove any existing highlights
                    for (const input of inputs) {
                        input.classList.remove('unanswered');
                    }
                }
            });

            // Remove highlight when an input is changed
            form.addEventListener('input', function (event) {
                const input = event.target;
                if (input.required && input.value !== '') {
                    input.classList.remove('unanswered');
                }
            });
        });
    </script>

</body>

</html>