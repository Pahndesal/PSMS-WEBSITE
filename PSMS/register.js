const contactInput = document.getElementById("ContactNumber");
contactInput.addEventListener("input", function () {
    this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11);
});

document.querySelector("form").addEventListener("submit", function (e) {
    if (contactInput.value.length !== 11) {
        e.preventDefault();
        alert("Contact Number must be exactly 11 digits.");
    }
});