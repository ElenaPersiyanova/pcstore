<!-- Страница оформления заказа -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Оформление заказа</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.html">
        <img src="img/logo.png" width="50%" height="50%" class="d-inline-block align-top" alt="Логотип" ">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.html">Главная</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="order.php">Оформление заказа</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.html">О нас</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contacts.html">Контакты</a>
            </li>
        </ul>
    </div>
</nav>
  </header>

  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="form-section">
          <h3>Оформление заказа</h3>
          <form action="index.html" method="POST">
            <div class="form-group">
              <label for="product">Выберите товар:</label>
              <select class="form-control" id="product" name="product">
                <option value="Товар 1">Процессор Intel Core i5-12400F OEM</option>
                <option value="Товар 2">Видеокарта Palit GeForce GTX 1660 SUPER GamingPro</option>
                <option value="Товар 3">Материнская плата GIGABYTE B550 AORUS ELITE V2</option>
              </select>
            </div>
            <div class="form-group">
              <label for="fullname">ФамилияИмяОтчество:</label>
              <input type="text" class="form-control" id="fullname" name="fullname" required>
            </div>
            <div class="form-group">
              <label for="address">Адрес клиента:</label>
              <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="form-group">
              <label for="date">Дата оформления заказа:</label>
              <input type="text" class="form-control" id="date" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly>
            </div>
            <div class="form-group">
              <label for="quantity">Количество товара:</label>
              <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
            </div>
            <div class="form-group">
              <label for="price">Цена за единицу товара:</label>
              <input type="text" class="form-control" id="price" name="price" value="" readonly>
            </div>
            <div class="form-group">
              <label for="total">Общая цена:</label>
              <input type="text" class="form-control" id="total" name="total" value="" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Оформить заказ</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer py-3 bg-dark text-light text-center" >
    <div class="container">
      <p>&copy; Интернет-магазин PC STORE. Сделала студентка Елена Персиянова.</p>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  <script>
    $(document).ready(function() {
      var productPrice = {
        "Товар 1": 2549,
        "Товар 2": 23425,
        "Товар 3": 7890
      };

      $('#product').change(function() {
        var selectedProduct = $('#product').val();
        $('#price').val('₽' + productPrice[selectedProduct]);

        calculateTotal();
      });

      $('#quantity').change(function() {
        calculateTotal();
      });

      function calculateTotal() {
        var selectedProduct = $('#product').val();
        var price = productPrice[selectedProduct];
        var quantity = parseFloat($('#quantity').val());
        var total = price * quantity;

        if (quantity > 1) {
          var discountedPrice = price - (price * 0.1);
          $('#total').val(discountedPrice * quantity + '₽');
          $('#price').val(price + '<span class="old-price">' + discountedPrice + '</span>'+ '₽');
        } else {
          $('#total').val(total + '₽');
          $('#price').val(price + '₽');
        }
      }
    });
  </script>
</body>
</html>