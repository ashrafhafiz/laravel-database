<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="table-wrap">
        <div class="table-cell-wrap">
            <div class="error-content">
                <div class="error-text">
                    <p class="error-errorname">404</p>
                    <p class="error-request">Unfortunately the page <br> you requested does not exist.</p>

                    <ul class="error-list">
                        <li>You made a mistake when typing the page address (URL).</li>
                        <li>Clicked on a broken or incorrect link.</li>
                        <li>The requested page has been deleted.</li>
                    </ul>
                </div>
                <div class="error-image">
                    <em></em>
                </div>
                <div class="error-bottomreturn">
                    <a href="javascript:history.back()" class="error-returnback">
                        <em></em>Go back and try again
                    </a>
                    <a href="/" class="error-returnhome">
                        <!--NO OUTPUTENCODING-->
                        <em></em>Return to home page
                    </a>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
