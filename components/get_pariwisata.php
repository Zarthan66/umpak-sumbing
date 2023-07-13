<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center">
            <img id="picture" src="../img/foto desa/desa bandongan.png" alt="Dummy Image" class="img-fluid fixed-height-image">
            <br>
            <p id="villageName">Desa Bandongan</p>
            <div class="mt-3">
                <button onclick="changePicture('previous')" class="btn btn-primary me-2">Previous</button>
                <button onclick="changePicture('next')" class="btn btn-primary me-2">Next</button>
            </div>
        </div>
    </div>
</div>

<?php
// Database connection parameters
$host = "localhost"; // Replace with your database host
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$database = "umpak_sumbing"; // Replace with your database name

// Create a connection to the database
$connection = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve job listings from the database
$query = "SELECT asal_desa, nama_pariwisata, deskripsi, LEFT(deskripsi, 100) AS truncated_description FROM pariwisata";
$result = mysqli_query($connection, $query);

// Check if there are any job listings
if (mysqli_num_rows($result) > 0) {
    $cardNum = 0;
    $cardMax = 50;

    // Loop through the result and generate job cards
    while ($row = mysqli_fetch_assoc($result)) {
        $cardNum = $cardNum + 1;
        if ($cardNum > $cardMax)
            return 0;

        $asalDesa = $row['asal_desa'];
        $namaPariwisata = $row['nama_pariwisata'];
        $deskripsi = $row['deskripsi'];
        $truncatedDeskripsi = $row['truncated_description'] . "..."; // Truncate description and add ellipsis

        // Generate job card HTML
        echo '
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="../img/foto desa/desa bandongan.png" class="card-img-top" alt="Job Logo">
                    <div class="card-body">
                        <h5 class="card-title">' . $namaPariwisata . '</h5>
                        <p class="card-text">' . $deskripsi . '</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> City: ' . $asalDesa . '</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="btn btn-danger">Details</a>
                    </div>
                </div>
            </div>
        ';
    }
} else {
    // No job listings found
    echo '<p>Unavailable.</p>';
}

// Close the database connection
mysqli_close($connection);
?>

<!-- Fetch and include the navbar.html content -->
<script>
    fetch('../components/navbar.html')
        .then(response => response.text())
        .then(data => {
            const navbarContainer = document.getElementById('navbarContainer');
            navbarContainer.innerHTML = data;
        });
</script>

<!-- Convert JavaScript code into PHP -->
<?php
$pictures = ['/img/foto desa/desa bandongan.png', '/img/foto desa/Desa Gandusari.png', '/img/foto desa/Desa Kalegen.png', '/img/foto desa/Desa Ngepanrejo.png']; // Array of picture URLs
$villageNames = ['Desa Bandongan', 'Desa Gandusari', 'Desa Kalegen', 'Desa Ngepanrejo'];
$currentPictureIndex = 0; // Current picture index

// Function to change the picture based on the button clicked
function changePicture($action)
{
    global $pictures, $villageNames, $currentPictureIndex;

    // Update the current picture index based on the action
    if ($action === 'previous') {
        $currentPictureIndex = ($currentPictureIndex - 1 + count($pictures)) % count($pictures);
    } else if ($action === 'next') {
        $currentPictureIndex = ($currentPictureIndex + 1) % count($pictures);
    }

    // Set the source of the picture element to the new picture URL
    echo '<script>document.getElementById("picture").src = "' . $pictures[$currentPictureIndex] . '";</script>';

    // Set the village name text
    echo '<script>document.getElementById("villageName").textContent = "' . $villageNames[$currentPictureIndex] . '";</script>';
}
?>

<!-- Fetch and include the footer.html content -->
<script>
    fetch('../components/footer.html')
        .then(response => response.text())
        .then(data => {
            const footerContainer = document.getElementById('footerContainer');
            footerContainer.innerHTML = data;
        });
</script>

<!-- HTML Content -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center">
            <img id="picture" src="/img/foto desa/desa bandongan.png" alt="Dummy Image" class="img-fluid fixed-height-image">
            <br>
            <p id="villageName">Desa Bandongan</p>
            <div class="mt-3">
                <button onclick="changePicture('previous')" class="btn btn-primary me-2">Previous</button>
                <button onclick="changePicture('next')" class="btn btn-primary me-2">Next</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript Code -->
<script>
    // == Content ===
    const pictures = <?php echo json_encode($pictures); ?>; // Array of picture URLs
    const villageNames = <?php echo json_encode($villageNames); ?>; // Array of village names
    let currentPictureIndex = <?php echo $currentPictureIndex; ?>; // Current picture index

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

<!-- Fetch and include the footer.html content -->
<?php
$footerContent = file_get_contents('../components/footer.html');
echo $footerContent;
?>
