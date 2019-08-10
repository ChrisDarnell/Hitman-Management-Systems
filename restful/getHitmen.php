<?php



if(isset($_GET['bid'])){

        $bid=$_GET['bid'];
        include '../conn.php';
         $qry="select * from jobInfo where bid=$bid and id Not In(select jobNumber from hitmanInfo);";
                                if ($result = $con->query($qry)) {


    /* fetch object array */
                                    ?>

<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>

                        <option value=" " >Select Hitman</option>
      <?php
    while ($row = $result->fetch_assoc()) {
                    ?>

                    <option value="<?php echo $row['id']; ?>" ><?php echo $row['jobNumber']; ?>
                        </option>


               <?php
    }
    ?>

<?php
}else{
    echo ' <option value=" " >No Jobs Available</option>        ';
}
}
               ?>
