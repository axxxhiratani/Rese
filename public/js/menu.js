$("#menu").click(() => {
    $("#menu").toggleClass("open");
    $("#nav").toggleClass("in");
    $(".menu__line--top").toggleClass("change--width");
    $(".menu__line--middle").toggleClass("change--width");
    $(".menu__line--bottom").toggleClass("change--width");
});
