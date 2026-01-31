<?php 
session_start(); // Start the session
// SEO Variables 
$page_title = "Home - Techshiil";
$meta_description = "Get in touch with us for any inquiries, support, or feedback. We're here to help!";
$meta_keywords = "contact, inquiries, support, feedback, customer service";

include 'partials/header.php';
?>


<main class="main123">
    <article class=".aritcle1">

      <!-- 
        - #HERO
      -->

      <section class="section hero" id="home" aria-label="hero">
        <div class="contai1">

          <div class="hero-content">

            <p class="hero-subtitle has-before">Wellcome to Our Agency</p>

            <h1 class="h1 hero-title">Smart Ideas for your Brand are Here</h1>

            <p class="hero-text">
              Donec tincidunt lacinia diam, eu volutpat est sollicitudin at. Vestibulum ut mi tristi que, vulputate ante
              quis, tempus
              enim. Proin quis euismod purus. Suspen disse efficitur
              aliquam enim sed consequat vulputate ante quis.
            </p>

            <div class="btn-group">
              <a href="#" class="bton btn-primary">Discover More</a>

                    <button class="flex-btn" id="videoBtn">
                    <div class="btn-icon"> 
                      <ion-icon name="play" aria-hidden="true"></ion-icon>
                      </div>
                </button>

        <div id="videoModal" class="modal">
          <div class="modal-content">
            <span class="close">&times;</span>
            <iframe id="videoFrame" width="560" height="315" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
            </div>

          </div>

          <figure class="hero-banner has-before img-holder" style="--width: 650; --height: 650;">
            <img src="images/hero-banner.png" width="650" height="650" alt="hero banner" class="img-cover">
          </figure>

        </div>
      </section>




      <!-- 
        - #ABOUT
      -->

      <section class="section about" id="about" aria-label="about">
        <div class="contai1">

          <figure class="about-banner">
            <img src="./images/about-banner.png" width="802" height="654" loading="lazy" alt="about banner"
              class="w-100">
          </figure>

          <div class="about-content">

            <h2 class="h2-sm section-title">We create some things, Design for your success future.</h2>

            <p class="section-text">
              Lorem Ipsum is simply dumm of free available in market the way printing and typesetting industry has been
              the industrys
              standard dummy text ever.
            </p>

            <ul class="about-list">

              <li class="has-before">
                Price of additional materials or parts (if needed)
              </li>

              <li class="has-before">
                Transportation cost for carrying new materials/parts
              </li>

              <li class="has-before">
                You will get 100% money back offer.
              </li>

            </ul>

            <div class="btn-group">
              <a href="#" class="bton btn-primary">Know More</a>
            </div>

          </div>

        </div>
      </section>




      <!-- 
        - #SERVICE
      -->

      <section class="section service" id="services" aria-label="service">
        <div class="contai1">

          <p class="section-subtitle text-center1">-What We Offer-</p>

          <h2 class="h2 section-title text-center2">Our Creative Services</h2>

          <p class="section-text text-center1">
            Get the most of reduction in your team’s operating costs for the whole product which creates amazing UI/UX
            experiences.
          </p>

          <ul class="grid-list">

            <li>
              <div class="service-card1 has-after">

                <figure class="card-icon">
                  <img src="./images/service-1.png" width="140" height="140" loading="lazy"
                    alt="UI/UX Creative Design" class="img">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">UI/UX Creative Design</h3>

                  <p class="card-text">
                    Lorem ipsum dolor sit amet, consectetur adi piscing semper turpis. Nullam eget luctlie gula and
                    adipiscing elit.
                  </p>

                  <a href="#" class="btn-link">
                    <span class="span">Read More</span>

                    <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                  </a>

                </div>

              </div>
            </li>

            <li>
              <div class="service-card1 has-after">

                <figure class="card-icon">
                  <img src="./images/service-2.png" width="140" height="140" loading="lazy" alt="App Development"
                    class="img">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">App Development</h3>

                  <p class="card-text">
                    Lorem ipsum dolor sit amet, consectetur adi piscing semper turpis. Nullam eget luctlie gula and
                    adipiscing elit.
                  </p>

                  <a href="#" class="btn-link">
                    <span class="span">Read More</span>

                    <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                  </a>

                </div>

              </div>
            </li>

            <li>
              <div class="service-card1 has-after">

                <figure class="card-icon">
                  <img src="./images/service-3.png" width="140" height="140" loading="lazy"
                    alt="Professional Content Writer" class="img">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">Professional Content Writer</h3>

                  <p class="card-text">
                    Lorem ipsum dolor sit amet, consectetur adi piscing semper turpis. Nullam eget luctlie gula and
                    adipiscing elit.
                  </p>

                  <a href="#" class="btn-link">
                    <span class="span">Read More</span>

                    <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                  </a>

                </div>

              </div>
            </li>

            <li>
              <div class="service-card1 has-after">

                <figure class="card-icon">
                  <img src="./images/service-4.png" width="140" height="140" loading="lazy" alt="Graphic Design"
                    class="img">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">Graphic Design</h3>

                  <p class="card-text">
                    Lorem ipsum dolor sit amet, consectetur adi piscing semper turpis. Nullam eget luctlie gula and
                    adipiscing elit.
                  </p>

                  <a href="#" class="btn-link">
                    <span class="span">Read More</span>

                    <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                  </a>

                </div>

              </div>
            </li>

          </ul>

          <a href="#" class="bton btn-primary">Get Started</a>

        </div>
      </section>





      <!-- 
        - #FEATURES
      -->

      <section class="section features" id="features" aria-label="features">
        <div class="contai1">

          <p class="section-subtitle text-center1">-Why Choose Us-</p>

          <h2 class="h2 section-title text-center2">Reasons to Choose Us</h2>

          <p class="section-text text-center1">
            Get the most of reduction in your team’s operating costs for the whole product which creates amazing UI/UX
            experiences.
          </p>

          <ul class="grid-list">

            <li>
              <div class="features-card">

                <data class="card-number" value="01">01</data>

                <h3 class="h3 card-title">Free Icon Plugin</h3>

                <p class="card-text">
                  Nullam ullamcorper condimentum urna eu accumsan.
                </p>

              </div>
            </li>

            <li>
              <div class="features-card">

                <data class="card-number" value="02">02</data>

                <h3 class="h3 card-title">Free 6 Month Support</h3>

                <p class="card-text">
                  Nullam ullamcorper condimentum urna eu accumsan.
                </p>

              </div>
            </li>

            <li>
              <div class="features-card">

                <data class="card-number" value="03">03</data>

                <h3 class="h3 card-title">Customer Strategy</h3>

                <p class="card-text">
                  Nullam ullamcorper condimentum urna eu accumsan.
                </p>

              </div>
            </li>

            <li>
              <div class="features-card">

                <data class="card-number" value="04">04</data>

                <h3 class="h3 card-title">Best Premimum Image</h3>

                <p class="card-text">
                  Nullam ullamcorper condimentum urna eu accumsan.
                </p>

              </div>
            </li>

            <li>
              <div class="features-card">

                <data class="card-number" value="05">05</data>

                <h3 class="h3 card-title">Most Advanced Features</h3>

                <p class="card-text">
                  Nullam ullamcorper condimentum urna eu accumsan.
                </p>

              </div>
            </li>

            <li>
              <div class="features-card">

                <data class="card-number" value="06">06</data>

                <h3 class="h3 card-title">Very Reasonable Price</h3>

                <p class="card-text">
                  Nullam ullamcorper condimentum urna eu accumsan.
                </p>

              </div>
            </li>

          </ul>

        </div>
      </section>
    </article>
  </main>


  <!-- 
    - custom js link
  -->
  <script src="./js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<?php 
include 'partials/footer.php';
?>