<?php 
	$conexion=mysqli_connect('localhost','root','','sma');

    //$varAccion = $_POST['txtaccion'];

    if(isset($_POST['id']) && isset($_POST['id']) != "")
    
{
    
    // get User ID
    $idMedio = $_POST['id'];

    // Get User Details

    $query = "SELECT * FROM tbl_medios WHERE id = '$idMedio'";
    if (!$result = mysqli_query($conexion, $query)) {
        exit(mysqli_error($conexion));
    }

    $response = array();
    if(mysqli_num_rows($result) > 0)    {
        while ($row = mysqli_fetch_assoc($result)) {
            $response = $row;
        }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
    // display JSON data
    echo json_encode($response);
//}
}
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}
 ?>