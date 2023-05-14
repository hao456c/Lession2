<?php 
    require('../Views/Components/header.php');
?>

    <?php
        if(isset($_SESSION['role']) ):
            if($_SESSION['role']):
    ?>
    <div class="d-flex justify-content-center ">
        <div class="mb-5 w-50">
            <input 
                type="text" 
                class="form-control w-100"
                id="search"
                name="search"
                />
            <label class="form-label" for="search">Search found <?php echo $data['totalPage']['total_users'] ?> Result</label>
        </div>
    </div>
    <div class="d-flex justify-content-center ">
        <table class="table table-bordered h-100 w-75 p-2 ">
            <thead>
                <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col" class="text-center">Fullname</th>
                <th scope="col" class="text-center">Email</th>
                <th scope="col" class="text-center">Role</th>
                <th scope="col" class="text-center">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $temp = 1;
                    foreach($data['value'] as $item) {
                ?>
                <tr>
                    <td class="text-center"><?php echo $temp ?></td>
                    <td class="text-center"><?php echo $item['full_name'] ?></td>
                    <td class="text-center"><?php echo $item['email'] ?></td>
                    <td class="text-center"><?php echo $item['role'] ? 'Admin' : 'User' ?></td>
                    <td class="text-center">
                        <a href=<?php echo "/lession2/public/index.php/edit?id=" . $item['id'] ?>>
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        <a href="#" onClick=<?php echo "deleteItem('/lession2/public/index.php/delete?_method=DELETE&id=" . $item['id'] . "')" ?>>
                            <i class="fa fa-minus-circle" aria-hidden="true"></i>
                        </a>
                        <a href=<?php echo "/lession2/public/index.php/copy?id=" . $item['id'] ?>>
                            <i class="fa fa-file" aria-hidden="true"></i>
                        </a>
                        <a href=<?php echo "/lession2/public/index.php/detail?id=" . $item['id'] ?>>
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
                <?php
                    $temp++;
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center ">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" 
                        href=<?php echo "/lession2/public/index.php/?page=" .  
                        ($data['page'] > 0 ? 1 : $data['page'] - 1) . 
                        (isset($data['search']) ? "&search=".$data['search'] : '')?>
                    >Previous
                    </a>
                </li>    
                <?php
                    for($i = 1; $i<=$data['totalPage']['total_pages']; $i++) {
                ?>
                    <li class="page-item <?php echo $i == $data['page'] ? 'active' : '' ?>">
                        <a class="page-link" 
                            href=<?php echo "/lession2/public/index.php/?page=" . 
                                $i . (isset($data['search']) ? "&search=".$data['search'] : '')?>
                        ><?php echo $i ?>
                        </a>
                    </li>
                <?php
                    }
                ?>
                <li class="page-item">
                    <a class="page-link" 
                        href=<?php echo "/lession2/public/index.php/?page=" . 
                            ($data['page'] > $data['totalPage']['total_pages'] ? $data['page'] : $data['totalPage']['total_pages']) . 
                            (isset($data['search']) ? "&search=".$data['search'] : '')?>
                    >Next
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <?php else: ?>
        <div class="d-flex justify-content-center ">
            <div class="border border-secondary h-50 w-25 d-flex justify-content-center p-2">
                <div>
                    <div class="form-outline mb-2">
                        <label class="form-label" for="full_name">Full Name</label>
                        <label class="form-control" id="full_name"><?php echo isset($data['value']['full_name']) ? $data['value']['full_name'] : '' ?></label>
                        <small class="text-black-50">We'll never share your email with anyone else</small>
                    </div>
                    <div class="form-outline mb-2">
                        <label class="form-label" for="email">Email Address</label>
                        <label class="form-control" id="email"><?php echo isset($data['value']['email']) ? $data['value']['email'] : '' ?></label>
                    </div>
                    <div class="form-outline mb-2">
                        <label class="form-label" for="role">Role</label>
                        <label class="form-control" id="role"><?php echo $data['value']['role'] == 1 ? 'Admin' : 'User' ?></label>
                    </div>
                </div>
            </div>  
        </div>
    <?php
        endif;
    endif;
    ?>
<script>
    function deleteItem(url) {
        event.preventDefault();
        if(confirm('Are you sure you want to delete this item ?')) {
            var xhr = new XMLHttpRequest();
            xhr.open('DELETE', url, true);
            xhr.send();
            xhr.onreadystatechange = function() {
                window.location.reload();
            }
        }
    }
    document.querySelector('#search').addEventListener('keypress', function (e) {
        if(e.key === 'Enter') {
            var search = document.getElementById('search').value;
            location.href = '/lession2/public/index.php/?search=' + search;
        }
    });
</script>
<?php 
    require('../Views/Components/footer.php');
?> 
  