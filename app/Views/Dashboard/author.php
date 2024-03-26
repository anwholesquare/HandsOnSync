<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <?php echo view("Dashboard/common_header.php"); ?>

    <script src="https://cdn.tiny.cloud/1/0kfailm8dbtup5vpf4tdzm8ff91efn454v1vn4hhtm7mbv1n/tinymce/5/tinymce.min.js"
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
</head>

<body>




    <?php echo view('Dashboard/header.php'); ?>

    <div class="container-fluid">
        <div class="row">
            <?php echo view('Dashboard/navbar.php', ["id" => 4]); ?>



            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top:70px;margin-bottom:70px;">







                <h2>Author's settings</h2>
                <?php if (isset ($validation)): ?>
                    <br>
                    <div class="alert alert-danger" role="alert">
                        <?= $validation->listErrors() ?>
                    </div>
                <?php endif; ?>

                <?php if (isset ($error)): ?>
                    <br>
                    <div class="alert alert-warning" role="alert">
                        <?= $error ?>
                    </div>
                <?php endif; ?>
                <div class="row">

                    <div class="col-lg-12">

                        <form action="<?= base_url('dashboard/submitAuthorContent') ?>" method="POST"
                            enctype="multipart/form-data">
                            <!-- Blog Post Data -->

                            <div class="form-group mt-3">
                                <label for="content" style="margin-bottom:10px;">Content</label>
                                <textarea class="form-control" id="editor" name="content" rows="10">
                                <?php if (count($author) > 0)
                                    print (str_replace('"', "'", $author[0]['page_content'])); ?>
                                </textarea>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3 darkmode-ignore"
                                style="width:100%">Publish</button>
                        </form>



                    </div>

                    <!-- Blog Post SEO Data -->



                </div>

            </main>
        </div>
    </div>
    <?php echo view('Dashboard/footer.php'); ?>

</body>

</html>