document.addEventListener("DOMContentLoaded", function () {
    const notificationCards = document.querySelectorAll('.notification-card');
    const noNotificationMsg = document.querySelector('.no-notification');

    if (notificationCards.length > 0) {
        noNotificationMsg.style.display = 'none';    // Hide the "No Notifications" message
    } else {
        noNotificationMsg.style.display = 'block';   // Show the "No Notifications" message
    }
});
