<?php
if (isset($_SESSION['admin'])) {
    unset($_SESSION['admin']);
  }
  if (isset($_SESSION['manager'])) {
    unset($_SESSION['manager']);
  }
  if (isset($_SESSION['nhanvien'])) {
    unset($_SESSION['nhanvien']);
  }
  ?>
<div class="auth-container row">
    <div class="logo-wrapper col-4">
        <img src="../assets/images/login.png" alt="login" class="img-fluid">
    </div>
    <div class="form-wrapper col-8">
        <img src="../assets/images/1.png" alt="logo" class="img-fluid">
        <h3 class="text-title mb-5">ADMIN - LOGIN</h3>
        <form action="pages/action.php?req=dang-nhap-admin" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required
                    placeholder="Nhập email" autofocus>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required
                    placeholder="Nhập password">
            </div>
            <br>
            <div class="form-group text-center">
                <button class="btn btn-danger w-100" type="submit">Login</button>
            </div>
        </form>
    </div>
</div>