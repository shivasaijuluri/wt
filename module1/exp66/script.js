function clearResults() {
    document.getElementById("myList").innerHTML = "";
}

function factorial() {
    clearResults();
    let n = document.getElementById("numberInput").value;
    let result = 1;
    for (let i = 1; i <= n; i++) {
        result *= i;
    }

    const node = document.createElement("p");
    const textnode = document.createTextNode("Factorial is " + result);
    node.appendChild(textnode);
    document.getElementById("myList").appendChild(node);
}

function Fibbonaci() {
    clearResults();
    var number = document.getElementById("numberInput").value;
    var fibSeries = [0, 1];

    for (var i = 2; i <= number; i++) {
        fibSeries[i] = fibSeries[i - 1] + fibSeries[i - 2];
    }

    const node = document.createElement("p");
    const textnode = document.createTextNode("Fibonacci Series: " + fibSeries.join(", "));
    node.appendChild(textnode);
    document.getElementById("myList").appendChild(node);
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
    clearResults();
    var number = document.getElementById("numberInput").value;
    var primes = [];

    for (var i = 2; i <= number; i++) {
        if (isPrime(i)) {
            primes.push(i);
        }
    }

    const node = document.createElement("p");
    const textnode = document.createTextNode("Prime Numbers: " + primes.join(", "));
    node.appendChild(textnode);
    document.getElementById("myList").appendChild(node);
}

function Palindrome() {
    clearResults();
    var inputString = document.getElementById("numberInput").value;
    var reversedString = inputString.split("").reverse().join("");

    const node = document.createElement("p");
    if (inputString === reversedString) {
        const textnode = document.createTextNode(inputString + " is a palindrome.");
        node.appendChild(textnode);
    } else {
        const textnode = document.createTextNode(inputString + " is not a palindrome.");
        node.appendChild(textnode);
    }
    document.getElementById("myList").appendChild(node);
}
