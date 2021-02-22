<div class="container">
	<div class="row" style="margin-top: 40px">
			<h4>all the posts</h4>
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
						<td class="btn btn-info" style="margin-right:10px"><a href="<?= site_url('/blog/update/' .$newsItem['id']) ?>" style="color: white">edit</a></td>
						<td class="btn btn-info" style="margin-right:10px">view</td>
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