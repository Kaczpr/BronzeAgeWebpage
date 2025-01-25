<?php require_once("configSession.inc.php") ?>
<form
  method="POST"
  action="/BronzeAgeWebpage/php/includes/accountPasswordChangeProper.inc.php"
>
  <label for="prevPwd">Podaj poprzednie hasło</label><br />
  <input
    type="password"
    id="prevPwd"
    name="prevPwd"
    placeholder="Poprzednie hasło.."
    required
  /><br /><br />

  <label for="newPwd">Podaj nowe hasło:</label><br />
  <input
    type="password"
    id="newPwd"
    name="newPwd"
    placeholder="Nowe hasło.."
    minlength="9"
    required
    pattern="^(?=.*[!@#$%^&*])(?=.*[A-Za-z]).{9,}$"
    title="Hasło musi zawierać co najmniej 9 znaków, w tym jedną literę i jeden znak specjalny."
  /><br /><br />

  <!-- Pole ukryte dla tokena CSRF -->
  <input
    type="hidden"
    id="csrfToken"
    name="csrfToken"
    value="<?php echo htmlspecialchars($_SESSION['csrfToken']); ?>"
  />

  <input type="submit" value="Zmień hasło" />
</form>