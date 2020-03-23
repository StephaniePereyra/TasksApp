<?php 

include("db.php");

if(isset($_POST['save_task'])){
    //echo "Guardando";
$title = $_POST['title'];
$description = $_POST['description'];
echo $title . "<br>";
echo $description;

$query = "INSERT INTO task(title, description) VALUES ('$title', '$description')";

$result = mysqli_query($conn, $query);
    if(!$result){
        die("Query failed");
    }else{
        $_SESSION['message'] = "La tarea se guardó satisfactoriamente.";
        $_SESSION['message_type'] = 'success';
        //PARA MOSTRAR ERROR   $_SESSION['message_type'] = 'danger';
        header("Location: index.php");
    }
   /* mysqli_free_result($result);
    mysqli_close($conn);*/
}
?>