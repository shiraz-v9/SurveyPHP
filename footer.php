<?php

// Things to notice:
// This script is called by every other script (via require_once)
// It finishes outputting the HTML for this page:
// don't forget to add your own name and student number to the footer

echo <<<_END
<!DOCTYPE html>

<head>
<link rel="stylesheet" type="text/css" href="styleSheet.css">
</head>

    <body>
    <p>&copy;6G5Z2107 - Kashif Tauseef - 17088205 - 2019/20</p>
    
    </body>
    </html>
_END;

include 'styleSheet.css';
?>