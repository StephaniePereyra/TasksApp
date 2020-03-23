<?php
include("db.php");

if(ISSET($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM task WHERE id = '$id'";

    $resultado_eliminacion = mysqli_query($conn,$query);

    if(!$resultado_eliminacion){
        $_SESSION['message'] = "No se pudo eliminar la tarea.";
        $_SESSION['message_type'] = "danger";
       // die("");
    }else{
        $_SESSION['message'] = "Tarea eliminada correctamente.";
        $_SESSION['message_type'] = "danger"; //success
        header("Location: index.php");
    }

}

?>