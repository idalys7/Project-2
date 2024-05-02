document.addEventListener('DOMContentLoaded', function () {

    /** Function to convert numbers to words */
    function convertNumberToWords(number) {
        const ones = ['', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
        const teens = ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];
        const tens = ['', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];
        const thousands = ['', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion'];

        if (number === 0) {
            return "zero";
        }
        if (number < 0) {
            return "minus " + convertNumberToWords(Math.abs(number));
        }

        let words = "";
        let i = 0;

        while (number > 0) {
            const x = number % 1000;
            if (x !== 0) {
                if (words !== "") {
                    words = convertNumberToWordsInHundreds(x) + " " + thousands[i] + " " + words;
                } else {
                    words = convertNumberToWordsInHundreds(x) + " " + thousands[i];
                }
            }
            number = Math.floor(number / 1000);
            i++;
        }

        return words;
    }

    /** Function to convert numbers less than 1000 to words */
    function convertNumberToWordsInHundreds(number) {
        const ones = ['', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
        const teens = ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];
        const tens = ['', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];

        let words = "";
        if (number % 100 < 10 || number % 100 >= 20) {
            words = ones[number % 10];
            number = Math.floor(number / 10);
            words = tens[number % 10] + " " + words;
            number = Math.floor(number / 10);
        } else {
            words = teens[number % 10];
            number = Math.floor(number / 100);
        }

        if (number === 0) {
            return words;
        } else {
            return ones[number] + " hundred " + words;
        }
    }

    /** Function to convert all numbers on the data page to words */
    function convertNumbersToWordsOnPage() {
        const elementsWithNumbers = document.querySelectorAll('.content div');

        elementsWithNumbers.forEach(function (element) {
            const text = element.innerText;
            const numbersInText = text.match(/\d+/g);

            if (numbersInText) {
                numbersInText.forEach(function (numbers) {
                    const number = parseInt(numbers);
                    if (!isNaN(number)) {
                        const words = convertNumberToWords(number);
                        element.innerText = element.innerText.replace(numbers, words);
                    }
                });
            }
        });
    }

    /** Add event listener to the button */
    document.getElementById('button-convert-id').addEventListener('click', function () {
        convertNumbersToWordsOnPage();
    });

    /** Add event listener for the tooltip events */
    const tool = document.getElementById('tool');
    tool.addEventListener('mouseover', showTooltip);
    tool.addEventListener('mouseout', hideTooltip);

    /** Function to show tooltip */
    function showTooltip() {
        const tooltip = document.querySelector(".tooltip");
        tooltip.style.display = "block";
    }

    /** Function to hide tooltip */
    function hideTooltip() {
        const tooltip = document.querySelector(".tooltip");
        tooltip.style.display = "none";
    }
})