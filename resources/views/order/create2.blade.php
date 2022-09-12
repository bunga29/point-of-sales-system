<!doctype html>

<html>
  <head>
    <!--jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- BS5.1.1 CSS/JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Latest BS-Select compiled and minified CSS/JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
  </head>

  <body class="p-5">
    <h1>BS Select with BS5 1.1.1</h1>
    <p>Up/Down arrow keys do not select options </p>
    <select class="selectpicker my-select" data-live-search="true">
      <option>Mustard aj</option>
      <option>Ketchup bar</option>
      <option>Barbecue</option>
    </select>


  </body>

  <script>
         $( document ).ready(function() {
            $('.my-select').selectpicker();
            $('h1').css({color:pink});
        });
  </script>
</html>