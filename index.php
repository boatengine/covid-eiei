<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<title>โครงงานเว็บไซต์ติดตามสถานการณ์โควิด19</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<?php
		//ถ้าใช้งานบน ssl หรือ HTTPS แล้วให้เอา @ ออกได้เลยจ้า เพราะตัว API Request SSL 
		    @$get_data=file_get_contents('https://covid19.ddc.moph.go.th/api/Cases/today-cases-all');
			//เปลี่ยนลิงค์ api 15072021 https://covid19.th-stat.com/json/covid19v2/getTodayCases.json
			$covid19_th=json_decode($get_data);

			//print_r ออกมาดูซะหน่อย มีอะไรบ้าง
			// echo '<pre>';
			// print_r($covid19_th);
			// echo '</pre>';


			//ประกาศตัวแปรแยกเป็นแต่ละคอลัมภ์ เพื่อเอาไปใช้งาน/ตกแต่งให้สวยงามตามใจคุณ ^^
			$Confirmed=$covid19_th[0]->total_case;
			$Recovered=$covid19_th[0]->total_recovered;
			$Hospitalized=$covid19_th[0]->total_case_excludeabroad;
			$NewConfirmed=$covid19_th[0]->new_case;
			$NewRecovered =$covid19_th[0]->new_recovered;
			$NewHospitalized =$covid19_th[0]->new_case_excludeabroad;
			$NewDeaths =$covid19_th[0]->new_death;
			$UpdateDate=$covid19_th[0]->update_date;
			$Deaths=$covid19_th[0]->total_death; 
		
		//ที่มาของ API ข้อมูล 
		// https://covid19.th-stat.com/api/open/today ****เอาลิงค์นี้ไป run ครับ จะเห็นหน้าตาของข้อมูล

		//data from https://covid19.th-stat.com/

		/*  ศึกษาเรื่อง JSON PHP เพิ่มเติมได้ที่ https://www.w3schools.com/js/js_json_php.asp  */


		?>

		<!-- ส่วนนี้ก็ตกแต่งง่ายๆด้วย Bootstrap4 -->
		<div class="container">
			<div class="row">
				<div class="col col-sm-12">
					<h1 style="margin-top: 30px;"> โครงงานเว็บไซต์ติดตามสถานการณ์โควิด19 </h3>
					<h2>อัพเดทข้อมูลล่าสุด :  
						<?php echo  $UpdateDate;?> </h5>
				</div>

				<div class="col-12 col-sm-12">
					 <div class="alert alert-danger" role="alert">
						<b>ติดเชื้อรายใหม่ <?php echo  $NewConfirmed;?>  </b>
					</div>
				</div>

				<div class="col-6 col-sm-3">
					<div class="alert alert-info" role="alert">
						<b>ติดเชื้อสะสม  <br> <?php echo  $Confirmed;?>  </b>
					</div>
				</div>
				<div class="col-6 col-sm-3">
					<div class="alert alert-success" role="alert">
						<b>หายแล้ว <br> <?php echo  $Recovered;?> </b>
					</div>
				</div>
				<div class="col-6 col-sm-3">
					<div class="alert alert-warning" role="alert">
						<b>รักษาอยู่ใน รพ.  <br> <?php echo  $Hospitalized;?> </b>
					</div>
				</div>
				<div class="col-6 col-sm-3">
					<div class="alert alert-dark" role="alert">
						<b>เสียชีวิต <br> <?php echo  $Deaths;?> </b>
					</div>
				</div>

			</div>
		</div>
		<center>API ::  https://covid19.ddc.moph.go.th/api/Cases/today-cases-all <br>  </center>
		<br>
	</body>
</html>