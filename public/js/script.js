var swiper = new Swiper(".home-slider", {
    loop:true, 
    autoplay: {
      delay: 5000, 
      disableOnInteraction: false
      },
    Shader: 'polygons-fall',
    grabCursor:true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
});

const tl = gsap.timeline({ defaults: { ease: "back.out"} });

const splitText = (selector) => {
  const elem = document.querySelector(selector);
  const text = elem.innerText;
  const chars = text.split("");
  const charsContainer = document.createElement("div");
  const charsArray = [];

  charsContainer.style.position = "relative";
  charsContainer.style.display = "inline-block";

  chars.forEach((char) => {
    const charContainer = document.createElement("div");

    charContainer.style.position = "relative";
    charContainer.style.display = "inline-block";
    charContainer.innerText = char;
    charsContainer.appendChild(charContainer);

    charsArray.push(charContainer);
  });
  // remove current text
  elem.innerHTML = "";
  // append new structure
  elem.appendChild(charsContainer);

  return charsArray;
};

const animate = function (text) {
  const chars = splitText("h1");
  return gsap.from(chars, {
    duration: 0.2,
    y: 100,
    opacity: 0,
    stagger: 0.1,
    delay: 0.25
  });
};

tl.to(".logoanimate", {y:"0", duration: 0.3});

animate("h1");

tl.to(".intro-animation", {'opacity':"0", duration: 0.5, delay:2});
tl.to(".intro-animation", {'display':"none", duration: 0.1,});
