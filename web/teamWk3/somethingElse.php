<?php






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

  <form>
    <!-- Name -->
    <div class="form-group">
      <label class="sr-only" for="inlineFormInputName">Name</label>
      <input type="text" class="form-control" id="inlineFormInputName" placeholder="Darth Vader">
    </div>

    <!-- Email -->
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <!-- Major Radio Buttons -->
    <div class="form-check">
      <input class="form-check-input" type="radio" name="majorRadios" id="CSradio" value="option1">
      <label class="form-check-label" for="CSradio">
        Computer Science
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="majorRadios" id="WDDradio" value="option2">
      <label class="form-check-label" for="WDDradio">
        Web Design and Development
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="majorRadios" id="CITradio" value="option3">
      <label class="form-check-label" for="CITradio">
        Computer Information Technology
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="majorRadios" id="CEradio" value="option4">
      <label class="form-check-label" for="CEradio">
        Computer Engineering
      </label>
    </div>

    <!-- Countries -->
    <div class="checkbox">
        <label><input type="checkbox" name="countries" value="northAmerica">North America</label>
    </div>
    <div class="checkbox">
        <label><input type="checkbox" name="countries" value="southAmerica">South America</label>
    </div>
    <div class="checkbox">
        <label><input type="checkbox" name="countries" value="europe">Europe</label>
    </div>
    <div class="checkbox">
        <label><input type="checkbox" name="countries" value="asia">Asia</label>
    </div>
    <div class="checkbox">
        <label><input type="checkbox" name="countries" value="australia">Australia</label>
    </div>
    <div class="checkbox">
        <label><input type="checkbox" name="countries" value="africa">Africa</label>
    </div>
    <div class="checkbox">
        <label><input type="checkbox" name="countries" value="antarctica">Antarctica</label>
    </div>
    
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