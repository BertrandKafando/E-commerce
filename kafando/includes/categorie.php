<h4 text-align="center"> CATEGORY </h4>
    <ul class="list-group">
        <?php 
        $i=0;
            try{
                $stmt = $pdo->prepare("SELECT * FROM category LIMIT 100");
                $stmt->execute();
                foreach($stmt as $row){
                    $i++;
                echo "
                    <li class='list-group-item d-flex justify-content-between align-items-center'> <a href='category_prod.php?category=".$row['id']." & name=".$row['name']." '>".$row['name']."</a> <span class='badge bg-primary rounded-pill'>".getnum($row['id'])."</span> </li> ";                  
                }
                }
                catch(PDOException $e){
                    echo "There is some problem in connection: " . $e->getMessage();
                }

                //die();
        ?>
    </ul>

