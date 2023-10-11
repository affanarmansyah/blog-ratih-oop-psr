<section class="content-header">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Create Category</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= $baseUrl ?>/view/dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Create Category</li>
            </ol>
        </div>
    </div>
</section>

<form action="" method="POST">
    <label for="name">Name:</label>
    <input type="text" name="name" required></input>
    <input type="submit" name="submit" value="save">
</form>