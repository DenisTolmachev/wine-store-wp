<?php get_header(); ?>
    <main>
        <div class="work-us-block">
            <div class="work-us-title">
                <p>работая с нами вы получаете:</p>
            </div>
            <div class="work-us-info">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="consult-block">
                            <img src="<?= get_image_path(); ?>/consult.png" alt="">
                            <h1>бесплатная консультация</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu mi nec justo vestibulum auctor. Phasellus sollicitudin diam at feugiat dictum. </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="natur-product-block">
                            <img src="<?= get_image_path(); ?>/natur-product.png" alt="">
                            <h1>100% натуральный продукт</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu mi nec justo vestibulum auctor. Phasellus sollicitudin diam at feugiat dictum. </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="cup-block">
                            <img src="<?= get_image_path(); ?>/cup.png" alt="">
                            <h1 class="outborder">победитель международных выставок</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu mi nec justo vestibulum auctor. Phasellus sollicitudin diam at feugiat dictum. </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="persent-block">
                            <img src="<?= get_image_path(); ?>/persent.png" alt="">
                            <h1>скидка<br>на покупку</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu mi nec justo vestibulum auctor. Phasellus sollicitudin diam at feugiat dictum. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="implementation-block">
            <div class="implementation-circle">
                <p>Загорулько В.В. реализует посадочный материал винограда со своего селекционного маточника. Автором проводятся консультации по выращиванию сортов и селекционных форм винограда. Оптовым покупателям предоставляются скидки. Пересылка по территории Украины – любыми службами доставки.</p>
            </div>
        </div>
        <div class="gallery-block">
            <div class="gallery-block-title">
                <p>наши новинки</p>
            </div>
            <div class="gallery">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="grapes">
                            <a class="img-wrap" href="./images/grapes1.png">
                                <img src="<?= get_image_path(); ?>/grapes1.png" alt="Сфинкс">
                                <div class="img-title">
                                    <p>Сфинкс</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="grapes">
                            <a class="img-wrap" href="<?= get_image_path(); ?>/grapes2.png">
                                <img src="<?= get_image_path(); ?>/grapes2.png" alt="Велес">
                                <div class="img-title">
                                    <p>Велес</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="grapes">
                            <a class="img-wrap" href="<?= get_image_path(); ?>/grapes3.png">
                                <img src="<?= get_image_path(); ?>/grapes3.png" alt="Калиста">
                                <div class="img-title">
                                    <p>Калиста</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="grapes">
                            <a class="img-wrap" href="./images/grapes1.png">
                                <img src="<?= get_image_path(); ?>/grapes1.png" alt="Сфинкс">
                                <div class="img-title">
                                    <p>Сфинкс</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="grapes">
                            <a class="img-wrap" href="<?= get_image_path(); ?>/grapes2.png">
                                <img src="<?= get_image_path(); ?>/grapes2.png" alt="Велес">
                                <div class="img-title">
                                    <p>Велес</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="grapes">
                            <a class="img-wrap" href="<?= get_image_path(); ?>/grapes3.png">
                                <img src="<?= get_image_path(); ?>/grapes3.png" alt="Калиста">
                                <div class="img-title">
                                    <p>Калиста</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="show-all-button">
                        <button class="show-all" onclick="location.href = ''">смотреть все</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php get_footer(); ?>