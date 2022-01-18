// const target = document.getElementById("menu");
// target.addEventListener('click', () => {
//   target.classList.toggle('open');
//   const nav = document.getElementById("nav");
//   nav.classList.toggle('in');
// });


$("#menu").click(() => {
    $("#menu").toggleClass("open");
    $("#nav").toggleClass("in");
    $(".menu__line--top").toggleClass("change--width");
    $(".menu__line--middle").toggleClass("change--width");
    $(".menu__line--bottom").toggleClass("change--width");
});
