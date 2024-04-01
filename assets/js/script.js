
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


  function register(event) {
    event.preventDefault(); 

    var form = document.getElementById('registrationForm');
    var formData = new FormData(form);

    localStorage.setItem('registrationData', JSON.stringify(Object.fromEntries(formData)));

    var xhr = new XMLHttpRequest();
    xhr.open('POST', form.action, true);
    xhr.onload = function () {
      if (xhr.status === 200) {
        // Success
        var response = xhr.responseText;
        alert(response); 
        window.location.href = 'index.php'; 
      } else {
        // Error
        alert('Error: ' + xhr.statusText);
      }
    };
    xhr.onerror = function () {
      // Network error
      alert('Network Error');
    };
    xhr.send(formData);
  }

  document.getElementById('registrationForm').addEventListener('submit', register);
  


