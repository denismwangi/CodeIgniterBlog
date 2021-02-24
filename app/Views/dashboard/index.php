  <div class="card-header">
    <?= csrf_field(); ?>

                <?php if (!empty(session()->getFlashdata('fail'))): ?> 
                <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
            <?php endif ?>

            <?php if (!empty(session()->getFlashdata('success'))): ?> 
                <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
            <?php endif ?>
                                <i class="fas fa-table mr-1"></i>
                                All posts
                                <button type="button" class="btn btn-info " type="submit" style="margin-left: 700px; margin-bottom: 10px;" ><a href="/blog/create" style="color: white">create post</a></button><br>
                            </div>
  <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Title</th>
                                                <th style="margin-right: 50px;">Body</th>
                                                <th>Actions</th>
                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if($news): ?>
                                           <?php foreach ($news as $newsItem):?>
                                            <tr>
                                                <td><?php echo $newsItem['id']?></td>
                                                <td><?php echo $newsItem['title']?></td>
                                                <td style="margin-right: 50px"><?php echo $newsItem['body'];?></td>
                                                <td class="btn btn-info" style="margin-right:10px"><a href="<?= site_url('/blog/edit/' .$newsItem['id']) ?>" style="color: white">edit</a></td>
                                                <td class="btn btn-info" style="margin-right:10px"><a href="<?= site_url('/blog/view/' .$newsItem['id']) ?>" style="color: white">view</a></td>
                                                <td class="btn btn-danger"><a href="<?= site_url('/blog/delete/' .$newsItem['id']) ?>" style="color: white">delete</a></td>
                                            </tr>
                                            <?php endforeach; ?>
  <?php else: ?>
    <h3>no post found</h3>
  <?php endif ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>