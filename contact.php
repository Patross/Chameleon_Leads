<?php  
    require_once("includes/header.php")
?>
<main>
<?php
    $sql = $conn->query("select * from qa");
    foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $row){
        if(!empty($row['question'])&&!empty($row['answer'])){
            echo'
                <p class="question">Question: '; echo $row["question"];
                echo'</p>
                <p class="answer">Answer: '; echo $row["answer"];
                echo'</p>';
        }
    }
?>
    <form id="qaFrom" action="includes/qa.inc.php" method="POST">
        <input name="question" placeholder="Question" type="text"></input>
        <input type="submit" name="submit"></input>
    </form>
</main>
<?php
    require_once("includes/footer.php")
?>