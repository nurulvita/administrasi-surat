<!doctype html>
<html lang="en">

<head>
  <title>Login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
<h1 class="text-center fw-bold mx-1 pt-1 pb-3" style="background:linear-gradient(90deg, #00d2ff 0%, #3a47d5 100%); color:white">INFORSArchive</h1>
  <section class="vh-80">
    <div class="container py-3 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="assets/img/login.jpg" class="img-fluid" alt="Phone image" height="300px" width="600px">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <form action="login.php" method="post" onsubmit="return validateForm()">
            <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-3 mt-3">Login </p>

            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form1Example13"> <i class="bi bi-person-circle"></i> Email</label>
                <input type="email" id="email" class="form-control form-control-lg" name="email" autocomplete="off" placeholder="enter your email" style="border-radius:25px ;" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form1Example23"><i class="bi bi-chat-left-dots-fill"></i> Password</label>
                <input type="password" id="password" class="form-control form-control-lg" name="password" autocomplete="off" placeholder="enter your password" style="border-radius:25px ;" />
            </div>

            <!-- Jabatan input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="jabatan"><i class="bi bi-person-lines-fill"></i> Jabatan</label>
                <select id="jabatan" class="form-control form-control-lg" name="jabatan" style="border-radius: 25px;">
                <option value="" selected disabled hidden>Choose Position</option>
                <option value="admin">Sekretaris Umum</option>
                <option value="sekretaris_panitia">Sekretaris Panitia</option>
                <option value="sekretaris_departemen">Sekretaris Departemen</option>
                <option value="sekretaris_divisi">Sekretaris Divisi</option>
                </select>
            </div>

            <!-- Submit button -->
            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                <input type="submit" value="Sign in" name="login" class="btn btn-primary btn-lg text-light my-2" style="width:100% ; border-radius: 30px; font-weight:600;" />
            </div>
            </form>

          <br>
          <p align="center">i don't have any account <a href="register.php" class="text-primary" style="font-weight:600;text-decoration:none;">Register Here</a></p>
        </div>
      </div>
    </div>
  </section>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="assets/js/script.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>