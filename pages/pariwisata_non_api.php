<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Umpak Sumbing</title>
  <link rel="stylesheet" href="/css/style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <style>
      .fixed-height-image {
        height: 300px; /* Adjust the height as desired */
        object-fit: cover;
      }
    </style>
    
</head>
<body>
    <!-- header section start-->
    <?php include '..\components\navbar.php'; ?>
    <!-- header section start-->

    <div class="container">
        <div class="row justify-content-left">
            <?php
                include '..\components\get_pariwisata.php';
            ?>
        </div>
    </div>


    <!-- Javascript files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- javascript -->
    <script src="js/owl.carousel.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });
        });
    </script>
<script>

    
    // == Content ===
    const pictures = ['../img/foto desa/desa bandongan.png', '../img/foto desa/Desa Gandusari.png', '/img/foto desa/Desa Kalegen.png', '/img/foto desa/Desa Ngepanrejo.png']; // Array of picture URLs
    const villageNames = ['Desa Bandongan', 'Desa Gandusari', 'Desa Kalegen', 'Desa Ngepanrejo'];
    let currentPictureIndex = 0; // Current picture index

    // Function to change the picture based on the button clicked
    function changePicture(action) {
        const pictureElement = document.getElementById('picture');
        const villageNameElement = document.getElementById('villageName');

        // Update the current picture index based on the action
        if (action === 'previous') {
            currentPictureIndex = (currentPictureIndex - 1 + pictures.length) % pictures.length;
        } else if (action === 'next') {
            currentPictureIndex = (currentPictureIndex + 1) % pictures.length;
        }

        // Set the source of the picture element to the new picture URL
        pictureElement.src = pictures[currentPictureIndex];

        // Set the village name text
        villageNameElement.textContent = villageNames[currentPictureIndex];
    }
</script>
</body>
</html>