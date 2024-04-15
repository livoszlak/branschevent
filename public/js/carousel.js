/**
 * Carousel
 */

const slidesContainer = document.getElementById("slides-container");
const slide = document.querySelector(".slide");
const prevButton = document.getElementById("slide-arrow-prev");
const nextButton = document.getElementById("slide-arrow-next");

nextButton.addEventListener("click", () => {
    console.log("Next button clicked");
    const slideWidth = slide.clientWidth;
    slidesContainer.scrollLeft += slideWidth;
});
prevButton.addEventListener("click", () => {
    console.log("Prev button clicked");
    const slideWidth = slide.clientWidth;
    slidesContainer.scrollLeft -= slideWidth;
});
/*     nextButton.addEventListener("click", () => {
     console.log("Next button clicked");
     const slideWidth =
         slidesContainer.scrollWidth / slidesContainer.childElementCount;
     slidesContainer.scrollLeft += slideWidth;
 });

 prevButton.addEventListener("click", () => {
     console.log("Prev button clicked");
     const slideWidth =
         slidesContainer.scrollWidth / slidesContainer.childElementCount;
     slidesContainer.scrollLeft -= slideWidth;
 }); */
