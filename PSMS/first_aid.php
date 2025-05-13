

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First Aid </title>
    <!-- Link to External CSS for Styling -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="first_aid.css"> <!-- Your CSS must be last -->

</head>
<body>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-center flex-grow-1">First Aid Instructions</h2>
            <a href="home.php" class="btn btn-primary ml-3">Home</a> <!-- HOME BUTTON -->
        </div>

        <!-- Search Bar -->
        <div class="form-group">
            <input type="text" id="searchInput" class="form-control" placeholder="Search type of first aid...">
        </div>

        <!-- List of First Aid Types with Images -->
        <div id="firstAidList" class="row">
            <!-- Example First Aid Type -->
            
            <div class="first-aid-item">
                <p class="text-center">Burns (Paso)</p>
                <a href="Burn.php" class="first-aid-link">
                    <img src="images/burn.jpg" alt="Burns" class="first-aid-img">
                </a>
            </div>
            <div class="first-aid-item">
                <p class="text-center">Cuts and Wounds (Sugat)</p>
                <a href="wound.php" class="first-aid-link">
                    <img src="images/wound.jpg" alt="Cuts and Wounds" class="first-aid-img">
                </a>
            </div>
            <div class="first-aid-item">
                <p class="text-center">Fractures (Bali)</p>
                <a href="#" class="first-aid-link">
                    <img src="images/fracture.png" alt="Fractures" class="first-aid-img">
                </a>
            </div>
            <div class="first-aid-item">
                <p class="text-center">Choking (Nabulunan)</p>
                <a href="choking.php" class="first-aid-link">
                    <img src="images/choking.jpg" alt="Choking" class="first-aid-img">
                </a>
            </div>
            <div class="first-aid-item">
                <p class="text-center">Heart Attack (Atake sa puso)</p>
                <a href="#" class="first-aid-link">
                    <img src="images/heart_attack.jpg" alt="Heart Attack" class="first-aid-img">
                </a>
            </div>

            <div class="first-aid-item">
                <p class="text-center">Heat Stroke</p>
                <a href="heat_stroke.php" class="first-aid-link">
                    <img src="images/heat_stroke.jpg" alt="Heat Stroke" class="first-aid-img">
                </a>
            </div>
            
            <div class="first-aid-item">
                <p class="text-center">Poisoning (Pagka lason)</p>
                <a href="food_poison.html" class="first-aid-link">
                    <img src="images/poisoning.jpg" alt="Poisoning" class="first-aid-img">
                </a>
            </div>

            <div class="first-aid-item">
                <p class="text-center">Seizures (Kumbulsyon)</p>
                <a href="seizure.html" class="first-aid-link">
                    <img src="images/seizures.jpg" alt="Seizures" class="first-aid-img">
                </a>
            </div>
            <div class="first-aid-item">
                <p class="text-center">CPR </p>
                <a href="cpr.php" class="first-aid-link">
                    <img src="images/cpr.jpg" alt="Seizures" class="first-aid-img">
                </a>
            </div>

            
        </div>
    </div>

    <!-- Link to External JavaScript for Search Functionality -->
    <script src="first_aid.js"></script>
    <!-- Link to Bootstrap JS for any Bootstrap functionality -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>
