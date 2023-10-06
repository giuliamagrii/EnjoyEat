/* const buttons = document.querySelectorAll('.btn.food');
const selectedFoodIds = []; // Array to store selected food IDs

buttons.forEach(button => {
  button.addEventListener('click', () => {
    const foodId = button.getAttribute('data-food-id');

    // Toggle selection by adding or removing the foodId from the array
    if (selectedFoodIds.includes(foodId)) {
      // Deselect the button
      const index = selectedFoodIds.indexOf(foodId);
      selectedFoodIds.splice(index, 1);
      button.classList.remove('selected');
    } else {
      // Select the button
      selectedFoodIds.push(foodId);
      button.classList.add('selected');
    }
    
    // Output the selected food IDs to the console (for testing)
    console.log(selectedFoodIds);
  });
}); */

  const buttons2 = document.querySelectorAll('.btn.foodupdate');

    buttons2.forEach(button => {
    const img = button.querySelector('img');
    const input = button.querySelector('input');
    const foodId = button.getAttribute('data-food-id');
    let isLike = inArray(foodId, associatedFoods);

    button.addEventListener('click', (event) => {
        event.preventDefault();

        if (isLike) {
            img.setAttribute('src', button.getAttribute('data-imagedislike'));
        } else {
            img.setAttribute('src', button.getAttribute('data-imagelike'));
        }
        isLike = !isLike;
        input.value = isLike ? foodId : '';
    });
});

  const buttons1 = document.querySelectorAll('.btn.heart');

  buttons1.forEach(button => {
    const svg = button.querySelector('svg'); // Select the SVG element
    const svgContent1 = button.getAttribute('data-svg1'); // Get the first SVG content
    const svgContent2 = button.getAttribute('data-svg2'); // Get the second SVG content
    let isSvg1 = true;
  
    button.addEventListener('click', (event) => {
      event.preventDefault();
      if (isSvg1) {
        svg.innerHTML = svgContent2; // Update the SVG content
      } else {
        svg.innerHTML = svgContent1; // Update the SVG content
      }
      isSvg1 = !isSvg1;
    });
  });