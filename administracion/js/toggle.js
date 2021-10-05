let btntoggle2 = document.getElementById("toggle");
let sidebar2 = document.getElementById("sidebar");

btntoggle2.addEventListener("click", () => {
  sidebar2.classList.toggle("active");
  console.log("click");
});
