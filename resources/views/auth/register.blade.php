<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cadastro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body, html {
      height: 100%;
    }
    .register-container {
      height: 100vh;
    }
  </style>
</head>
<body class="bg-light">
  <div class="container d-flex justify-content-center align-items-center register-container">
    <div class="card shadow p-4" style="width: 100%; max-width: 500px;">
      <div class="d-flex justify-content-center"><img src="{{ asset('imgs/logo.png') }}" width="70%"></div>
      <h3 class="text-center mb-4">Cadastro</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      <form action="/register" method="post">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Nome</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Digite seu nome" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">E-mail</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail" required>
        </div>
        <div class="mb-3">
          <label for="email_repetition" class="form-label">Repita o E-mail</label>
          <input type="email" class="form-control" id="email_repetition" name="email_repetition" placeholder="Repita seu e-mail" required>
        </div>
        <div class="mb-4">
          <label for="password" class="form-label">Senha</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Crie uma senha" required>
        </div>
        <div class="d-grid mb-3">
          <button type="submit" class="btn btn-success">Cadastrar</button>
        </div>
        <div class="text-center">
          <a href="/login">Já tem uma conta? Faça login</a>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
