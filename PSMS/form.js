

document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const submitButton = document.querySelector('button[type="submit"]');
    const addressInput = document.getElementById('address');
    const latitudeInput = document.querySelector('input[name="latitude"]');
    const longitudeInput = document.querySelector('input[name="longitude"]');

    submitButton.disabled = true;

    // Enable submit only after valid geocode
    async function geocodeAddress() {
        const address = addressInput.value.trim();
        if (!address) return;

        try {
            const response = await fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`, {
                headers: { 'User-Agent': 'EmergencyApp/1.0' }
            });
            const data = await response.json();

            if (data.length > 0) {
                latitudeInput.value = data[0].lat;
                longitudeInput.value = data[0].lon;
                submitButton.disabled = false;
            } else {
                alert("Address not found. Please enter a more specific location.");
                submitButton.disabled = true;
            }
        } catch (error) {
            console.error("Geocoding failed:", error);
            alert("Failed to fetch location. Please try again.");
            submitButton.disabled = true;
        }
    }

    // Call geocode when address input loses focus or is changed
    addressInput.addEventListener('blur', geocodeAddress);
    addressInput.addEventListener('input', () => {
        submitButton.disabled = true;
        latitudeInput.value = "";
        longitudeInput.value = "";
    });

    form.addEventListener('submit', function (e) {
        if (!latitudeInput.value || !longitudeInput.value) {
            alert("Please wait while we locate the address.");
            e.preventDefault();
        }
    });
});

function showCustomAlert() {
    document.getElementById('overlay').style.display = 'block'; // Show overlay
    const alertBox = document.getElementById('customAlert');
    alertBox.style.display = 'block'; // Show custom alert
    setTimeout(() => {
        alertBox.style.opacity = '1'; // Fade in
        alertBox.style.transform = 'translate(-50%, -50%) scale(1)'; // Scale to normal size
    }, 10); // Small timeout to allow display to take effect
}

function closeCustomAlert() {
    const alertBox = document.getElementById('customAlert');
    alertBox.style.opacity = '0'; // Fade out
    alertBox.style.transform = 'translate(-50%, -50%) scale(0)'; // Scale down
    setTimeout(() => {
        document.getElementById('overlay').style.display = 'none'; // Hide overlay
        alertBox.style.display = 'none'; // Hide custom alert
    }, 500); // Match this duration with the CSS transition duration
}

// Show the custom alert when the page loads
window.onload = function() {
    showCustomAlert();
};
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('.myForm');

    // Small delay for smoother effect
    setTimeout(() => {
        form.classList.add('show');
    }, 200);
});
function showOtherInput() {
    var emergencyType = document.getElementById('emergency_type').value;
    var otherInputContainer = document.getElementById('otherInputContainer');

    // Show the 'Other' input field if "Other" is selected, otherwise hide it
    if (emergencyType === "Other") {
        otherInputContainer.style.display = "block";
    } else {
        otherInputContainer.style.display = "none";
    }
}
