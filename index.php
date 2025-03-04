<?php
    require_once 'header.php';
    require_once 'footer.php';
    require_once 'table.php';
    ?>

<h2 id="table-title">Табличка</h2>
<table class="table">
  <thead>
    <tr class="table-primary">
      <th scope="col">#</th>
      <th scope="col">Имя</th>
      <th scope="col">Предмет</th>
      <th scope="col">Оценка</th>
    </tr>
    </thead>
    <tbody>
      <?php
      $index = 1;
        foreach ($scores as $score) {
          echo "<tr>";
          echo "<th scope='row'>{$index}</th>";
          echo "<td>" . htmlspecialchars($score['student']) . "</td>";
          echo "<td>" . htmlspecialchars($score['subject']) . "</td>";
          echo "<td>" . htmlspecialchars($score['total']) . "</td>";
          echo "</tr>";
          $index++;
        }
        ?>
        </tbody>
        </table>
