<!DOCTYPE html>
<?php
require './conn.php';
?>
<html dir="ltr">
<link rel="icon" href="../logo/icon.jpg">
<style>
	body {
		background-color: beige;
	}

	.table {
		width: 100%;
		height: 100%;
		margin-bottom: 20px;
	}

	b {
		text-align: center;
		color: blue;
	}
</style>

<body>

	<b>Student result</b>
	<?php
		$date = date("Y-m-d");
		echo $date;
	?>
	<br /><br />
	<table   border="1" class="table table-striped">
		<thead>
			<tr>
			  <th>#</th>
               <th>number id</th>
			   <th>frist name</th>
			   <th>last name</th>
			   <th>first subject</th>
					<th> second subject </th>
					<th> third subject</th>
					<th>fourth subject</th>
					<th>fifth subject</th>
					<th>sixth subject</th>

			   <th>percentage</th>
			   <th>result</th>
			</tr>
		</thead>
		<tbody>
			<?php
				require './conn.php';
				
            $id = $_GET['id'];
	$query = $conn->query ("SELECT * FROM  info_student WHERE id = '$id'");
			
				while($row = $query->fetch_array()){
					
			?>
			                <?php
                 $id = $row['id'];
                $id_school = $row['id_school'];
				$firstname = $row['firstname']; 
				$lastname = $row['lastname'];
                $phone = $row['phone'];
				$first_mark = $row['first_mark']; 
				$second_mark = $row['second_mark']; 
				$third_mark= $row['third_mark']; 
				$fourth_mark = $row['fourth_mark'];
				$fifth_mark = $row['fifth_mark'];
				$sixth_mark = $row['sixth_mark'];
				$final_mark  = ($first_mark + $second_mark
				 + $third_mark + $fourth_mark + $fifth_mark + $sixth_mark) / 6;
        
				if(($final_mark >=80) &&($final_mark <=100)){
					$remarks = "excellent";	
				}
                elseif(($final_mark >=70) &&($final_mark <=80)){
					$remarks = "very good";
                }
                 elseif (($final_mark >=60) &&($final_mark <=70)){
					$remarks = " good";	
				}
                    elseif(($final_mark >=50) &&($final_mark <=60)){
					$remarks = "acceptable";	
                    }else {
					$remarks = "Failed";
				}        
                     ?>
			<tr>
				
			
      <td style="text-align:center;"><?php echo $row ['id'];?></td>
        <td style="text-align:center;"><?php echo  $row ['id_school'];?></td>
        <td style="text-align:center;"><?php echo $row  ['firstname'];?></td>
        <td style="text-align:center;"><?php echo $row  ['lastname'];?></td>
        <td style="text-align:center;" ><?php echo $row ['first_mark'];?></td>
        <td style="text-align:center;" ><?php echo $row ['second_mark'];?></td>
        <td style="text-align:center;" ><?php echo $row ['third_mark'];?></td>
        <td style="text-align:center;"><?php echo  $row ['fourth_mark'];?></td>
		<td style="text-align:center;"><?php echo  $row ['fifth_mark'];?></td>
        <td style="text-align:center;"><?php echo  $row ['sixth_mark'];?></td>


      <td style="text-align:center;"><?php echo "$final_mark";?></td>
       <td style="text-align:center;"><?php echo "$remarks";?></td>
			</tr>
			
			<?php
				}
			?>
		</tbody>
	</table>


</body>
<script type="text/javascript">
	function PrintPage() {
		window.print();
	}
	document.loaded = function() {

	}
	window.addEventListener('DOMContentLoaded', (event) => {
		PrintPage()
		setTimeout(function() {
			window.close()
		}, 750)
	});
</script>

</html>