<!DOCTYPE html>
<html>

<head>
    <title>Cells Leaders Registration</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container text-center">
        <h1>Cell Leaders Registration</h1>


        <div class="row">
            <div class="col-10 col-md-6 mx-auto text-center my-5">
                <a class="btn btn-primary" href="citizen.php">CITIZENS</a>
                <a class="btn btn-primary" href="cell.php">CELL</a>
                <a class="btn btn-primary" href="sector.php">SECTOR</a>
                <a class="btn btn-primary" href="district.php">DISTRICT</a>
            </div>
        </div>

        <div class="row">
            <div class="col-10 col-md-6 mx-auto">
                <!-- Registration Form -->
                <form method="post" action="register-cell.php">
                    <div class="form-group">
                        <label for="national_id">National ID Number:</label>
                        <input type="text" class="form-control" id="national_id" name="national_id"
                            oninput="formatNationalID(this)" required>
                    </div>
                    <div class="form-group">
                        <label for="names">Names:</label>
                        <input type="text" class="form-control" id="names" name="names" required>
                    </div>
                    <div class="form-group">
                        <label for="sector">Sector:</label>
                        <select class="form-control" name="sector" id="sector" required>
                            <option value="">--Select Sector--</option>
                            <option value="Gishamvu">Gishamvu</option>
                            <option value="Huye">Huye</option>
                            <option value="Karama">Karama</option>
                            <option value="Kigoma">Kigoma</option>
                            <option value="Kinazi">Kinazi</option>
                            <option value="Maraba">Maraba</option>
                            <option value="Mbazi">Mbazi</option>
                            <option value="Mukura">Mukura</option>
                            <option value="Ngoma">Ngoma</option>
                            <option value="Ruhashya">Ruhashya</option>
                            <option value="Rusatira">Rusatira</option>
                            <option value="Rwaniro">Rwaniro</option>
                            <option value="Simbi">Simbi</option>
                            <option value="Tumba">Tumba</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cell">Cell:</label>
                        <select class="form-control" name="cell" id="cell" required>
                            <option value="">--Select Cell--</option>
                        </select>
                    </div>

                    <div class="form-group border d-flex justify-content-around mt-2">
                        <div class="">Gender: </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="Male" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Male
                        </label>
                    </div>
                    <div class="form-check ms-2">
                        <input class="form-check-input" type="radio" name="gender" value="Female" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Female
                        </label>
                    </div>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="number" class="form-control" id="phone" name="phone" placeholder="Eg: 0781732452" required>
                    </div>

                    
                    <button type="submit" name="submit" class="btn btn-primary">Register Cell</button>
                </form>
            </div>
        </div>


        <br>

        <!-- Display Registered Citizens -->
        <h2>Registered Cells</h2>
        <div class="row">
            <div class="col-11 mx-auto table-responsive">
                <table class="table">
            <thead>
                <tr>
                    <th>National ID Number</th>
                    <th>Names</th>
                    <th>Sector</th>
                    <th>Cell</th>
                    <th>Phone</th>
                    <th>Gender</th>
                </tr>
            </thead>
            <tbody>
                <!-- PHP code to retrieve and display registered citizens here -->
                <?php
                    include_once 'dbconnect.php';
                    $sql = "SELECT * FROM cells;";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['national_id'] . "</td>";
                        echo "<td>" . $row['names'] . "</td>";
                        echo "<td>" . $row['sector'] . "</td>";
                        echo "<td>" . $row['cell'] . "</td>";
                        echo "<td>" . $row['phone'] . "</td>";
                        echo "<td>" . $row['gender'] . "</td>";
                        echo "</tr>";
                    }
?>
            </tbody>
        </table>
            </div>
        </div>

    </div>

    <script>

        const cell = document.getElementById("cell");
        const sector = document.getElementById("sector");

        sector.addEventListener('change', (event) => {
            cell.innerHTML = getCellOptions(event.target.value)
        })

        function getCellOptions(sector) {
            let cells;
            switch (sector) {
                case "Gishamvu":
                    cells = ["Nyakibanda", "Nyumba", "Ryakibogo", "Shori"];
                    break;
                case "Huye":
                    cells = ["Muyogoro", "Nyakagezi", "Rukira", "Sovu"];
                    break;
                case "Karama":
                    cells = ["Buhoro", "Bunazi", "Gahororo", "Kibingo", "Muhembe"];
                    break;
                case "Kigoma":
                    cells = ["Gishihe", "Kabatwa", "Kabuga", "Karambi", "Musebeya", "Nyabisindu", "Rugarama", "Shanga"];
                    break;
                case "Kinazi":
                    cells = ["Byinza", "Gahana", "Gitovu", "Kabona", "Sazange"];
                    break;
                case "Maraba":
                    cells = ["Buremera", "Gasumba", "Kabuye", "Kanyinya", "Shanga", "Shyembe"];
                    break;
                case "Mbazi":
                    cells = ["Gatobotobo", "Kabuga", "Mutunda", "Mwulire", "Rugango", "Rusagara", "Tare"];
                    break;
                case "Mukura":
                    cells = ["Bukomeye", "Buvumu", "Icyeru", "Rango A"];
                    break;
                case "Ngoma":
                    cells = ["Butare", "Kaburemera", "Matyazo", "Ngoma"];
                    break;
                case "Ruhashya":
                    cells = ["Busheshi", "Gatovu", "Karama", "Mara", "Muhororo", "Rugogwe", "Ruhashya"];
                    break;
                case "Rusatira":
                    cells = ["Buhimba", "Gafumba", "Kimirehe", "Kimuna", "Kiruhura", "Mugogwe"];
                    break;
                case "Rwaniro":
                    cells = ["Gatwaro", "Kamwambi", "Kibiraro", "Mwendo", "Nyamabuye", "Nyaruhombo", "Shyunga"];
                    break;
                case "Simbi":
                    cells = ["Cyendajuru", "Gisakura", "Kabusanza", "Mugobore", "Nyangazi"];
                    break;
                case "Tumba":
                    cells = ["Cyarwa", "Cyimana", "Gitwa", "Mpare", "Rango B"];
                    break;
                default:
                    cells = ["-"];
                    break;
            }
            const cellOptions = cells.map(cellName => `<option value="${cellName}">${cellName}</option>`);

            return cellOptions;
        }



        function formatNationalID(input, data) {
            var inputValue = input.value.replace(/[^\d]/g, "");
            if(data)
            {
                inputValue = data
            }
            var formatPattern = "- ---- - ------- - --";
            var formattedValue = "";

            for (var i = 0, j = 0; i < formatPattern.length; i++) {
                if (formatPattern[i] === " ") {
                    formattedValue += " ";
                }
                else {
                    if (inputValue[j]) {
                        formattedValue += inputValue[j];
                        j++;
                    }
                    else {
                        if (i === 0 && formattedValue.length === 0) {
                            formattedValue += "-";
                        } else {
                            formattedValue += "-";
                        }
                    }
                }
            }
            input.value = formattedValue;
        }

        document.getElementById("national_id").addEventListener("keydown", function (e) {
    if (e.key === "Backspace") {
        e.preventDefault();
        var input = e.target;
        var formattedValue = input.value.replace(/[^\d]/g, "");

        let stop = false;
        for (let i = formattedValue.length - 1; stop === false; i--) {
            if (formattedValue[i] !== "-" && formattedValue[i] !== " ") {
                formattedValue = formattedValue.slice(0, -1);
                stop = true;
            }
        }

        formatNationalID(input, formattedValue);
    }
});


    </script>
    <!-- Include Bootstrap JS and jQuery (for Bootstrap components) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>