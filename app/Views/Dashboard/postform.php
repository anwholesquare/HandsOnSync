<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <?php echo view("Dashboard/common_header.php"); ?>
</head>

<body>




    <?php echo view('Dashboard/header.php'); ?>


    <div class="container-fluid">
        <div class="row">
            <?php echo view('Dashboard/navbar.php', ["id" => 2]); ?>



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

                <h2>Create a New Post</h2>
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
                        <form action="<?= base_url('dashboard/submitPost') ?>" method="POST"
                            enctype="multipart/form-data">
                            <!-- Blog Post Data -->
                            <div class="form-group mt-3">
                                <label for="title">Title</label>
                                <input type="text" class="form-control mt-2" id="title" name="title" minlength="3"
                                    maxlength="100" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="description">Description</label>
                                <textarea class="form-control mt-2" id="description" name="description" rows="3"
                                    maxlength="300" required></textarea>
                            </div>
                            <div class="form-group mt-3">
                                <label for="cover_image">Cover Image</label>
                                <input type="file" class="form-control-file mt-2" id="cover_image" name="cover_image"
                                    accept="image/*" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="content" style="margin-bottom:10px">Content</label>
                                <textarea class="form-control" id="editor" name="content" rows="10"
                                    maxlength="10000"></textarea>
                            </div>


                    </div>

                    <!-- Blog Post SEO Data -->
                    <div class="col-lg-4">
                        <div class="form-group mt-3">
                            <label for="category">Category</label>
                            <input class="form-control mt-2" id="category" name="category" autocomplete="off" required>
                            <br>
                            <ul id="CategoryList" style="background:white"></ul>
                        </div>
                        <div class="form-group mt-3">
                            <label for="tags">Tags</label>
                            <input type="text" class="form-control mt-2" id="tags" name="tags" maxlength="500" required>
                        </div>
                        <h3 class="mt-3">SEO Information</h3>
                        <div class="form-group mt-3">
                            <label for="seo_keywords">SEO Keywords</label>
                            <input type="text" class="form-control mt-2" id="seo_keywords" name="seo_keywords"
                                maxlength="500">
                        </div>
                        <div class="form-group mt-3">
                            <label for="seo_title">SEO Title</label>
                            <input type="text" class="form-control mt-2" id="seo_title" maxlength="300"
                                name="seo_title">
                        </div>
                        <div class="form-group mt-2">
                            <label for="seo_image">SEO Image</label>
                            <input type="file" class="form-control-file mt-2" id="seo_image" name="seo_image"
                                accept="image/*">
                        </div>
                        <div class="form-group mt-3">
                            <label for="seo_short_description">SEO Short Description</label>
                            <textarea class="form-control mt-2" id="seo_short_description" maxlength="300"
                                name="seo_short_description" rows="3"></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="robot_type">Robot Type</label>
                            <input type="text" class="form-control mt-2" id="robot_type" maxlength="100"
                                name="robot_type">
                        </div>

                        <button type="submit" class="btn btn-primary mt-3 darkmode-ignore"
                            style="width:100%">Publish</button>
                        </form>
                    </div>
                </div>

            </main>
        </div>
    </div>
    <?php echo view('Dashboard/footer.php'); ?>

    <style>
        #CategoryList {
            display: none;
            position: absolute;
            border: 1px solid #ccc;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        #CategoryList li {
            padding: 10px;
            cursor: pointer;
        }

        #CategoryList li:hover {
            background-color: #f4f4f4;
        }
    </style>
    <script>
        const categoryInput = document.getElementById('category');
        const autocompleteList = document.getElementById('CategoryList');



        categoryInput.addEventListener('input', function () {
            const inputValue = categoryInput.value.trim();

            if (inputValue.length === 0) {
                autocompleteList.innerHTML = '';
                return;
            }

            fetch(`<?= base_url() ?>/api/category/autocomplete/${inputValue}`)
                .then(response => response.json())
                .then(data => {
                    const items = data.map(item => `<li>${item.category_name}</li>`).join('');
                    autocompleteList.innerHTML = items;

                    // Add event listeners to each list item
                    autocompleteList.style.display = 'block';
                })
                .catch(error => console.error('Error:', error));

            document.addEventListener('click', function (event) {
                if (!event.target.matches('#category') && !event.target.matches('#CategoryList li')) {
                    autocompleteList.style.display = 'none';
                }
            });

            // Add event listeners to each list item
            autocompleteList.addEventListener('click', function (event) {
                if (event.target.tagName === 'LI') {
                    // Set the selected category name to the input field
                    categoryInput.value = event.target.innerText;

                    // Hide the autocomplete list
                    autocompleteList.style.display = 'none';
                }
            });


        });
    </script>

</body>

</html>