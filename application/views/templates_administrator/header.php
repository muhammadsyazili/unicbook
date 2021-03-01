<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Unicbook project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/icons/logo.JPG'); ?>">
    <link rel="shortcut icon" href="<?= base_url('assets/icons/logo.JPG'); ?>">

    <title><?= $title; ?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/styles/bootstrap4/bootstrap.min.css">
    <link href="<?php echo base_url() ?>assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/styles/responsive.css">

    <script src="<?php echo base_url() ?>assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/styles/bootstrap4/popper.js"></script>
    <script src="<?php echo base_url() ?>assets/styles/bootstrap4/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/greensock/TweenMax.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/greensock/TimelineMax.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/greensock/animation.gsap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/easing/easing.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/parallax-js-master/parallax.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/custom.js"></script>

    <script>
        function myFunction() {
            let input, filter, cards, cardContainer, h5, title, i;
            input = document.getElementById("myFilter");
            filter = input.value.toUpperCase();
            cardContainer = document.getElementById("myItems");
            cards = cardContainer.getElementsByClassName("card");
            for (i = 0; i < cards.length; i++) {
                title = cards[i].querySelector(".card-body .card-text");
                if (title.innerText.toUpperCase().indexOf(filter) > -1) {
                    cards[i].style.display = "";
                } else {
                    cards[i].style.display = "none";
                }
            }
        }
    </script>
</head>
<?php if(isset($backgroud)) : ?><body style="background-image:url(<?php echo base_url($backgroud) ?>)"><?php else: ?><body><?php endif; ?>