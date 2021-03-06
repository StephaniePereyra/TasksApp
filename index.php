<?php include("db.php") ?>
<?php include("includes/header.php") ?>
<?php include("includes/navigation.php") ?>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4" > 

                <?php 
                    if(ISSET($_SESSION['message'])){?>
                        <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                        
                        <?= $_SESSION['message'] ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                <?php SESSION_UNSET(); } ?>

                <div class="card card-body">
                    <form action="save_task.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control"
                            placeholder="Título de la tarea" autofocus> 

                        </div>
                        <div class="form-group">
                        <textarea name="description" id="description"  rows="2" class="form-control" 
                        placeholder="Descripción de la tarea"></textarea>
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="save_task" value="Save Task">
                    </form>
                </div>


            </div>
            <div class="col-md-8">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        Id Tarea
                                    </th>
                                    <th>
                                        Título tarea
                                    </th>
                                    <th>
                                        Descripción de la tarea
                                    </th>
                                    <th>
                                        Fecha creación
                                    </th>
                                    <th>
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php 
                                        $query = "SELECT * FROM task";
                                        $result_tasks = mysqli_query($conn, $query);

                                        while($row = mysqli_fetch_array($result_tasks)){ ?>
                                            <tr>
                                                 <td> <?php echo $row['id'] ?>   </td>
                                                 <td> <?php echo $row['title'] ?>   </td>
                                                 <td> <?php echo $row['description'] ?>   </td>
                                                 <td> <?php echo $row['created_at'] ?>   </td>
                                                 <td>   
                                                    <a href="edit.php?id=<?= $row['id']?>"
                                                        class="btn btn-secondary"
                                                    >
                                                    <i class="fas fa-marker"></i>
                                                    </a>
                                                    <a href="delete_task.php?id=<?= $row['id']?>"
                                                        class="btn btn-danger"
                                                    >
                                                    <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>    
                                    <?php   
                                          //  mysqli_free_result($result);
                                          //  mysqli_close($conn);
                                    } ?>
                            </tbody>
                        </table>
            </div>
        </div>
    </div>


<?php include("includes/footer.php") ?>