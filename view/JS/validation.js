document
  .getElementById("loginForm")
  .addEventListener("submit", function (event) {
    let isValid = true;

    const username = document.getElementById("username").value;
    const password = document.getElementById("pw").value;

    // Username validation
    if (username.trim() === "") {
      alert("Username is required.");
      isValid = false;
    }

    // Password validation
    if (password === "") {
      alert("Password is required.");
      isValid = false;
    }

    // Prevent form submission if validation fails
    if (!isValid) {
      event.preventDefault();
    }
  });
