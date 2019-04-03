<?php
$con=mysqli_connect('127.0.0.1','root','','guestform')
    or die("connection failed".mysqli_errno());

$request=$_REQUEST;
$col =array(
    0   =>  'id',
    1   =>  'Username',
    2   =>  'emeil',
    3   =>  'Homepage',
    4   =>  'Text1',
    5   =>  'CreatedAt'
);  

$sql ="SELECT * FROM posts";
$query=mysqli_query($con,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;


$sql ="SELECT * FROM posts WHERE 1=1";
if(!empty($request['search']['value'])){
    $sql.=" AND (id Like '".$request['search']['value']."%' ";
    $sql.=" OR Username Like '".$request['search']['value']."%' ";
    $sql.=" OR emeil Like '".$request['search']['value']."%' ";
    $sql.=" OR Text1 Like '".$request['search']['value']."%' ";
    $sql.=" OR CreatedAt Like '".$request['search']['value']."%' )";
}
$query=mysqli_query($con,$sql);
$totalData=mysqli_num_rows($query);


$sql.=" ORDER BY ".$col[$request['order'][0]['column']]."   ".$request['order'][0]['dir']."  LIMIT ".
    $request['start']."  ,".$request['length']."  ";

$query=mysqli_query($con,$sql);

$data=array();

while($row=mysqli_fetch_array($query)){
    $subdata=array();
    $subdata[]=$row[0]; //id
    $subdata[]=$row[1]; //Username
    $subdata[]=$row[2]; //emeil
    $subdata[]=$row[3]; //Homepage 
    $subdata[]=$row[4]; //Text1 
    $subdata[]=$row[5]; //CreatedAt           
    $data[]=$subdata;
}

$json_data=array(
    "draw"              =>  intval($request['draw']),
    "recordsTotal"      =>  intval($totalData),
    "recordsFiltered"   =>  intval($totalFilter),
    "data"              =>  $data
);

echo json_encode($json_data);
//echo $json_data;

?>