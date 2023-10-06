function initializeSvgClickHandlers(svgs, originalSVG, updatedSVG, inputElementId) {
    svgs.forEach((svg, index) => {
        svg.addEventListener('click', () => {
            const isUpdated = svg.innerHTML === updatedSVG;

            // Update all SVGs to original state
            for (let i = 0; i < svgs.length; i++) {
                svgs[i].innerHTML = originalSVG;
            }

            // Update the clicked SVG and previous SVGs to updated state
            for (let i = 0; i <= index && !isUpdated; i++) {
                svgs[i].innerHTML = updatedSVG;
            }

            // Update the corresponding input element with the selected score
            const inputElement = document.getElementById(inputElementId);
            inputElement.value = index + 1; // SVG index starts from 0, scores start from 1
            submitForm();
        });
    });
}

const svgs = document.querySelectorAll('.clickable-svg');
const svgs2 = document.querySelectorAll('.clickable-svg2');
const svgs3 = document.querySelectorAll('.clickable-svg3');
const svgs4 = document.querySelectorAll('.clickable-svg4');
const svgs5 = document.querySelectorAll('.clickable-svg5');

const originalSVG = '<svg ...><use xlink:href="#empty-star"/></svg>';
const updatedSVG = '<svg ...><use xlink:href="#full-star"/></svg>';
const originalSVG2 = '<svg ...><use xlink:href="#empty-circle"/></svg>';
const updatedSVG2 = '<svg ...><use xlink:href="#full-circle"/></svg>';
const originalSVG3 = '<svg ...><use xlink:href="#empty-circle"/></svg>';
const updatedSVG3 = '<svg ...><use xlink:href="#full-circle"/></svg>';
const originalSVG4 = '<svg ...><use xlink:href="#empty-circle"/></svg>';
const updatedSVG4 = '<svg ...><use xlink:href="#full-circle"/></svg>';
const originalSVG5 = '<svg ...><use xlink:href="#empty-circle"/></svg>';
const updatedSVG5 = '<svg ...><use xlink:href="#full-circle"/></svg>';

initializeSvgClickHandlers(svgs, originalSVG, updatedSVG, 'score');
initializeSvgClickHandlers(svgs2, originalSVG2, updatedSVG2, 'menu_score');
initializeSvgClickHandlers(svgs3, originalSVG3, updatedSVG3, 'service_score');
initializeSvgClickHandlers(svgs4, originalSVG4, updatedSVG4, 'bill_score');
initializeSvgClickHandlers(svgs5, originalSVG5, updatedSVG5, 'location_score');

function submitForm() {
    // Submit the form
    const form = document.querySelector('form');
    form.submit();
}