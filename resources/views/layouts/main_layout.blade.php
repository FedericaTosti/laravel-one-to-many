<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Employee Tasks</title>

    <script src="js/app.js" charset="utf-8"></script>
    <link rel="stylesheet" href="/css/app.css">
  </head>

  {{-- generare prima il db (model + factory + migration + seeder) e poi le viste per eseguire una index + edit di task sulle seguenti entita':
    Employee <-1---N-> Task
    Per ogni employee diversi tasks, per ogni task esattamente un employee
      Employee:
      - firstname
      - lastname
      - dateOfBirth
      - role
      Task:
      - name
      - description
      - deadline
  N.B.: naturalmente ad ogni entita' va aggiunto il necessario per le chiavi primarie e le chiavi esterne
  BONUS: creare il necessario anche per eseguire update + delete --}}

  <body>
    <div class="header">
      @include('components.header')
    </div>

    <div class="content">
      @yield('content')
    </div>

    <div class="footer">
      @include('components.footer')
    </div>

  </body>
</html>
