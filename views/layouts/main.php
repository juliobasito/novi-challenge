<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          
          <div class="page-header">
            <h1>My book store <small>A brief exemple to slimframework</small></h1>
          </div>

          <?php if ($flash['success']): ?>
            <p class="alert alert-success">
              <?php echo $flash['success'] ?>
            </p>
          <?php endif ?>

          <?php if ($flash['error']): ?>
            <p class="alert alert-danger">
              <?php echo $flash['error'] ?>
            </p>
          <?php endif ?>

          <?php 
            // my view content will be placed here
            echo $yield 
          ?>
        </div>
      </div>
    </div>
  </body>
</html>