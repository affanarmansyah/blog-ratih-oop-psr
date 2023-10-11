<section class="content-header">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Update Category</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= $baseUrl ?>/view/dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Update Category</li>
            </ol>
        </div>
    </div>
</section>

<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $result['id']; ?>">

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $result['name']; ?>" required>

    <input type="submit" name="submit" value="Update">
</form>