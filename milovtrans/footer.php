<?php include('inc/footer_html.php'); ?>
<!-- end #page_wrapper--> 
<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script> 
<script src="/assets/js/jquery.easing.1.3.js"></script> 

<script src="/assets/js/owl-carousel/owl.carousel.min.js"></script> 
<script src="/assets/js/strip.pkgd.min.js"></script>

<script src="/assets/js/script.js"></script>
<?php if ( is_page_template( 'contact.php' ) ) { ?>
<script src="/assets/js/form.js"></script> 
<?php echo '<script src="//maps.google.com/maps/api/js?key=AIzaSyA7s3IowiqXSTTKSwufNp7ydyPM5U5fNe4"></script>'; ?> 
<script src="/assets/js/gmap.js"></script>
<?php } ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-121095203-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-121095203-1');
</script>

</body></html>