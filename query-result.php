<?php
$con = mysqli_connect('localhost', 'root', '', 'rms');
if (!$con) {
    die("Connection failed");
} else {
    $sql = "SELECT * FROM result";
    $res = mysqli_query($con, $sql);
    $num_rows = mysqli_num_rows($res);
    echo " 
    <table border='1' cellspacing='0'  width='90%'>
        <thead>
            <tr>
                <th style='color: black; font-weight: bold;'>#</th>
                <th style='color: black; font-weight: bold;'>Student Name</th>
                <th style='color: black; font-weight: bold;'>ADM NUMBER</th>
                <th style='color: black; font-weight: bold;'>Parent's Name</th>
                <th style='color: black; font-weight: bold;'>Contact</th>
                <th style='color: black; font-weight: bold;'>Date-of-Birth</th>
                <th style='color: black; font-weight: bold;'>Image</th>
                <th style='color: black; font-weight: bold;'>MATHS</th>
                <th style='color: black; font-weight: bold;'>ENGLISH</th>
                <th style='color: black; font-weight: bold;'>KISWAHILI</th>
                <th style='color: black; font-weight: bold;'>PHYSICS</th>
                <th style='color: black; font-weight: bold;'>CHEMISTRY</th>
                <th style='color: black; font-weight: bold;'>BIOLOGY</th>
                <th style='color: black; font-weight: bold;'>TOTAL</th>
            </tr>
        </thead>";

    if ($num_rows > 0) {
        while ($row = mysqli_fetch_array($res)) {
            $total = $row['maths'] + $row['english'] + $row['kiswahili'] + $row['phy'] + $row['dsa'] + $row['be'];
            echo '<tbody>';
            echo '<tr style="color: black;">';

            echo '<td>';
            echo $row['id'];
            echo '</td>';

            echo '<td>';
            echo $row['name'];
            echo '</td>';

            echo '<td>';
            echo $row['roll'];
            echo '</td>';

            echo '<td>';
            echo $row['fname'];
            echo '</td>';

            echo '<td>';
            echo $row['contact'];
            echo '</td>';

            echo '<td>';
            echo $row['dob'];
            echo '</td>';

            echo'<td>';
			$imgname = $row['imgpath'];
			if($row['imgpath']){echo "<img src='up/$imgname'>";}
			else echo"No";
			echo '</td>';


            echo '<td>';
            echo $row['maths'];
            echo '</td>';

            echo '<td>';
            echo $row['english'];
            echo '</td>';

            echo '<td>';
            echo $row['kiswahili'];
            echo '</td>';

            echo '<td>';
            echo $row['phy'];
            echo '</td>';

            echo '<td>';
            echo $row['dsa'];
            echo '</td>';

            echo '<td>';
            echo $row['be'];
            echo '</td>';

            echo '<td>';
            echo $total;
            echo '</td>';

            echo '</tr>';
            echo '</tbody>';
            echo '<br>';
        }
    } else {
        echo "NO DATA FOUND";
    }
}
?>
