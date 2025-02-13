/* Array der Vorschläge als Objekte */
let suggestions = [
    { text: "alle produkte", type: "Kategorie" },
    { text: "blutdruck", type: "Kategorie" },
    { text: "herz", type: "Kategorie" },
    { text: "ausdauer", type: "Kategorie" },
    { text: "immunsystem", type: "Kategorie" },
    { text: "stress", type: "Kategorie" },
    { text: "omega-3 fischöl", type: "Produkt", popular: true },
    { text: "coenzym q10 kapseln", type: "Produkt" },
    { text: "l-carnitin", type: "Produkt" },
    { text: "zink + vitamin c", type: "Produkt" },
    { text: "ashwagandha kapseln", type: "Produkt" },
    { text: "magnesium kapseln", type: "Produkt" },
    { text: "blutdruck balance kapseln", type: "Produkt" },
    { text: "herz-kreislauf-komplex", type: "Produkt" },
    { text: "ausdauer booster", type: "Produkt" }
];

/*Zeigt die gewünschte Kategorie an.
@param {string} category - Die ID der anzuzeigenden Kategorie.
@param {boolean} [clearSearch=true] - Ob das Suchfeld geleert werden soll.
*/
function showCategory(category, clearSearch = true) {
    if (clearSearch) {
        document.getElementById('searchInput').value = "";
    }

    document.getElementById('searchResults').style.display = 'none';
    document.querySelectorAll('.category-section').forEach(section => {
        section.style.display = 'none';
    });

    document.getElementById(category).style.display = 'block';
}

/**Führt die Produktsuche anhand des eingegebenen Suchbegriffs durch.*/
function searchProducts() {
    var input = document.getElementById('searchInput');
    var filter = input.value.toLowerCase().trim();

    // Leeres Suchfeld → Standard: "Alle Produkte"
    if (filter === "") {
        document.getElementById('searchResults').style.display = 'none';
        showCategory('all');
        return;
    }

    // Prüfen, ob der Suchbegriff exakt einem Kategorienamen entspricht
    const catMap = {
        "alle produkte": "all",
        "blutdruck": "blutdruck",
        "herz": "herz",
        "ausdauer": "ausdauer",
        "immunsystem": "immunsystem",
        "stress": "stress"
    };

    if (catMap[filter]) {
        showCategory(catMap[filter], false);
        document.getElementById('searchResults').style.display = 'none';
        return;
    }

    // Produktsuche: Alle Kategorie-Sektionen ausblenden
    document.querySelectorAll('.category-section').forEach(section => {
        section.style.display = 'none';
    });

    // Suchergebnisse-Container vorbereiten
    var resultsDiv = document.getElementById('searchResults');
    resultsDiv.innerHTML = "";
    var header = document.createElement('h2');
    header.textContent = "Suchergebnisse für: " + input.value;
    resultsDiv.appendChild(header);

    // Tabelle für die Suchergebnisse erstellen
    var table = document.createElement('table');
    var headerRow = document.createElement('tr');
    var th1 = document.createElement('th'); th1.textContent = "Produkt";
    var th2 = document.createElement('th'); th2.textContent = "Bewertung";
    var th3 = document.createElement('th'); th3.textContent = "Preis";
    var th4 = document.createElement('th'); th4.textContent = "Link";
    headerRow.appendChild(th1);
    headerRow.appendChild(th2);
    headerRow.appendChild(th3);
    headerRow.appendChild(th4);
    table.appendChild(headerRow);

    var foundAny = false;
    // Suche in allen Kategorie-Sektionen (außer im Suchergebnisbereich)
    var categorySections = document.querySelectorAll('.category-section');
    categorySections.forEach(function(section) {
        if (section.id === "searchResults") return;
        var rows = section.querySelectorAll('table tr');
        for (var i = 1; i < rows.length; i++) {
            var row = rows[i];
            if (row.textContent.toLowerCase().indexOf(filter) > -1) {
                var clone = row.cloneNode(true);
                table.appendChild(clone);
                foundAny = true;
            }
        }
    });

    if (!foundAny) {
        var noResult = document.createElement('p');
        noResult.textContent = "Keine Ergebnisse gefunden.";
        resultsDiv.appendChild(noResult);
    } 
    else {
        resultsDiv.appendChild(table);
    }
    resultsDiv.style.display = 'block';
}

/**
 * Aktualisiert das dynamische Vorschlagsfeld basierend auf dem Suchbegriff.
 */
function updateSuggestions() {
    var input = document.getElementById("searchInput");
    var query = input.value.toLowerCase().trim();
    var suggestionsContainer = document.getElementById("suggestionsContainer");

    if (query === "") {
        suggestionsContainer.innerHTML = "";
        return;
    }

    // Filtere Vorschläge, deren Text den Suchbegriff enthält
    var filtered = suggestions.filter(function(item) {
        return item.text.indexOf(query) !== -1;
    });
    
    if (filtered.length === 0) {
        suggestionsContainer.innerHTML = "";
        return;
    }
    
    // Zeige maximal 5 Vorschläge
    var maxSuggestions = 5;
    if (filtered.length > maxSuggestions) {
        filtered = filtered.slice(0, maxSuggestions);
    }
 
    var ul = document.createElement("ul");

    filtered.forEach(function(item) {
        var li = document.createElement("li");
        // Erstelle den Anzeigetext inkl. Typ und ggf. Popularitäts-Stern
        var label = (item.type === "Kategorie") ? "Kategorie" : "Produkt";

        if(item.type === "Produkt" && item.popular) {
            label += " ★";
        }

        li.textContent = item.text + " (" + label + ")";
        li.onclick = function() {
            input.value = item.text; // Übernehme nur den reinen Text
            suggestionsContainer.innerHTML = "";
            searchProducts();
        };
        ul.appendChild(li);
    });
 
    suggestionsContainer.innerHTML = "";
    suggestionsContainer.appendChild(ul);
}

function handleKeyUp() {
    updateSuggestions();
    searchProducts();
}

// Globaler Listener: Klick außerhalb des Suchbereichs blendet Vorschläge aus
document.addEventListener('click', function(event) {
    var searchContainer = document.querySelector('.search-container');
    var suggestionsContainer = document.getElementById("suggestionsContainer");
    if (!searchContainer.contains(event.target)) {
        suggestionsContainer.innerHTML = "";
    }
});