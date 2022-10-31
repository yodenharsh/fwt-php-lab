<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Trip ID</th>
            <th scope="col">Planned Year</th>
            <th scope="col">People</th>
            <th scope="col">Cost</th>
            <th scope="col">Package Selected</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $getTrips->fetch_assoc()) {
            $package;
            if ($row["package"] == "na") {
                global $package;
                $package = "North America";
            } else if ($row["package"] == "europe") {
                global $package;
                $package = "Europe";
            } else {
                global $package;
                $package = "Asia";
            }
            echo "<tr>";
            echo "<th scope='row'>" . $row["tripID"] . "</th>";
            echo "<td>" . $row["year"] . "</td>";
            echo "<td>" . $row["people"] . "</td>";
            echo "<td>" . $row["cost"] . " USD</td>";
            echo "<td>" . $package . "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>