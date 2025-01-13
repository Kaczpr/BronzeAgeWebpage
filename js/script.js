        async function zmienHaslo() {
            const token = document.getElementById('csrfToken').value;

            try {
                const response = await fetch('includes/accountPasswordChange.inc.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ token: token })
                });

                if (response.ok) {
                    const text = await response.text(); // Zmieniamy na .text() zamiast .json()

                    try {
                        const result = JSON.parse(text); // Próba parsowania JSON-a
                        if (result.success) {
                            window.location.href = '/BronzeAgeWebpage/html/includes/pwdChange.inc.html';
                        } else {
                            alert("Błąd: Niepoprawny token.");
                        }
                    } catch (error) {
                        console.error('Błąd podczas parsowania JSON:', error);
                        alert('Odpowiedź serwera nie jest w formacie JSON. Odpowiedź: ' + text);
                    }
                } else {
                    alert("Wystąpił błąd podczas połączenia z serwerem.");
                }
            } catch (error) {
                console.error('Błąd:', error);
                alert("Wystąpił błąd. Spróbuj ponownie później.");
            }
        }


        function usunKonto() {
            window.location.href = "includes/accountDelete.inc.php";
        }