document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("fname").addEventListener("input", function () {
    const firstname = this.value.trim();
    const nameRegex = /^[A-Za-z\s]+$/;
    if (!nameRegex.test(firstname)) {
      showAlert(
        "First name must contain only letters and cannot contain numbers or special characters."
      );
      this.value = "";
    }
  });

  document.getElementById("lname").addEventListener("input", function () {
    const lastname = this.value.trim();
    const nameRegex = /^[A-Za-z\s]+$/;
    if (!nameRegex.test(lastname)) {
      showAlert(
        "Last name must contain only letters and cannot contain numbers or special characters."
      );
      this.value = "";
    }
  });

  document.getElementById("address").addEventListener("input", function () {
    const address = this.value.trim();
    const addressRegex = /^[A-Za-z0-9\s,.-]+$/;
    if (!addressRegex.test(address)) {
      showAlert(
        "Invalid address! It should only contain letters, numbers, spaces, commas, dots, and hyphens."
      );
      this.value = "";
    }
  });

  document.getElementById("email").addEventListener("blur", function () {
    const email = this.value.trim();
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (email !== "" && !emailRegex.test(email)) {
      showAlert("Invalid email address format.");
      this.value = "";
    }
  });

  document.getElementById("password").addEventListener("blur", function () {
    let password = this.value.trim().replace(/\s/g, "");
    const passwordRegex = /^(?=.*[A-Z])(?=.*[\W_]).{6,12}$/;
    if (
      password.length < 6 ||
      password.length > 12 ||
      !passwordRegex.test(password)
    ) {
      showAlert(
        "Password must be between 6 and 12 characters, start with a capital letter, and contain at least one special character, without spaces."
      );
      this.value = "";
    }
  });

  document.getElementById("zipcode").addEventListener("input", function () {
    this.value = this.value.replace(/\D/g, "");
  });

  document.getElementById("date").addEventListener("input", calculateAge);
});

function validateForm() {
  const firstname = document.getElementById("fname").value.trim();
  const lastname = document.getElementById("lname").value.trim();
  const address = document.getElementById("address").value.trim();
  const email = document.getElementById("email").value.trim();
  const password = document.getElementById("password").value.trim();
  const confirmPassword = document
    .getElementById("confirmPassword")
    .value.trim();
  const gender = document.getElementsByName("gender");
  const dob = document.getElementById("date").value.trim();
  const zipcode = document.getElementById("zipcode").value.trim();
  const number = document.getElementById("number").value.trim();

  const nameRegex = /^[A-Za-z\s]+$/;
  if (firstname === "" || !nameRegex.test(firstname)) {
    showAlert("First name must contain only letters and cannot be empty.");
    return false;
  }
  if (lastname === "" || !nameRegex.test(lastname)) {
    showAlert("Last name must contain only letters and cannot be empty.");
    return false;
  }

  if (address === "") {
    showAlert("Address is required.");
    return false;
  }

  const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  if (email !== "" && !emailRegex.test(email)) {
    showAlert("Invalid email address format.");
    return false;
  }

  const passwordRegex = /^(?=.*[A-Z])(?=.*[\W_]).{6,12}$/;
  if (
    password.length < 6 ||
    password.length > 12 ||
    !passwordRegex.test(password)
  ) {
    showAlert(
      "Password must be between 6 and 12 characters, start with a capital letter, and contain at least one special character, without spaces."
    );
    return false;
  }

  if (password !== confirmPassword) {
    showAlert("Passwords do not match. Please try again.");
    return false;
  }

  if (![...gender].some((gender) => gender.checked)) {
    showAlert("Please select a gender.");
    return false;
  }

  if (dob === "") {
    showAlert("Date of birth is required.");
    return false;
  }

  const birthDate = new Date(dob);
  const today = new Date();
  let age = today.getFullYear() - birthDate.getFullYear();
  const monthDiff = today.getMonth() - birthDate.getMonth();
  if (
    monthDiff < 0 ||
    (monthDiff === 0 && today.getDate() < birthDate.getDate())
  ) {
    age--;
  }
  if (age < 18) {
    showAlert("You must be at least 18 years old.");
    return false;
  }

  const zipRegex = /^\d{6}$/;
  if (zipcode.length !== 6 || !zipRegex.test(zipcode)) {
    showAlert("Zip code must be exactly 6 numeric digits.");
    return false;
  }

  const mobileRegex = /^[6-9]\d{9}$/;
  if (!mobileRegex.test(number)) {
    showAlert(
      "Mobile number must be a 10-digit number starting with 6, 7, 8, or 9."
    );
    return false;
  }

  return true;
}

function calculateAge() {
  const dobInput = document.getElementById("date");
  const ageInput = document.getElementById("age");
  if (!dobInput.value) {
    ageInput.value = "";
    showAlert("Date of birth is required.");
    return;
  }
  const dob = new Date(dobInput.value);
  const today = new Date();
  let age = today.getFullYear() - dob.getFullYear();
  const monthDiff = today.getMonth() - dob.getMonth();
  if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
    age--;
  }
  if (age < 18) {
    showAlert("Age must be at least 18 years.");
    dobInput.value = "";
    ageInput.value = "";
    return;
  }
  ageInput.value = age;
}

function showAlert(message) {
  alert(message);
}
