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
            background-color: #f44337;;
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
            <h3 style="text-align: center;">Add Menu - form</h3>
        </div>
        <form action="<?php echo site_url('addmenu/Addmenu/create'); ?>" method="post">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <label for="menuname">Menu Name</label>
            <input type="text" id="menuname" name="menuname" placeholder="Menu Name">

            <div>
                <h4>Do you want to add Sub-Menu?</h4>
                <label>Yes</label>
                <input type="radio" value="2" name="checksubmenu" id="radioBtnYes" onchange="radioBtnY()">
                <label>No</label>
                <input type="radio" value="1" name="checksubmenu" id="radioBtnNo" onchange="radioBtnN()">
            </div>
            <div style="display: none;" id="menuSlugDiv">
                <label for="menuslug">Menu Slug</label>
                <input type="text" id="menuslug" name="menuslug" placeholder="Menu Slug" value="">
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

    <div class="box-wrap">
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Menu Name</th>
                        <th>Menu Slug</th>
                        <th>Sub Menu status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sl = 1; ?>
                    <?php foreach ($menus as $menu) : ?>
                        <tr>
                            <td><?php echo $sl++; ?></td>
                            <td><?php echo $menu->menuname; ?></td>
                            <td><?php echo $menu->menuslug; ?></td>
                            
                            <td>
                                <button class="editBtn">
                                    <a href="<?php echo site_url('addmenu/edit/' . $menu->id); ?>" style="color: #f2f2f2">Edit</a></button> |
                                    <button class="deleteBtn"> <a href="<?php echo site_url('addmenu/delete/' . $menu->id); ?>" style="color: #f2f2f2;" onclick="return confirm('Are you sure you want to delete this menu?');">Delete</a></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
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
</body>

</html>