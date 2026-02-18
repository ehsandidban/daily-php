<?php
$users = [
    ['name' => 'احسان', 'family' => 'دیدبان', 'age' => 32, 'phone' => '09215933075', 'status' => 'active'],
    ['name' => 'پریا', 'family' => 'طغیانی', 'age' => 30, 'phone' => '09399096924', 'status' => 'inactive'],
    ['name' => 'مهدی', 'family' => 'نیکخوی', 'age' => 34, 'phone' => '09017894563', 'status' => 'active'],
    ['name' => 'حجت', 'family' => 'کاویان', 'age' => 33, 'phone' => '09306162553', 'status' => 'inactive'],
    ['name' => 'لیلا', 'family' => 'قضاوی', 'age' => 29, 'phone' => '09196784532', 'status' => 'active'],
    ['name' => 'شکیبا', 'family' => 'میردامادی', 'age' => 31, 'phone' => '09384561230', 'status' => 'active'],
    ['name' => 'مژگان', 'family' => 'بختیاروند', 'age' => 35, 'phone' => '09033456792', 'status' => 'inactive'],
    ['name' => 'نسترن', 'family' => 'احمدپور', 'age' => 28, 'phone' => '09215678340', 'status' => 'active'],
    ['name' => 'ابراهیم', 'family' => 'حاج هاشمی', 'age' => 36, 'phone' => '09135678924', 'status' => 'inactive'],
];

$search = isset($_GET['search']) ? trim($_GET['search']) : false;
$status = isset($_GET['status']) && $_GET['status'] != 'all' ? $_GET['status'] : '';

$users = array_filter($users, function ($user) use ($search) {
    $fullname = $user['name'] . ' ' . $user['family'];
    $phone = $user['phone'];
    return str_contains($fullname, $search) || str_contains($phone, $search);
});

$users = array_filter($users, function ($user) use ($status) {
    if ($status) {
        return $user['status'] == $status;
    }
    return true;
});

$per_page = 2;
$page = $_GET['page'] ?? 1;
print_r($page);
$offset = ($page - 1) * $per_page;
$counter = $offset + 1;
$pages = ceil(count($users) / $per_page);
$users = array_splice($users, $offset, $per_page);
?>
<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Html in Loops</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://dl.daneshjooyar.com/mvie/Moodi_Hamed/assets/css/font-yekanbakh-vf.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="table-container">

            <form action="" method="get" class="table-filters mb-4 row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="search">جستجو</label>
                        <input type="search" name="search" class="form-control" id="search"
                            value="<?php echo $search ?>">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="status">وضعیت</label>
                        <select name="status" id="status" class="form-control">
                            <option value="all">همه</option>
                            <option <?php echo $status == 'inactive' ? 'selected' : '' ?> value="inactive">غیر فعال
                            </option>
                            <option <?php echo $status == 'active' ? 'selected' : '' ?> value="active">فعال</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <br>
                    <button class="btn btn-primary">اعمال فیلتر</button>
                </div>
            </form><!--.table-filters-->

            <table class="table table-hover table-striped table-responsive">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">نام</th>
                        <th scope="col">نام خانوادگی</th>
                        <th scope="col">تلفن</th>
                        <th scope="col">
                            <a href="#" class="order">
                                سن
                            </a>
                        </th>
                        <th scope="col">وضعیت</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($users)): ?>
                        <tr>
                            <td colspan="6">نتیجه ای یافت نشد!</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <th scope="row"><?php echo $counter++ ?></th>
                                <td><?php echo $user['name'] ?></td>
                                <td><?php echo $user['family'] ?></td>
                                <td><?php echo $user['age'] ?></td>
                                <td><?php echo $user['phone'] ?></td>
                                <td>
                                    <?php if ($user['status'] == 'active'): ?>
                                        <span class="badge text-bg-success">فعال</span>
                                    <?php else: ?>
                                        <span class="badge text-bg-danger">غیر فعال</span>
                                    <?php endif ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif ?>
                </tbody>
            </table>
            <nav>
                <ul class="pagination">
                    <li class="page-item <?php echo $page == 1 ? 'disabled' : '' ?>">
                        <?php if ($page == 1): ?>
                            <span class="page-link">Previous</span>
                        <?php else: ?>
                            <a class="page-link"
                                href="?search=<?php echo $search ?>&status=<?php echo $status ?>&page=<?php echo $page == 1 ? $page : $page - 1 ?>">Previous</a>
                        <?php endif ?>
                    </li>
                    <?php for ($i = 1; $i <= $pages; $i++): ?>
                        <li class="page-item <?php echo $page == $i ? 'active' : '' ?>">
                            <?php if ($page == $i): ?>
                                <span class="page-link"><?php echo $i ?></span>
                            <?php else: ?>
                                <!-- <a class="page-link" href="?page=<?php echo $i ?>"><?php echo $i ?></a> -->
                                <a class="page-link"
                                    href="?search=<?php echo $search ?>&status=<?php echo $status ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
                            <?php endif ?>
                        </li>
                    <?php endfor ?>
                    <li class="page-item <?php echo $page == $pages ? 'disabled' : '' ?>">
                        <?php if ($page == $pages): ?>
                            <span class="page-link <?php echo 'disabled' ?>">Next</span>
                        <?php else: ?>
                            <a class="page-link" 
                            href="?search=<?php echo $search ?>&status=<?php echo $status ?>&page=<?php echo $page == $pages ? $page : $page + 1 ?>">Next</a>
                        <?php endif ?>
                    </li>
                </ul>
            </nav>

        </div>

    </div>
</body>

</html>