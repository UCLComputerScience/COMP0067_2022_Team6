<?php
require 'db_connect.php';

// Include mpdf library
require_once __DIR__ . '/vendor/autoload.php';

// Set variables
$date = date('d/m/Y');
$projects = $_POST['projects'];
$users = $_POST['users'];
$datefrom = $_POST['datefrom'];
$sdgs = json_decode(base64_decode($_POST['sdgs']));
$projPerSDG = json_decode(base64_decode($_POST['projPerSDG']));
$duration = json_decode(base64_decode($_POST['duration']));
$budgetLabels = json_decode(base64_decode($_POST['budgetLabels']));
$budgetData = json_decode(base64_decode($_POST['budgetData']));

// Select users registered and projects added since the chosen date
$query2 = mysqli_query($link, "SELECT COUNT(*) AS membNumber FROM users WHERE date_registered >= '$datefrom'");
if ($query2 == null) {
    echo "Second query error";
    exit;
} else {
    $newMembers = mysqli_fetch_assoc($query2);
}

$query3 = mysqli_query($link, "SELECT COUNT(*) AS projNumber FROM projects WHERE date_added >= '$datefrom'");
if ($query3 == null) {
    echo "Third query error";
    exit;
} else {
    $newProjects = mysqli_fetch_assoc($query3);
}

// Fill Table 2
for ($x = 0; $x < count($sdgs); $x++) {
    $tableBody2 .= <<<EOT
	<tr>
        <td style="text-align:left; border:1px solid #808080; padding: 5px;">$sdgs[$x]</td>
        <td style="text-align:left; border:1px solid #808080; padding: 5px;">$projPerSDG[$x]</td>
	</tr>
EOT;
}

// Fill Table 4
for ($x = 0; $x < count($budgetLabels); $x++) {
    $tableBody4 .= <<<EOT
	<tr>
        <td style="text-align:left; border:1px solid #808080; padding: 5px;">$budgetLabels[$x]</td>
        <td style="text-align:left; border:1px solid #808080; padding: 5px;">$budgetData[$x]</td>
	</tr>
EOT;
}

mysqli_close($link);

// Create mpdf instance
$mpdf = new \Mpdf\Mpdf();

// Header
$header = '<img src="ANCSSC.png" width="10mm" style="position:releative; margin-right:505vw;"/><b>The ANCSSC App Report</b>';

// --- PDF ---
$togenerate = '';

// Date and title
$togenerate .= '<br><h5 style="text-align:left; font-weight:normal;">Generated ' . $date . '</h5><br>';
$togenerate .= '<h1 style="text-align:center;">The ANCSSC Web Application Report</h1><br>';

// Table 1: number of users and projects
$togenerate .= '<table style="width:100%; border-collapse: collapse;">
<tbody>
    <tr>
        <td style="text-align:left; border:1px solid #808080; padding:5px; font-weight:bold;">Total number of registered members</td>
        <td style="text-align:center; border:1px solid #808080; padding: 5px; width:200vw;">' . $users . '</td>
    </tr>
    <tr>
        <td style="text-align:left; border:1px solid #808080; padding:5px; font-weight:bold;">Total number of registered projects</td>
        <td style="text-align:center; border:1px solid #808080; padding: 5px;">' . $projects . '</td>
    </tr>
    <tr>
        <td style="text-align:left; border:1px solid #808080; padding:5px; font-weight:bold;">Number of new members since ' . $datefrom . '</td>
        <td style="text-align:center; border:1px solid #808080; padding: 5px;">' . $newMembers['membNumber'] . '</td>
    </tr>
    <tr>
        <td style="text-align:left; border:1px solid #808080; padding:5px; font-weight:bold;">Number of new projects since ' . $datefrom . '</td>
        <td style="text-align:center; border:1px solid #808080; padding: 5px;">' . $newProjects['projNumber'] . '</td>
    </tr>
</tbody>
</table>';

$togenerate .= '<h4 style="text-align:center; font-weight:normal;">Table 1: The general ANCSSC application member and project statistics.</h5>';

// Table 2: projects per SDG
$togenerate .= '<br><table style="width:100%; border-collapse: collapse;">
<thead>
    <tr>
        <th style="text-align:left; border:1px solid #808080; padding: 5px; background-color: #DCDCDC;">SDG</th>
        <th style="text-align:left; border:1px solid #808080; padding: 5px; background-color: #DCDCDC;">Number of Projects</th>
    </tr>
</thead>
<tbody>' . $tableBody2 . ' </tbody>
</table>';

$togenerate .= '<h4 style="text-align:center; font-weight:normal;">Table 2: Registered member projects per SDG.</h5>';


// Table 5: project scheduling
$togenerate .= '<br><table style="width:100%; border-collapse: collapse;">
<thead>
    <tr>
        <th style="text-align:center; border:1px solid #808080; padding: 5px; background-color: #DCDCDC;">Ongoing Projects</th>
        <th style="text-align:center; border:1px solid #808080; padding: 5px; background-color: #DCDCDC;">Finished Projects</th>
        <th style="text-align:center; border:1px solid #808080; padding: 5px; background-color: #DCDCDC;">Overdue Projects</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td style="text-align:center; border:1px solid #808080; padding: 5px;">' . $duration[0] . '</td>
        <td style="text-align:center; border:1px solid #808080; padding: 5px;">' . $duration[1] . '</td>
        <td style="text-align:center; border:1px solid #808080; padding: 5px;">' . $duration[2] . '</td>
    </tr>
</tbody>
</table>';

$togenerate .= '<h4 style="text-align:center; font-weight:normal;">Table 3: The number of ongoing, finished and overdue projects.</h5>';


// Table 4: projects by budget
$togenerate .= '<br><table style="width:100%; border-collapse: collapse;">
<thead>
    <tr>
        <th style="text-align:left; border:1px solid #808080; padding: 5px; background-color: #DCDCDC;">Budget</th>
        <th style="text-align:left; border:1px solid #808080; padding: 5px; background-color: #DCDCDC;">Number of Projects</th>
    </tr>
</thead>
<tbody>' . $tableBody4 . ' </tbody>
</table>';

$togenerate .= '<h4 style="text-align:center; font-weight:normal;">Table 4: Registered member projects by relative budget.</h5>';


// Generate PDF
$mpdf->SetHeader($header);
$mpdf->SetFooter('Page {PAGENO}');
$mpdf->WriteHTML($togenerate);
$mpdf->Output();

?>