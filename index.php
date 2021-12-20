<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>パスワード・ユーザー名生成アプリ</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
  <?php
      $con = mysql_connect('localhost','g127kato','') or die("接続失敗"); //mysqlに接続
      mysql_select_db('g127kato') or die("選択失敗"); //データベース接続
      mysql_query('SET NAMES utf8', $con);

      $sql1 = 'SELECT * FROM name_top'; //name_topの全属性の単語を取得
      $res = mysql_query($sql1, $con) or die("エラー");
      $i = 0;
      while ($db = mysql_fetch_assoc($res)) {
      $array[$i] = $db['単語'];
      echo '<table border=1 style="background-color: lavender; font-weight: bold;">';
      echo "<tr><td>$i</td><td>$array[$i]</td></tr></table>";
      $i++;
      $json_array = json_encode($array);//javascriptに変換するためにjson形式にする
      }
      mysql_close($con);
    ?>
      <script type="text/javascript">
      var foo = JSON.parse('<?php echo $json_array; ?>');//php->javascript形式で配列に保存する
      </script>
    <div class="container">
      <ul class="menu">
        <li><a href="#" class="active" data-id="about">パスワード詳細設定</a></li>
        <li><a href="#" data-id="service">ユーザ名詳細設定</a></li>
      </ul>
      <section class="content active" id="about">
        <p>パスワード詳細設定</p>
        <div>  
          <label for="text_top">入れたい文字列(先頭)</label>
          <input type="text" id="text_top" onInput="checkForm(this.id)">
        </div>
        <div>
          <label for="text_bottom">入れたい文字列(末尾)</label>
          <input type="text" id="text_bottom" onInput="checkForm(this.id)">
        </div>
        <div>
        <label for="text_length">文字数</label>
        <input type="number" id="text_length" value="1" min="1" max="20">
        </div>
        <div> 
          <div>文字種</div>
          <label><input type="radio" name="text_kind" value="2" checked> ランダム</label>
          <label><input type="radio" name="text_kind" value="1"> 小文字のみ</label>
          <label><input type="radio" name="text_kind" value="0"> 大文字のみ</label>
        </div>
        <div> 
          <div>数字</div>
          <label><input type="radio" name="num_kind" value="1" checked> 数字あり</label>
          <label><input type="radio" name="num_kind" value="0"> 数字無し</label>
        </div>
        <button class="clear_pass" onClick="pass_clear()">
          クリア
        </button>
      </section>
      <section class="content" id="service">
        <p>ユーザ名詳細設定</p>
        <div>  
          <label for="name">入れたい文字列</label>
          <input type="text" id="name">
          <label><input type="radio" name="name_position" checked> 指定なし</label>
          <label><input type="radio" name="name_position"> 先頭</label>
          <label><input type="radio" name="name_position"> 末尾</label>
        </div>
        <div>
          <div class="type">
            <div class="box1"><label><input type="radio" name="name_type" checked>かわいい系</label></div>
            <div class="box2"><label><input type="radio" name="name_type">かっこいい系</label></div>
            <div class="box3"><label><input type="radio" name="name_type">かっこいい系</label></div>
            <div class="box4"><label><input type="radio" name="name_type">指定なし</label></div>
          </div>
        </div>
        <button class="clear_name" onClick="name_clear()">
          クリア
        </button>
      </section>
      <input type="text" id="ans" readonly>
      <button id="generation" onClick="change_button()">生成</button>
    </div>

    <script type="text/javascript" src="js/main.js"></script>
  </body>
</html>
