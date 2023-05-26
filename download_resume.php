<?php 
	
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "placement_portal";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

$sql = 'SELECT * FROM `resumes` WHERE `resume_id`='.$_GET["resume_id"];
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);        

//echo "<pre>";print_r($row);exit;

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php //echo $_POST['first_name']; ?></title>
</head>
<body>
	<?php $html = ''; 
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$user_logo = $row['user_logo'];

		$html .= '<div style="float:right"><img src="'.$user_logo.'" style="text-align:center;align:center;float:right;" height="100px" width="100px"></div>';
		$html .= '<div style="float:left"><h2 style="line-height:10px;">'.$first_name.' '.$last_name.'</h2>';
		$html .= '<h4 style="line-height:0px">Email: '.$row["email"].'</h4>';
		$html .= '<h4 style="line-height:0px;">Phone no: '.$row["phone"].'</h4></div><hr>';
		$html .= '<p><b>Career Objective :</b> Looking for a a high-grown organization with a competitive and challenging environment that creates an ideal condition for delivering quality services which offers a congenial environment for growth. </p>';
		if(!empty($row["academic_details"])){
			$academic_details = unserialize($row["academic_details"]);
			$html .= '<h3><u>Academic Profile : </u></h3>';
			$html .= '<table class="PdfTable" border="1" style="width:100%;border-collapse: collapse;"><tr style="background-color:grey"><th>Course</th><th>Passing Year</th><th>Board / University</th><th>Institute</th><th>Percentage</th></tr><tbody>';
			foreach ($academic_details as $key => $value) {
				$html .= '<tr>';
				$html .= '<td>'.$value["course_name"].'</td>';
				$html .= '<td style="text-align:center">'.$value["passing_year"].'</td>';
				$html .= '<td>'.$value["board_university"].'</td>';
				$html .= '<td>'.$value["institute"].'</td>';
				$html .= '<td style="text-align:right">'.$value["percentage"].'</td>';
				$html .= '</tr>';
			}
			$html .= '</tbody></table>';
		}

		if(!empty($row["project_details"])){
			$project_details = unserialize($row["project_details"]);
			$html .= '<h3><u>Project Details : </u></h3>';
			$html .= '<table class="PdfTable" border="1" style="width:100%;border-collapse: collapse;"><tr style="background-color:grey"><th>Project Title</th><th>Role</th><th>Team Size</th><th>Description</th></tr><tbody>';
			foreach ($project_details as $key => $value) {
				$html .= '<tr>';
				$html .= '<td>'.$value["project_title"].'</td>';
				$html .= '<td style="text-align:center">'.$value["role"].'</td>';
				$html .= '<td>'.$value["team_size"].'</td>';
				$html .= '<td>'.$value["description"].'</td>';
				$html .= '</tr>';
			}
			$html .= '</tbody></table>';
		}
		/*$html .= '<p><b>Project Title : </b>'.$row["project_title"].'</p>';
		$html .= '<p><b>Team Size : </b>'.$row["team_size"].'</p>';
		$html .= '<p><b>Role Play : </b>'.$row["role_play"].'</p>';
		$html .= '<p style="text-align:justify"><b>Description : </b>'.$row["project_description"].'</p>';*/

		if(!empty($row["technical_skills"])){
			$technical_skills = unserialize($row["technical_skills"]);
			$html .= '<h3><u>Technical Skills : </u></h3>';
			$html .= '<ul>';
			foreach ($technical_skills as $key => $value) {
				$html .= '<li>'.$value["details"].'</li>';
			}
			$html .= '</ul>';	
		}

		if(!empty($row["key_skills"])){
			$key_skills = unserialize($row["key_skills"]);
			$html .= '<h3><u>Key Skills : </u></h3>';
			$html .= '<ul>';
			foreach ($key_skills as $key => $value) {
				$html .= '<li>'.$value["details"].'</li>';
			}
			$html .= '</ul>';	
		}

		if(!empty($row["achivements"])){
			$html .= '<h3><u>Achivements : </u></h3>';
			$html .= ''.$row["achivements"].'';		
		}

		if(!empty($row["personality_traits"])){
			$personality_traits = unserialize($row["personality_traits"]);
			$html .= '<h3><u>Personality Traits : </u></h3>';
			$html .= '<ul>';
			foreach ($personality_traits as $key => $value) {
				$html .= '<li>'.$value["details"].'</li>';
			}
			$html .= '</ul>';	
		}

		if(!empty($row["workshops_seminars"])){
			$html .= '<h3><u>Workshops & Seminars : </u></h3>';
			$html .= ''.$row["workshops_seminars"].'';		
		}

		$html .= '<h3><u>Personal Profile : </u></h3>';
		$html .= '<ul>';
		$html .= '<li>Date of Birth : '.$row['birthdate'].'</li>';
		$html .= '<li>Gender : '.$row['gender'].'</li>';
		$html .= '<li>Marital Status : '.$row['marital_status'].'</li>';
		$html .= '<li>Nationality : '.$row['nationality'].'</li>';
		$html .= '<li>Mother Tounge : '.$row['mother_tongue'].'</li>';
		$html .= '<li>Languages Known : '.$row['languages_known'].'</li>';
		$html .= '<li>Permenante Address : <br>'.$row['address_1'].'<br>'.$row['address_2'].'<br>'.$row['city'].'-'.$row['postcode'].'<br>'.$row['country'].'.</li>';
		$html .= '</ul>';

		//echo $html;

	?>
</body>
</html>

<?php 

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->SetTitle('Resume_'.$row['first_name'].'_'.$row['last_name']);
$mpdf->WriteHTML($html);
$mpdf->Output();

?>

<style type="text/css">
    .form-header, .footer, p, div, h1, h2, h3, h4, h5,h6 { font-family: Verdana, Geneva, Tahoma, sans-serif; letter-spacing: 0.01em; } 
    .PdfTable *{ box-sizing: border-box;-webkit-box-sizing: border-box;-moz-box-sizing: border-box; }
    .PdfTable{ width: 100%;border:1px solid #000;margin-bottom: 30px;position: relative;border-collapse: collapse; font-family: Verdana, Geneva, Tahoma, sans-serif; letter-spacing: 0.03em; }
    .PdfTable:last-child{ margin-bottom: 0; }
    .PdfTable thead th{ background-color: #34da88;color: #fff;font-size: 12px;padding: 10px;border-bottom: 1px solid #000; }
    .PdfTable td{ padding:10px;border-right: 1px solid #000;border-bottom: 1px solid #000;font-size: 12px; line-height: 1.8; }
    .PdfTable tbody tr.PdfTable-th td,.PdfTable2 tbody tr.PdfTable-th td{ padding: 10px;font-weight: 700;background-color: #f5f5f5;font-size: 12px; }
    .lead--content,.lead--content p{ line-height: 1.7;font-size: 12px; }
    .footer{ padding:10px;background-color: #efefef;font-size: 12px; }
    .lead--content{ line-height: 1.7;font-size: 12px; }
    .PdfTable input[type="checkbox"],.PdfTable2 input[type="checkbox"]{ width: auto;height: auto;padding: 0;cursor: pointer; }
    .txt_color{color:red;}
</style>