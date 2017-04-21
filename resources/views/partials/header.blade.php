<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/foundation.css" type="text/css" rel="stylesheet" />
        <script src="js/modernizr.js"></script>

        <title>Loans Application</title>
        <script>
            // rename myToken as you like
            window.Laravel =  <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
        <style>
          body{
            background:#EEEEEE;
;
          }
        </style>
    </head>
 
