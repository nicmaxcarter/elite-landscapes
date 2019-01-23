// instantiate standard Siema for the hero section

const mySiema = new Siema({
  selector: ".siema",
  duration: 200,
  easing: "ease-out",
  perPage: 1,
  startIndex: 0,
  draggable: false,
  multipleDrag: false,
  threshold: 20,
  loop: true,
  rtl: false,
  onInit: () => {},
  onChange: () => {}
});

// switch slide every two seconds
setInterval(() => mySiema.next(), 2000);





// extend a Siema class by two methods
// addDots - to create a markup for dots
// updateDots - to update classes on dots on change callback
class SiemaWithDots extends Siema {
  addDots() {
    // create a contnier for all dots
    // add a class 'dots' for styling reason
    this.dots = document.createElement("div");
    this.dots.classList.add("dots");

    // loop through slides to create a number of dots
    for (let i = 0; i < this.innerElements.length; i++) {
      // create a dot
      const dot = document.createElement("div");

      // add a class to dot
      dot.classList.add("dots-item");

      // add an event handler to each of them
      dot.addEventListener("click", () => {
        this.goTo(i);
      });

      // append dot to a container for all of them
      this.dots.appendChild(dot);
    }

    // add the container full of dots after selector
    this.selector.parentNode.insertBefore(this.dots, this.selector.nextSibling);
  }

  updateDots() {
    // loop through all dots
    for (let i = 0; i < this.dots.querySelectorAll(".dots-item").length; i++) {
      // if current dot matches currentSlide prop, add a class to it, remove otherwise
      const addOrRemove = this.currentSlide === i ? "add" : "remove";
      this.dots
        .querySelectorAll(".dots-item")
        [i].classList[addOrRemove]("dots-item--active");
    }
  }
}

// instantiate new extended Siema
const mySiemaWithDots = new SiemaWithDots({
  selector: ".siemaDots",

  duration: 200,

  easing: "ease-out",

  perPage: 1,

  startIndex: 0,

  draggable: true,

  multipleDrag: false,

  threshold: 20,

  loop: true,

  rtl: false,
  // on init trigger method created above
  onInit: function() {
    this.addDots();
    this.updateDots();
  },

  // on change trigger method created above
  onChange: function() {
    this.updateDots();
  }
});

setInterval(() => mySiemaWithDots.next(), 10000);