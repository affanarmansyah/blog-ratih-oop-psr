<section class="content-header">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Create News</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= $baseUrl ?>/view/dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Create News</li>
            </ol>
        </div>
    </div>
</section>

<form action="" method="POST" enctype="multipart/form-data">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required>

    <label for="image">Image URL:</label>
    <input type="file" name="image">

    <label for="description">Description:</label>
    <input type="text" name="description" required></input>

    <label for="status">Status:</label>
    <select id="status" name="status" required>
        <option value="Active">Active</option>
        <option value="Non Active">Non Active</option>
    </select>

    <label for="status">Category:</label>
    <select id="category" name="category">
        <?php
        foreach ($rows as $category) {
        ?>
            <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>

        <?php } ?>
    </select>
    <input type="submit" name="submit" value="Add">
</form>