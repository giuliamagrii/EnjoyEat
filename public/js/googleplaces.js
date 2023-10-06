// Initialize the Google Places Autocomplete service
var autocomplete = new google.maps.places.Autocomplete(document.getElementById('street'));

// When a place is selected, fill in the other address fields
autocomplete.addListener('place_changed', function () {
    var place = autocomplete.getPlace();
    if (!place.geometry) {
        return;
    }

    var formattedAddress = place.formatted_address || '';
    // Split the formatted address by comma
    var addressParts = formattedAddress.split(',');
    
    // Extract street and number
    var street = addressParts[0].trim();  // First part is the street
    var number = addressParts[1].trim();  // Second part is the number
    
    var streetAndNumber = street + ' ' + number;

    // Set the street input field with the combined street and number
    document.getElementById('street').value = streetAndNumber;

    /* document.getElementById('street').value = place.name || ''; */
    document.getElementById('city').value = place.address_components.find(component => component.types.includes('locality'))?.long_name || '';
    document.getElementById('postal_code').value = place.address_components.find(component => component.types.includes('postal_code'))?.long_name || '';
    document.getElementById('country').value = place.address_components.find(component => component.types.includes('country'))?.long_name || '';
 });