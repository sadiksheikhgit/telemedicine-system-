<!doctype html>
<html>
<head>
    <title>Doctors - Telemedicine++</title>
    <link rel="stylesheet" href="<?php echo ROOT ?>/assets/css/admin/manage_doctors.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <div class="two-columns">
        <div class="menu" id="sidebar">
            <div class="top">
                <a href="<?php echo ROOT ?>/admin" class="menu-btn">Dashboard</a>
                <a href="<?php echo ROOT ?>/admin/manage_doctors" class="menu-btn active">Manage Doctors</a>
                <a href="<?php echo ROOT ?>/admin/manage_patients" class="menu-btn">Manage Patients</a>
                <a href="<?php echo ROOT ?>/admin/manage_appointments" class="menu-btn">Manage Appointments</a>
                <a href="#" class="menu-btn">Announcements</a>
            </div>
            <div class="bottom">
                <a href="#" class="menu-btn">Profile</a>
                <a href="<?php echo ROOT ?>/logout" class="menu-btn">Log Out</a>
            </div>
        </div>
        <div class="content">
            <?php if (!empty($data['doctors'])): ?>
                <h2>All Doctors</h2>
            <a href="<?php echo ROOT?>/admin/add_doctor">
                <button class="btn btn-add" style="margin-bottom: 10px;">+ Add New Doctor</button>
            </a>
                <table>
                    <tr>
                        <th>Registration No (BMDC)</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Title</th>
                        <th>Birth-Date</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Specialization</th>
                        <th>Phone Number</th>
                        <th>Availability</th>
                        <th>Status</th>
                        <th>Fee</th>
                        <th>Rating</th>
                        <th>Action</th>
                    </tr>                    
                    <?php foreach ($data['doctors'] as $doctor): ?>
                        <tr>
                            <td style="word-break: break-all;"><?php echo htmlspecialchars($doctor['d_reg_no']); ?></td>
                            <td><?php echo htmlspecialchars($doctor['d_first_name'] ?? ""); ?></td>
                            <td><?php echo htmlspecialchars($doctor['d_last_name'] ?? ""); ?></td>
                            <td style="word-break: break-all;"><?php echo htmlspecialchars($doctor['d_title'] ?? "") ; ?></td>
                            <td><?php echo htmlspecialchars($doctor['d_birth_date'] ?? ""); ?></td>
                            <td><?php echo htmlspecialchars($doctor['d_gender'] ?? ""); ?></td>
                            <td style="word-break: break-all;"><?php echo htmlspecialchars($doctor['d_email'] ?? ""); ?></td>
                            <td style="word-break: break-all;"><?php echo htmlspecialchars($doctor['d_password'] ?? ""); ?></td>
                            <td><?php echo htmlspecialchars($doctor['d_specialty'] ?? ""); ?></td>
                            <td><?php echo htmlspecialchars($doctor['d_phone_no'] ?? ""); ?></td>
                            <td><?php echo htmlspecialchars($doctor['d_avail_from'] ?? "") . " to"; ?>
                                <br> <?php echo htmlspecialchars($doctor['d_avail_to'] ?? ""); ?></td>
                            <td><?php echo htmlspecialchars($doctor['d_avail_status'] ?? ""); ?></td>
                            <td><?php echo htmlspecialchars($doctor['d_fee'] ?? ""); ?></td>
                            <td><?php echo htmlspecialchars($doctor['d_rating'] ?? 0) ; ?></td>
                            <td>
                                <!--                    <button class="btn btn-add">Add</button>-->
                                <form action="<?php echo ROOT ?>/admin/manage_doctors" method="GET" onsubmit="return confirm('Are you sure?')">
                                    <input type="hidden" name="d_reg_no" value="<?php echo htmlspecialchars($doctor['d_reg_no']); ?>">
                                    <button class="btn btn-delete">Delete</button>
                                </form>
                                <a href="<?php echo ROOT ?>/admin/update_doctor?d_reg_no=<?php echo htmlspecialchars($doctor['d_reg_no']); ?>">
                                    <button class="btn btn-update">
                                        Update
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else: ?>
                <p>No doctors found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<!--<script>-->
<!--    // Toggle add row visibility-->
<!--    document.getElementById('toggleAddRow').addEventListener('click', function () {-->
<!--        const addRow = document.getElementById('addRow');-->
<!--        if (addRow.style.display === 'none') {-->
<!--            $("#sidebar").hide();-->
<!--            $("table").css("width", "100%");-->
<!--            $("td").css("word-break", "normal");-->
<!--            addRow.style.display = 'table-row';-->
<!--            this.textContent = '- Hide Form';-->
<!--        } else {-->
<!--            $("#sidebar").show();-->
<!--            addRow.style.display = 'none';-->
<!--            $("td").css("word-break", "normal");-->
<!--            this.textContent = '+ Add New Doctor';-->
<!--        }-->
<!--    });-->
<!---->
<!--    // Cancel button-->
<!--    document.getElementById('cancelAdd').addEventListener('click', function () {-->
<!--        $("#sidebar").show();-->
<!--        document.getElementById('addRow').style.display = 'none';-->
<!--        document.getElementById('toggleAddRow').textContent = '+ Add New Doctor';-->
<!--        document.getElementById('addDoctorForm').reset();-->
<!--    });-->
<!---->
<!--    // Toggle between display and edit modes-->
<!--    function toggleEdit(regNo) {-->
<!--        $("#sidebar").hide();-->
<!--        $("table").css("width", "100%");-->
<!--        document.getElementById('edit_' + regNo).style.display = 'block';-->
<!--        document.getElementById('edit_' + regNo).style.display = 'table-row';-->
<!--    }-->
<!---->
<!--    // Cancel edit-->
<!--    function cancelEdit(regNo) {-->
<!--        $("#sidebar").show();-->
<!--        document.getElementById('edit_' + regNo).style.display = 'none';-->
<!--        document.getElementById('display_' + regNo).style.display = 'table-row';-->
<!--    }-->
<!--</script>-->
</body>
</html>