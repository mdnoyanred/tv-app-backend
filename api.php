<?php 
	session_start();
	header('Content-Type: application/json');
	require('db.php');
	if(isset($_GET['user_id'])){
		$q = "select * from users where id=".$_GET["user_id"];
		$keyData = $conn->query($q) or die($conn->error);
		$i = $keyData->fetch_assoc();
	}else {
		echo json_encode(array('error' => "Virheellinen pyyntö", ));
		die();
	}
	


	if(isset($_GET['api_key']) && $_GET['api_key']==$i['api_key']){
		require 'db.php';

		if(isset($_GET['category'])){
			// retrieve all the channels present in given category 
			$query = "select * from channels where category = '".$conn->real_escape_string($_GET['category'])."' order by id asc";
			$data = $conn->query($query) or die($conn->error);

			while($row = $data->fetch_assoc()){
					$datas[] = $row; 
					//echo $row['courseId'];
				}

		  	$show_json = json_encode($datas , JSON_FORCE_OBJECT);

			if ( json_last_error_msg()=="Väärin muotoillut UTF-8-merkit, mahdollisesti väärin koodattu" ) {
			    $show_json = json_encode($datas, JSON_PARTIAL_OUTPUT_ON_ERROR );
			}
			if ( $show_json !== false ) {
			    echo($show_json);
			} else {
			    die("json_encode epäonnistui: " . json_last_error_msg());
			}

		}

		if(isset($_GET['channels'])){
			// retrieve all the channels present in given category 
			$query = "select * from channels order by id asc";
			$data = $conn->query($query) or die($conn->error);

			while($row = $data->fetch_assoc()){
					$datas[] = $row;
				}

		  	$show_json = json_encode($datas , JSON_FORCE_OBJECT);

			if ( json_last_error_msg()=="Väärin muotoillut UTF-8-merkit, mahdollisesti väärin koodattu" ) {
			    $show_json = json_encode($datas, JSON_PARTIAL_OUTPUT_ON_ERROR );
			}
			if ( $show_json !== false ) {
			    echo($show_json);
			} else {
			    die("json_encode fail: " . json_last_error_msg());
			}

		}

		if(isset($_GET['categories'])){
			$query = "select * from categories order by id desc";
			$data = $conn->query($query) or die($conn->error);
			$datas = array();
			while($row = $data->fetch_assoc()){
					$datas[] = $row;
				}

		  	$show_json = json_encode($datas , JSON_FORCE_OBJECT);

			if ( json_last_error_msg()=="Väärin muotoillut UTF-8-merkit, mahdollisesti väärin koodattu" ) {
			    $show_json = json_encode($datas, JSON_PARTIAL_OUTPUT_ON_ERROR );
			}
			if ( $show_json !== false ) {
			    echo($show_json);
			} else {
			    die("json_encode fail: " . json_last_error_msg());
			}
		}

	}else {
		echo json_encode(array('error' => "Virheellinen avain", ));
	}
	?>