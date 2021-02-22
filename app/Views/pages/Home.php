<section>
<div class="container">


<h3 class="text-center">recent posts</h3>
<?php if($news): ?>
  <?php foreach ($news as $newsItem):?>
      <div class="card mb-3" style="max-width: 70%; margin-left:200px; margin-top:100px;">
        <div class="row g-0">
          <div class="col-md-4">
      <img src="<?php echo base_url('https://introvertdear.com/wp-content/uploads/2019/07/why-INFJs-should-start-a-blog-770x470.jpg'); ?>"  width="250" height="" alt="...">
    </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?php echo $newsItem['title']?></h5>
              <p class="card-text"><?php echo $newsItem['body'];?></p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
      </div>


    <?php endforeach; ?>
  <?php else: ?>
    <h3>no post found</h3>
  <?php endif ?>

    <?php


//print_r($news)
  ?>

</div>


</div>

</section>
