<footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
        <div class="container-fluid tm-container-small">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">About Catalog-Z</h3>
                    <p>Catalog-Z is free <a rel="sponsored" href="https://v5.getbootstrap.com/">Bootstrap 5</a> Alpha 2 Template for video and photo websites. You can freely use this TemplateMo layout for a front-end integration with any kind of CMS website.</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">Our Links</h3>
                    <ul class="tm-footer-links pl-0">
                        <li><a href="<?=ROOT . "" ?>">Advertise</a></li>
                        <li><a href="<?=ROOT . "" ?>">Support</a></li>
                        <li><a href="<?=ROOT . "index" ?>">Our Company</a></li>
                        <li><a href="<?=ROOT . "contact" ?>">Contact</a></li>
                        <?php if(!isset($_SESSION['userid'])){?>
                        <li><a href="<?=ROOT . "login" ?>">Login</a></li>
                        <li><a href="<?=ROOT . "signup" ?>">Sign Up</a></li>
                        <?php }else {?>
                        <li><a href="<?=ROOT . "logout" ?>">Logout</a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <ul class="tm-social-links d-flex justify-content-end pl-0 mb-5">
                        <li class="mb-2"><a href="https://facebook.com"><i class="fab fa-facebook"></i></a></li>
                        <li class="mb-2"><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
                        <li class="mb-2"><a href="https://instagram.com"><i class="fab fa-instagram"></i></a></li>
                        <li class="mb-2"><a href="https://pinterest.com"><i class="fab fa-pinterest"></i></a></li>
                    </ul>
                    <a href="#" class="tm-text-gray text-right d-block mb-2">Terms of Use</a>
                    <a href="#" class="tm-text-gray text-right d-block">Privacy Policy</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-7 col-12 px-5 mb-3">
                    Copyright 2020 Catalog-Z Company. All rights reserved.
                </div>
                <div class="col-lg-4 col-md-5 col-12 px-5 text-right">
                    Designed by <a href="https://templatemo.com" class="tm-text-gray" rel="sponsored" target="_parent">TemplateMo</a>
                </div>
            </div>
        </div>
    </footer>
<script>
           document.addEventListener('DOMContentLoaded',(e)=>{
            var ar = window.location.href.split('/');
            let pageHrefName = ar[ar.length-1];
            let links = Array.from(document.querySelectorAll(".nav-link"));
            console.log(ar.length);
            console.log(ar);
            console.log(pageHrefName);
            links.forEach((link)=>{
                if(link.innerHTML.toLowerCase() == pageHrefName.toLowerCase()){
                    link.classList.add('active');
                }else if(link.innerHTML.toLowerCase() == 'photos' && pageHrefName.toLowerCase() != "videos" && pageHrefName.toLowerCase() != "about" && pageHrefName.toLowerCase() != "contact" ){
                    link.classList.add('active');
                    
                }
            })
        });
</script>
<script src="<?= ASSETS?>catalog/js/plugins.js"></script>
<script>

    $(window).on("load", function() {
                $('body').addClass('loaded');
            });
</script>