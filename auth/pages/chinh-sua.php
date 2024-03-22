<?php
session_start();
if (!isset ($_SESSION['user'])) {
    header("location: ../../auth/?pages=dang-nhap");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="dynamicTitle">mini shop</title>
</head>

<link rel="shortcut icon" href="../../assets/images/1.png" type="image/x-icon">
<link rel="stylesheet" href="../../assets/vendor/bootstrap-5.3.3-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../../assets/css/header.css">
<link rel="stylesheet" href="../../assets/css/owl.carousel.min.css">
<link rel="stylesheet" href="../../assets/css/owl.theme.default.min.css">
<link rel="stylesheet" href="../../assets/vendor/boxicons-2.1.4/css/boxicons.min.css">
<link rel="stylesheet" href="../../assets/vendor/datatables/css/1_dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="../../assets/vendor/datatables/css/2_buttons.bootstrap5.min.css">
<link rel="stylesheet" href="../../assets/css/main.css">
<link rel="stylesheet" href="../../assets/css/footer.css">
</head>

<body>


    <script src="../../assets/vendor/jquery-3.7.1.js"></script>


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Chỉnh sửa thông tin</h5>
                    </div>
                    <div class="card-body">
                        <form action="./action.php?req=chinh-sua" method="post">
                            <input type="hidden" class="form-control" id="makh" name="makh" required
                                value="<?= $_SESSION['user']->makh ?>">
                            <input type="hidden" class="form-control" id="password_old" name="password_old"
                                value="<?= $_SESSION['user']->password ?>">
                            <input type="hidden" name="trangthai" id="trangthai" class="form-control" required
                                placeholder="" value="<?= $_SESSION['user']->trangthai ?>">
                            <div class="mb-3">
                                <label for="tenkh" class="form-label">Họ và tên</label>
                                <input type="text" class="form-control" id="tenkh" name="tenkh" required autofocus
                                    value="<?= $_SESSION['user']->tenkh ?>">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="ngaysinh" class="form-label">Ngày sinh</label>
                                    <input type="date" min="<?= date('Y-m-d', strtotime('-100 years')) ?>"
                                        max="<?= date('Y-m-d', strtotime('-18 years')) ?>" class="form-control"
                                        id="ngaysinh" name="ngaysinh" required
                                        value="<?= $_SESSION['user']->ngaysinh ?>">
                                </div>
                                <div class="col">
                                    <label for="gioitinh" class="form-label">Giới tính</label>
                                    <select class="form-select " aria-label=".gioitinh" id="gioitinh" name="gioitinh">
                                        <option value="0" <?= $_SESSION['user']->gioitinh == 0 ? 'selected' : '' ?>>Nam
                                        </option>
                                        <option value="1" <?= $_SESSION['user']->gioitinh == 1 ? 'selected' : '' ?>>Nữ
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="sodienthoai" class="form-label">Số điện thoại</label>
                                <input type="tel" class="form-control" id="sodienthoai" name="sodienthoai" required
                                    value="<?= $_SESSION['user']->sodienthoai ?>">
                            </div>
                            <div class="mb-3">
                                <label for="diachi" class="form-label">diachi</label>
                                <input type="text" class="form-control" id="diachi" name="diachi" required
                                    value="<?= $_SESSION['user']->diachi ?>">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required
                                        value="<?= $_SESSION['user']->email ?>">
                                </div>
                                <div class="col">
                                    <label for="password_new" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password_new" name="password_new"
                                        value="" placeholder="Bỏ qua nếu không đổi mật khẩu">
                                </div>
                            </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>




    <script src="../../assets/vendor/owl.carousel.min.js"></script>
    <script src="../../assets/vendor/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <script src="../../assets/vendor/bootstrap-5.3.3-dist/js/bootstrap.bundle.js"></script>
    <script src="../../assets/vendor/bootstrap-5.3.3-dist/js/popper.min.js"></script>
    <script src="../../assets/vendor/sweetalert2@11.js"></script>
    <script src="../../assets/vendor/datatables/js/1_jquery.dataTables.min.js"></script>
    <script src="../../assets/vendor/datatables/js/2_dataTables.bootstrap5.min.js"></script>
    <script src="../../assets/js/main.js"></script>

    <?php if (isset ($_GET['msg'])) {
        switch ($_GET['msg']) {
            case 'success':
                echo "<script>
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: 'success',
                        title: 'Cập nhật thành công!'
                    });
                </script>";
                break;

            case 'error':
                echo "<script>
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: 'error',
                            title: 'Cập nhật không thành công!'
                        });
                    </script>";
                break;

            case 'warning':
                echo "<script>
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: 'warning',
                            title: 'Thông tin đăng nhập không chính xác hoặc tài khoản bị khóa!'
                        });
                    </script>";
                break;
        }
    } ?>
</body>

</html>