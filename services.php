<?php 
session_start(); // Start the session
// SEO Variables
$page_title = "Our Services - Techshiil";
$meta_description = "Explore the range of services we offer to help you achieve your goals. Quality and satisfaction guaranteed.";
$meta_keywords = "services, professional services, quality, satisfaction, expertise";

include 'partials/header.php'
?>

<div class="section__extra-margin">
    <section class="sectionbottom">
        <div class="container">
        <h1>Our Services</h1>
        <div class="services-grid">
            <div class="service-card">
                <h2>Web Design</h2>
                <p>We create beautiful and functional websites tailored to your needs.</p>
                <a href="service-web-design.php" class="button">View Service</a>
            </div>
            <div class="service-card">
                <h2>SEO Optimization</h2>
                <p>Optimize your website to rank higher in search engine results.</p>
                <a href="service-seo-optimization.php" class="button">View Service</a>
            </div>
            <div class="service-card">
                <h2>Graphic Design</h2>
                <p>Professional graphic design services to make your brand stand out.</p>
                <a href="service-graphic-design.php" class="button">View Service</a>
            </div>
            <div class="service-card">
                <h2>Branding</h2>
                <p>Build a strong brand identity with our expert branding services.</p>
                <a href="service-branding.php" class="button">View Service</a>
            </div>
            <div class="service-card">
                <h2>Video Editing</h2>
                <p>High-quality video editing to tell your story effectively.</p>
                <a href="service-video-editing.php" class="button">View Service</a>
            </div>
            <div class="service-card">
                <h2>Building CV</h2>
                <p>Create professional and impactful CVs to land your dream job.</p>
                <a href="service-building-cv.php" class="button">View Service</a>
            </div>
        </div>
        </div> 
    </section>
</div>

<?php
include './partials/footer.php';
?>
