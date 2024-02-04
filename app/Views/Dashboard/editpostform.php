<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <?php echo view("Dashboard/common_header.php"); ?>
</head>

<body>




    <?php echo view('Dashboard/header.php'); ?>


    <div class="container-fluid">
        <div class="row">
            <?php echo view('Dashboard/navbar.php', ["id" => 1]); ?>



            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top:70px;margin-bottom:70px;">





                <script
                    src="https://cdn.tiny.cloud/1/0kfailm8dbtup5vpf4tdzm8ff91efn454v1vn4hhtm7mbv1n/tinymce/5/tinymce.min.js"
                    referrerpolicy="origin"></script>
                <script>
                    tinymce.init({
                        selector: '#editor',
                        height: 500, // Set the height of the editor
                        plugins: 'link image code',
                        toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image | code',
                        content_style: 'body { font-family: Arial, sans-serif; font-size: 16px; }'
                        // Customize other options as needed
                    });
                </script>

                <h2>Edit Post</h2>
                <?php if (isset($validation)): ?>
                    <br>
                    <div class="alert alert-danger" role="alert">
                        <?= $validation->listErrors() ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($error)): ?>
                    <br>
                    <div class="alert alert-warning" role="alert">
                        <?= $error ?>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-lg-8">
                        <form action="<?= base_url('dashboard/updatePost') ?>" method="POST"
                            enctype="multipart/form-data">

                            <input type="number" id="postid" name="postid" value="<?= $post[0]['post_id']; ?>" hidden>
                            <input type="text" id="prev_image" name="prev_image" value="<?= $post[0]['cover_image']; ?>"
                                hidden>

                            <!-- Blog Post Data -->
                            <div class="form-group mt-3">
                                <label for="title">Title</label>
                                <input type="text" class="form-control mt-2" id="title" name="title" minlength="3"
                                    maxlength="100" value="<?= $post[0]['title']; ?>" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="description">Description</label>
                                <textarea class="form-control mt-2" id="description" name="description" rows="3"
                                    maxlength="300" required><?= $post[0]['description']; ?></textarea>
                            </div>

                            <div class="form-group mt-3">
                                <label for="content" style="margin-bottom:10px">Content</label>
                                <textarea class="form-control" id="editor" name="content" rows="10"
                                    maxlength="10000"><?= $post[0]['content']; ?></textarea>
                            </div>




                    </div>

                    <!-- Blog Post SEO Data -->
                    <div class="col-lg-4">

                        <div class="form-group mt-3 mb-3">
                            <label for="title">Symlink</label>
                            <input type="text" class="form-control mt-2" id="symlink" name="symlink" minlength="3"
                                maxlength="100" value="<?= $post[0]['symlink']; ?>" required>
                        </div>
                        <img src="<?php echo base_url('') . "/public/uploads/" . $post[0]['cover_image']; ?>"
                            class="cover-image" alt="Cover Image">
                        <div class="text-muted mb-3">Posted on
                            <?php echo date("d M, Y", strtotime($post[0]['created_datetime'])); ?> <br>

                            <a href="<?= base_url('') . "author/" . $post[0]['user_id'] ?>"
                                style="text-decoration:none;">
                                <img src="<?= base_url('') . "public/uploads/" . $post[0]['image'] ?>"
                                    alt="user_profile" style="height:24px; width:auto; border-radius:20px;" />
                                <?php echo $post[0]['full_name']; ?>
                            </a>
                        </div>



                        <footer class="mb-3">
                            <strong>Category:</strong>
                            <?php echo $post[0]['category_name']; ?>
                            <br>
                            <!-- Tags -->

                            <div class="blog-tags">
                                <strong>Tags:</strong>
                                <?php foreach ($tags as $key => $value) {
                                    echo "<span class='badge bg-primary mx-1'>" . $value['tag_name'] . " </span>";

                                }
                                ?>
                            </div>
                        </footer>

                        <div class="form-group mt-3">
                            <label for="cover_image">Cover Image (optional)</label>
                            <input type="file" class="form-control-file mt-2" id="cover_image" name="cover_image"
                                accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 darkmode-ignore"
                            style="width:100%">Publish</button>




                    </div>
                </div>
                </form>

            </main>
        </div>
    </div>
    <style>
        .cover-image {
            width: 100%;
            height: auto;

            margin-bottom: 20px;
            border-radius: 20px;
        }
    </style>
    <?php echo view('Dashboard/footer.php'); ?>



</body>

</html>