// Globaler Listener: Klick außerhalb des Suchbereichs blendet Vorschläge aus
document.addEventListener('click', function(event) {
    var searchContainer = document.querySelector('.search-container');
    var suggestionsContainer = document.getElementById("suggestionsContainer");
    if (!searchContainer.contains(event.target)) {
        suggestionsContainer.innerHTML = "";
    }
});

// Script zum anzeigen der Produkte gefiltert nach Kategorie
function show_categories_all() {
    console.log("alle");
    document.getElementById("display_kategorie_alle_desktop").style.display = "block";
    document.getElementById("display_kategorie_blutdruck_desktop").style.display = "none";
    document.getElementById("display_kategorie_herz_desktop").style.display = "none";
    document.getElementById("display_kategorie_stress_desktop").style.display = "none";
    document.getElementById("display_kategorie_immunsystem_desktop").style.display = "none";
    document.getElementById("display_kategorie_ausdauer_desktop").style.display = "none";
}

function show_categories_blutdruck() {
    console.log("blutdruck");
    document.getElementById("display_kategorie_alle_desktop").style.display = "none";
    document.getElementById("display_kategorie_blutdruck_desktop").style.display = "block";
    document.getElementById("display_kategorie_herz_desktop").style.display = "none";
    document.getElementById("display_kategorie_stress_desktop").style.display = "none";
    document.getElementById("display_kategorie_immunsystem_desktop").style.display = "none";
    document.getElementById("display_kategorie_ausdauer_desktop").style.display = "none";
}

function show_categories_herz() {
    console.log("herz");
    document.getElementById("display_kategorie_alle_desktop").style.display = "none";
    document.getElementById("display_kategorie_blutdruck_desktop").style.display = "none";
    document.getElementById("display_kategorie_herz_desktop").style.display = "block";
    document.getElementById("display_kategorie_stress_desktop").style.display = "none";
    document.getElementById("display_kategorie_immunsystem_desktop").style.display = "none";
    document.getElementById("display_kategorie_ausdauer_desktop").style.display = "none";
}

function show_categories_stress() {
    console.log("stress");
    document.getElementById("display_kategorie_alle_desktop").style.display = "none";
    document.getElementById("display_kategorie_blutdruck_desktop").style.display = "none";
    document.getElementById("display_kategorie_herz_desktop").style.display = "none";
    document.getElementById("display_kategorie_stress_desktop").style.display = "block";
    document.getElementById("display_kategorie_immunsystem_desktop").style.display = "none";
    document.getElementById("display_kategorie_ausdauer_desktop").style.display = "none";
}

function show_categories_immunsystem() {
    console.log("immunsystem");
    document.getElementById("display_kategorie_alle_desktop").style.display = "none";
    document.getElementById("display_kategorie_blutdruck_desktop").style.display = "none";
    document.getElementById("display_kategorie_herz_desktop").style.display = "none";
    document.getElementById("display_kategorie_stress_desktop").style.display = "none";
    document.getElementById("display_kategorie_immunsystem_desktop").style.display = "block";
    document.getElementById("display_kategorie_ausdauer_desktop").style.display = "none";
}

function show_categories_ausdauer() {
    console.log("ausdauer");
    document.getElementById("display_kategorie_alle_desktop").style.display = "none";
    document.getElementById("display_kategorie_blutdruck_desktop").style.display = "none";
    document.getElementById("display_kategorie_herz_desktop").style.display = "none";
    document.getElementById("display_kategorie_stress_desktop").style.display = "none";
    document.getElementById("display_kategorie_immunsystem_desktop").style.display = "none";
    document.getElementById("display_kategorie_ausdauer_desktop").style.display = "block";
}



function show_categories_all_mobile() {
    console.log("alle");
    document.getElementById("display_kategorie_alle_mobile").style.display = "block";
    document.getElementById("display_kategorie_blutdruck_mobile").style.display = "none";
    document.getElementById("display_kategorie_herz_mobile").style.display = "none";
    document.getElementById("display_kategorie_stress_mobile").style.display = "none";
    document.getElementById("display_kategorie_immunsystem_mobile").style.display = "none";
    document.getElementById("display_kategorie_ausdauer_mobile").style.display = "none";
}

function show_categories_blutdruck_mobile() {
    console.log("blutdruck");
    document.getElementById("display_kategorie_alle_mobile").style.display = "none";
    document.getElementById("display_kategorie_blutdruck_mobile").style.display = "block";
    document.getElementById("display_kategorie_herz_mobile").style.display = "none";
    document.getElementById("display_kategorie_stress_mobile").style.display = "none";
    document.getElementById("display_kategorie_immunsystem_mobile").style.display = "none";
    document.getElementById("display_kategorie_ausdauer_mobile").style.display = "none";
}

function show_categories_herz_mobile() {
    console.log("herz");
    document.getElementById("display_kategorie_alle_mobile").style.display = "none";
    document.getElementById("display_kategorie_blutdruck_mobile").style.display = "none";
    document.getElementById("display_kategorie_herz_mobile").style.display = "block";
    document.getElementById("display_kategorie_stress_mobile").style.display = "none";
    document.getElementById("display_kategorie_immunsystem_mobile").style.display = "none";
    document.getElementById("display_kategorie_ausdauer_mobile").style.display = "none";
}

function show_categories_stress_mobile() {
    console.log("stress");
    document.getElementById("display_kategorie_alle_mobile").style.display = "none";
    document.getElementById("display_kategorie_blutdruck_mobile").style.display = "none";
    document.getElementById("display_kategorie_herz_mobile").style.display = "none";
    document.getElementById("display_kategorie_stress_mobile").style.display = "block";
    document.getElementById("display_kategorie_immunsystem_mobile").style.display = "none";
    document.getElementById("display_kategorie_ausdauer_mobile").style.display = "none";
}

function show_categories_immunsystem_mobile() {
    console.log("immunsystem");
    document.getElementById("display_kategorie_alle_mobile").style.display = "none";
    document.getElementById("display_kategorie_blutdruck_mobile").style.display = "none";
    document.getElementById("display_kategorie_herz_mobile").style.display = "none";
    document.getElementById("display_kategorie_stress_mobile").style.display = "none";
    document.getElementById("display_kategorie_immunsystem_mobile").style.display = "block";
    document.getElementById("display_kategorie_ausdauer_mobile").style.display = "none";
}

function show_categories_ausdauer_mobile() {
    console.log("ausdauer");
    document.getElementById("display_kategorie_alle_mobile").style.display = "none";
    document.getElementById("display_kategorie_blutdruck_mobile").style.display = "none";
    document.getElementById("display_kategorie_herz_mobile").style.display = "none";
    document.getElementById("display_kategorie_stress_mobile").style.display = "none";
    document.getElementById("display_kategorie_immunsystem_mobile").style.display = "none";
    document.getElementById("display_kategorie_ausdauer_mobile").style.display = "block";
}