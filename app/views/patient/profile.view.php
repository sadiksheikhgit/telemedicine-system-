<!doctype html>
<html>
<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" href="<?php echo ROOT ?>/assets/css/doctor/profile.css">
</head>
<body>
<div class="container">
    <div class="two-columns">
        <div class="menu">
            <div class="top">
                <a href="<?php echo ROOT ?>/patientPortal" class="menu-btn">Dashboard</a>
                <a href="<?php echo ROOT ?>/patientPortal/manage_appointments" class="menu-btn">Manage Appointments</a>
                <a href="<?php echo ROOT ?>/patientPortal/manage_medicines" class="menu-btn">Manage Medicines</a>
                <a href="<?php echo ROOT ?>/patientPortal/manage_lab_tests" class="menu-btn">Lab Tests</a>
            </div>
            <div class="bottom">
                <a href="<?php echo ROOT ?>/" class="menu-btn">Website</a>
                <a href="<?php echo ROOT ?>/patientPortal/profile" class="menu-btn active">Profile</a>
                <a href="<?php echo ROOT ?>/logout" class="menu-btn">Log Out</a>
            </div>
        </div>
        <div class="content">
            <div id="patient-form" class="form-container">
                <h1>Patient's Information</h1>
                <form method="POST" action="<?php echo ROOT ?>/patientPortal/profile" id="p_Form">
                    <div class="form-group">
                        <label>NID number</label>
                        <input type="text" style="background: #D5D5D5;" placeholder="12 or 16 digit number" name="p_nid_no" value="<?php echo $data['p_nid_no'] ?? '';?>" readonly>
                        <span class="errors" id="p_nid_no_error"></span>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>First Name
                                <input type="text" placeholder="starts with Capital " name="p_first_name" value="<?php echo $data['p_first_name'] ?? '';?>">
                            </label>
                            <span class="errors" id="p_first_name_error"></span>
                        </div>
                        <div class="form-group">
                            <label>Last Name
                                <input type="text" placeholder="starts with Capital" name="p_last_name" value="<?php echo $data['p_last_name'] ?? '';?>">
                            </label>
                            <span class="errors" id="p_last_name_error"></span>
                        </div>
                    </div>

                    <div class="birthday-gender-row">
                        <div class="birthday-field">
                            <label for="p_birth_date">Birthday</label>
                            <div class="input-wrapper">
                                <input type="date" name="p_birth_date" value="<?php if (!empty($data['p_birth_date'])) { echo date('Y-m-d', strtotime($data['p_birth_date']));} ?>">
                                <span class="errors" id="p_birth_date_error"></span>
                            </div>
                        </div>
                        <div class="gender-field">
                            <div class="gender-options">
                                <span class="gender-label">Gender:</span>
                                <div class="radio-group">
                                    <input type="radio" id="male" name="p_gender" value="Male" <?php if (isset($data['p_gender']) && $data['p_gender'] === 'Male') echo ' checked'; ;?>>
                                    <label for="male">Male</label>
                                </div>
                                <div class="radio-group">
                                    <input type="radio" id="female" name="p_gender" value="Female" <?php if (isset($data['p_gender']) && $data['p_gender'] === 'Female') echo ' checked'; ;?>>
                                    <label for="female">Female</label>
                                </div>
                            </div>
                            <span class="errors" id="p_gender_error"></span>
                        </div>
                    </div>

                    <div class="sensory-field">
                        <div class="sensory-options">
                            <span class="sensory-label">Sensory Disabilities?</span>
                            <div class="radio-group">
                                <input type="radio" id="yes" name="is_sensory_disabled" value="Yes" <?php if (isset($data['is_sensory_disabled']) && $data['is_sensory_disabled'] === 'Yes') echo ' checked'; ;?>>
                                <label for="yes">Yes</label>
                            </div>
                            <div class="radio-group">
                                <input type="radio" id="no" name="is_sensory_disabled" value="No" <?php if (isset($data['is_sensory_disabled']) && $data['is_sensory_disabled'] === 'No') echo ' checked'; ;?>>
                                <label for="no">No</label>
                            </div>
                        </div>
                        <span class="errors" id="is_sensory_disabled_error"></span>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Blood Group</label>
                            <select id="blood-group" name ="p_blood_group" >
                                <option value="Select"<?php if(isset($data['p_blood_group']) && $data['p_blood_group'] === "Select") echo "selected"; ?>>Select</option>
                                <option value="A+" <?php if (isset($data['p_blood_group']) && $data['p_blood_group'] === "A+") echo "selected"; ?>>A+</option>
                                <option value="A-" <?php if(isset($data['p_blood_group']) && $data['p_blood_group'] === "A-") echo "selected"; ?>>A-</option>
                                <option value="B+" <?php if(isset($data['p_blood_group']) && $data['p_blood_group'] === "B+") echo "selected"; ?>>B+</option>
                                <option value="B-" <?php if(isset($data['p_blood_group']) && $data['p_blood_group'] === "B-") echo "selected"; ?>>B-</option>
                                <option value="AB+" <?php if(isset($data['p_blood_group']) && $data['p_blood_group'] === "AB+") echo "selected"; ?>>AB+</option>
                                <option value="AB-" <?php if(isset($data['p_blood_group']) && $data['p_blood_group'] === "AB-") echo "selected"; ?>>AB-</option>
                                <option value="O+" <?php if(isset($data['p_blood_group']) && $data['p_blood_group'] === "O+") echo "selected"; ?>>O+</option>
                                <option value="O-" <?php if(isset($data['p_blood_group']) && $data['p_blood_group'] === "O-") echo "selected"; ?>>O-</option>
                            </select>
                            <span class="errors" id="p_blood_group_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="p_address">Address</label>
                            <input type="text" placeholder="Your address" name="p_address" value="<?php echo $data['p_address'] ?? '';?>">
                            <span class="errors" id="p_address_error"></span>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="p_email">Email</label>
                            <div class="input-wrapper">
                                <input type="email" placeholder="example@gmail.com" name="p_email" value="<?php echo $data['p_email'] ?? '';?>">
                            </div>
                            <span class="errors" id="p_email_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="p_phone_no">Phone number</label>
                            <div class="phone-row">
                                <span class="country-code">+880</span>
                                <input type="tel" class="phone-input" placeholder="xxxxxxxxxx" name="p_phone_no" value="<?php echo $data['p_phone_no'] ?? '';?>">
                            </div>
                            <span class="errors" id="p_phone_no_error"></span>
                        </div>
                    </div>

                    <div class="info-text">
                        <div>
                            <img src="<?php echo ROOT ?>/assets/images/logos/info-circle.svg" alt="info-circle" width="12"
                                 height="12">
                            <span>The phone number is only visible to you</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="p_password">Password</label>
                        <div class="input-wrapper">
                            <input type="password" placeholder="Create a password" name="p_password" value="<?php echo $data['p_password'] ?? '';?>">
                            <span class="input-icon eye-icon">👁</span>
                        </div>
                        <span class="errors" id="p_password_error"></span>
                        <div class="password-requirements">
                            <div>8+ characters</div>
                            <div>at least one uppercase letter</div>
                            <div>at least one lowercase letter</div>
                            <div>include a number</div>
                            <div>include special symbols.</div>
                        </div>
                    </div>

                    <button type="submit" class="confirm-button">Confirm</button>
                    <a href="<?php echo ROOT?>/" class="back-btn"><img src="<?php echo ROOT ?>/assets/images/logos/arrow-left.svg"
                                                                       alt="arrow-left" width="40" height="40"></a>
                </form>
            </div>
        </div>

        <script src="<?php echo ROOT ?>/assets/js/patient-profile.js"></script>

</body>
</html>