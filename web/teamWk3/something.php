<?php

$majors = [
  'CE' => 'Computer Engineering',
  'CT' => 'Computer Information Technology',
  'CS' => 'Computer Science',
  'WDD' => 'Web Design & Development'
];
$continents = [
  'AR' => 'Africa',
  'AN' => 'Antarctica',
  'AU' => 'Australia',
  'AA' => 'Asia',
  'EU' => 'Europe',
  'NA' => 'North America',
  'SA' => 'South America'
];

//$name = htmlspecialchars($_POST['name']);
$name = ( isset( $_POST['name'] ) ) ? filter_var( $_POST['name'], FILTER_SANITIZE_STRING ) : '';
//$email = htmlspecialchars($_POST['email']);
$email = ( isset( $_POST['email'] ) ) ? filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL ) : '';
$major = (isset($_POST['major']) && in_array($_POST['major'], array_keys($majors))) ? $majors[$_POST['major']] : '';

if (isset($_POST['continents']) && count($_POST['continents']) > 0) {
  $matches = array_intersect_key($continents, array_flip($_POST['continents']));
  $continents = implode(', ', $matches);
} else {
  $continents = '';
}

$comments = (isset($_POST['comments'])) ? filter_var($_POST['comments'], FILTER_SANITIZE_STRING) : '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Submission</title>
</head>

<body>

  <h3>FORM RESULTS </h3>

  <table class="table">
    <tr>
      <td>Name:</td>
      <td><?php echo $name; ?></td>
    </tr>
    <tr>
      <td>Email:</td>
      <td><?php echo $email; ?></td>
    </tr>
    <tr>
      <td>Major:</td>
      <td><?php echo $major; ?></td>
    </tr>
    <tr>
      <td>Continents:</td>
      <td><?php echo $continents; ?></td>
    </tr>
    <tr>
      <td>Comments:</td>
      <td><?php echo $comments; ?></td>
    </tr>
  </table>
</body>

</html>