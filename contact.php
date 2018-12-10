<?php  
    require_once("includes/header.php")
?>
<main>
<?php
    $sql = $conn->query("select * from qa");
    foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $row){
        if(!empty($_SESSION['u_email'])){
            if($_SESSION['u_email']=="admin@admin.admin"){
                if(!empty($row['question'])&&empty($row['answer'])){
                    echo'
                        <p class="question">Question: '.$row["question"].'</p>
                        <form action="includes/editqa.inc.php" method="POST">
                            <p class="txtAnswer">Answer</p>
                            <input class="answer" type="text" value="'.$row["answer"].'"></input>
                            <input type="submit" name="submit" class="editAnswer" value="Edit Answer"></input>
                        </form>
                        <form action="includes/removeqa.inc.php">
                            <input type="submit" name="submit" class="questionRemove" value="Remove Question"></input>
                        </form>
                        <p class="user">';
                        $query = $conn->query("SELECT first_name FROM users where id = {$row['user_id']}");
                        $result = $query->fetch(PDO::FETCH_ASSOC);
    
                    echo $result["first_name"];
                }else if(!empty($row['question'])&&!empty($row['answer'])){
                    echo'
                        <p class="question">Question: '.$row["question"].'</p>
                        <form action="includes/editqa.inc.php" method="POST">
                            <p class="txtAnswer">Answer</p>
                            <input class="answer" type="text" value="'.$row["answer"].'"></input>
                            <input type="submit" name="submit" class="editAnswer" value="Edit Answer"></input>
                        </form>
                        <form action="includes/removeqa.inc.php">
                            <input type="submit" name="submit" class="questionRemove" value="Remove Question"></input>
                        </form>
                        <p class="user">';
                        $query = $conn->query("SELECT first_name FROM users where id = {$row['user_id']}");
                        $result = $query->fetch(PDO::FETCH_ASSOC);
    
                    echo $result["first_name"];
                }
            }
            else if($_SESSION['u_email']!="admin@admin.admin"){
                echo'
                    <form id="qaForm" action="includes/qa.inc.php" method="POST">
                        <input name="question" placeholder="Question" type="text"></input>
                        <input type="submit" name="submit"></input>
                    </form>';
            }
            else if(!empty($row['question'])&&!empty($row['answer'])&&$_SESSION['u_email']!="admin@admin.admin"){
                echo'
                    <p class="question">Question: '.$row["question"].'</p>
                    <p class="answer">Answer: '.$row["answer"].'</p>
                    <p class="user">';
                    $query = $conn->query("SELECT first_name FROM users where id = {$row['user_id']}");

                    $result = $query->fetch(PDO::FETCH_ASSOC);

                echo $result["first_name"];
            }
        }
    }
?>

</main>
<?php
    require_once("includes/footer.php")
?>