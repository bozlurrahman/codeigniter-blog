<div id="site_content">
  <div id="content">
    <?php if ($this->session->userdata('user_id') && $this->session->userdata('user_type') != 'user') { ?>
      <h2><a style="color: green" href="<?= base_url() ?>index.php/blog/new_post/"><span class="glyphicon glyphicon-pencil"></span> Create a new post</a></h2>
    <?php } ?>
    <!-- insert the page content here -->
    <?php foreach ($posts as $post) { ?>
      <h2><a style="color:red;" href="<?= base_url() ?>index.php/blog/post/<?= $post['post_id'] ?>"><?= $post['post_title']; ?></a></h2>
      <p>added on <em><?= $post['date_added']; ?></em>,by <em><?= $post['username']; ?></em>
      </p>

      <?php if (isset($post['img'])) {
        $img_data = json_decode($post['img'], true);
        if (isset($img_data['upload_data'])) {
          $src = base_url() . 'public/uploads/' . $img_data['upload_data']['file_name'];
          echo "<img src=\"$src\"  alt=\"test\" />";
        }
        // echo "<pre>";
        // var_dump($img_data);
        // echo "</pre>";
      } ?>

      <?php if ($this->session->userdata('user_id') && $this->session->userdata('user_type') != 'user') { ?>
        <p>
          <a href="<?= base_url() ?>index.php/blog/editpost/<?= $post['post_id'] ?>"><span class="glyphicon glyphicon-edit" title="Edit post"></span></a> |
          <a href="<?= base_url() ?>index.php/blog/deletepost/<?= $post['post_id'] ?>"><span style="color:#f77;" class="glyphicon glyphicon-remove-circle" title="Delete post"></span></a>
        </p>
      <?php } ?>
      <p><?= substr(strip_tags($post['post']), 0, 150) . '...'; ?></p>
      <p><a href="<?= base_url() ?>index.php/blog/post/<?= $post['post_id'] ?>">Read More</a></p>
    <?php
    } ?>
    <?= $pages ?>
  </div>
</div>