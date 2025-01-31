async function zmienHaslo() {
  const token = document.getElementById("csrfToken").value;

  try {
    const response = await fetch("includes/accountPasswordChange.inc.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ token: token }),
    });

    if (response.ok) {
      const text = await response.text();

      try {
        const result = JSON.parse(text);
        
      } catch (error) {
        console.error("Błąd podczas parsowania JSON:", error);
        alert("Odpowiedź serwera nie jest w formacie JSON. Odpowiedź: " + text);
      }
    } else {
      alert("Wystąpił błąd podczas połączenia z serwerem.");
    }
  } catch (error) {
    console.error("Błąd:", error);
    alert("Wystąpił błąd. Spróbuj ponownie później.");
  }
}

async function usunKonto() {
  const token = document.getElementById("csrfToken").value;

  try {
    const response = await fetch("includes/accountDelete.inc.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ token: token }),
    });

    if (response.ok) {
      const text = await response.text();

      try {
        const result = JSON.parse(text);
      } catch (error) {
        console.error("Błąd podczas parsowania JSON:", error);
        alert("Odpowiedź serwera nie jest w formacie JSON. Odpowiedź: " + text);
      }
    } else {
      alert("Wystąpił błąd podczas połączenia z serwerem.");
    }
  } catch (error) {
    console.error("Błąd:", error);
    alert("Wystąpił błąd. Spróbuj ponownie później.");
  }
}
