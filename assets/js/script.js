
  function validateForm() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var jabatan = document.getElementById("jabatan").value;

    if (email.trim() == "") {
      alert("Please enter your email");
      return false;
    }

    if (password.trim() == "") {
      alert("Please enter your password");
      return false;
    }

    if (jabatan.trim() == "") {
      alert("Please choose your position");
      return false;
    }

    return true;
  }

