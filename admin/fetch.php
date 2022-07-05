<?php

$con = mysqli_connect('localhost', 'root', '', 'demo');
$qry = mysqli_query($con, "SELECT * FROM users");
echo "<table>
    <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Gender</th>
    </tr>
";
while ($row = mysqli_fetch_array($qry)) {
    echo "<tr>";
    echo "<td>$row[name]</td>";
    echo "<td>$row[email]</td>";
    echo "<td>$row[gender]</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);