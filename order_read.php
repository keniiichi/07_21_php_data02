<?php




// DB接続情報
$dbn = 'mysql:dbname=gsaf_d07_21;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = ''; // （空文字）


// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}
// 「dbError:...」が表示されたらdb接続でエラーが発生していることがわかる．

//参照はSELECT文
$sql = 'SELECT * FROM order_table';
$stmt = $pdo->prepare($sql);
//実行
$status = $stmt->execute();
// $statusにSQLの実行結果が入る（取得したデータではない点に注意）

if ($status == false) {
  $error = $stmt->errorInfo();
  exit('sqlError:' . $error[2]);  //失敗時はエラー出力

} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  //fetchALL()で全部取れる　あとは配列の処理
  $output = "";
  foreach ($result as $record) {
    $output .= "<tr>";
    $output .= "<td>{$record["purchase_order_date"]}</td>";
    $output .= "<td>{$record["order_target"]}</td>";
    $output .= "<td>{$record["product_name"]}</td>";
    $output .= "<td>{$record["total_amount_including_tax"]}</td>";
    $output .= "<td>{$record["desired_delivery_date"]}</td>";
    $output .= "<td>{$record["order_responsible"]}</td>";
    $output .= "<td>{$record["order_status"]}</td>";
    $output .= "</tr>";
  }
}


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>注文リスト（一覧画面）</title>
</head>

<body>
  <fieldset>
    <legend>注文リス（一覧画面）</legend>
    <a href="order_input.php">入力画面</a>
    <table>
      <thead>
        <tr>
          <th>発注日</th>
          <th>発注先</th>
          <th>商品名</th>
          <th>合計発注額</th>
          <th>希望納期</th>
          <th>発注担当</th>
          <th>ステータス</th>
        </tr>
      </thead>
      <tbody>
        <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>