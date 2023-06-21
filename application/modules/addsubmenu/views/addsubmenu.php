<div class="row mb-4">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add Sub Menu</h4>
            </div>
            <div class="card-body">
                <div class="row" id="">
                    <div class="col-sm-6">
                        <form action="<?php echo site_url('addsubmenu/AddSubmenu/create'); ?>" method="post">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="form-group row">
                                <label for="title" class="col-sm-4 col-form-label">Select Menu Name<i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="menuselect">
                                        <option selected>Select Menu</option>
                                        <?php
                                        foreach ($menus as $menu) {
                                            if ($menu->checksubmenu == 2) {
                                                echo "<option value='{$menu->id}'>{$menu->menuname}</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title" class="col-sm-4 col-form-label">Sub Menu Name<i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" name="submenuname" id="title" value="" placeholder="Sub Menu Name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-sm-4 col-form-label">Sub Menu - Status <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <label class="radio-inline my-2">
                                        <input type="radio" value="2" name="checksubsubmenu" id="radioBtnYes" onchange="radioBtnY()">
                                        <?php echo display('Yes') ?>
                                    </label>
                                    <label class="radio-inline my-2">
                                        <input type="radio" value="1" name="checksubsubmenu" id="radioBtnNo" onchange="radioBtnN()">
                                        <?php echo display('No') ?>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row" style="display: none;" id="menuSlugDiv">
                                <label for="title" class="col-sm-4 col-form-label">Sub Menu Slug<i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" id="menuslug" name="submenuslug" placeholder="Sub Menu Slug" value="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" value="Submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <input type="hidden" value="" id="finid">
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Serial No.</th>
                    <th scope="col">Sub Menu Name</th>
                    <th scope="col">Sub Menu status</th>
                    <th scope="col">Menu Slug</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $sl = 1; ?>
                <?php foreach ($submenus as $submenu) : ?>
                    <tr>
                        <td><?php echo $sl++; ?></td>
                        <td><?php echo $submenu->submenuname; ?></td>
                        <td><?php echo $submenu->checksubsubmenu; ?></td>
                        <td><?php echo $submenu->submenuslug; ?></td>
                        <td>
                            <button class="btn btn-primary">
                                <a href="<?php echo site_url('addsubmenu/edit/' . $submenu->id); ?>" style="color: #ffffff">Edit</a></button> |
                            <button class="btn btn-danger"> <a href="<?php echo site_url('addsubmenu/delete/' . $submenu->id); ?>" style="color: #ffffff;" onclick="return confirm('Are you sure you want to delete this menu?');">Delete</a></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>
<script>
    function radioBtnY() {
        var radioBtnValYes = document.getElementById("radioBtnYes").value;
        document.getElementById("menuSlugDiv").style.display = 'none';
        document.getElementById("radioBtnYes").value = '2';
        console.log(radioBtnValYes);
    }

    function radioBtnN() {
        var radioBtnValNo = document.getElementById("radioBtnNo").value;
        document.getElementById("menuSlugDiv").style.display = 'block';
        console.log(radioBtnValNo);
    }
</script>