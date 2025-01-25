<form
  method="POST"
  action="/BronzeAgeWebpage/php/includes/accountDeleteProper.inc.php"
>
<h3>Uwaga! Usunięcie konta jest nieodwracalne!</h3>
  <label for="prevPwd">Podaj login:</label><br />
  <input
    type="login"
    id="login"
    name="login"
    placeholder="Login.."
    required
  /><br /><br />

  <label for="newPwd">Podaj hasło:</label><br />
  <input
    type="password"
    id="pwd"
    name="pwd"
    placeholder="Hasło.."
    required
  /><br /><br />

  <input type="submit" value="Usuń konto" />
</form>
