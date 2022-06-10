<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
</head>
<body style="border: 1px solid #808080; width: 550px; height: 350px">
    <div id="html-content-holder" style="background-color: #F0F0F1; color: #00cc65; width: 500px; padding-left: 25px; padding-top: 10px;">
        <strong>infinetsoft tutorials</strong><hr />
        <h3 style="color: #3e4b51;">convert html tocanvas 
        </h3>
        <p style="color: #3e4b51;">
            Lorem ipsum dolor sit amet,consectetur adipiscing elit. In scelerisque egestas leo, vel congue maurismattis in. Curabitur quis massa ut metus interdum vehicula in vel massa. Nam miquam, venenatis sit amet libero at, vehicula rutrum nisi. In at aliquam metus.Class aptent taciti sociosqu ad litora torquent per conubia nostra, perinceptos himenaeos. Praesent eget quam laoreet, consequat lacus eget,condimentum neque. Aenean ut vehicula mi, et dictum quam. Integer elementumerat vel sagittis faucibus. Aliquam aliquam, ante et iaculis facilisis, nequeelit tempus neque, et lobortis urna velit porttitor nunc. In rutrum mi sit ametneque porta scelerisque. Pellentesque elementum sapien posuere arcu tinciduntornare. Nullam sed hendrerit nisl. Suspendisse at eros augue. Curabitur tempora lacus nec cursus.
        </p>
    </div>
    <a id="btn-Convert-Html2Image" href="#">convertto image</a>
    <script>
        $(document).ready(function () {
            var element = $("#html-content-holder"); // global variable
            var getCanvas; //global variable
            html2canvas(element, {
                onrendered: function (canvas) {
                    getCanvas = canvas;
                }
            });
 
            $("#btn-Convert-Html2Image").on('click', function () {
                var imgageData = getCanvas.toDataURL("image/png");

 

                //Now browser starts downloading it instead of just showing it
                var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
                $("#btn-Convert-Html2Image").attr("download", "your_image.png").attr("href", newData);
            });
        });
    </script>
</body>
</html> 