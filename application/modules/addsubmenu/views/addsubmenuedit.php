<!DOCTYPE html>
<html>

<head>
    <style>
        input[type=text] {
            width: 70%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 70%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        div {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .editBtn {
            background-color: #008CBA;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .table-wrap {
            max-width: 800px;
            margin: 80px auto;
            overflow-x: auto;
        }

        table,
        td,
        th {
            border: 1px solid #ddd;
            text-align: left;
            white-space: nowrap;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 15px;
        }

        table tbody tr:nth-child(odd) {
            background: #e2e2e2;
        }

        .box-wrap {
            padding: 0px 16px;
        }
    </style>
</head>

<body>
    <!-- (c) w3schools.com -->
    <div>
        <div>
            <h3 style="text-align: center;">Edit Menu - form</h3>
        </div>
        <form action="<?php echo site_url('addsubmenu/AddSubmenu/update/'.$submenu->id); ?>" method="post">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <lable>Select Menu Name</lable>
            <select name="menuselect">
                <!-- <option value="" selected>Select Menu</option> -->
                <?php
                foreach ($menus as $menu) {
                    if ($menu->id == $submenu->menuselect) {
                        echo "<option value='{$menu->id}' selected>{$menu->menuname}</option>";
                    }
                    if($menu->checksubmenu == 2 && ($menu->id != $submenu->menuselect))
                    {
                        echo "<option value='{$menu->id}'>{$menu->menuname}</option>";
                    }
                }
                ?>
            </select>
            <br>
            <label for="menuname">Sub Menu Name</label>
            <input type="text" id="menuname" name="submenuname" placeholder="Sub Menu Name" value="<?= $submenu->submenuname ?>">

            <div>
                <h4>Do you want to add Sub-Sub-Menu?</h4>
                <label>Yes</label>
                <input type="radio" value="2" name="checksubsubmenu" id="radioBtnYes" onchange="radioBtnY()" required>
                <label>No</label>
                <input type="radio" value="1" name="checksubsubmenu" id="radioBtnNo" onchange="radioBtnN()" required>
            </div>
            <div style="display: none;" id="menuSlugDiv">
                <label for="menuslug">Sub Menu Slug</label>
                <input type="text" id="menuslug" name="submenuslug" placeholder="Sub Menu Slug" value="<?= $submenu->submenuslug ?>">
            </div>

            <!-- <label for="country">Country</label>
            <select id="country" name="country">
                <option value="australia">Australia</option>
                <option value="canada">Canada</option>
                <option value="usa">USA</option>
            </select> -->

            <input type="submit" value="Submit">
        </form>
    </div>

    <script>
        var MenuSlugVal = document.getElementById("menuslug").value;

        function radioBtnY() {
            var radioBtnValYes = document.getElementById("radioBtnYes").value;
            document.getElementById("menuSlugDiv").style.display = 'none';
            MenuSlugVal = document.getElementById("menuslug").value;
            document.getElementById("menuslug").value = '';
            console.log(document.getElementById("menuslug").value);
        }

        function radioBtnN() {
            var radioBtnValNo = document.getElementById("radioBtnNo").value;
            document.getElementById("menuSlugDiv").style.display = 'block';
            document.getElementById("menuslug").value = MenuSlugVal;
            console.log(document.getElementById("menuslug").value);
        }
    </script>
</body>

</html>