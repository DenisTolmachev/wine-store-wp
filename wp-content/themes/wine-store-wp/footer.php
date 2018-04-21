
    <footer>
        <div class="footer-text">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu mi nec justo vestibulum auctor. Phasellus sollicitudin diam at feugiat dictum. Cras facilisis lorem metus, et tincidunt magna imperdiet porttitor. Sed magna velit, hendrerit non aliquet quis, posuere dapibus est.</p>
        </div>
        <div class="contacts">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="phone-st">
                        <img src="<?= get_image_path(); ?>/phone-st.png" alt="">
                        <p>Тел. (061) 111-11-11</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="phone-mob">
                        <img src="<?= get_image_path(); ?>/phone-mob.png" alt="">
                        <p>Моб. 111-11-11-111</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="e-mail">
                        <img class="mail" src="<?= get_image_path(); ?>/mail.png" alt="">
                        <a href="#">e-mail: test@test.com</a>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar-footer">
            <?= wp_nav_menu(array('menu' => 'nav-menu', 'menu_class' => 'nav-menu')); ?>
        </nav>
        <div class="copyright">
            <p>(c) Все права защищены 2016</p>
        </div>
    </footer>

</div>

</body>
</html>