<?php
session_start();

$con  = mysqli_connect('localhost','root','','dechet');

$output= array();
$sql = "SELECT * FROM devices where user_id=".$_SESSION['user_id'];

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'id',
	1 => 'name',
	2 => 'serial',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " and ( name like '%".$search_value."%'";
	$sql .= " OR serial like '%".$search_value."%' )";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY id desc";
}

if($_POST['length'] != -1)
{
	$start = $_POST['start'];
	$length = $_POST['length'];
	$sql .= " LIMIT  ".$start.", ".$length;
}	

$query = mysqli_query($con,$sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while($row = mysqli_fetch_assoc($query))
{
	$sub_array = array();
	$sub_array[] = $row['id'];
	$sub_array[] = $row['name'];
	$sub_array[] = $row['serial'];

	$sub_array[] = '
	<a href="javascript:void();" data-id="'.$row['id'].'"  class="btn btn-info btn-sm editbtn" ><i class="ti ti-pencil" ></i></a>
	<a href="javascript:void();" data-id="'.$row['id'].'"  class="btn btn-danger btn-sm deleteBtn" ><i class="ti ti-trash" ></i></a> 
	<a href="device.php?id='.$row['id'].'&name='.$row['name'].'&serial='.$row['serial'].'" data-id="'.$row['id'].'"  class="btn btn-secondary btn-sm editbtn" ><i class="ti ti-article"></i></a>
	<a href="graphe.php?id='.$row['id'].'&name='.$row['name'].'&serial='.$row['serial'].'" data-id="'.$row['id'].'" class="btn btn-secondary btn-sm editbtn"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-timeline" width="15" height="15" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" >
		<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
		<path d="M4 16l6 -7l5 5l5 -6"></path>
		<path d="M15 14m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
		<path d="M10 9m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
		<path d="M4 16m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
		<path d="M20 8m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
	</svg></a>';
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);
