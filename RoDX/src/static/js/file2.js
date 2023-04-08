document.addEventListener("DOMContentLoaded", function() {
  const cards = document.querySelectorAll("div.card");
  let zindex = 10;

  for (let i = 0; i < cards.length; i++) {
    cards[i].addEventListener("click", function(event) {
      event.preventDefault();

      let isShowing = false;

      if (this.classList.contains("show")) {
        isShowing = true;
      }

      if (document.querySelector("div.cards").classList.contains("showing")) {
        // a card is already in view
        document.querySelector("div.card.show").classList.remove("show");

        if (isShowing) {
          // this card was showing - reset the grid
          document.querySelector("div.cards").classList.remove("showing");
        } else {
          // this card isn't showing - get in with it
          this.style.zIndex = zindex;
          this.classList.add("show");
        }

        zindex++;
      } else {
        // no cards in view
        document.querySelector("div.cards").classList.add("showing");
        this.style.zIndex = zindex;
        this.classList.add("show");

        zindex++;
      }
    });
  }

  const readMoreBtns = document.querySelectorAll(".btn2");

  for (let i = 0; i < readMoreBtns.length; i++) {
    readMoreBtns[i].addEventListener("click", function(event) {
      event.preventDefault();
      window.location.href = this.href;
    });
  }
});
