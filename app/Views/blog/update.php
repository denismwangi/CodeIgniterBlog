<div class="container">
  <h2>Update post</h2>

  <form action="/blog/edit" method="post">
    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Title:</label>
  <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder=" Enter title">
  <span class="text-danger"><?= isset($validation) ? display_error($validation, 'title') : ''?> </span>
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Body:</label>
  <textarea class="form-control" id="body" rows="3" placeholder="Body" name="body" ></textarea>
  <span class="text-danger"><?= isset($validation) ? display_error($validation, 'body') : ''?> </span>
</div>
<div class="mb-3">
<button class="btn btn-primary" type="submit">update</button>
</div>
  </form>

</div>
