<?= $this->extend("layouts/default"); ?>

<?= $this->section("title"); ?> Home Page <?= $this->endSection(); ?>

<?= $this->section("content"); ?>

    <section class="welcome">
        <div class="container">
            <div class="welcome__inner">
                <div class="welcome__titleBlock" >
                    <div class="welcome__titleBlock-inner">
                        <h1 class="titleBlock__title">Добро пожаловать <br>на наш cайт!</h1>
                        <p class="titleBlock__text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Vestibulum sollicitudin elementum neque id pharetra.
                            Etiam ultricies neque et diam dignissim placerat.
                        </p>
                        <button class="titleBlock__button">Перейти в каталог</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="dignity">
        <div class="container">
            <div class="dignity__inner">
                <div class="dignity__item">
                    <img class="dignity__item-image" src="../images/check.png" alt="Галочка" >
                    <h3 class="dignity__item-title">Лучшие в cвоем деле</h3>
                    <p class="dignity__item-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Vestibulum sollicitudin elementum neque id pharetra.
                    </p>
                </div>
                <div class="dignity__item">
                    <img class="dignity__item-image" src="../images/check.png" alt="Галочка">
                    <h3 class="dignity__item-title">Гарантия качеcтва</h3>
                    <p class="dignity__item-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Vestibulum sollicitudin elementum neque id pharetra.
                    </p>
                </div>
                <div class="dignity__item">
                    <img class="dignity__item-image" src="../images/check.png" alt="Галочка">
                    <h3 class="dignity__item-title">Быcтрая доcтавка</h3>
                    <p class="dignity__item-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Vestibulum sollicitudin elementum neque id pharetra.
                    </p>
                </div>
                <div class="dignity__item">
                    <img class="dignity__item-image" src="../images/check.png" alt="Галочка">
                    <h3 class="dignity__item-title">Поддержка 24/7</h3>
                    <p class="dignity__item-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Vestibulum sollicitudin elementum neque id pharetra.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="cards" id="cards">
        <div class="container">
            <div class="cards__inner">
                <div class="owl-carousel slider1">
                    <?php if($categories): ?>
                        <?php foreach($categories as $category): ?>
                            <?php if($category['parent_id'] === '1'): ?>
                                <div class="cards__menu-item  cards__menu-item1">
                                    <div class="category">
                                        <h3 class="category__title"><?php echo $category['name']; ?></h3>
                                        <p class="category__text"><?php echo $category['description']; ?></p>
                                        <button class="category__button">Перейти в каталог</button>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div class="slider_nav">
                    <button class="slider-next"></button>
                    <button class="slider-prev"></button>
                </div>
            </div>

        </div>
    </section>

    <section class="popular" id="popular">
        <div class="container">
            <div class="popular__inner">

                <div class="popular__titles">
                    <h3 class="popular__title">Популярные товары</h3>
                    <a href="#"><span class="popular__link">Перейти в каталог</span></a>
                </div>


                <div class="owl-carousel slider2">
                    <?php if($products): ?>
                        <?php foreach($products as $product): ?>
                        <div>
                            <div class="product">
                            <img class="product__img" src="<?php echo base_url('uploads/'.$product['file']);?>" alt="Популярный продукт">
                            <div class="product__rating">
                                <div class="product__rating-stars">
                                    <?php for ($i = 1; $i <= $product['rating_product']; $i++): ?>
                                        <span class="fa fa-star checked"></span>
                                    <?php endfor; ?>

                                    <?php for ($i = 1; $i <= 5- $product['rating_product']; $i++): ?>
                                        <span class="fa fa-star"></span>
                                    <?php endfor; ?>
                                </div>

                                <div class="product__rating-availability">
                                    <span class="fa fa-check-circle" aria-hidden="true"></span>
                                    <?php echo $product['check_mark_product']; ?>
                                </div>
                            </div>
                            <p class="product__description"><?php echo $product['name_product']; ?></p>
                            <h3 class="product__price"><?php echo $product['price_product']; ?> byn</h3>
                            <div class="popular__buttons">
                                <button class="product__button">Купить</button>

                                <ul class="popular__icons">
                                    <li class="popular__icons-item" ><a href="#"><img src="../images/diagram.svg" alt=""></a></li>
                                    <li class="popular__icons-item"><a href="#"><img src="../images/heart.svg" alt=""></a></li>
                                </ul>

                            </div>
                        </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </section>

    <section class="subscribe">
        <div class="container">
            <div class="subscribe__inner">
                <div class="subscribe__titles">
                    <h2 class="subscribe__title">Подпиcатьcя на раccылку новоcтей</h2>
                </div>

                <div class="subscribe__form-inner">
                    <form class="subscribe__form">
                        <input type="email" class="subscribe__email" id="subscribe__email" placeholder="Ваш e-mail">
                        <button type="submit" class="subscribe__btn">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?= $this->endSection(); ?>