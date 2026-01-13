<?php
?>
<!doctype html>
<html>
<head>
    <title>Add Doctor</title>
    <link rel="stylesheet" href="<?php echo ROOT ?>/assets/css/admin/add_doctor.css">
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
            <div id="doctor-form" class="form-container">
                <h2>Add Doctor</h2>
                <form method="POST" action="<?php echo ROOT ?>/admin/add_doctor" id="d_Form">
                    <div class="form-group">
                        <label for="d_reg_no">Registration number (BMDC) 
                            <input type="text" name="d_reg_no" placeholder="16 digit number">
                        </label>
                        <span class="errors" id="d_reg_no_error"></span>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            
                            <label for="d_first_name">First Name 
                                <input type="text" placeholder="starts with Capital" name="d_first_name">
                            </label>
                            <span class="errors" id="d_first_name_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="d_last_name">Last Name
                                <input type="text" placeholder="starts with Capital" name="d_last_name">
                            </label>
                            <span class="errors" id="d_last_name_error"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="d_title">Title</label>
                            <input type="text" placeholder="e.g., Dr., Prof., etc." name="d_title">
                            <span class="errors" id="d_title_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="d_birth_date">Birthday</label>
                            <div class="input-wrapper">
                                <input type="date" placeholder="Birthday" name="d_birth_date">
                                <span class="errors" id="d_birth_date_error"></span>
                            </div>
                        </div>
                    </div>

                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="d_specialty">Specialty/Department</label>
                            <select id="specialty" name="d_specialty">
                                <option value="Select">Select</option>
                                <option value="cardiology">Cardiology</option>
                                <option value="dermatology">Dermatology</option>
                                <option value="neurology">Neurology</option>
                                <option value="pediatrics">Pediatrics</option>
                                <option value="psychiatry">Psychiatry</option>
                                <option value="radiology">Radiology</option>
                                <option value="surgery">Surgery</option>
                                <option value="other">Other</option>
                            </select>
                            <span class="errors" id="d_specialty_error"></span>
                        </div>
                        <div class="form-group">
                            
                                <span>Gender:</span>
                                <div class="radio-group">
                                    <label for="male">Male
                                    <input type="radio" id="male" name="d_gender" value="Male">
                                    </label>
                                </div>
                                <div class="radio-group">
                                    <label for="female">Female
                                    <input type="radio" id="female" name="d_gender" value="Female">
                                    </label>
                                </div>
                            
                            <span class="errors" id="d_gender_error"></span>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="d_email">Email</label>
                            <div class="input-wrapper">
                                <input type="email" placeholder="example@gmail.com" name="d_email">
                            </div>
                            <span class="errors" id="d_email_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="d_phone_no">Phone number</label>
                            <div class="phone-row">
                                <span class="country-code">+880</span>
                                <input type="text" class="phone-input" placeholder="xxxxxxxxxx" name="d_phone_no">
                            </div>
                            <span class="errors" id="d_phone_no_error"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="d_avail_from">Available from</label>
                            <input type="date" name="d_avail_from">
                            <span class="errors" id="d_avail_from_error"></span>
                            
                            <label for="d_avail_to">Available to</label>
                            <input type="date" name="d_avail_to">
                            <span class="errors" id="d_avail_to_error"></span>
                        </div>
                        <div class="form-group">
                            <span>Availability Status</span>
                            <div class="radio-group">
                                <label for="online">Online
                                <input type="radio" id="online" name="d_avail_status" value="Online">
                                </label>
                            </div>
                            <div class="radio-group">
                                <label for="offline">Offline
                                <input type="radio" id="offline" name="d_avail_status" value="Offline">
                                </label>
                            </div>
                            <span class="errors" id="d_avail_status_error"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="d_fee">Consultation Fee (in BDT)</label>
                            <input type="text" placeholder="" name="d_fee" min="0">
                            <span class="errors" id="d_fee_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="d_rating">Rating (out of 5)</label>
                            <input type="text" placeholder="Maximum 5" name="d_rating" min="0" max="5">
                            <span class="errors" id="d_rating_error"></span>
                        </div>
                    </div>


                    <div class="info-text">
                        <div>
                            <img src="<?php echo ROOT ?>/assets/images/logos/info-circle.svg" alt="info-circle"
                                 width="12"
                                 height="12">
                            <span>The phone number is only visible to you</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="d_password">Password</label>
                        <div class="input-wrapper">
                            <input type="password" placeholder="Create a password" name="d_password">
                            <span class="input-icon eye-icon">👁</span>
                        </div>
                        <span class="errors" id="d_password_error"></span>
                        <div class="password-requirements">
                            <div>8+ characters</div>
                            <div>at least one uppercase letter</div>
                            <div>at least one lowercase letter</div>
                            <div>include a number</div>
                            <div>include special symbols.</div>
                        </div>
                    </div>

                    <button type="submit" class="confirm-button" id="submit-doctor">Confirm</button>
                    <a href="#" class="back-btn">
                        <img src="<?php echo ROOT ?>/assets/images/logos/arrow-left.svg" alt="arrow-left" width="40"
                             height="40">
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var ROOT = "<?= ROOT ?>";
</script>
<script src="<?php echo ROOT ?>/assets/js/add-doctor-validation.js"></script>

</body>
</html>

