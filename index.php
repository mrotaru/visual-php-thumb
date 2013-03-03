<?php
require_once ('PHPThumb/src/ThumbLib.inc.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $x1 = $_POST['x1'];
    $y1 = $_POST['y1'];
    $width = $_POST['width'];
    $height = $_POST['height'];

    try {
        $thumb = PhpThumbFactory::create('tiger.png');
    } catch (Exception $e) {
        // handle error here however you'd like
    }
    $thumb->crop( $x1, $y1, $width, $height )->resize( 200, 200 );
    $thumb->show();
}
?>


<head>
    <link rel="stylesheet" type="text/css" href="jquery.imgareaselect-0.9.10/css/imgareaselect-default.css" />
    <script type="text/javascript" src="jquery.imgareaselect-0.9.10/scripts/jquery.min.js"></script>
    <script type="text/javascript" src="jquery.imgareaselect-0.9.10/scripts/jquery.imgareaselect.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#my_image').imgAreaSelect({ 
                minWidth: 200,
                minHeight: 200,
                aspectRatio: "1:1",
                handles: true,
                onSelectEnd: function( img, selection ) {
                    $('input[name="x1"]').val( selection.x1 );
                    $('input[name="y1"]').val( selection.y1 );
                    $('input[name="x2"]').val( selection.x2 );
                    $('input[name="y2"]').val( selection.y2 );
                    $('input[name="width"]').val( selection.width );
                    $('input[name="height"]').val( selection.height );
                }
            });
        });
    </script>
</head>
<body>

<form method="POST">
    <input name="x1" type="hidden" />
    <input name="y1" type="hidden" />
    <input name="x2" type="hidden" />
    <input name="y2" type="hidden" />
    <input name="width" type="hidden" />
    <input name="height" type="hidden" />

    <img id="my_image" src="tiger.png" alt="" />

    <input type="submit" />
</form>
    
</body>
