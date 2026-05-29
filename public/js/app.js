document.addEventListener("DOMContentLoaded", function() {

  const productImages = document.querySelectorAll('.product-image');

  productImages.forEach((productImage) => {
    productImage.addEventListener('mousemove', (e) => {
        const offsetX = (e.clientX - productImage.getBoundingClientRect().left) - (productImage.clientWidth / 2);
        const offsetY = (e.clientY - productImage.getBoundingClientRect().top) - (productImage.clientHeight / 2);
    
        productImage.style.transform = `translate(${offsetX}px, ${offsetY}px)`;
    });
    
    productImage.addEventListener('mouseleave', () => {
        productImage.style.transform = 'translate(0, 0)';
    });
  });

  const navbar = document.querySelector(".navbar");
  const headerSection = document.getElementById("header");
  
  function toggleNavbarClass() {
    if (headerSection && navbar) {
      if (window.scrollY < headerSection.offsetHeight) {
        navbar.classList.remove("bg-active");
      } else {
        navbar.classList.add("bg-active");
      }
    }
  }
  
  if (navbar && headerSection) {
    toggleNavbarClass();
    window.addEventListener("scroll", toggleNavbarClass);
  }
});
