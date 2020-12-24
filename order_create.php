<?php
//データの受取確認
// var_dump($_POST);
// exit();

//入力チェック（未入力の場合は弾く、commentのみ任意）
if (
  !isset($_POST['order_target']) || $_POST['order_target'] == '' ||
  !isset($_POST['product_name']) || $_POST['product_name'] == '' ||
  !isset($_POST['total_amount_including_tax']) || $_POST['total_amount_including_tax'] == '' ||
  !isset($_POST['desired_delivery_date']) || $_POST['desired_delivery_date'] == ''  ||
  !isset($_POST['order_responsible']) || $_POST['order_responsible'] == ''
  //発注日とステータスは任意に設定
) {
  exit('ParamError');
}
//解説
//ParamError が表示されたた必須データが送られていないことがわかる  

//データの変数に格納
$purchase_order_date = $_POST['purchase_order_date'];
$order_target = $_POST['order_target'];
$product_name = $_POST['product_name'];
$total_amount_including_tax = $_POST['total_amount_including_tax'];
$desired_delivery_date = $_POST['desired_delivery_date'];
$order_responsible = $_POST['order_responsible'];
$order_status = $_POST['order_status'];


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

// SQL作成&実行
$sql = 'INSERT INTO
order_table(purchase_order_id, purchase_order_date, order_target, product_name, total_amount_including_tax, desired_delivery_date, order_responsible, order_status, created_at, updated_at)
VALUES(NULL, :purchase_order_date, :order_target, :product_name, :total_amount_including_tax, :desired_delivery_date, :order_responsible, :order_status, sysdate(), sysdate())';
//変数をバインド変数（:order）に格納
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':purchase_order_date', $purchase_order_date, PDO::PARAM_STR);
$stmt->bindValue(':order_target', $order_target, PDO::PARAM_STR);
$stmt->bindValue(':product_name', $product_name, PDO::PARAM_STR);
$stmt->bindValue(':total_amount_including_tax', $total_amount_including_tax, PDO::PARAM_STR);
$stmt->bindValue(':desired_delivery_date', $desired_delivery_date, PDO::PARAM_STR);
$stmt->bindValue(':order_responsible', $order_responsible, PDO::PARAM_STR);
$stmt->bindValue(':order_status', $order_status, PDO::PARAM_STR);
$status = $stmt->execute(); // SQLを実行


// 失敗時にエラーを出力し，成功時は登録画面に戻る
if ($status == false) {
  $error = $stmt->errorInfo();
  // データ登録失敗次にエラーを表示
  exit('sqlError:' . $error[2]);
} else {
  // 登録ページへ移動
  header('Location:order_input.php');
}
