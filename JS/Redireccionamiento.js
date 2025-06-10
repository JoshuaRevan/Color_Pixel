const clickableImages = document.querySelectorAll('.clickable-image');

clickableImages.forEach(image => {
  image.addEventListener('click', () => {
    window.location.href = 'tienda.html';
  });
});
