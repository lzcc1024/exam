<?php

$config = [
    "dbms" => "mysql",
    "host" => '127.0.0.1',
    "port" => 3308,
    "dbname" => "exam",
    "charset" => "utf8mb4",
    "username" => "root",
    "password" => "123456"
];

$dsn =  sprintf("%s:host=%s;port=%d;dbname=%s;charset=%s",$config['dbms'],$config['host'],$config['port'],$config['dbname'],$config['charset']);

$options = [
    \PDO::ATTR_STRINGIFY_FETCHES => false,
    \PDO::ATTR_EMULATE_PREPARES  => false,
    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
];

$pdo = null;
try {

    $pdo = new \PDO($dsn, $config['username'], $config['password'], $options);
    
    $sql = "SELECT * FROM `choice` WHERE `subject` = 1 ORDER BY RAND() LIMIT 100;";
    $list = $pdo->query($sql)->fetchAll(\PDO::FETCH_ASSOC);

} catch (\PDOException $e) {
    throw new Exception($e->getMessage());
} catch (\Throwable $t) {
    throw new Exception($t->getMessage());
} finally {
    if(isset($pdo)) {
        $pdo = null;
    }
}
?>


<!DOCTYPE html>
<html lang="zh-Hans">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <title>Exam</title>

    <style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        background-color: #fff;
        min-height: 100vh;
    }

    .container {
        width: 100%;
        box-sizing: border-box;
        padding: 0.5rem 0.5rem 3rem;
    }

    .list-wrapper .item {
        border-bottom: 1px dotted #ccc;
        box-sizing: border-box;
        padding: 1rem 0;
        letter-spacing: 0.5px;
        color: #333;
    }

    .list-wrapper .item .question {
        font-size: 0.9rem;
        color: #222;
        overflow: hidden;
        word-wrap: break-word;
    }

    .list-wrapper .item .question .row-no {
        color: #111;
        margin-right: 1px;
    }

    .list-wrapper .item .answer {
        margin-top: 1rem;
        font-size: 0.8rem;
    }


    .list-wrapper .item .answer>div {
        margin-top: 0.5rem;
    }

    .list-wrapper .item .answer label {
        position: relative;
        display: flex;
        flex-direction: row;
        justify-content: start;
        align-items: start;
    }

    .list-wrapper .item .answer label span {
        display: inline-block;
        margin-left: 1.5rem;
        line-height: 1.5;
    }

    .list-wrapper .item .answer input[type=radio].hidden {
        visibility: hidden;
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
    }

    .list-wrapper .item .answer input[type=radio]::before {
        content: " ";
        visibility: visible;
        display: inline-block;
        height: 1rem;
        width: 1rem;
        border-radius: 4px;
        background-color: rgba(0, 0, 0, 0.2);
    }

    .list-wrapper .item .answer input[type=radio]:checked::before {
        background-color: rgba(0, 120, 255, 0.9);
    }

    .button-wrapper {
        margin-top: 2rem;
    }

    .button-wrapper button {
        width: 100%;
        height: 2.5rem;
        background-color: rgba(0, 120, 255, 1);
        color: #fff;
        letter-spacing: 1px;
        outline: none;
        border: none;
        border-radius: 5px;
        display: none;
    }

    .result-wrapper {
        margin-top: 2rem;
        display: none;
    }
    </style>

</head>



<body>
    <?php if(isset($list) && !empty($list)):?>
    <div class="container">
        <div class="list-wrapper" id="question-list">

            <?php foreach($list as $index => $item):?>
            <div class="item">
                <div class="question">
                    <span class="row-no"><?=$index+1?>、</span><?=$item['question']?>
                </div>
                <div class="answer">
                    <?php if(!empty($item['option_1'])):?>
                    <div>
                        <label class="<?= 1 == $item['answer'] ? "right-answer" : ''?>">
                            <input type="radio" class="hidden" name="question<?=$index?>"
                                value="<?= 1 == $item['answer'] ? 1 : 0?>" data-index="<?=$index?>" />
                            <span>A. <?=$item['option_1']?></span>
                        </label>
                    </div>
                    <?php endif;?>

                    <?php if(!empty($item['option_2'])):?>
                    <div>
                        <label class="<?= 2 == $item['answer'] ? "right-answer" : ''?>">
                            <input type="radio" class="hidden" name="question<?=$index?>"
                                value="<?= 2 == $item['answer'] ? 1 : 0?>" data-index="<?=$index?>" />
                            <span>B. <?=$item['option_2']?></span>
                        </label>
                    </div>
                    <?php endif;?>

                    <?php if(!empty($item['option_3'])):?>
                    <div>
                        <label class="<?= 3 == $item['answer'] ? "right-answer" : ''?>">
                            <input type="radio" class="hidden" name="question<?=$index?>"
                                value="<?= 3 == $item['answer'] ? 1 : 0?>" data-index="<?=$index?>" />
                            <span>C. <?=$item['option_3']?></span>
                        </label>
                    </div>
                    <?php endif;?>

                    <?php if(!empty($item['option_4'])):?>
                    <div>
                        <label class="<?= 4 == $item['answer'] ? "right-answer" : ''?>">
                            <input type="radio" class="hidden" name="question<?=$index?>"
                                value="<?= 4 == $item['answer'] ? 1 : 0?>" data-index="<?=$index?>" />
                            <span>D. <?=$item['option_4']?></span>
                        </label>
                    </div>
                    <?php endif;?>

                    <?php if(!empty($item['option_5'])):?>
                    <div>
                        <label class="<?= 5 == $item['answer'] ? "right-answer" : ''?>">
                            <input type="radio" class="hidden" name="question<?=$index?>"
                                value="<?= 5 == $item['answer'] ? 1 : 0?>" data-index="<?=$index?>" />
                            <span>E. <?=$item['option_5']?></span>
                        </label>
                    </div>
                    <?php endif;?>

                    <?php if(!empty($item['option_6'])):?>
                    <div>
                        <label class="<?= 6 == $item['answer'] ? "right-answer" : ''?>">
                            <input type="radio" class="hidden" name="question<?=$index?>"
                                value="<?= 6 == $item['answer'] ? 1 : 0?>" data-index="<?=$index?>" />
                            <span>F. <?=$item['option_6']?></span>
                        </label>
                    </div>
                    <?php endif;?>

                </div>
            </div>
            <?php endforeach;?>

        </div>
        <div class="button-wrapper">
            <button id="submit-button">Submit</button>
        </div>
        <div class="result-wrapper">
            <div class="right">Right: <span id="right-count">0</span></div>
            <div class="wrong">Wrong: <span id="wrong-count">0</span></div>
        </div>
    </div>

    <script>
    window.onload = function() {
        const item = document.querySelectorAll('.item')
        const submitButton = document.getElementById('submit-button');
        const rightCountElement = document.getElementById('right-count');
        const wrongCountElement = document.getElementById('wrong-count');

        var results = [];
        var complete = {};
        document.getElementById("question-list").addEventListener("click", function(e) {
            if (e.target.tagName == "INPUT") {
                // e.target.name
                // e.target.value
                // e.target.getAttribute("data-index")

                results[e.target.getAttribute("data-index")] = e.target.value
                complete[e.target.name] = e.target.value
                if (Object.getOwnPropertyNames(complete).length == item.length) {
                    submitButton.style.display = "block";
                }
            }
        })

        submitButton.addEventListener('click', function() {
            document.querySelectorAll('input').forEach((e) => {
                e.setAttribute('disabled', 'disabled');
            })

            let rightCount = 0;
            let wrongCount = 0;
            results.forEach((val, index) => {
                if (val === '1') {
                    rightCount++;
                } else {
                    wrongCount++;

                    item[index].querySelector(".question").style.color = "#f00";
                    item[index].querySelector('.right-answer').style.color = "#0f0";
                }
            })
            document.querySelector('.result-wrapper').style.display = "block";
            rightCountElement.innerHTML = rightCount
            wrongCountElement.innerHTML = wrongCount
        })

    }
    </script>
    <?php else:?>
    <div style="width: 100%;text-align:center;padding-top:3rem">￥）（￥</div>
    <?php endif;?>
</body>

</html>