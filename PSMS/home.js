const showAlertBtn = document.getElementById("emergency-response-btn");
const customAlert = document.getElementById("customAlert");
const confirmBtn = document.getElementById("confirmBtn");


showAlertBtn.addEventListener("click", function() {
    customAlert.style.display = "flex";
});

confirmBtn.addEventListener("click", function() {
    customAlert.style.display = "none";
});