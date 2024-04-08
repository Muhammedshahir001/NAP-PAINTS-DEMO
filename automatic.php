<?php
session_start();
include('./include/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NAP PAINTS SERVICES</title>
    <!-- favicons Icons -->
    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="assets/images/favicons/NAP-07.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="assets/images/favicons/NAP-32x32.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="assets/images/favicons/NAP-16x16.png"
    />
    <link rel="manifest" href="assets/images/favicons/" />
    <meta name="description" content="Nap | Paints" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link
      href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap"
      rel="stylesheet"
    />

    <link
      rel="stylesheet"
      href="assets/vendors/bootstrap/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="assets/vendors/animate/animate.min.css" />
    <link rel="stylesheet" href="assets/vendors/animate/custom-animate.css" />
    <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="assets/vendors/jarallax/jarallax.css" />
    <link
      rel="stylesheet"
      href="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css"
    />
    <link
      rel="stylesheet"
      href="assets/vendors/nouislider/nouislider.min.css"
    />
    <link
      rel="stylesheet"
      href="assets/vendors/nouislider/nouislider.pips.css"
    />
    <link rel="stylesheet" href="assets/vendors/odometer/odometer.min.css" />
    <link rel="stylesheet" href="assets/vendors/swiper/swiper.min.css" />
    <link rel="stylesheet" href="assets/vendors/austry-icons/style.css" />
    <link
      rel="stylesheet"
      href="assets/vendors/tiny-slider/tiny-slider.min.css"
    />
    <link rel="stylesheet" href="assets/vendors/reey-font/stylesheet.css" />
    <link
      rel="stylesheet"
      href="assets/vendors/owl-carousel/owl.carousel.min.css"
    />
    <link
      rel="stylesheet"
      href="assets/vendors/owl-carousel/owl.theme.default.min.css"
    />
    <link rel="stylesheet" href="assets/vendors/bxslider/jquery.bxslider.css" />
    <link
      rel="stylesheet"
      href="assets/vendors/bootstrap-select/css/bootstrap-select.min.css"
    />
    <link rel="stylesheet" href="assets/vendors/vegas/vegas.min.css" />
    <link rel="stylesheet" href="assets/vendors/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="assets/vendors/timepicker/timePicker.css" />

    <!-- template styles -->
    <link rel="stylesheet" href="assets/css/austry.css" />
    <link rel="stylesheet" href="assets/css/austry-responsive.css" />
    <link rel="stylesheet" href="assets/css/color-6.css" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"
    />
  </head>

  <body>
    <div class="page-wrapper">
      <header class="main-header-six">
        <nav class="main-menu main-menu-six">
          <div class="main-menu-six__wrapper">
            <div class="container">
              <div class="main-menu-six__wrapper-inner">
                <div class="main-menu-six__logo">
                  <a href="tel:+96894566700" class="float">
                    <i class="fa fa-phone my-float"></i>
                  </a>

                  <a
                    href="https://wa.me/96894566700"
                    class="floats"
                    target="_blank"
                  >
                    <i class="fa fa-whatsapp my-floats"></i>
                  </a>

                  <a href="index.html"
                    ><img
                      style="width: 100px"
                      src="assets/images/resources/NAP-07-removebg-preview.png"
                      alt=""
                  /></a>
                </div>
                <div class="main-menu-six__main-menu-box">
                  <a
                    href="#
                  "
                    class="mobile-nav__toggler"
                    ><i class="fa fa-bars"></i
                  ></a>
                  <ul class="main-menu__list">
                    <li>
                      <a href="index.html">Home </a>
                    </li>
                    <li>
                      <a href="about.html">About</a>
                    </li>
                    <li>
                      <a href="#">Product</a>
                      <ul>
                        <li>
                          <a href="automatic.php"
                            >Automotive Paint Related Materials</a
                          >
                        </li>
                        <li>
                          <a href="bluding.php"
                            >Building materials Related Items</a
                          >
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a href="#">Blog</a>
                      <!-- <ul>
                        <li><a href="news.html">News</a></li>
                        <li><a href="news-details.html">News Details</a></li>
                      </ul> -->
                    </li>
                    <li>
                      <a href="contact.html">Contact</a>
                    </li>
                  </ul>
                </div>
                <div class="main-menu-six__search-cart-box">
                  <div class="main-menu-six__search-box">
                    <a
                      href="#"
                      class="main-menu-six__search search-toggler icon-magnifying-glass"
                    ></a>
                  </div>
                  <div class="main-menu-six__cart-box">
                    <a
                      href="#"
                      class="main-menu-six__cart icon-shopping-cart"
                    ></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </nav>
      </header>

      <div class="stricky-header stricked-menu main-menu">
        <div class="sticky-header__content"></div>
        <!-- /.sticky-header__content -->
      </div>
      <!-- /.stricky-header -->

      <!--Page Header Start-->
      <section class="page-header">
        <div
          class="page-header-bg"
          style="
            background-image: url(assets/images/backgrounds/about-banner.png);
          "
        ></div>

        <div class="container">
          <div class="page-header__inner">
            <h2>Services-1</h2>
            <div class="thm-breadcrumb__box">
              <ul class="thm-breadcrumb list-unstyled">
                <li><a href="index.html">Home</a></li>
                <li><span>/</span></li>
                <li>Services</li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <!--Page Header End-->

      <!--Services Page One Start-->
    <section class="services-page-one">
        <div class="container">
            <div class="row">
                <?php
                // Assuming $con is your database connection object
                $query = "SELECT * from automotive_Products";
                $result = mysqli_query($con, $query);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="services-one__single">
                                <div class="services-one__img-box">
                                    <div class="services-one__img">
                                        <a href="automatic.php?pid=<?php echo htmlentities($row['id']); ?>">
                                            <img src="backend-area/products/product_images/<?php echo htmlentities($row['ProductImage']); ?>" data-echo="backend-area/products/product_images/<?php echo htmlentities($row['ProductImage']); ?>" class="img-responsive" width="100%" height="100%" />
                                        </a>
                                    </div>
                                </div>
                                <div class="services-one__content">
                                    <h3 class="services-one__title">
                                        <a href="automatic.php?pid=<?php echo htmlentities($row['id']); ?>" class="smooth" title=""><?php echo htmlentities($row['ProductName']); ?></a>
                                    </h3>
                                    <p class="services-one__category">Category: <?php echo htmlentities($row['productCategory']); ?></p>
                                    <p class="services-one__price">Price: <?php echo htmlentities($row['productPrice']); ?></p>
                                </div>
                            </div>
                        </div>
                <?php 
                    }
                } else {
                    echo "Error: " . mysqli_error($con);
                }
                ?>
            </div>
        </div>
    </section>

      <!--Services Page One End-->

      <!--Site Footer Start-->
      <footer class="site-footer">
        <div class="site-footer__img">
          <img src="#" alt="" />
        </div>
        <div class="container">
          <div class="site-footer__top">
            <div class="row">
              <div
                class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp"
                data-wow-delay="100ms"
              >
                <div class="footer-widget__column footer-widget__about">
                  <div class="footer-widget__logo">
                    <a href="#"
                      ><img src="assets/images/resources/NAP-Logo-2.png" alt=""
                    /></a>
                  </div>
                  <div class="footer-widget__about-text-box">
                    <p class="footer-widget__about-text">
                      Your go-to for automotive materials and building supplies.
                      Quality products, expert service. Let's bring your
                      projects to life, together.
                    </p>
                  </div>
                  <div class="footer-widget__about-btn-box">
                    <a href="#" class="footer-widget__about-btn thm-btn"
                      >Contact</a
                    >
                  </div>
                </div>
              </div>
              <div
                class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp"
                data-wow-delay="200ms"
              >
                <div class="footer-widget__column footer-widget__links">
                  <div class="footer-widget__title-box">
                    <h4 class="footer-widget__title">Links</h4>
                  </div>
                  <ul class="footer-widget__links-list list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">News & blog</a></li>
                    <li><a href="#">Our Product</a></li>
                    <li><a href="contact.html">Contacts</a></li>
                  </ul>
                </div>
              </div>
              <div
                class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp"
                data-wow-delay="300ms"
              >
                <div class="footer-widget__contact">
                  <div class="footer-widget__title-box">
                    <h4 class="footer-widget__title">Contact</h4>
                  </div>
                  <p class="footer-widget__contact-text">
                    4621 Street, wadi al kabir industrial area, muscat ,
                    sultanate of oman
                  </p>
                  <ul class="footer-widget__Contact-list list-unstyled">
                    <li>
                      <div class="icon">
                        <span class="icon-email"></span>
                      </div>
                      <div class="text">
                        <p>
                          <a href="mailto:Nappaints@gmail.com"
                            >Nappaints@gmail.com</a
                          >
                        </p>
                      </div>
                    </li>
                    <li>
                      <div class="icon">
                        <span class="icon-telephone"></span>
                      </div>
                      <div class="text">
                        <p><a href="tel:+96894566700">+968 94566700</a></p>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div
                class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp"
                data-wow-delay="400ms"
              >
                <div class="footer-widget__newsletter">
                  <div class="footer-widget__title-box">
                    <h4 class="footer-widget__title">Location</h4>
                  </div>
                  <div class="google-maps">
                    <!-- Height=450px; Width=600px -->
                    <iframe
                      src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14625.787288898007!2d58.5685152!3d23.5883031!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e91f7db9d4eff99%3A0xf0e8b1c997531be6!2sNap%20Abu%20Amina%20International%20Trade%20Llc!5e0!3m2!1sen!2sin!4v1710741089011!5m2!1sen!2sin"
                      width="600"
                      height="450"
                      style="border: 0"
                      allowfullscreen=""
                      loading="lazy"
                      referrerpolicy="no-referrer-when-downgrade"
                    ></iframe>
                  </div>
                  <!--               
                  <div class="footer-widget__title-box">
                    <h4 class="footer-widget__title">Newsletter</h4>
                  </div>
                  <div class="footer-widget__newsletter-form-box">
                    <form
                      class="footer-widget__newsletter-form mc-form"
                      data-url="MC_FORM_URL"
                    >
                      <div class="footer-widget__newsletter-form-input-box">
                        <input
                          type="email"
                          placeholder="Email Address"
                          name="EMAIL"
                        />
                        <button
                          type="submit"
                          class="footer-widget__newsletter-btn"
                        >
                          <img
                            src="assets/images/icon/paper-plan-icon.png"
                            alt=""
                          />
                        </button>
                      </div>
                    </form>
                    <div class="mc-form__response"></div>
                  </div> -->
                  <div class="site-footer__social">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a
                      href="https://www.instagram.com/nappaints?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
                      ><i class="fab fa-instagram"></i
                    ></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="site-footer__bottom">
            <p class="site-footer__bottom-text">
              © Copyright 2024 by <a href="#">nappaints.com</a>
            </p>
            <ul class="list-unstyled site-footer__bottom-menu">
              <li><a href="#">Help</a></li>
              <li><a href="#">Privacy Policy</a></li>
            </ul>
          </div>
        </div>
      </footer>
      <!--Site Footer End-->
    </div>
    <!-- /.page-wrapper -->

    <div class="mobile-nav__wrapper">
      <div class="mobile-nav__overlay mobile-nav__toggler"></div>
      <!-- /.mobile-nav__overlay -->
      <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"
          ><i class="fa fa-times"></i
        ></span>

        <div class="logo-box">
          <a href="index.html" aria-label="logo image"
            ><img src="assets/images/resources/logo-1.png" width="130" alt=""
          /></a>
        </div>
        <!-- /.logo-box -->
        <div class="mobile-nav__container"></div>
        <!-- /.mobile-nav__container -->

        <ul class="mobile-nav__contact list-unstyled">
          <li>
            <i class="fa fa-envelope"></i>
            <a href="mailto:needhelp@packageName__.com">needhelp@austry.com</a>
          </li>
          <li>
            <i class="fa fa-phone-alt"></i>
            <a href="tel:666-888-0000">666 888 0000</a>
          </li>
        </ul>
        <!-- /.mobile-nav__contact -->
        <div class="mobile-nav__top">
          <div class="mobile-nav__social">
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-facebook-square"></a>
            <a href="#" class="fab fa-pinterest-p"></a>
            <a href="#" class="fab fa-instagram"></a>
          </div>
          <!-- /.mobile-nav__social -->
        </div>
        <!-- /.mobile-nav__top -->
      </div>
      <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->

    <div class="search-popup">
      <div class="search-popup__overlay search-toggler"></div>
      <!-- /.search-popup__overlay -->
      <div class="search-popup__content">
        <form action="#">
          <label for="search" class="sr-only">search here</label
          ><!-- /.sr-only -->
          <input type="text" id="search" placeholder="Search Here..." />
          <button type="submit" aria-label="search submit" class="thm-btn">
            <i class="icon-magnifying-glass"></i>
          </button>
        </form>
      </div>
      <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"
      ><i class="fa fa-angle-up"></i
    ></a>

    <script src="assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendors/jarallax/jarallax.min.js"></script>
    <script src="assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
    <script src="assets/vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
    <script src="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="assets/vendors/jquery-validate/jquery.validate.min.js"></script>
    <script src="assets/vendors/nouislider/nouislider.min.js"></script>
    <script src="assets/vendors/odometer/odometer.min.js"></script>
    <script src="assets/vendors/swiper/swiper.min.js"></script>
    <script src="assets/vendors/tiny-slider/tiny-slider.min.js"></script>
    <script src="assets/vendors/wnumb/wNumb.min.js"></script>
    <script src="assets/vendors/wow/wow.js"></script>
    <script src="assets/vendors/isotope/isotope.js"></script>
    <script src="assets/vendors/countdown/countdown.min.js"></script>
    <script src="assets/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="assets/vendors/bxslider/jquery.bxslider.min.js"></script>
    <script src="assets/vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="assets/vendors/vegas/vegas.min.js"></script>
    <script src="assets/vendors/jquery-ui/jquery-ui.js"></script>
    <script src="assets/vendors/timepicker/timePicker.js"></script>
    <script src="assets/vendors/circleType/jquery.circleType.js"></script>
    <script src="assets/vendors/circleType/jquery.lettering.min.js"></script>
    <script src="assets/vendors/sidebar-content/jquery-sidebar-content.js"></script>

    <!-- template js -->
    <script src="assets/js/austry.js"></script>
  </body>
</html>
