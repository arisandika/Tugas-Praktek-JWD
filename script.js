const cards = document.querySelectorAll(".cards");
const btnAll = document.getElementById("btnAll");
const btnAkademik = document.getElementById("btnAkademik");
const btnNonAkademik = document.getElementById("btnNonAkademik");

btnAll.addEventListener("click", function () {
  cards.forEach((card) => {
    card.style.display = "block";
  });
  toggleActiveButton(btnAll);
});

btnAkademik.addEventListener("click", function () {
  cards.forEach((card) => {
    if (card.getAttribute("data-category") === "Akademik") {
      card.style.display = "block";
    } else {
      card.style.display = "none";
    }
  });
  toggleActiveButton(btnAkademik);
});

btnNonAkademik.addEventListener("click", function () {
  cards.forEach((card) => {
    if (card.getAttribute("data-category") === "Non-Akademik") {
      card.style.display = "block";
    } else {
      card.style.display = "none";
    }
  });
  toggleActiveButton(btnNonAkademik);
});

function toggleActiveButton(button) {
  const buttons = [btnAll, btnAkademik, btnNonAkademik];

  buttons.forEach((btn) => {
    if (btn === button) {
      btn.classList.remove("btn-outline");
    } else {
      btn.classList.add("btn-outline");
    }
  });
}
