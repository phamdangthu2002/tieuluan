<!-- <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Đăng ký</h5>
                </div>
                <div class="card-body">
                    <form action="pages/action.php?req=dang-ky" method="post">
                        <div class="mb-3">
                            <label for="tenkh" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="tenkh" name="tenkh" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Đăng ký</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->



<div class="login">
    <form action="pages/action.php?req=dang-ky" method="post">
    <img src="../assets/images/1.png" alt="logo" class="img-fluid"><br><br>
        <h2>Hello!<br><span>Welcome to T-shop!</span></h2>
        <div id="emailUsernameHelp" class="form-text">Nhập vào họ và tên của bạn.</div>
        <div class="inputBox">
            <input type="text" placeholder="Họ và tên" id="tenkh" name="tenkh" required autofocus />
        </div>

        <div id="emailUsernameHelp" class="form-text">Nhập email của bạn.</div>
        <div class="inputBox">
            <input type="email" placeholder="Email"  id="email" name="email" aria-describedby="email" required/>
        </div>

        <div id="emailUsernameHelp" class="form-text">Nhập mật khẩu của bạn.</div>
        <div class="inputBox">
            <input type="password" placeholder="Password" id="password" name="password" required />
        </div>
        <button type="submit" class="btn btn-primary">Đăng ký</button>
    </form>
</div>