<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Style Netflix</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #141414;
      color: #ffffff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    form {
      background-color: #222;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.4);
      width: 300px;
    }

    form div {
      margin-bottom: 20px;
    }

    label {
      display: block;
      font-size: 14px;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #333;
      border-radius: 5px;
      background-color: #333;
      color: #fff;
      font-size: 14px;
    }

    input[type="text"]::placeholder,
    input[type="password"]::placeholder {
      color: #777;
    }

    button {
      width: 100%;
      padding: 10px;
      background-color: #e50914;
      color: #fff;
      font-size: 16px;
      font-weight: bold;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #f40612;
    }
  </style>
</head>
<body>
  <form action="admin.php" method="POST">
    <div>
      <label for="Login">Login:</label>
      <input type="text" id="Login" name="Login" placeholder="Entrez votre Login" required>
    </div>
    <div>
      <label for="Password">Password:</label>
      <input type="password" id="Password" name="Password" placeholder="Entrez votre Password" required>
    </div>
    <button type="submit">Se Connecter</button>
  </form>
</body>
</html>
