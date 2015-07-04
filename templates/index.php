<?php
    include'quiz/header.php';
?>
    <div class="container quiz">
        <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">
          <div class="jumbotron">
            <h1>DDHQ</h1>
          </div>
          <p><a href="<?php echo $root; ?>/dynamicquiz/start">Give me a quiz based on me</a></p>
        </div><!--/span-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="sidebar-nav">
              <h4>Stock Quizzes</h4>
              <div class="list-group">
              <?php foreach ($quizzes as $quiz) :
                    echo '<a href="'.$root . '/quiz/' . $quiz->id .'" class="list-group-item">';
                    echo '<h4 class="list-group-item-heading">'. $quiz->name . '</h4>';
                    echo '<p class="list-group-item-text">'. $quiz->description . '</p>';
                    echo '</a>';
                endforeach;
                ?>
              </div>
          </div><!--/.sidebar-nav -->
        </div><!--/span-->
      </div><!--/row-->

    </div><!--container-->
<?php include 'quiz/footer.php';
