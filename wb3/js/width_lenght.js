// Получаем все элементы с классом .product-image
const productImages = document.querySelectorAll('.product-image');

// Проходим по каждому элементу и устанавливаем максимальную ширину
productImages.forEach(image => {
  const maxWidth = 200; // Максимальная ширина в пикселях
  const naturalWidth = image.naturalWidth; // Получаем исходную ширину изображения

  // Если исходная ширина больше максимальной, устанавливаем новую ширину
  if (naturalWidth > maxWidth) {
    image.style.width = maxWidth + 'px';
  }
});