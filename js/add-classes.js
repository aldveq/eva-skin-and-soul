jQuery(document).ready(function ($) {
  $(window).on("scroll load orientationchange", () => {
    $("body").toggleClass("is-scrolled", $(window).scrollTop() > 0);
  });
});
