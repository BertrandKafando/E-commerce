
<div>
<h4> CATEGORY </h4>
<ul class="list-group">
<?php
            try{
                $stmt = $pdo->prepare("SELECT * FROM category");
                $stmt->execute();
                foreach($stmt as $row){
                echo "
                    <li>
                    <li class='list-group-item d-flex justify-content-between align-items-center'>
                    <a href='category.php?category=".$row['id']."'>".$row['name']."</a>
                   <span class='badge bg-primary rounded-pill'>14</span>
                    </li>
                ";                  
                }
            }
            catch(PDOException $e){
                echo "There is some problem in connection: " . $e->getMessage();
            }

            die();
        ?>
    </ul>



</div>