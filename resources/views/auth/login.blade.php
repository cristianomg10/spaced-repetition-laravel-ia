<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body, html {
      height: 100%;
    }
    .login-container {
      height: 100vh;
    }
  </style>
</head>
<body class="bg-light">

  <div class="container d-flex justify-content-center align-items-center login-container">
    <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
      <img src="{{ asset('imgs/logo.png') }}">
      <h3 class="text-center mb-4">Login</h3>
      <form action="/login" method="post">
        @csrf
        @if(session()->has('mensagem'))
            <div class="alert alert-success">{{ session('mensagem') }}</div>
        @endif
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
          <label for="email" class="form-label">E-mail</label>
          <input type="email" name="email" class="form-control" id="email" placeholder="Digite seu e-mail" required>
        </div>
        <div class="mb-3">
          <label for="senha" class="form-label">Senha</label>
          <input type="password" name="password" class="form-control" id="senha" placeholder="Digite sua senha" required>
        </div>
        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Entrar</button>
          <div class="text-center mt-2">
            <a href="/register">Não tem uma conta? Cadastre-se</a>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
