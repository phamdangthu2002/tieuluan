<?php
if (isset ($_GET['pages']) && !isset ($_GET['req'])) {
    switch ($_GET['pages']) {
        case "dang-nhap":
            require_once "pages/dang-nhap.php";
            break;
        case "dang-ky":
            require_once "pages/dang-ky.php";
            break;
        case "dang-nhap-admin":
            require_once "pages/dang-nhap-admin.php";
            break;
        case "trang-loi":
            require_once "pages/trang-loi.php";
            break;
        // case "chinh-sua":
        //     require_once "pages/chinh-sua.php";
        //     break;
        default:
            echo "<script>location.href='index.php?pages=trang-loi'</script>";
            break;
    }
} else {
    echo "<script>location.href='index.php?pages=dang-nhap'</script>";
}
