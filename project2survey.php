<!DOCTYPE html>
<html>

<head>
    <title>Survey: PHP Questions</title>
    <link rel="stylesheet" href="project2styles.css">
    <script src="project2.js"></script>
</head>

<body class="main-form">

    <form action="project2submit.php" method="post" class="survey" novalidate>
        <fieldset>
            <label>Enter your email: </label>
            <div class="tool" title="Enter a valid email address (smith@example.com)">
                <input type="email" name="email-name" id="email-id" required>
            </div>

            <label>Enter your password: </label>
            <div class="tool" title="Password is case sensitive and must conatin at least 8 characters">
                <input type="password" name="pw-name" id="pw-id" required>
            </div>
        </fieldset>

        <div class="tool" title="Select an option that identifies your current age">
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

        <div class="tool" title="Please select an option that best describes your gender">
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

        <div class="tool" title="If you are currently using version 7.4, please enter 7">
            <label> What version of PHP do you use? (only include the main version number) <input type="number"
                    name="version" id="version" min="1" max="9" required> </label>
        </div>

        <div>
            <div>
                Please answer in 120 characters or fewer.
            </div>
            <label> What is your favorite part of PHP?
                <div class="tool" title="Please share what you enjoy most about PHP">
                    <input type="text" name="favorite" id="favorite" required>
            </label>
        </div>
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

                let hasUnanswered = false;

                // Check for unanswered questions and highlight fields if there are unanswered questions
                inputs.forEach(input => {
                    const isEmpty = input.value.trim() === '';

                    if (isEmpty) {
                        input.style.border = '2px solid red';
                        hasUnanswered = true;
                    } else {
                        input.style.border = '';
                    }
                });

                if (hasUnanswered) {
                    event.preventDefault();
                }
            });

            // Initialize event listeners to handle input changes for required fields
            form.querySelectorAll('input[required], select[required]').forEach(input => {
                input.addEventListener('input', function () {
                    const isEmpty = input.value.trim() === '';

                    input.classList.toggle('unanswered', isEmpty);

                    if (isEmpty) {
                        input.style.border = '2px solid red';
                    } else {
                        input.style.border = '';
                        input.classList.remove('unanswered');
                    }
                });
            });
        });
    </script>

</body>

</html>