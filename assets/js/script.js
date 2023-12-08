// ============= NAV BAR START =================
// const bar = document.getElementById("bar");
// const nav = document.getElementById("navbar");
// const close = document.getElementById("close");

// if (bar) {
//   bar.addEventListener("click", () => {
//     nav.classList.add("active");
//   });
// }

// if (close) {
//   close.addEventListener("click", () => {
//     nav.classList.remove("active");
//   });
// }
// ============= NAV BAR END =================

// ============= SCROLL REVIEW START =================
window.addEventListener("scroll", reveal);

function reveal() {
  var reveals = document.querySelectorAll(".reveal");

  for (let i = 0; i < reveals.length; i++) {
    let windowheight = window.innerHeight;
    let revealtop = reveals[i].getBoundingClientRect().top;
    let revealpoint = 150;

    if (revealtop < windowheight - revealpoint) {
      reveals[i].classList.add("active");
    }

    // else {
    //   reveals[i].classList.remove("active");
    // }
  }
}

// ============= SCROLL REVIEW END =================
