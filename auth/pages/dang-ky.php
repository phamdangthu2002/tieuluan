<div class="container mt-5">
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
</div>