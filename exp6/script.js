var previousResults = [];

        function isResultRepeated(resultText) {
            return previousResults.includes(resultText);
        }

        function appendResult(resultText) {
            const node = document.createElement("p");
            const textnode = document.createTextNode(resultText);
            node.appendChild(textnode);
            document.getElementById("myList").appendChild(node);

            // Store the result to avoid duplicates
            previousResults.push(resultText);
        }

        function factorial() {
            let n = document.getElementById("numberInput").value;
            let result = 1;
            for (let i = 1; i <= n; i++) {
                result *= i;
            }
            const resultText = "Factorial of " + n+" is " + result;

            document.getElementById('fact').textContent = resultText;
              }
          

            // if (!isResultRepeated(resultText)) {
            //     appendResult(resultText);
            // }
        
        function Fibbonaci() {
            var number = document.getElementById("numberInput").value;
            var fibSeries = [0, 1];

            for (var i = 2; i <= number; i++) {
                fibSeries[i] = fibSeries[i - 1] + fibSeries[i - 2];
            }

            const resultText = "Fibonacci Series of " +number+" is " + fibSeries.join(", ");

            if (!isResultRepeated(resultText)) {
                appendResult(resultText);
            }
        }

        function isPrime(num) {
            for (var i = 2; i < num; i++) {
                if (num % i === 0) {
                    return false;
                }
            }
            return num > 1;
        }

        function Primenumbers() {
            var number = document.getElementById("numberInput").value;
            var primes = [];

            for (var i = 2; i <= number; i++) {
                if (isPrime(i)) {
                    primes.push(i);
                }
            }

            const resultText = "Prime Numbers of " +number+" is "+ primes.join(", ");

            if (!isResultRepeated(resultText)) {
                appendResult(resultText);
            }
        }

        function Palindrome() {
            var inputString = document.getElementById("numberInput").value;
            var reversedString = inputString.split("").reverse().join("");

            const resultText = inputString + (inputString === reversedString ? " is a palindrome." : " is not a palindrome.");

            if (!isResultRepeated(resultText)) {
                appendResult(resultText);
            }
        }