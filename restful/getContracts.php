<?php


if(isset($_GET['clientId'])){

        $clientId=$_GET['clientId'];
        include '../conn.php';
         $qry="select * from contracts;";
                                if ($result = $con->query($qry)) {


    /* fetch object array */
                                    ?>

<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>

                        <option value=" " >View Contracts</option>
      <?php
    while ($row = $result->fetch_assoc()) {
                    ?>

                    <option value="<?php echo $row['id']; ?>" ><?php echo $row['contractsNum']; ?>
                        </option>


               <?php
    }
    ?>

<?php
}else{
    echo ' <option value=" " >No contractss Left for allocation</option>        ';
}
}
               ?>




<!-- <?php



if(isset($_GET['contractId'])){

        $contractId=$_GET['contractId'];
        include '../conn.php';
         $qry="select * from contracts where contractId=$contractId";
                      if ($result = $con->query($qry)) {
                                    $sql = "select * from `contracts;";
                      $result=mysqli_query($con,$sql);

                      ?>
<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>

                        <option value=" ">Contract View</option>
      <?php
    while ($row = $result->fetch_assoc()) {
                    ?>

                    <option value="<?php echo $row['id']; ?>" ><?php echo $row['id']; ?>
                        <option value="<?php echo $row['id']; ?>" ><?php echo $row['contractValue']; ?>
                            <option value="<?php echo $row['id']; ?>" ><?php echo $row['contractId']; ?>
                                <option value="<?php echo $row['id']; ?>" ><?php echo $row['description']; ?>
                                  <option value="<?php echo $row['id']; ?>" ><?php echo $row['hitmanId']; ?>
                        </option>


               <?php
}
    ?>
    <?php


}else{
        echo ' <option value=" " >No Contracts Available</option>        ';
    }
    }
                   ?> -->
