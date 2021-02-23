
<div class="container">
<div class="card mb-3" style="max-width: 70%; margin-left:200px; margin-top:100px;">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
      <h3 style="margin-top: 10px; margin-left:200px; margin-bottom: 5px;">post: <?= $news['id']?></h3>
        <h5 class="card-title">Title: <?= $news['title']?></h5>
        <p class="card-text">Body:  <?= $news['body']?></p>
      </div>
    </div>
  </div>
</div>
<button class="btn btn-info" style="margin-left:200px;"><a href="<?= site_url('/dashboard') ?>" style="color: white">Go back</a></button>
</div>
