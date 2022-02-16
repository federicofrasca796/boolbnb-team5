
var options = {
    searchOptions: {
        key: 'jkywgX4Mo9E3DalmYxabYnBOQVHFvhMj',
        language: 'it-IT',
        limit: 5
    }
};
var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
var searchBoxHTML = ttSearchBox.getSearchBoxHTML();
document.getElementById('address').append(searchBoxHTML);
document.querySelector('.tt-search-box-input').name = 'address';
document.querySelector('.tt-search-box-input').id = 'address';
document.querySelector('.tt-search-box-input').placeholder = 'Search your address';
document.querySelector('.tt-search-box-input').autocomplete = 'off';



/* Results Log */
ttSearchBox.on('tomtom.searchbox.resultselected', function(data) {
    console.log(data.data.result.position);
    document.getElementById('latitude').value = data.data.result.position.lat;
    document.getElementById('longitude').value = data.data.result.position.lng;
});

