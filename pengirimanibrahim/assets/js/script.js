function handleLogin(event) {
  event.preventDefault();
  const username = document.getElementById("username").value;
  const password = document.getElementById("password").value;

  if (username && password) {
    console.log("Login submitted");
    console.log("Username:", username);
    console.log("Password:", password);

    document.getElementById("username").value = "";
    document.getElementById("password").value = "";
  }
}
