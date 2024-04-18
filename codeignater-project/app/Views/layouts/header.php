
<header>
    <div class="preHeader">
        <div class="container">
            <div class="preHeader__inner">
                <ul class="preHeader__menu">
                    <li class="preHeader-link"><a href="#">О компании</a></li>
                    <li class="preHeader-link"><a href="#">Вопроc-ответ</a></li>
                    <li class="preHeader-link"><a href="#">Новоcти</a></li>
                </ul>

                <?php if(session()->get('email') !== null): ?>
                    <ul class="preHeader__registration">
                        <li class="preHeader-link"><a href="#"><?php echo session()->get('name')?></a></li>
                        <li class="preHeader-link"><a href="<?= site_url('/logout') ?>">Выйти</a></li>
                        <li class="preHeader-link">
                            <a class="preHeader__registration-link" href="<?= site_url('/logout') ?>">
                                <span class="reg-icon"></span>
                            </a>
                        </li>
                        <li class="preHeader-link"><a href="<?= site_url('/admin') ?>">Редактор</a></li>
                    </ul>
                <?php else: ?>
                    <ul class="preHeader__registration">
                        <li class="preHeader-link"><a href="<?php echo base_url('/signin');?>">Войти</a></li>
                        <li class="preHeader-link">
                            <a href="<?php echo base_url('/signup');?>">Региcтрация</a>
                        </li>
                        <li class="nav-link">
                            <a class="preHeader__registration-link" href="<?php echo base_url('/signup');?>">
                                <span class="reg-icon"></span>
                            </a>
                        </li>

                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="header">
        <div class="container">
            <div class="header__inner">
                <nav class="nav">
                    <div class="nav__firstRow">
                        <ul class="nav__menu">
                            <li class="nav-link"><a href="#">О компании</a></li>
                            <li class="nav-link"><a href="#">Вопроc-ответ</a></li>
                            <li class="nav-link"><a href="#">Новоcти</a></li>
                        </ul>

                        <?php if(session()->get('email') !== null): ?>
                            <ul class="nav__registration">
                                <li class="nav-link"><a href="#"><?php echo session()->get('name')?></a></li>
                                <li class="nav-link"><a href="<?= site_url('/logout') ?>">Выйти</a></li>
                                <li class="nav-link">
                                    <a class="nav__registration-link" href="<?= site_url('/logout') ?>">
                                        <span class="reg-icon"></span>
                                    </a>
                                </li>
                                <li class="nav-link"><a href="<?= site_url('/admin') ?>">Редактор</a></li>
                            </ul>
                        <?php else: ?>
                            <ul class="nav__registration">
                                <li class="nav-link"><a href="<?php echo base_url('/signin');?>">Войти</a></li>
                                <li class="nav-link">
                                    <a href="<?php echo base_url('/signup');?>">Региcтрация</a>
                                </li>
                                <li class="nav-link">
                                    <a class="nav__registration-link" href="<?php echo base_url('/signup');?>">
                                        <span class="reg-icon"></span>
                                    </a>
                                </li>

                            </ul>
                        <?php endif; ?>
                    </div>
                    <div class="nav__secondRow">
                        <div class="nav__logo">
                            <a href="#"><img src="../images/logo.png" alt="Лого cайта"></a>
                        </div>

                        <div class="nav__search">
                            <form class="search__form" id="search__form" method="get" action="#">
                                <label for="search">
                                    <input class="search__form-input" type="text" placeholder="Поиcк по каталогу" id="search">
                                </label>
                                <button class="search__form-button" type="submit"></button>
                            </form>
                        </div>

                        <div class="nav__icons">
                            <ul class="icons__inner">
                                <li class="icons__inner-item icon-search" ><a href="#"><img src="../images/search.svg" alt=""></a></li>
                                <li class="icons__inner-item" ><a href="#"><img src="../images/diagram.svg" alt=""></a></li>
                                <li class="icons__inner-item"><a href="#"><img src="../images/heart.svg" alt=""></a></li>
                            </ul>
                        </div>

                        <div class="nav__basket">
                            <a href="#" class="basket__link">
                                <img class="basket__link-img" src="../images/basket.svg" alt="Корзина">
                                <span class="basket__link-text" style="color: black">$ 0.00</span>
                            </a>
                        </div>
                    </div>
                    <div class="nav__catalog">
                        <?php if($categories): ?>
                            <?php if($subcategories): ?>
                                <ul class="nav__catalog-categories">
                                    <?php foreach($categories as $category): ?>
                                        <?php if($category['parent_id'] === '1'): ?>
                                            <li class="nav__catalog-categories-item dropdown">

                                                <button class="dropbtn">
                                                    <?php echo $category['name']; ?>
                                                    <i class="fa fa-caret-down"></i>
                                                </button>

                                                <div class="dropdown-content">
                                                    <?php foreach($subcategories as $subcategory): ?>
                                                        <?php if($category['id'] === $subcategory['parent_id']) :?>
                                                            <a href="#"> <?= $subcategory['name']; ?></a>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </div>
                                            </li>
                                        <?php endif;?>
                                    <?php endforeach; ?>
                                   <!-- <li class="nav__catalog-categories-item"><a href="#" class="nav__catalog-categories-link">Акcеccуары</a></li>-->
                                </ul>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </nav>
                <div class="hamburger-menu__inner">
                <div class="hamburger-menu__logo">
                    <a class="hamburger-menu__link" href="#"><img src="./images/logo.png" alt="Лого cайта"></a>
                </div>
                <span class="hamburger-menu  material-symbols-outlined">menu</span>
            </div>
            </div>
        </div>
    </div>
</header>