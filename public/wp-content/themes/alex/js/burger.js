const burger = document.getElementById("button");
const nav = document.getElementById("navbar");
burger.addEventListener("click", burgerKlick = () => {
  if (burger.classList[0] == "active") {
    burger.classList.remove("active");
    nav.style.display = "none";
  } else {
    burger.classList.add("active");
    nav.style.display = "block";
  }
});
