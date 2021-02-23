<div class="container">
<?= csrf_field(); ?>

        <?php if (!empty(session()->getFlashdata('fail'))): ?> 
        <div class="alert alert-danger" style="margin-top:40px"><?= session()->getFlashdata('fail'); ?></div>
      <?php endif ?>

      <?php if (!empty(session()->getFlashdata('success'))): ?> 
        <div class="alert alert-success" style="margin-top: 40px"><?= session()->getFlashdata('success'); ?></div>
      <?php endif ?>
	<div class="row" style="margin-top: 40px">
			<h4 class="text-center">all the posts</h4>

			<button type="button" class="btn btn-info " type="submit" style="margin-left: 600px; margin-bottom: 10px;" ><a href="/blog/create" style="color: white">create post</a></button><br>

			<table class="table">
				<thead>
					<tr>
						<th>id</th>
						<th>title</th>
						<th>body</th>
						<th>actions</th>
					</tr>
				</thead>
				<tbody>
					<?php if($news): ?>
                    <?php foreach ($news as $newsItem):?>
					<tr>
						<td><?php echo $newsItem['id']?></td>
						<td><?php echo $newsItem['title']?></td>
						<td><?php echo $newsItem['body'];?></td>
						<td class="btn btn-info" style="margin-right:10px"><a href="<?= site_url('/blog/edit/' .$newsItem['id']) ?>" style="color: white">edit</a></td>
						<td class="btn btn-info" style="margin-right:10px"><a href="<?= site_url('/blog/view/' .$newsItem['id']) ?>" style="color: white">view</a></td>
						<td class="btn btn-danger"><a href="<?= site_url('/blog/delete/' .$newsItem['id']) ?>" style="color: white">delete</a></td>
						
					</tr>

					<?php endforeach; ?>
  <?php else: ?>
    <h3>no post found</h3>
  <?php endif ?>

    <?php


//print_r($news)
  ?>
				</tbody>
				
			</table>
			
		
		
	</div>
	
</div>