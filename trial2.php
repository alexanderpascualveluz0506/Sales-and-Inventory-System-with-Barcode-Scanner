<!DOCTYPE html>
<html>
  <head>
    <title>Capture Webpage Screenshot</title>
    <!-- include the jquery and jquery ui -->
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    
    <!-- this script helps us to capture any div --> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.3/html2canvas.min.js"></script>

  </head>
  <body>  
   <div id="mydiv">
    <img src="https://www.bing.com/th?id=OIP.TlkIoRrDQUZw6vUre7J1xQHaHa&w=121&h=110&c=8&rs=1&qlt=90&o=6&pid=3.1&rm=2" />
    <p>text!</p>
</div>
<br>
<br>
    
<div id="canvas">
    <p>Canvas:</p>
    </div>
    
    <div id="image">
        <p>Image:</p>
    </div>
  </body>
</html>


<script type="text/javascript">
    html2canvas([document.getElementById('mydiv')], {
    onrendered: function (canvas) {
        document.getElementById('canvas').appendChild(canvas);
        var data = canvas.toDataURL('image/png');
        // AJAX call to send `data` to a PHP file that creates an image from the dataURI string and saves it to a directory on the server

        var image = new Image();
        image.src = data;
        document.getElementById('image').appendChild(image);
    }
});
</script>


<?php



?>