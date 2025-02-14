// Globaler Listener: Klick außerhalb des Suchbereichs blendet Vorschläge aus
document.addEventListener('click', function(event) {
    var searchContainer = document.querySelector('.search-container');
    var suggestionsContainer = document.getElementById("suggestionsContainer");
    if (!searchContainer.contains(event.target)) {
        suggestionsContainer.innerHTML = "";
    }
});