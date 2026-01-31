<?php 
session_start(); // Start the session
// SEO Variables 
$page_title = "Contact Us - Techshiil";
$meta_description = "Get in touch with us for any inquiries, support, or feedback. We're here to help!";
$meta_keywords = "contact, inquiries, support, feedback, customer service";

include 'partials/header.php';
?>
<section>
    <div class="container1">
      <span class="big-circle"></span>
      <img src="img/shape.png" class="square" alt="" />
      <div class="form1">
        <div class="contact-info">
          <h3 class="title">Let's get in touch</h3>
          <p class="text">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe
            dolorum adipisci recusandae praesentium dicta!
          </p>

          <div class="info">
            <div class="information">
              <img src="img/location.png" class="icon" alt="" />
              <p>92 Cherry Drive Uniondale, NY 11553</p>
            </div>
            <div class="information">
              <img src="img/email.png" class="icon" alt="" />
              <p>lorem@ipsum.com</p>
            </div>
            <div class="information">
              <img src="img/phone.png" class="icon" alt="" />
              <p>123-456-789</p>
            </div>
          </div>

          <div class="social-media">
            <p>Connect with us :</p>
            <div class="social-icons">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>

          <form action="https://api.web3forms.com/submit" method="POST" autocomplete="off">
            <h3 class="title">Contact us</h3>
            <div class="input-container">
              <input type="text" name="name" class="input1" />
              <label for="">Username</label>
              <span>Username</span>
            </div>
            <input type="hidden" name="access_key" value="3108bc5d-f72e-4275-ae2e-be884d8261f8">
            <div class="input-container">
              <input type="email" name="email" class="input1" />
              <label for="">Email</label>
              <span>Email</span>
            </div>
            <div class="input-container">
              <input type="tel" name="phone" class="input1" />
              <label for="">Phone</label>
              <span>Phone</span>
            </div>
            <div class="input-container textarea">
              <textarea name="message" class="input1"></textarea>
              <label for="">Message</label>
              <span>Message</span>
            </div>
            <!-- hCaptcha Spam Protection -->
            <div class="h-captcha" data-captcha="true"></div>

            <input type="submit" value="Send" class="taabo" />
          </form>
        </div>
      </div>
      <script src="app.js"></script>
    </div>
</section>    
    <?php 
include 'partials/footer.php';
?>

