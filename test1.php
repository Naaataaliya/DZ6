<?php
session_start();
//var_dump($_SESSION["user"]);
error_reporting(E_ALL);
ini_set("display_errors", 1);
$test1Array=[];
$test2Array=[];
$test3Array=[];
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<h1><?php echo $_SESSION["user"] ?>, выбери один ответ на вопрос</h1>

<?php
if (isset($_GET["mytest"]) && !empty($_GET["mytest"]))
{
    $testNumber=$_GET["mytest"];

    if ($testNumber==="1")
    {
        $test1Content=file_get_contents("./uploaded/test1.json");
        $test1Array=json_decode($test1Content, true);

        ?>
        <form action="test1.php?mytest=1" enctype="multipart/form-data" method="POST">
            <p><label><strong><?php echo $test1Array["TEST1_QUESTION"]?></strong></label></p>
            <p><input type="radio" name="answer" value="a1"><?php echo $test1Array["TEST1_ANSWER_1"]?></p>
            <p><input type="radio" name="answer" value="a2"><?php echo $test1Array["TEST1_ANSWER_2"]?></p>
            <p><input type="radio" name="answer" value="a3"><?php echo $test1Array["TEST1_ANSWER_3"]?></p>
            <p><input type="submit" name="CheckTest" value="Проверить" title="Проверить"></p>
        </form>
        <?php
        if (empty($_POST["answer"]))
        {
            echo "<pre>";
            print_r(" Выбери один из вариантов ответа!");
            echo "</pre>";
        }
        if (!empty($_POST["answer"]) && $_POST["answer"]==="a3")
        {
            echo "В точку!";?>
            <form enctype="multipart/form-data" method="GET">
                <p><input type="submit" formaction="list1.php" name="ShowTestList" value="Мне понравилось! Хочу еще тест!" title="Мне понравилось! Хочу еще тест!"></p>
            </form>
            <form>
                <p><input type="submit" formaction="certificate.php" name="GiveCertificate" value="Получить сертификат" title="Получить"></p>
            </form>
            <?php
        }
        if (!empty($_POST["answer"]) && $_POST["answer"]!="a3")
        {
            echo "Неверный ответ!";
        }
        else
        {

        }
    }

    elseif ($testNumber==="2")
    {

        $test2Content=file_get_contents("./uploaded/test2.json");
        $test2Array=json_decode($test2Content, true);
        ?>
        <form action="test1.php?mytest=2" enctype="multipart/form-data" method="POST">
            <p><label><strong><?php echo $test2Array["TEST2_QUESTION"]?></strong></label></p>
            <p><input id="t2a1" type="radio" name="answer" value="a1"><?php echo $test2Array["TEST2_ANSWER_1"]?></p>
            <p><input id="t2a2" type="radio" name="answer" value="a2"><?php echo $test2Array["TEST2_ANSWER_2"]?></p>
            <p><input id="t2a3" type="radio" name="answer" value="a3"><?php echo $test2Array["TEST2_ANSWER_3"]?></p>
            <p><input type="submit" name="CheckTest" value="Проверить" title="Проверить"></p>
        </form>
        <?php
        if (empty($_POST["answer"]))
        {
            echo "<pre>";
            print_r("Выбери один из вариантов ответа!");
            echo "</pre>";
        }

        if (!empty($_POST["answer"]) && $_POST["answer"]==="a2")
        {
            echo "Верно!";?>
            <form>
                <p><input type="submit" formaction="list1.php" name="ShowTestList" value="Мне понравилось! Хочу еще тест!" title="Мне понравилось! Хочу еще тест!"></p>
                <p><input type="submit" formaction="certificate.php" name="GiveCertificate" value="Получить сертификат" title="Получить"></p>
            </form>
            <?php
        }

        if (!empty($_POST["answer"]) && $_POST["answer"]!="a2")
        {
            echo "Неверный ответ!";
        }
        else
        {

        }
    }

    elseif ($testNumber==="3")
    {

        $test3Content=file_get_contents("./uploaded/test3.json");
        $test3Array=json_decode($test3Content, true);
        ?>
        <form action="test1.php?mytest=3" enctype="multipart/form-data" method="POST">
            <p><label><strong><?php echo $test3Array["TEST3_QUESTION"]?></strong></label></p>
            <p><input id="choice" type="radio" name="answer" value="a1"><?php echo $test3Array["TEST3_ANSWER_1"]?></p>
            <p><input id="choice" type="radio" name="answer" value="a2"><?php echo $test3Array["TEST3_ANSWER_2"]?></p>
            <p><input id="choice" type="radio" name="answer" value="a3"><?php echo $test3Array["TEST3_ANSWER_3"]?></p>
            <p><input id="choice" type="submit" name="CheckTest" value="Проверить" title="Проверить"></p>
        </form>
        <?php

        if (empty($_POST["answer"]))
        {
            echo "<pre>";
            print_r("Выбери один из вариантов ответа!");
            echo "</pre>";
        }
        if (!empty($_POST["answer"]) && $_POST['answer']==="a1")
        {
            echo "В точку!";?>
            <form >
                <p><input type="submit" formaction="list1.php" name="ShowTestList" value="Мне понравилось! Хочу еще тест!" title="Мне понравилось! Хочу еще тест!"></p>
                <p><input type="submit" formaction="certificate.php" name="GiveCertificate" value="Получить сертификат" title="Получить"></p>
            </form> <?php
        }

        if (!empty($_POST["answer"]) && $_POST["answer"]!="a1")
        {
            echo "Неверный ответ!";
        }
        else
        {
        }

    }
    else
    {
        http_response_code(404);
    }
}
else
{
    echo "Вы не выбрали тест";
}
?>
</body>
</html>