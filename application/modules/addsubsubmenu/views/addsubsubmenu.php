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

        .deleteBtn {
            background-color: #f44337;
            ;
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
            <h3 style="text-align: center;">Add SubSubMenu - form</h3>
        </div>
        <form action="<?php echo site_url('addsubsubmenu/AddSubSubmenu/create'); ?>" method="post">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <lable>Select Sub Menu Name</lable>
            <select name="submenuselect">
                <option value="" selected>Select Sub Menu</option>
                <?php
                foreach ($submenus as $submenu) {
                    if ($submenu->checksubsubmenu == 2) {
                        echo "<option value='{$submenu->id}'>{$submenu->submenuname}</option>";
                    }
                }
                ?>
            </select>
            <br>
            <label for="menuname">Sub Sub Menu Name</label>
            <input type="text" id="menuname" name="subsubmenuname" placeholder="Sub Sub Menu Name">


            <div style="display: block;" id="menuSlugDiv">
                <label for="menuslug">Sub Sub Menu Slug</label>
                <input type="text" id="menuslug" name="subsubmenuslug" placeholder="Sub Sub Menu Slug" value="">
            </div>


            <input type="submit" value="Submit">
        </form>
    </div>

    <div class="box-wrap">
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Sub Sub Menu Name</th>
                        <th>Sub Sub Menu Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sl = 1; ?>
                    <?php foreach ($subsubmenus as $subsubmenu) : ?>
                        <tr>
                            <td><?php echo $sl++; ?></td>
                            <td><?php echo $subsubmenu->subsubmenuname; ?></td>
                            <td><?php echo $subsubmenu->subsubmenuslug; ?></td>
                            <td>
                                <button class="editBtn">
                                    <a href="<?php echo site_url('addsubsubmenu/edit/' . $subsubmenu->id); ?>" style="color: #f2f2f2">Edit</a></button> |
                                <button class="deleteBtn"> <a href="<?php echo site_url('addsubsubmenu/delete/' . $subsubmenu->id); ?>" style="color: #f2f2f2;" onclick="return confirm('Are you sure you want to delete this sub-sub-menu?');">Delete</a></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>

    <!-- <script>
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
    </script> -->
</body>

</html>