<?php 

include("db.php");

if(ISSET($_GET['id'])){

    $id = $_GET['id'];
    $query = "SELECT * FROM task where id = $id";
    $resultadoQuery = mysqli_query($conn, $query);

    if(mysqli_num_rows($resultadoQuery) > 0){

      // echo "Puedes editar la tarea";
      $row = mysqli_fetch_array($resultadoQuery);
      $id =  $row['id'];
      $title =  $row['title'];
      $description =  $row['description'];
      //echo $title . "<br>";
    }
     
}

if(ISSET($_POST['update'])){

    //echo "Actualizando";
    $id = $_GET['id'];
    $newTitle = $_POST['title'];
    $newDescription = $_POST['description'];

    echo $id . "<br>";
    echo $newTitle . "<br>";
    echo $newDescription . "<br>";

    $query = "UPDATE task SET title= '$newTitle', description='$newDescription' WHERE id=$id";
    $resultUpdate = mysqli_query($conn,$query);

    if(!$resultUpdate){
        $_SESSION['message'] = "No se pudo actualizar la tarea.";
        $_SESSION['message_type'] = "danger";
       // die("");
    }else{
        $_SESSION['message'] = "Tarea actualizada correctamente.";
        $_SESSION['message_type'] = "warning"; //success
        header("Location: index.php");
    }

}
?>

<?php  include("includes/header.php") ?>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="edit.php?id=<?php echo $ $_GET['id'];?>" method="POST">
                        <div class="form-group">
                            <input type="text" name="title" value="<?php echo $title;?>"
                            class="form-control" placeholder="Actualiza el titulo"                            >
                        </div>
                        <div class="form-group">
                            <textarea name="description"  rows="2" class="form-control" placeholder="Actualizar la descripcion"><?php echo $description;?></textarea>
                        </div>
                        <button type="submit" class="btn btn-success" name="update">Editar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php  include("includes/footer.php") ?>