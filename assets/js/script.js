
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


document.addEventListener('DOMContentLoaded', function() {
  const welcomeMessage = document.querySelector('.page-inner');

  welcomeMessage.classList.add('animate__animated', 'animate__bounceInDown');

  welcomeMessage.addEventListener('animationend', function() {
      welcomeMessage.classList.remove('animate__animated', 'animate__bounceInDown');
  });
});


document.addEventListener('DOMContentLoaded', function() {
  const suratMasukCard = document.querySelector('.card-surat-masuk');
  const suratKeluarCard = document.querySelector('.card-surat-keluar');
  const suratAccCard = document.querySelector('.card-surat-acc');

  suratMasukCard.classList.add('animate__animated', 'animate__fadeIn');
  suratKeluarCard.classList.add('animate__animated', 'animate__fadeIn');
  suratAccCard.classList.add('animate__animated', 'animate__fadeIn');

  suratMasukCard.addEventListener('animationend', function() {
      suratMasukCard.classList.remove('animate__animated', 'animate__fadeIn');
  });

  suratKeluarCard.addEventListener('animationend', function() {
      suratKeluarCard.classList.remove('animate__animated', 'animate__fadeIn');
  });

  suratAccCard.addEventListener('animationend', function() {
      suratAccCard.classList.remove('animate__animated', 'animate__fadeIn');
  });
});

document.addEventListener('DOMContentLoaded', function() {
  const panelHeader = document.querySelector('.panel-header');

  panelHeader.classList.add('animate__animated', 'animate__fadeInDown');

  panelHeader.addEventListener('animationend', function() {
      panelHeader.classList.remove('animate__animated', 'animate__fadeInDown');
  });
});


  


