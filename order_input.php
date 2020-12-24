<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>注文リスト（入力画面）</title>
</head>

<body>
  <!-- 送信側の処理 -->
  <form action="order_create.php" method="POST">
    <fieldset>
      <legend>注文リスト（入力画面）</legend>
      <a href="order_read.php">一覧画面</a>

      <div>
        発注日: <input type="date" name="purchase_order_date">
      </div>
      <div>
        発注先: <input type="text" name="order_target">
      </div>
      <div>
        商品名: <input type="text" name="product_name">
      </div>
      <div>
        合計発注額: <input type="text" name="total_amount_including_tax">
      </div>
      <div>
        希望納期: <input type="date" name="desired_delivery_date">
      </div>
      <div>
        発注担当: <input type="text" name="order_responsible">
      </div>
      <div>
        ステータス: <input type="text" name="order_status">
      </div>
      <div>
        <button>注文する</button>
      </div>
    </fieldset>
  </form>

</body>

</html>