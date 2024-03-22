<?php
require_once '../model/GioHangModel.php';
require_once '../model/ChiTietGioHangModel.php';
require_once '../model/SanPhamModel.php';
require_once '../model/AnhSpModel.php';
require_once '../model/CommonModel.php';
require_once '../model/SizeModel.php';
require_once '../model/SizeSpModel.php';

$gh = new GioHangModel();
$ctgh = new ChiTietGioHangModel();
$sp = new SanPhamModel();
$anhSp = new AnhSpModel();
$cm = new CommonModel();
$sz = new SizeModel();
$szsp = new SizeSpModel();
$makh = isset ($_SESSION['user']->makh) ? $_SESSION['user']->makh : 0;
$gioHang__Get_By_Id_Kh = $gh->GioHang__Get_By_Id_Kh($makh);
$chiTietGioHang__Get_By_Id_Gh = $ctgh->ChiTietGioHang__Get_By_Id_GH(isset ($gioHang__Get_By_Id_Kh->magh) ? $gioHang__Get_By_Id_Kh->magh : 0);
?>

<main class="main">
    <div class="main-container">
        <section class="h-100 h-custom" style="background-color: #eee;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col">
                        <div class="card">
                            <div class="card-body p-4">

                                <div class="row">

                                    <div class="col-lg-7">
                                        <h5 class="mb-3"><a href="?pages=trang-chu" class="text-body"><i
                                                    class="bx bx-left-arrow-alt me-2"></i>Tiếp tục mua sắm</a></h5>
                                        <hr>
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <div>
                                                <p class="mb-1">Giỏ hàng của bạn</p>
                                                <p class="mb-0">Bạn có
                                                    <?= count($chiTietGioHang__Get_By_Id_Gh) ?> sản phẩm trong giỏ hàng
                                                </p>
                                            </div>
                                        </div>
                                        <?php $count = 0;
                                        foreach ($chiTietGioHang__Get_By_Id_Gh as $item): ?>

                                            <div class="card mb-3">
                                                <div class="card-body p-1">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-flex flex-row align-items-center">
                                                            <div class="mw-100">
                                                                <img src="../assets/<?= $anhSp->AnhSp__Get_By_Id_Sp_First($item->masp)->hinhanh ?>"
                                                                    class="img-fluid rounded-3">
                                                            </div>
                                                            <div class="ms-2 me-2">
                                                                <div class="text-line">
                                                                    <?= $sp->SanPham__Get_By_Id($item->masp)->tensp ?>
                                                                </div>
                                                                <div class="text-line">
                                                                    Size :
                                                                    <?= $szsp->SizeSp__Get_By_Id($item->masize)->tensize ?>
                                                                </div>
                                                                <p class="small mb-0 text-small"
                                                                    id="gh-dg_<?= $item->mactgh ?>">
                                                                    <?= number_format($item->dongia) ?>đ
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-row align-items-center m-1">
                                                            <div class="input-group input-group-sm">
                                                                <button class="btn btn-sm btn-outline-secondary"
                                                                    onclick="decrease(this)" type="button">-</button>
                                                                <input type="text" class="form-control quantity" id="gh-sl"
                                                                    value="<?= $item->soluong ?>" readonly, data-mactgh="<?= $item->mactgh ?>" ,data-magh="<?= $item->magh ?>" ,data-dongia="<?= $item->dongia ?>" ,data-masp="<?= $item->masp ?>">
                                                                <button class="btn btn-sm btn-outline-secondary"
                                                                    onclick="increase(this)" type="button">+</button>
                                                                <!-- <h5 class="fw-normal mb-0">2</h5> -->
                                                            </div>
                                                            <div class="m-2">
                                                                <b class="mb-0" id="gh-tc_<?= $item->mactgh ?>">
                                                                    <?= number_format($item->tongcong) ?>đ
                                                                </b>
                                                            </div>
                                                            <span onclick="remove(<?= $item->mactgh ?>)"
                                                                style="color: #cecece;"><i
                                                                    class="bx bxs-trash-alt m-2"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach ?>

                                    </div>
                                    <?php if (isset ($gioHang__Get_By_Id_Kh->magh) && count($chiTietGioHang__Get_By_Id_Gh) > 0): ?>
                                        <div class="col-lg-5">

                                            <div class="card bg-outline rounded-3">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                                        <h5 class="mb-0">Thông tin nhận hàng</h5>
                                                    </div>

                                                    <form action="./components/action.php" method="post">

                                                        <div class="mt-4">
                                                            <div class="form-outline form-white mb-1">
                                                                <label class="form-label" for="tenkh">Tên người nhận</label>
                                                                <input type="text" name="tenkh" id="tenkh"
                                                                    class="form-control" siez="17"
                                                                    placeholder="Tên người nhận"
                                                                    value="<?= $_SESSION['user']->tenkh ?>" required />

                                                            </div>

                                                            <div class="form-outline form-white mb-1">
                                                                <label class="form-label" for="diachi">Địa chỉ nhận
                                                                    hàng</label>
                                                                <input type="text" name="diachi" id="diachi"
                                                                    class="form-control" siez="17"
                                                                    placeholder="Địa chỉ nhận hàng"
                                                                    value="<?= $_SESSION['user']->diachi ?>" required />
                                                            </div>

                                                            <div class="row mb-4">
                                                                <div class="col-md-6">
                                                                    <div class="form-outline form-white">
                                                                        <label class="form-label" for="sodienthoai">Số điện
                                                                            thoại</label>
                                                                        <input type="tel" pattern="[0-9]{10}" minlength="10"
                                                                            maxlength="10" class="form-control"
                                                                            id="sodienthoai" name="sodienthoai"
                                                                            value="<?= $_SESSION['user']->sodienthoai ?>"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-outline form-white">
                                                                        <label class="form-label" for="email">Email</label>
                                                                        <input type="email" class="form-control" id="email"
                                                                            name="email"
                                                                            value="<?= $_SESSION['user']->email ?>"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr class="my-4">

                                                        <div class="d-flex justify-content-between">
                                                            <p class="mb-2">Tổng hóa đơn</p>
                                                            <b class="mb-2 text-danger" id="gh-sum">
                                                                <?= number_format($ctgh->ChiTietGioHang__Sum_Tien_GH($item->magh)->sum_tien) ?>đ
                                                            </b>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <p class="mb-2">Hình thức thanh toán</p>
                                                            <p class="mb-2">Khi nhận hàng</p>
                                                        </div>
                                                        <hr class="my-2">
                                                        <button type="button" onclick="return checkout()"
                                                            class="btn btn-lg btn-danger w-100">
                                                            <input type="hidden" id="magh" name="magh"
                                                                value="<?= $gioHang__Get_By_Id_Kh->magh ?>" readonly>
                                                            <input type="hidden" id="makh" name="makh"
                                                                value="<?= $_SESSION['user']->makh ?>" readonly>
                                                            <input type="hidden" id="username" name="username"
                                                                value="<?= $_SESSION['user']->username ?>" readonly>
                                                            <input type="hidden" id="action" name="action" value="checkout">
                                                            <span>Đặt hàng <i class="bx bxs-right-arrow-alt"></i></span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    <?php endif ?>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<script>
    function remove(mactgh) {
        Swal.fire({
            icon: 'question',
            title: "Xác nhận",
            text: "Bạn chắc chắn xóa sản phẩm này khỏi giỏ hàng?",
            showCancelButton: true,
            confirmButtonText: "OK",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "./components/action.php",
                    data: {
                        action: "remove",
                        mactgh: mactgh
                    },
                    success: function (response) {
                        console.log(response);
                        if (response == true) {
                            Swal.fire({
                                icon: "success",
                                title: "Sản phẩm đã xóa khỏi giỏ hàng thành công!",
                                confirmButtonText: "OK",
                            }).then((result) => { });
                            location.href = "?pages=gio-hang";
                        }
                    },
                });
            }
        });
    }

    function checkout() {
        $.ajax({
            type: "POST",
            url: "./components/action.php",
            data: {
                action: "checkout",
                makh: document.getElementById('makh').value,
                tenkh: document.getElementById('tenkh').value,
                diachi: document.getElementById('diachi').value,
                sodienthoai: document.getElementById('sodienthoai').value,
                email: document.getElementById('email').value,
                magh: document.getElementById('magh').value,
            },
            success: function (response) {
                console.log(response);
                if (response == true) {
                    Swal.fire({
                        icon: "success",
                        title: "Bạn đã đặt hàng thành công!",
                        confirmButtonText: "OK",
                    }).then((result) => {
                        location.href = '?pages=trang-chu';
                    });

                }
            },
        });
    }

    function decrease(button) {
        var input = button.nextElementSibling;
        var value = parseInt(input.value);
        if (value > 1) {
            input.value = value - 1;
        }
        $.ajax({
            type: "POST",
            url: "./components/action.php",
            data: {
                action: "update",
                mactgh: input.getAttribute('data-mactgh'),
                magh: input.getAttribute('data-magh'),
                masp: input.getAttribute('data-masp'),
                soluong: input.value,
                dongia: input.getAttribute('data-dongia'),
            },
            success: function (response) {
                var gh = JSON.parse(response);
                // Update quantity
                $("#gh-sl_" + input.getAttribute('data-mactgh')).text(gh.soluong);
                // Update total
                $("#gh-tc_" + input.getAttribute('data-mactgh')).text(gh.tongcong);
                // Update sum
                $("#gh-sum").text(gh.sum);
            },
        });
        return false; // Prevent default action of the button
    }



    function increase(button) {
        var input = button.previousElementSibling;
        var value = parseInt(input.value);
        input.value = value + 1;

        $.ajax({
            type: "POST",
            url: "./components/action.php",
            data: {
                action: "update",
                mactgh: input.getAttribute('data-mactgh'),
                magh: input.getAttribute('data-magh'),
                masp: input.getAttribute('data-masp'),
                soluong: input.value,
                dongia: input.getAttribute('data-dongia'),
            },
            success: function (response) {
                var gh = JSON.parse(response);
                console.log(response);
                // Update quantity
                $("#gh-sl_" + input.getAttribute('data-mactgh')).text(gh.soluong);
                // Update total
                $("#gh-tc_" + input.getAttribute('data-mactgh')).text(gh.tongcong);
                // Update sum
                $("#gh-sum").text(gh.sum);
            },
        });


        return false; // Prevent default action of the button
    }



    function increase(element) {
        var input = element.parentNode.querySelector('input.quantity');
        var value = parseInt(input.value, 10);
        if (value < 10) { // Giới hạn là 10 sản phẩm
            input.value = value + 1;
        } else {
            const Toast = Swal.fire({
                title: 'THÔNG BÁO',
                text: 'Chỉ có thể chọn tối đa 10 sản phẩm!!!',
                icon: 'warning',
                confirmButtonText: 'Đồng ý',
            });
            return false;
            Toast.fire({
                icon: 'warning',
                title: 'Chỉ có thể chọn tối đa 10 sản phẩm'
            });
        }
    }

    function decrease(element) {
        var input = element.parentNode.querySelector('input.quantity');
        var value = parseInt(input.value, 10);
        if (value > 1) {
            input.value = value - 1;
        }
    }
</script>