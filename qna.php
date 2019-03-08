<?php  
    require_once("includes/header.php")
?>
<main>
<?php
    $sql = $conn->query("select * from qa");
    foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $row){
        if(!empty($_SESSION['u_email'])){
            if($_SESSION['u_email']=="admin@admin.admin"){
                if(!empty($row['question'])){
                    echo'
                    <p class="question">Question: '.$row["question"].'</p>
                    <form action="includes/editqa.inc.php" method="POST">
                        <input class="hidden" type="text" name="question" value="'.$row["question"].'"></input>
                        <p class="txtAnswer">Answer</p>
                        <input class="answer" type="text" value="'.$row["answer"].'" name="answer"></input>
                        <input type="submit" name="submit" class="editAnswer" value="Edit Answer"></input>
                    </form>
                    <form action="includes/removeqa.inc.php" method="POST">
                        <input class="hidden" type="text" name="question" value="'.$row["question"].'"></input>
                        <input type="submit" name="submit" class="questionRemove" value="Remove Question"></input>
                    </form>
                    <p class="user">';
                    $query = $conn->query("SELECT first_name FROM users where id = {$row['user_id']}");
                    $result = $query->fetch(PDO::FETCH_ASSOC);

                    echo $result["first_name"].'</p>';
                }
            }else if(!empty($row['question'])&&!empty($row['answer'])){
                echo'
                <p class="question">Question: '.$row["question"].'</p>
                <p class="answer">Answer: '.$row["answer"].'</p>
                <p class="user">';
                $query = $conn->query("SELECT first_name FROM users where id = {$row['user_id']}");
                
                $result = $query->fetch(PDO::FETCH_ASSOC);
                
                echo $result["first_name"].'</p>';
            }
    }else if(!empty($row['question'])&&!empty($row['answer'])){
        echo'
            <p class="question">Question: '.$row["question"].'</p>
            <p class="answer">Answer: '.$row["answer"].'</p>
            <p class="user">';
            $query = $conn->query("SELECT first_name FROM users where id = {$row['user_id']}");
            
            $result = $query->fetch(PDO::FETCH_ASSOC);
            
            echo $result["first_name"];
    }
}
?>
    <?php if(!empty($_SESSION['u_email']) && $_SESSION['u_email']!="admin@admin.admin"):?>

                <form id="formAddQuestion" action="includes/qa.inc.php" method="POST">
                    <textarea placeholder="Question" id="formQuestion" name="question"  rows="10" coloumns="50" form="formAddQuestion"></textarea>
                    <input class="formItem" id="formQuestionSub" type="submit" name="submit" class="addQuestion"></input>
                </form>

                <!-- <form id="formSendEmail" action="includes/sendEmail.inc.php" method="POST">
                    <input type="text" name="subject" placeholder="subject">
                    <input type="text" name="message" placeholder="message">
                    <input type="submit" name="submit">
                </form> -->
    <?php endif; ?>
<?php
    require_once("includes/footer.php")
?>