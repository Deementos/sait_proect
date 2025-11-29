<!DOCTYPE html>
<link type="image/png" rel="icon" href="../../icons/iconka1.png">
<link rel="stylesheet" href="reviews_style.css">
<html lang="ru">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<style>
 @font-face {
      font-family: 'Font1';
      src: url('../../fonts/Blazma-Regular.ttf');
    }
</style>
<head>
  <meta charset="UTF-8">
  <title >Отзывы — это здорово!</title>
</head>
<body>
  <header>
     <ul>
  <li><a href="../home/home.html">Главная</a></li>
  <li><a href="../menu/menu.html">Меню</a></li>
  <li>
    <a href="../aboutUs/aboutUs.html" class="link-about-us">О нас</a>
  </li>
  <li><a href="../contacts/contacts.html">Контакты</a></li>
  <li><a href="../reviews/reviews.php">Отзывы</a></li>
</ul>
        <h1 class ="headerH1"> Отзывы - это здорово! </h1>

<label class="cosmic-toggle">
  <input class="toggle" type="checkbox" id = "theme-toggle" />
  <div class="slider">
    <div class="cosmos"></div>
    <div class="energy-line"></div>
    <div class="energy-line"></div>
    <div class="energy-line"></div>
    <div class="toggle-orb">
      <div class="inner-orb"></div>
      <div class="ring"></div>
    </div>
    <div class="particles">
      <div style="--angle: 30deg" class="particle"></div>
      <div style="--angle: 60deg" class="particle"></div>
      <div style="--angle: 90deg" class="particle"></div>
      <div style="--angle: 120deg" class="particle"></div>
      <div style="--angle: 150deg" class="particle"></div>
      <div style="--angle: 180deg" class="particle"></div>
    </div>
  </div>
</label>

  </header>



 <div class = "vse">

  <h1>Оставьте отзыв</h1>

  <!-- Форма отправки -->
  <div class="form">

    <form method="POST">

      <input type="text" name="name" placeholder="Ваше имя" required style = "font-family: 'Font1', sans-serif">
      <textarea name="text" placeholder="Напишите ваш отзыв..." rows="5" required style = "font-family: 'Font1', sans-serif";></textarea>
      <button type="submit" style = "font-family: 'Font1', sans-serif";>Отправить отзыв</button>
  </form>

  </div>

  <!-- Вывод отзывов -->
  <h2>Отзывы пользователей</h2>

  <?php
    $file = 'reviews.txt';

    // Если форма отправлена — сохраняем отзыв
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) && isset($_POST['text'])) {
      $name = trim($_POST['name']);
      $text = trim($_POST['text']);

      // Проверка на пустоту (защита)
      if (!empty($name) && !empty($text)) {
        $date = date('Y-m-d H:i:s');
        $line = $name . '|' . $text . '|' . $date . "\n";
        file_put_contents($file, $line, FILE_APPEND | LOCK_EX);
      }
      header('Location: ' . $_SERVER['PHP_SELF']);
    }

    // Читаем отзывы из файла
    if (file_exists($file)) {
      $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
      if (count($lines) > 0) {
        foreach ($lines as $line) {
          $parts = explode('|', $line, 3); // Разделяем по первым двум |
          if (count($parts) == 3) {
            $name = htmlspecialchars($parts[0]);
            $text = htmlspecialchars($parts[1]);
            $date = $parts[2];
            echo '<div class="review">';
            echo '<div class="review-name">' . $name . '</div>';
            echo '<div class="review-date">' . $date . '</div>';
            echo '<div class="review-text">' . nl2br($text) . '</div>';
            echo '</div>';
          }
        }
      } else {
        echo '<div class="empty">Пока нет отзывов. Оставьте первый!</div>';
      }
    } else {
      echo '<div class="empty">Файл отзывов не найден. Обратитесь к администратору.</div>';
    }
  ?>

<script src="reviews_script.js"></script>
<div class="upbtn">▲</div>

</div>

 <footer class="footer">
  <h2> ©2025 Самая честная компания </h2>
  <a href="https://policies.google.com/privacy?hl=ru&fg=1">Конфиденциальность</a>
         </footer>

</body>

</html>
