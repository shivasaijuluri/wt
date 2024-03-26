let itemList = [];

function addItem() {
  let itemName = document.getElementById("item-name").value;
  let itemPrice = document.getElementById("item-price").value;
  let itemQuantity = document.getElementById("item-quantity").value;

  if (itemName === "" || itemPrice === "" || itemQuantity === "") {
    alert("Please fill all fields");
    return;
  }

  let itemTotalPrice = itemPrice * itemQuantity;

  let item = {
    name: itemName,
    price: itemPrice,
    quantity: itemQuantity,
    totalPrice: itemTotalPrice,
  };

  itemList.push(item);
  showItemList();
  resetInactivityTimer(); // Reset inactivity timer on user interaction
}

function showItemList() {
  let itemListHTML = "";
  let totalPrice = 0;

  for (let i = 0; i < itemList.length; i++) {
    itemListHTML += "<tr>";
    itemListHTML += "<td>" + itemList[i].name + "</td>";
    itemListHTML += "<td>" + itemList[i].price + "</td>";
    itemListHTML += "<td>" + itemList[i].quantity + "</td>";
    itemListHTML += "<td>" + itemList[i].totalPrice + "</td>";
    itemListHTML += "<td><button onclick='deleteItem(" + i + ")'>Delete</button></td>";
    itemListHTML += "</tr>";

    totalPrice += itemList[i].totalPrice;
  }

  document.getElementById("item-list").innerHTML = itemListHTML;
  document.getElementById("total-price").innerHTML = "Total Price: " + totalPrice;
}

function deleteItem(index) {
  itemList.splice(index, 1);
  showItemList();
  resetInactivityTimer(); // Reset inactivity timer on user interaction
}

function generateReceipt() {
  let receipt = "";
  let totalPrice = 0;

  for (let i = 0; i < itemList.length; i++) {
    receipt += itemList[i].name + " - " + itemList[i].quantity + " x " + itemList[i].price + " = " + itemList[i].totalPrice + "\n";
    totalPrice += itemList[i].totalPrice;
  }

  receipt += "\nTotal Price: " + totalPrice;
  alert(receipt);

  // Show the payment form
  document.getElementById('paymentForm').style.display = 'block';

  // Start a countdown timer for 5 seconds
  var secondsLeft = 5;
  var countdownTimer = setInterval(function() {
    document.getElementById('countdownTimer').textContent = "Time left: " + secondsLeft + " seconds";
    secondsLeft--;
    if (secondsLeft < 0) {
      clearInterval(countdownTimer);
      document.getElementById('countdownTimer').textContent = "";
    }
  }, 1000);

  resetInactivityTimer(); // Reset inactivity timer on user interaction
}

var inactivityTimer; // Variable to hold the timer

// Function to reset the inactivity timer
function resetInactivityTimer() {
  clearTimeout(inactivityTimer); // Clear the existing timer
  inactivityTimer = setTimeout(function() {
    window.location.href = 'timeout-page.html'; // Redirect to timeout page
  }, 5000); // 5 seconds
}

// Add event listeners to reset the timer on user interaction
document.addEventListener('mousemove', resetInactivityTimer);
document.addEventListener('keydown', resetInactivityTimer);
document.addEventListener('click', resetInactivityTimer);

function processPayment() {
  // Get payment data
  var cardNumber = document.getElementById('cardNumber').value;
  var expiryDate = document.getElementById('expiryDate').value;
  var cvv = document.getElementById('cvv').value;

  // Simulate payment processing (Replace with actual payment processing logic)
  setTimeout(function() {
    // Display payment details
    document.getElementById('paymentCardNumber').textContent = cardNumber;
    document.getElementById('paymentExpiryDate').textContent = expiryDate;
    document.getElementById('paymentCVV').textContent = cvv;
    document.getElementById('paymentDetails').style.display = 'block';
  }, 2000); // Simulate 2 seconds of payment processing time

  // Reset inactivity timer
  resetInactivityTimer();
}
