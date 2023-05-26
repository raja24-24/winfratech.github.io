<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php //echo $_POST['first_name']; ?></title>
</head>
<body>
	<?php //echo "<pre>";print_r($_FILES);exit; ?>
	<?php $html = ''; 
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$html .= '<div style="float:right"><img src="'.$_FILES["user_logo"]["tmp_name"].'" style="text-align:center;align:center;float:right;" height="100px" width="100px"></div>';
		$html .= '<div style="float:left"><h2 style="line-height:10px;">'.$first_name.' '.$last_name.'</h2>';
		$html .= '<h4 style="line-height:0px">Email: '.$_POST["email"].'</h4>';
		$html .= '<h4 style="line-height:0px;">Phone no: '.$_POST["phone"].'</h4></div><hr>';
		$html .= '<p><b>Career Objective :</b> Looking for a a high-grown organization with a competitive and challenging environment that creates an ideal condition for delivering quality services which offers a congenial environment for growth. </p>';
		if(!empty($_POST["academic_details"])){
			$html .= '<h3><u>Academic Profile : </u></h3>';
			$html .= '<table class="PdfTable" border="1" style="width:100%;border-collapse: collapse;"><tr style="background-color:grey"><th>Course</th><th>Passing Year</th><th>Board / University</th><th>Institute</th><th>Percentage</th></tr><tbody>';
			foreach ($_POST["academic_details"] as $key => $value) {
				$html .= '<tr>';
				$html .= '<td>'.$_POST["academic_details"][$key]["course_name"].'</td>';
				$html .= '<td>'.$_POST["academic_details"][$key]["passing_year"].'</td>';
				$html .= '<td>'.$_POST["academic_details"][$key]["board_university"].'</td>';
				$html .= '<td>'.$_POST["academic_details"][$key]["institute"].'</td>';
				$html .= '<td style="text-align:right">'.$_POST["academic_details"][$key]["percentage"].'</td>';
				$html .= '</tr>';
			}
			$html .= '</tbody></table>';
		}

		if(!empty($_POST["project_details"])){
			$html .= '<h3><u>Project Details : </u></h3>';
			$html .= '<table class="PdfTable" border="1" style="width:100%;border-collapse: collapse;"><tr style="background-color:grey"><th>Project Title</th><th>Role</th><th>Team Size</th><th>Description</th></tr><tbody>';
			foreach ($_POST["project_details"] as $key => $value) {
				$html .= '<tr>';
				$html .= '<td>'.$_POST["project_details"][$key]["project_title"].'</td>';
				$html .= '<td>'.$_POST["project_details"][$key]["role_play"].'</td>';
				$html .= '<td>'.$_POST["project_details"][$key]["team_size"].'</td>';
				$html .= '<td>'.$_POST["project_details"][$key]["description"].'</td>';
				$html .= '</tr>';
			}
			$html .= '</tbody></table>';
		}

		$html .= '<div style="margin-top:20px" ><b>Group : </b> '.$_POST["group_department"].'</div>';

		$html .= '<div style="margin-top:20px" ><b>Percentage : </b> '.$_POST["percentage"].'</div>';

		$html .= '</ul>';
		/*$html .= '<p><b>Project Title : </b>'.$_POST["project_title"].'</p>';
		$html .= '<p><b>Team Size : </b>'.$_POST["team_size"].'</p>';
		$html .= '<p><b>Role Play : </b>'.$_POST["role_play"].'</p>';
		$html .= '<p style="text-align:justify"><b>Description : </b>'.$_POST["project_description"].'</p>';*/

		if(!empty($_POST["technical_skills"])){
			$html .= '<h3><u>Technical Skills : </u></h3>';
			$html .= '<ul>';
			foreach ($_POST["technical_skills"] as $key => $value) {
				$html .= '<li>'.$_POST["technical_skills"][$key]["details"].'</li>';
			}
			$html .= '</ul>';	
		}



		if(!empty($_POST["key_skills"])){
			$html .= '<h3><u>Key Skills : </u></h3>';
			$html .= '<ul>';
			foreach ($_POST["key_skills"] as $key => $value) {
				$html .= '<li>'.$_POST["key_skills"][$key]["details"].'</li>';
			}
			$html .= '</ul>';	
		}

		if(!empty($_POST["achivements"])){
			$html .= '<h3><u>Achivements : </u></h3>';
			$html .= ''.$_POST["achivements"].'';		
		}

		if(!empty($_POST["personality_traits"])){
			$html .= '<h3><u>Personality Traits : </u></h3>';
			$html .= '<ul>';
			foreach ($_POST["personality_traits"] as $key => $value) {
				$html .= '<li>'.$_POST["personality_traits"][$key]["details"].'</li>';
			}
			$html .= '</ul>';	
		}

		if(!empty($_POST["workshops_seminars"])){
			$html .= '<h3><u>Workshops & Seminars : </u></h3>';
			$html .= ''.$_POST["workshops_seminars"].'';		
		}

		$html .= '<h3><u>Personal Profile : </u></h3>';
		$html .= '<ul>';
		$html .= '<li>Date of Birth : '.$_POST['birthdate'].'</li>';
		$html .= '<li>Gender : '.$_POST['gender'].'</li>';
		$html .= '<li>Marital Status : '.$_POST['marital_status'].'</li>';
		$html .= '<li>Nationality : '.$_POST['nationality'].'</li>';
		$html .= '<li>Mother Tounge : '.$_POST['mother_tongue'].'</li>';
		$html .= '<li>Languages Known : '.$_POST['languages_known'].'</li>';
		$html .= '<li>Permenante Address : <br>'.$_POST['address_1'].'<br>'.$_POST['address_2'].'<br>'.$_POST['city'].'-'.$_POST['postcode'].'<br>'.$_POST['country'].'.</li>';
		$html .= '</ul>';

		//echo $html;

	?>
</body>
</html>

<?php 

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->SetTitle('Resume_'.$_POST['first_name'].'_'.$_POST['last_name']);
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