// Funkcja do pokazywania formularza
function showForm(articleIndex) {

    // Pobierz formularz i kontener
    const formContainer = document.getElementById('formContainer');
    const articleForm = document.getElementById('articleForm');

    // Ustaw wartości formularza na podstawie wybranego artykułu
    const newArticleID = ""; // Przykład, dostosuj do swoich potrzeb

    document.getElementById('newArticleID').value = newArticleID;
    document.cookie = `selectedArticleIndex=${articleIndex}; path=/`;
    // Pokaż formularz
    formContainer.style.display = 'block';
}

// Funkcja do ukrywania formularza
function hideForm() {
    const formContainer = document.getElementById('formContainer');
    formContainer.style.display = 'none';
}
