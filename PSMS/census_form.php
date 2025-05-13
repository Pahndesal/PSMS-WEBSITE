<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>CPH Form 1 – Household Questionnaire</title>
  <link rel="stylesheet" href="census_form.css" />
</head>
<body>

<h1>CPH Form 1 – Household Questionnaire</h1>
<p class="description">
  Main form used for Population and Housing Census (CPH). Capture household information including members' demographic and socio-economic details.
</p>
<p class="description">
  (Ang form na ito ang ginagamit para sa Population and Housing Census (CPH). Kinokolekta nito ang impormasyon tungkol sa sambahayan kabilang ang demograpiko at sosyo-ekonomikong detalye ng mga miyembro.)
</p>

<form id="censusForm" method="POST" action="submit_census.php">
  <div id="membersList"></div>
  <button type="button" class="btn-add-member" onclick="addMember()">+ Add Household Member</button>
  <button type="button" class="btn-submit" onclick="handleSubmit()">Submit Census Form</button>
  <button type="button" class="btn-cancel" onclick="handleCancel()">Cancel</button>
</form>


<!-- Custom Confirm Modal -->
<div
  id="customConfirmOverlay"
>
  <div
    id="customConfirmBox"
  >
    <p>Are you sure you want to cancel? Your changes will be lost.</p>
    <button
      id="confirmYes"
    >
      Yes
    </button>
    <button
      id="confirmNo"
    >
      No
    </button>
  </div>
</div>

<script>
  let memberCount = 0;

  // Function to add a household member block
  function addMember() {
    memberCount++;
    const container = document.createElement("div");
    container.classList.add("member-container");
    container.setAttribute("data-member", memberCount);
    container.innerHTML = `
      <div class="member-header">Household Member #${memberCount}</div>

      <label for="name_${memberCount}">Full Name</label>
      <input type="text" id="name_${memberCount}" name="name_${memberCount}" required />

      <label for="sex_${memberCount}">Sex</label>
      <select id="sex_${memberCount}" name="sex_${memberCount}" required>
        <option value="">Select sex</option>
        <option>Male</option>
        <option>Female</option>
        <option>Other</option>
      </select>

      <label for="birthdate_${memberCount}">Birthdate</label>
      <input type="date" id="birthdate_${memberCount}" name="birthdate_${memberCount}" required />

      <label for="age_${memberCount}">Age</label>
      <input type="number" id="age_${memberCount}" name="age_${memberCount}" min="0" max="120" required />

      <label for="household_head_name">Household Head Full Name</label>
      <input type="text" id="household_head_name" name="household_head_name" required>

      <label for="address">Household Address</label>
      <input type="text" id="address" name="address" required>


      <label for="relation_${memberCount}">Relationship to Household Head</label>
      <select id="relation_${memberCount}" name="relation_${memberCount}" required>
        <option value="">Select relationship</option>
        <option>Head</option>
        <option>Spouse</option>
        <option>Child</option>
        <option>Parent</option>
        <option>Sibling</option>
        <option>Other</option>
      </select>

      <label for="civil_status_${memberCount}">Civil Status</label>
      <select id="civil_status_${memberCount}" name="civil_status_${memberCount}" required>
        <option value="">Select civil status</option>
        <option>Single</option>
        <option>Married</option>
        <option>Widowed</option>
        <option>Separated</option>
        <option>Divorced</option>
      </select>

      <label for="education_${memberCount}">Highest Education Attended</label>
      <select id="education_${memberCount}" name="education_${memberCount}" required>
        <option value="">Select education</option>
        <option>None</option>
        <option>Elementary</option>
        <option>High School</option>
        <option>Vocational</option>
        <option>College</option>
        <option>Graduate School or Higher</option>
      </select>

      <label for="literacy_${memberCount}">Literacy</label>
      <select id="literacy_${memberCount}" name="literacy_${memberCount}" required>
        <option value="">Select literacy level</option>
        <option>Illiterate</option>
        <option>Can read and write</option>
        <option>Can read only</option>
      </select>

      <label for="employment_status_${memberCount}">Employment Status</label>
      <select id="employment_status_${memberCount}" name="employment_status_${memberCount}" required>
        <option value="">Select employment status</option>
        <option>Employed</option>
        <option>Unemployed</option>
        <option>Student</option>
        <option>Retired</option>
        <option>Unable to work</option>
        <option>Other</option>
      </select>

      <label for="disability_${memberCount}">Disability</label>
      <select id="disability_${memberCount}" name="disability_${memberCount}" required>
        <option value="">Select disability status</option>
        <option>None</option>
        <option>Visual</option>
        <option>Hearing</option>
        <option>Speech</option>
        <option>Physical</option>
        <option>Mental</option>
        <option>Multiple</option>
      </select>

      <label for="overseas_${memberCount}">Overseas Work or Migration</label>
      <select id="migration_status_${memberCount}" name="migration_status_${memberCount}" required>
        <option value="">Select option</option>
        <option>No</option>
        <option>Yes - Currently Overseas</option>
        <option>Yes - Previously Overseas</option>
      </select>

      <label for="religion_${memberCount}">Religion</label>
      <input type="text" id="religion_${memberCount}" name="religion_${memberCount}" required />

      <label for="ethnicity_${memberCount}">Ethnicity</label>
      <input type="text" id="ethnicity_${memberCount}" name="ethnicity_${memberCount}" required />
    `;
    document.getElementById("membersList").appendChild(container);
  }

  addMember();

  document.getElementById("censusForm").addEventListener("submit", function (e) {
  e.preventDefault();

  const form = this;

  if (!form.checkValidity()) {
    form.reportValidity();
    return;
  }

  // Create or update the hidden input for total members
  let totalInput = document.querySelector("input[name='total_members']");
  if (!totalInput) {
    totalInput = document.createElement("input");
    totalInput.type = "hidden";
    totalInput.name = "total_members";
    form.appendChild(totalInput);
  }
  totalInput.value = memberCount;

  // Submit the form
  form.submit();
});


  function handleCancel() {
  const overlay = document.getElementById("customConfirmOverlay");
  overlay.classList.add("show-modal");

  document.getElementById("confirmYes").onclick = () => {
    window.location.href = "home.php";
  };

  document.getElementById("confirmNo").onclick = () => {
    overlay.classList.remove("show-modal");
  };
}
let modalPurpose = ''; // Track what the modal is for

  function handleSubmit() {
    const form = document.getElementById("censusForm");

    if (!form.checkValidity()) {
      form.reportValidity();
      return;
    }

    modalPurpose = 'submit';
    const overlay = document.getElementById("customConfirmOverlay");
    document.querySelector("#customConfirmBox p").textContent = "Are you sure you want to submit the census form?";
    overlay.classList.add("show-modal");

    document.getElementById("confirmYes").onclick = () => {
      overlay.classList.remove("show-modal");

      // Create or update total_members input
      let totalInput = document.querySelector("input[name='total_members']");
      if (!totalInput) {
        totalInput = document.createElement("input");
        totalInput.type = "hidden";
        totalInput.name = "total_members";
        form.appendChild(totalInput);
      }
      totalInput.value = memberCount;

      form.submit();
    };

    document.getElementById("confirmNo").onclick = () => {
      overlay.classList.remove("show-modal");
    };
  }

  function handleCancel() {
    modalPurpose = 'cancel';
    const overlay = document.getElementById("customConfirmOverlay");
    document.querySelector("#customConfirmBox p").textContent = "Are you sure you want to cancel? Your changes will be lost.";
    overlay.classList.add("show-modal");

    document.getElementById("confirmYes").onclick = () => {
      window.location.href = "home.php";
    };

    document.getElementById("confirmNo").onclick = () => {
      overlay.classList.remove("show-modal");
    };
  }

</script>

</body>
</html>
