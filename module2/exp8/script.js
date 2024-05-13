let startTime = null;
let endTime = null;
let timerInterval = null;
let lastActiveDuration = null;

// Function to handle login
function handleLogin() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    if (username === 'admin' && password === 'admin') {
        // Successful login
        startTime = new Date();
        document.getElementById('loginForm').style.display = 'none';
        document.getElementById('logoutSection').style.display = 'block';
        document.getElementById('lastActiveDuration').style.display = 'block'; // Show last active duration
        startTimer();
        return false; // Prevent form submission
    } else {
        alert('Invalid username or password.');
        return false; // Prevent form submission
    }
}

// Function to handle logout
function handleLogout() {
    endTime = new Date();
    const duration = endTime - startTime;
    lastActiveDuration = formatDuration(duration);
    saveLastActiveDuration(lastActiveDuration);

    calculateDuration(duration);
    stopTimer();

    document.getElementById('loginForm').style.display = 'block';
    document.getElementById('logoutSection').style.display = 'none';
}

// Function to start the timer
function startTimer() {
    timerInterval = setInterval(updateDuration, 1000);
}

// Function to stop the timer
function stopTimer() {
    clearInterval(timerInterval);
}

// Function to update the active duration
function updateDuration() {
    const now = new Date();
    const duration = now - startTime;
    const formattedDuration = formatDuration(duration);
    document.getElementById('activeDuration').textContent = formattedDuration;
}

// Function to calculate and display the active duration
function calculateDuration(duration) {
    const formattedDuration = formatDuration(duration);
    document.getElementById('activeDuration').textContent = `Active Duration: ${formattedDuration}`;
}

// Function to format duration in HH:MM:SS format
function formatDuration(duration) {
    const seconds = Math.floor(duration / 1000);
    const hours = Math.floor(seconds / 3600);
    const minutes = Math.floor((seconds % 3600) / 60);
    const remainingSeconds = seconds % 60;
    return `${padZero(hours)}:${padZero(minutes)}:${padZero(remainingSeconds)}`;
}

// Function to pad zero for single digit numbers
function padZero(value) {
    return value < 10 ? '0' + value : value;
}

// Function to save last active duration to local storage
function saveLastActiveDuration(duration) {
    localStorage.setItem('lastActiveDuration', duration);
}

// Function to load last active duration from local storage
function loadLastActiveDuration() {
    const storedDuration = localStorage.getItem('lastActiveDuration');
    if (storedDuration) {
        lastActiveDuration = storedDuration;
        document.getElementById('lastDuration').textContent = lastActiveDuration;
        document.getElementById('lastActiveDuration').style.display = 'block';
    }
}

// Load last active duration on page load
loadLastActiveDuration();
