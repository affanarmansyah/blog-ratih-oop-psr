<section class="content-header">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Update News</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= $baseUrl ?>/view/dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Update News</li>
            </ol>
        </div>
    </div>
</section>

<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="<?php echo $result['title']; ?>" required>

    <label for="image">Image URL:</label>
    <img src="<?= $baseUrl ?>/assets/img/<?php echo $result['image'] ? $result['image'] : 'default-news.png'; ?>" style="width: 50px; height: 50px;">
    <br>
    <input type="file" name="image" style="margin-top: 10px;">

    <label for="description">Description:</label>
    <input type="text" name="description" value="<?php echo $result['description']; ?>" required></input>

    <label for="status">Status:</label>
    <select id="status" name="status" required>
        <?php
        $active = $result['status'] == 'Active' ? 'selected' : "";
        $inactive = $result['status'] == 'Non Active' ? 'selected' : "";
        ?>
        <option value="Active" <?= $active ?> value="Active">Active</option>
        <option value="Non Active" <?= $inactive ?> value="Non Active">Non Active</option>
    </select>
    <label for="status">Category:</label>
    <select id="category" name="category_id" required>
        <?php

        foreach ($categories as $category) {
            $selected = $category['id'] == $result['category_id'] ? 'selected' : "";
            echo '<option value="' . $category['id'] . '" ' . $selected . '>' . $category['name'] . '</option>';
        }

        ?>
    </select>
    <input type="submit" name="submit" value="Update" style="font-size: medium;">
</form>