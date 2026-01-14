<!DOCTYPE html>
<html lang="en">
<head>
    <title>Telemedicine++ - SignUp </title>
    <link rel="stylesheet" href="<?php echo ROOT ?>/assets/css/signup.css">
</head>
<body>
<header class="signup-header">
    <div class="logo">
        <a href="<?php echo ROOT ?>/home"><img src="<?php echo ROOT ?>/assets/images//logos/T-shaped.png"
                                               alt="Telemedicine++ Logo" width="100"
                                               height="100"></a>
        <div class="tele-name">Telemedicine++</div>
    </div>
</header>
<div class="container">
    <div class="signup-box">
        <div class="button-group">
            <h2>Create an account as a</h2>
            <input type="button" class="select-btn" onclick="showDoctorForm()" name="doctor-btn" value="Doctor">
            <input type="button" class="select-btn" onclick="showPatientForm()" name="patient-btn" value="Patient">
        </div>
        <!--    doctor form -->
        <div id="doctor-form" class="form-container">
            <h1>Doctor's Information</h1>
            <form method="POST" action="<?php echo ROOT ?>/signup/signup_doctor" id="d_Form">
                <div class="form-group">
                    <label for="d_reg_no">Registration number (BMDC)
                        <input type="text" name="d_reg_no" placeholder="16 digit number"></label>
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

                <div class="birthday-gender-row">
                    <div class="birthday-field">
                        <label for="d_birth_date">Birthday</label>
                        <div class="input-wrapper">
                            <input type="date" placeholder="Birthday" name="d_birth_date">
                            <span class="errors" id="d_birth_date_error"></span>
                        </div>
                    </div>
                    <div class="gender-field">
                        <div class="gender-options">
                            <span class="gender-label">Gender:</span>
                            <div class="radio-group">
                                <input type="radio" id="male" name="d_gender" value="Male">
                                <label for="male">Male</label>
                            </div>
                            <div class="radio-group">
                                <input type="radio" id="female" name="d_gender" value="Female">
                                <label for="female">Female</label>
                            </div>
                        </div>
                        <span class="errors" id="d_gender_error"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="d_specialty">Specialty/Department</label>
                    <select id="specialty" name="d_specialty">
                        <option value="Select">Select</option>
                        <option value="Cardiology">Cardiology</option>
                        <option value="Dermatology">Dermatology</option>
                        <option value="Neurology">Neurology</option>
                        <option value="Pediatrics">Pediatrics</option>
                        <option value="Psychiatry">Psychiatry</option>
                        <option value="Radiology">Radiology</option>
                        <option value="Surgery">Surgery</option>
                        <option value="Other">Other</option>
                    </select>
                        <span class="errors" id="d_specialty_error"></span>
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

                <div class="info-text">
                    <div>
                        <img src="<?php echo ROOT ?>/assets/images/logos/info-circle.svg" alt="info-circle" width="12"
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

        <!--    patient form-->
        <div id="patient-form" class="form-container">
            <h1>Patient's Information</h1>
            <form method="POST" action="<?php echo ROOT ?>/signup/signup_patient" id="p_Form">
                <div class="form-group">
                    <label>NID number</label>
                    <input type="text" placeholder="12 or 16 digit number" name="p_nid_no">
                    <span class="errors" id="p_nid_no_error"></span>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>First Name
                        <input type="text" placeholder="starts with Capital " name="p_first_name">
                        </label>
                        <span class="errors" id="p_first_name_error"></span>
                    </div>
                    <div class="form-group">
                        <label>Last Name
                        <input type="text" placeholder="starts with Capital" name="p_last_name">
                        </label>
                        <span class="errors" id="p_last_name_error"></span>
                    </div>
                </div>

                <div class="birthday-gender-row">
                    <div class="birthday-field">
                        <label for="p_birth_date">Birthday</label>
                        <div class="input-wrapper">
                            <input type="date" placeholder="Birthday" name="p_birth_date">
                            <span class="errors" id="p_birth_date_error"></span>
                        </div>
                    </div>
                    <div class="gender-field">
                        <div class="gender-options">
                            <span class="gender-label">Gender:</span>
                            <div class="radio-group">
                                <input type="radio" id="male" name="p_gender" value="Male">
                                <label for="male">Male</label>
                            </div>
                            <div class="radio-group">
                                <input type="radio" id="female" name="p_gender" value="Female">
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
                            <input type="radio" id="yes" name="is_sensory_disabled" value="Yes">
                            <label for="yes">Yes</label>
                        </div>
                        <div class="radio-group">
                            <input type="radio" id="no" name="is_sensory_disabled" value="No">
                            <label for="no">No</label>
                        </div>
                    </div>
                    <span class="errors" id="is_sensory_disabled_error"></span>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Blood Group</label>
                        <select id="blood-group" name="p_blood_group">
                            <option value="Select">Select</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                        <span class="errors" id="p_blood_group_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="p_address">Address</label>
                        <input type="text" placeholder="Your address" name="p_address">
                        <span class="errors" id="p_address_error"></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="p_email">Email</label>
                        <div class="input-wrapper">
                            <input type="email" placeholder="example@gmail.com" name="p_email">
                        </div>
                        <span class="errors" id="p_email_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="p_phone_no">Phone number</label>
                        <div class="phone-row">
                            <span class="country-code">+880</span>
                            <input type="tel" class="phone-input" placeholder="xxxxxxxxxx" name="p_phone_no">
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
                        <input type="password" value="" placeholder="Create a password" name="p_password">
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
</div>
<script>
    var ROOT = "<?= ROOT ?>";
</script>
<script src="<?php echo ROOT ?>/assets/js/signup.js"></script>
</body>
</html>