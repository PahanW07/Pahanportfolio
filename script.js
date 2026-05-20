/* =========================
FILE: script.js
========================= */

const menuBtn = document.querySelector(".menu-btn");
const nav = document.querySelector("nav");

menuBtn.onclick = () => {
  nav.classList.toggle("active");
};

/* Scroll Animation */

const sections = document.querySelectorAll("section");

window.addEventListener("scroll", () => {
  sections.forEach(sec => {
    const top = window.scrollY;
    const offset = sec.offsetTop - 200;
    const height = sec.offsetHeight;

    if(top > offset && top < offset + height){
      sec.classList.add("show");
    }
  });


});