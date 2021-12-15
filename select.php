<?php
    $con = mysql_connect('localhost','アカウント','') or die("接続失敗"); //mysqlに接続
    mysql_select_db('データベース名') or die("選択失敗"); //データベースを選択
    mysql_query('SET NAMES utf8', $con);

    $sql1 = "SELECT 単語 FROM name_top"; //name_topの全属性の単語を取得
    $sth1 = $pdo1 -> query($sql1);
    $aryList1 = $sth1 -> fetchAll(PDO::FETCH_COLUMN);

    $sql2 = "SELECT 単語 FROM name_top WHERE 属性 = アクション"; //name_topのアクション系の単語を取得
    $sth2 = $pdo2 -> query($sql2);
    $aryList2 = $sth2 -> fetchAll(PDO::FETCH_COLUMN);

    $sql3 = "SELECT 単語 FROM name_top WHERE 属性 = ファンタジー"; //name_topのファンタジー系の単語を取得
    $sth3 = $pdo3 -> query($sql3);
    $aryList3 = $sth3 -> fetchAll(PDO::FETCH_COLUMN);

    $sql4 = "SELECT 単語 FROM name_top WHERE 属性 = コメディ"; //name_topのコメディ系の単語を取得
    $sth4 = $pdo4 -> query($sql4);
    $aryList4 = $sth4 -> fetchAll(PDO::FETCH_COLUMN);

    $sql5 = "SELECT 単語 FROM name_top WHERE 属性 = 日常"; //name_topの日常系の単語を取得
    $sth5 = $pdo5 -> query($sql5);
    $aryList5 = $sth5 -> fetchAll(PDO::FETCH_COLUMN);

    $sql6 = "SELECT 単語 FROM name_bottom"; //name_bottomから単語を取得
    $sth6 = $pdo6 -> query($sql6);
    $aryList6 = $sth6 -> fetchAll(PDO::FETCH_COLUMN);
        
    mysql_close($con);
?>





