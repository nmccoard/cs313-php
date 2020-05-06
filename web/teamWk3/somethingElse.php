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
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <title>Group 1's Form</title>
</head>

<body>
  <h1>Random Form</h1>
  <h3>You will fill out the form</h3>
  <h4>or else</h4>

  <form action='something.php' method='post'>

    <!-- Name -->
    <div class="form-group">
      <label for="nameInput">Name</label>
      <input type="text" class="form-control" id="nameInput" name='name' placeholder="Darth Vader">
    </div>

    <!-- Email -->
    <div class="form-group">
      <label for="emailInput">Email address</label>
      <input type="email" class="form-control" id="emailInput" name='email'>
    </div>

    <!-- Major Radio Buttons -->
    <?php
        foreach($majors as $key => $major) : ?>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="major" id="major<?php echo $key; ?>" value="<?php echo $key; ?>">
                <label class="form-check-label" for="major<?php echo $key; ?>">
                <?php echo $major; ?>
                </label>
            </div>
    <?php endforeach;?>
    <!-- Continents -->
    <?php
        foreach($continents as $key => $continent): ?>    
            <div class="checkbox">
                <input class="form-check-input" type="checkbox" name="continents[]" id="continent<?php echo $key;?>" value="<?php echo $key;?>">
                <label class="form-check-label" for="continent<?php echo $key;?>"> 
                <?php echo $continent;?>
                </label>
            </div>
        
    <?php
    endforeach;
    ?>
    <!-- Comments Text Area -->
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Comments</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>



  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>