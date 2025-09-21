<?php
include_once "./utils/render_view.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking Hotel</title>
</head>

<body>
  <div id="wrapper">
    <header></header>
    <nav>
      <ul>
        <li><a href="./">Home</a></li>
        <li><a href="?page=admin">Admin</a></li>
        <li><a href="?page=booking">Booking</a></li>
        <li><a href="?page=hotel">Hotel</a></li>
        <li><a href="?page=room">Room</a></li>
      </ul>
    </nav>
    <main>
      <?php
      switch ($_GET['page'] ?? null) {
        case 'admin':
          view("admin/index");
          break;

        case 'booking':
          view("booking/index");
          break;

        case 'hotel':
          view("hotel/index");
          break;

        case 'room':
          view("room/index");
          break;

        default:
          view("home");
          break;
      }

      ?>
    </main>
  </div>
</body>

</html>