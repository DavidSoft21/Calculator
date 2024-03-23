<div id="preloader" data-wow-duration="3s" data-wow-delay="6s">
    <div class="book">
        <div class="book__page"></div>
        <div class="book__page"></div>
        <div class="book__page"></div>
    </div>
</div>
<div class="container">
    <nav class="navi navbar navbar-fixed-top  navigation " id="top-nav">
        <a class="navbar-brand text-secondary" role="button" href="/" id="logo">
            CALCULATOR APP
        </a>

        <button class="navbar-toggler hidden-lg-up float-lg-right" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <i class="tf-ion-android-menu"></i>
        </button>
        <div class="collapse navbar-toggleable-md" id="navbarResponsive">

            <ul class="nav navbar-nav menu float-lg-right" id="top-nav-ul">
                <?php
                if ($showCalculator) {
                    echo '<li class="nav-item"> <a class="nav-link" href="#calculator">CALCULATOR</a></li>';
                }
                if ($showHome) {
                    echo '<li class="nav-item active"><a class="nav-link" role="button" href="home">HOME</a></li>';
                }
                if ($showAbout) {
                    echo '<li class="nav-item"> <a class="nav-link" href="#about">ABOUT</a></li>';
                }
                if ($showContact) {
                    echo '<li class="nav-item"> <a class="nav-link" href="#contact">CONTACT</a></li>';
                }
                if ($showServices) {
                    echo '<li class="nav-item"> <a class="nav-link" href="#service">SERVICES</a></li>';
                }
                ?>
            </ul>
        </div>
    </nav>
</div>