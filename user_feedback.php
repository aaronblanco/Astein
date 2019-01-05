<script>

function showSuccessMessage(message) {
  var feedback = document.getElementById('feedback-success');
  document.getElementById('feedback-success-message').innerHTML = message;
  displayMessage(feedback);
}

function showInfoMessage(message) {
  var feedback = document.getElementById('feedback-info');
  document.getElementById('feedback-info-message').innerHTML = message;
  displayMessage(feedback);
}

function showWarningMessage(message) {
  var feedback = document.getElementById('feedback-warning');
  document.getElementById('feedback-warning-message').innerHTML = message;
  displayMessage(feedback);
}

function displayMessage(feedback) {
  feedback.style.display = 'flex';
  feedback.style.opacity = '1';
  setTimeout(function(){ feedback.style.opacity = '0';}, 2000);
  setTimeout(function(){ feedback.style.display = 'none';}, 5000);
}

</script>

<?php

echo('<div class="feedback-message" id="feedback-success"><i class="material-icons feedback-icon">check_circle</i><p id="feedback-success-message">...</div></div>');
echo('<div class="feedback-message" id="feedback-info"><i class="material-icons feedback-icon">info</i><p id="feedback-info-message">...</div></div>');
echo('<div class="feedback-message" id="feedback-warning"><i class="material-icons feedback-icon">error_outline</i><p id="feedback-warning-message">...</div></div>');

// Check if a message from a redirecting PHP function is to be displayed
if (isset($_SESSION['message-success']) )
{
    $message = $_SESSION['message-success'];
    unset($_SESSION['message-success']);
    echo("<script>showSuccessMessage('$message');</script>");
}

if (isset($_SESSION['message-info']) )
{
    $message = $_SESSION['message-info'];
    unset($_SESSION['message-info']);
    echo("<script>showInfoMessage('$message');</script>");
}

if (isset($_SESSION['message-warning']) )
{
    $message = $_SESSION['message-warning'];
    unset($_SESSION['message-warning']);
    echo("<script>showWarningMessage('$message');</script>");
}

?>
