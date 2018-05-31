<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
            Please follow the lilnk to verify your email: {{ URL::to('verification/' . $verification_code)  }}
    </body>
</html>
