<?php



if(isset($_GET['contractNumber'])){

        $contractValue=$_GET['contractNumber'];
        include '../conn.php';
         $qry="select * from contracts where contractNumber=$id";
                                if ($result = $con->query($qry)) {


    /* fetch object array */
                                    ?>

<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>

                        <option value=" ">Select contracts</option>
      <?php
    while ($row = $result->fetch_assoc()) {
                    ?>

                    <option value="<?php echo $row['id']; ?>" ><?php echo $row['contractNumber']; ?>
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
