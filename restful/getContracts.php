<?php



if(isset($_GET['contractNumber'])){

        $contractValue=$_GET['contractNumber'];
        include '../conn.php';
         $qry="select * from contracts where id=$id";
                                if ($result = $con->query($qry)) {
                                    $sql = "select * from `contracts;";
                      $result=mysqli_query($con,$sql);
                      if($result){
                          while($row = $result->fetch_assoc()){


                      ?>


    /* fetch object array */
                                    ?>

<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>

                        <option value=" ">Contract View</option>
      <?php
    while ($row = $result->fetch_assoc()) {
                    ?>

                    <option value="<?php echo $row['id']; ?>" ><?php echo $row['id']; ?>
                        <option value="<?php echo $row['id']; ?>" ><?php echo $row['contractValue']; ?>
                            <option value="<?php echo $row['id']; ?>" ><?php echo $row['contractNumber']; ?>
                                <option value="<?php echo $row['id']; ?>" ><?php echo $row['description']; ?>
                                  <option value="<?php echo $row['id']; ?>" ><?php echo $row['hitmanId']; ?>
                        </option>


               <?php
    }
    ?>

<?php
}else{
    echo ' <option value=" " >No contracts available</option>        ';
}
}
               ?>
