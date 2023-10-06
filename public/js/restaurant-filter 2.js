$(document).ready(function() {
    // Handle selection changes
    $('#locationDropdown, #foodDropdown, #priceDropdown, #scoreDropdown').on('change', function() {
        var city = $('#locationDropdown').val();
        var food = $('#foodDropdown').val();
        var price = $('#priceDropdown').val();
        var rating = $('#scoreDropdown').val();

        // Send API request to filter endpoint
        $.get('/api/filter', { city: city, food: food, price: price, rating: rating }, function(data) {
            // Update the view with filtered results
            updateViewWithResults(data);
        });
    });

    // Function to update the view with filtered results
    function updateViewWithResults(results) {
        // Clear existing results
        $('#resultsContainer').empty();

        // Loop through the results and create HTML content for each result
        for (var i = 0; i < results.length; i++) {
            var restaurant = results[i];
            var restaurantHtml = '<div class="col-md-6">' +
                                '<div class="card-container">' +
                                '<div class="card shadow-sm mb-5" style="display: flex; flex-direction: row;">' +
                                '<img src="' + restaurant.photo + '" alt="' + restaurant.name + '" class="bd-placeholder-img card-img-top" width="100%" height="225">' +
                                '<div class="card-body" style="flex: 1 1 auto;">' +
                                '<p class="card-text">' + restaurant.name + '</p>' +
                                '<div class="d-flex justify-content-between align-items-center">' +
                                '<div class="btn-group">' +
                                '<a href="' + restaurant.detailsUrl + '" class="btn btn-sm pink">Dettagli</a>' +
                                '</div>' +
                                '<small class="text-body-secondary">' + restaurant.averageprice + '</small>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>';

            // Append the HTML content to the results container
            $('#resultsContainer').append(restaurantHtml);
        }
    }
});