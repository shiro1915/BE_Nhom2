<?php
// Bao gồm file cấu hình chung để sử dụng session và các hằng số
require_once 'config.php';
require_once 'database/db.php';
require_once 'database/user.php';
require_once 'database/cart.php';
require_once 'database/wishlist.php';


// Kiểm tra người dùng đã đăng nhập hay chưa
$user = null;
$cart = new Cart();
$wishlist = new Wishlist();

if (isset($_SESSION['user_id'])) {
    $user = new User();
    $userDetails = $user->getUserById($_SESSION['user_id']);
    
    $cartItems = $cart->getCartItemsByUserId($_SESSION['user_id']);
    $wishlistItems = $wishlist->getWishlistByUserId($_SESSION['user_id']);
    
    $cartCount = is_array($cartItems) ? count($cartItems) : 0;
    $wishlistCount = is_array($wishlistItems) ? count($wishlistItems) : 0;
} else {
    $cartCount = 0;
    $wishlistCount = 0;
}
?>

<header class="header-v4">
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    Free shipping for standard order over $100
                </div>

                <div class="right-top-bar flex-w h-full">
                    <?php if ($user): ?>
                        <a href="admin-dashboard.php" class="flex-c-m trans-04 p-lr-25">
                            My Admin
                        </a>
                        <a href="logout.php" class="flex-c-m trans-04 p-lr-25">
                            Logout
                        </a>
                    <?php else: ?>
                        <a href="login.php" class="flex-c-m trans-04 p-lr-25">
                            Login
                        </a>
                        <a href="register.php" class="flex-c-m trans-04 p-lr-25">
                            Register
                        </a>
                    <?php endif; ?>
                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        EN
                    </a>
                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        USD
                    </a>
                </div>
            </div>
        </div>

        <div class="wrap-menu-desktop how-shadow1">
            <nav class="limiter-menu-desktop container">
                <!-- Logo desktop -->
                <a href="index.php" class="logo">
                    <img src="images/icons/logo-01.png" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="product.php">Shop</a>
                        </li>
                        <li class="label1" data-label1="hot">
                            <a href="shopping-cart.php">Cart (<?php echo $cartCount; ?>)</a>
                        </li>
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>

                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?php echo $cartCount; ?>">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>

                    <a href="#" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="<?php echo $wishlistCount; ?>">
                        <i class="zmdi zmdi-favorite-outline"></i>
                    </a>
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo mobile -->
        <div class="logo-mobile">
            <a href="index.php"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="<?php echo $cartCount; ?>">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>

            <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="<?php echo $wishlistCount; ?>">
                <i class="zmdi zmdi-favorite-outline"></i>
            </a>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="topbar-mobile">
            <li>
                <div class="left-top-bar">
                    Free shipping for standard order over $100
                </div>
            </li>

            <li>
                <div class="right-top-bar flex-w h-full">
                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        Help & FAQs
                    </a>
                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        My Account
                    </a>
                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        EN
                    </a>
                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        USD
                    </a>
                </div>
            </li>
        </ul>

        <ul class="main-menu-m">
            <li>
                <a href="index.php">Home</a>
            </li>

            <li>
                <a href="product.php">Shop</a>
            </li>

            <li>
                <a href="shopping-cart.php" class="label1 rs1" data-label1="hot">Cart (<?php echo $cartCount; ?>)</a>
            </li>
        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="images/icons/icon-close2.png" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search...">
            </form>
        </div>
    </div>
</header>
