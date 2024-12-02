// Home Page
document.getElementById("left-arrow").addEventListener("click", function () {
  document.querySelector(".desktop-screen-categories-content").scrollBy({
    left: -300,
    behavior: "smooth",
  });
});

document.getElementById("right-arrow").addEventListener("click", function () {
  document.querySelector(".desktop-screen-categories-content").scrollBy({
    left: 300,
    behavior: "smooth",
  });
});

// Category Page
document.getElementById("left-arrow").addEventListener("click", function () {
  document.querySelector(".refer-earn-grid").scrollBy({
    left: -300,
    behavior: "smooth",
  });
});

document.getElementById("right-arrow").addEventListener("click", function () {
  document.querySelector(".refer-earn-grid").scrollBy({
    left: 300,
    behavior: "smooth",
  });
});
