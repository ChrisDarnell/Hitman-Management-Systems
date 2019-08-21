<?php


if(isset($_GET['contractId'])){

        $contractValue=$_GET['contractId'];
        include '../conn.php';
         $qry="select * from contracts where contractId=$contractId;";
                                if ($result = $con->query($qry)) {


    /* fetch object array */
                                    ?>

<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>

                        <option value=" " >Select Contract</option>
      <?php
    while ($row = $result->fetch_assoc()) {
                    ?>

                    <option value="<?php echo $row['id']; ?>" ><?php echo $row['contractId']; ?>
                        </option>


               <?php
    }
    ?>

<?php
}else{
    echo ' <option value=" " >No Contracts Available</option>        ';
}
}
               ?>
