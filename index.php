<?php
$servername = "localhost";
$username = "root";
$password = "secret";

// create connection
$conn = new mysqli($servername,$username,$password);

// check connection
if ($conn->connect_error) {
  die("No worky " . $conn->connect_error);
} else {
$success = "It worked!";
}
// you can change home to about and it will change to content on screen
$thispagename = $GET["page"] ?? "Home";


?>
<html>
<head></head>
<body>
  <nav>
    <?php
    $sql = "SELECT * FROM test.content";
    $result = $conn->query($sql);
    echo "<ul>";
    while ( $row = $result->fetch_assoc()) {
      echo "<li><a href='index.php?page=" . $row['pagename'] . "'>" . $row['pagename'] . "</a></li>";
    }
    echo "</ul>"

    ?>
  </nav>
  <section>
    <div>
        <?php
          $sql = "SELECT * FROM test.content WHERE pagename =  '$thispagename'";
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();
            echo "<p>" . $row['pagetitle'] . "</p>";
            echo "<p>" . $row['pagename'] . "</p>";
            echo $row['pagecontent'];


        ?>
    </div>
  </section>
</body>
</html>
