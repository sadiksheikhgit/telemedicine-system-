<?php

class Signup
{
    use Controller;

    public function index()
    {
        $this->view('signup');
    }
    public function signup_doctor(){
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header('Content-Type: application/json');

            $errors = $this->validate_doctor_signup($_POST);
            if (!empty($errors)) {
                echo json_encode([
                    'status' => 'error',
                    'errors' => $errors
                ]);
                exit;
            }
//            var_dump($_POST);
//            $user = new User();
//            if ($this->validate()) {
//                redirect('login');
//            }
//            $errors = $user->errors;

            echo json_encode([
                'status' => 'success',
                'message' => 'Form submitted successfully'
            ]);
            $doctor = new Doctor();
            $doctor->insert($_POST);
            $user = new User();
            $user_data = [
                'email' => $_POST['d_email'],
                'password' => $_POST['d_password'],
                'role' => 'doctor',
                'd_reg_no' => $_POST['d_reg_no']
            ];
            $user->insert($user_data);
//            print_r($doctor);
            exit;
        }
        $this->view('signup', ['errors' => $errors]);
    }

    public function validate_doctor_signup($data)
    {
        $errors = [];
        // validate d_reg_no
        $d_reg_no = trim($data['d_reg_no'] ?? '');
        if (empty($d_reg_no)) {
            $errors['d_reg_no'] = "Registration number is required.";
        } elseif (!preg_match('/^\d{16}$/', $d_reg_no)) {
            $errors['d_reg_no'] = "Must be 16 digits";
        }
        // validate firstname 
        $d_first_name = trim($data['d_first_name'] ?? '');
        if (!empty($d_first_name)) {
            if (!preg_match('/^[a-zA-Z]+$/', $d_first_name)) {
                $errors['d_first_name'] = "First name can only contain letters.";
            }
            if (strlen($d_first_name) < 2 || strlen($d_first_name) > 30) {
                $errors['d_first_name'] = "First name must be between 2 and 30 characters.";
            }
        } else {
            $errors['d_first_name'] = "First name is required.";
        }
        //validate lastname
        $d_last_name = trim($data['d_last_name'] ?? '');
        if (!empty($d_last_name)) {
            if (!preg_match('/^[a-zA-Z]+$/', $d_last_name)) {
                $errors['d_last_name'] = "First name can only contain letters.";
            }
            if (strlen($d_last_name) < 2 || strlen($d_last_name) > 30) {
                $errors['d_last_name'] = "First name must be between 2 and 30 characters.";
            }
        } else {
            $errors['d_last_name'] = "Last name is required.";
        }
        //birthdate validation
        $d_birth_date = trim($data['d_birth_date'] ?? '');
        if (empty($d_birth_date)) {
            $errors['d_birth_date'] = "Birthday is required.";
        } elseif (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $d_birth_date)) {
            $errors['d_birth_date'] = "Invalid date format. Use YYYY-MM-DD.";
        } else {
            $date_parts = explode('-', $d_birth_date);
            if (!checkdate($date_parts[1], $date_parts[2], $date_parts[0])) {
                $errors['d_birth_date'] = "Invalid date.";
            }
        }
        //validate gender
        $d_gender = trim($data['d_gender'] ?? '');
        if (empty($d_gender)) {
            $errors['d_gender'] = "Gender is required.";
        }
        // validate specialty other than select
        $d_specialty = trim($data['d_specialty'] ?? '');
        if (empty($d_specialty) || $d_specialty == 'select') {
            $errors['d_specialty'] = "Specialty is required.";
        }
        // validate email
        $d_email = trim($data['d_email'] ?? '');
        if (empty($d_email)) {
            $errors['d_email'] = "Email is required.";
        } elseif (!filter_var($d_email, FILTER_VALIDATE_EMAIL)) {
            $errors['d_email'] = "Invalid email format.";
        }
        // validate phone no
        $d_phone_no = trim($data['d_phone_no'] ?? '');
        if (empty($d_phone_no)) {
            $errors['d_phone_no'] = "Phone number is required.";
        } elseif (!preg_match('/^[1-9]\d{9}$/', $d_phone_no)) {
            $errors['d_phone_no'] = "Invalid phone number format.";
        }
        // validate password
        $d_password = trim($data['d_password'] ?? '');
        if (empty($d_password)) {
            $errors['d_password'] = "Password is required.";
        } elseif (strlen($d_password) < 8) {
            $errors['d_password'] = "Password must be at least 8 characters long.";
        } elseif (!preg_match('/[A-Z]/', $d_password)) {
            $errors['d_password'] = "Password must contain at least one uppercase letter.";
        } elseif (!preg_match('/[a-z]/', $d_password)) {
            $errors['d_password'] = "Password must contain at least one lowercase letter.";
        } elseif (!preg_match('/\d/', $d_password)) {
            $errors['d_password'] = "Password must contain at least one digit.";
        } elseif (!preg_match('/[\W_]/', $d_password)) {
            $errors['d_password'] = "Password must contain at least one special character.";
        }
        // store after validation
//        if (empty($errors)) {
//        }
//        $_POST['d_reg_no'] = $d_reg_no;
//        $_POST['d_first_name'] = ucfirst($d_first_name);
//        $_POST['d_last_name'] = ucfirst($d_last_name);
//        $_POST['d_birth_date'] = $d_birth_date;
//        $_POST['d_email'] = strtolower($d_email);
//        $_POST['d_phone_no'] = "+880" . $d_phone_no;
////        $_POST['d_password'] = password_hash($d_password, PASSWORD_BCRYPT);
//        $_POST['d_password'] = $d_password;
////         show($_POST);
////        print_r();
        return $errors;
    }
    public function signup_patient(){
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header('Content-Type: application/json');
            $errors = $this->validate_patient_signup($_POST);
            if (!empty($errors)) {
                echo json_encode([
                    'status' => 'error',
                    'errors' => $errors
                ]);
                exit;
            }

            echo json_encode([
                'status' => 'success',
                'message' => 'Form submitted successfully'
            ]);
            $patient = new Patient();
            $patient->insert($_POST);
            $user = new User();
            $user_data = [
                'email' => $_POST['p_email'],
                'password' => $_POST['p_password'],
                'role' => 'patient',
                'p_nid_no' => $_POST['p_nid_no']
            ];
            $user->insert($user_data);
            exit;
        }
        $this->view('signup', ['errors' => $errors]);
    }
    public function validate_patient_signup($data)
    {
        $errors = [];
        // p_nid validation
        $p_nid_no = trim($data['p_nid_no'] ?? '');
        if (empty($p_nid_no)) {
            $errors['p_nid_no'] = "NID number is required.";
        } elseif (!preg_match('/^\d{12,16}$/', $p_nid_no)) {
            $errors['p_nid_no'] = "NID number must be between 12 and 16 digits.";
        }
        // validate firstname
        $p_first_name = trim($data['p_first_name'] ?? '');
        if (!empty($p_first_name)) {
            if (!preg_match('/^[a-zA-Z]+$/', $p_first_name)) {
                $errors['p_first_name'] = "First name can only contain letters.";
            }
            if (strlen($p_first_name) < 2 || strlen($p_first_name) > 30) {
                $errors['p_first_name'] = "First name must be between 2 and 30 characters.";
            }
        } else {
            $errors['p_first_name'] = "First name is required.";
        }
        //validate lastname
        $p_last_name = trim($data['p_last_name'] ?? '');
        if (!empty($p_last_name)) {
            if (!preg_match('/^[a-zA-Z]+$/', $p_last_name)) {
                $errors['p_last_name'] = "First name can only contain letters.";
            }
            if (strlen($p_last_name) < 2 || strlen($p_last_name) > 30) {
                $errors['p_last_name'] = "First name must be between 2 and 30 characters.";
            }
        } else {
            $errors['p_last_name'] = "Last name is required.";
        }
        // validate birthdate (cannot be future or must be 18+)
        $p_birth_date = trim($data['p_birth_date'] ?? '');
        if (empty($p_birth_date)) {
            $errors['p_birth_date'] = "Birthday is required.";
        } elseif (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $p_birth_date)) {
            $errors['p_birth_date'] = "Invalid date format. Use YYYY-MM-DD.";
        } else {
            $date_parts = explode('-', $p_birth_date);
            if (!checkdate($date_parts[1], $date_parts[2], $date_parts[0])) {
                $errors['p_birth_date'] = "Invalid date.";
            } else {
                $birth_timestamp = strtotime($p_birth_date);
                $current_timestamp = time();
                $age = date('Y', $current_timestamp) - date('Y', $birth_timestamp);
                if ($age < 18 || ($age === 18 && date('md', $current_timestamp) < date('md', $birth_timestamp))) {
                    $errors['p_birth_date'] = "You must be at least 18 years old to register.";
                }
            }
        }
        // validate gender
        $p_gender = trim($data['p_gender'] ?? '');
        if (empty($p_gender)) {
            $errors['p_gender'] = "Gender is required.";
        }
        //validate sensory options yes/no
        $is_sensory_disabled = trim($data['is_sensory_disabled'] ?? '');
        if (empty($is_sensory_disabled)) {
            $errors['is_sensory_disabled'] = "Sensory options selection is required.";
        }
        //validate blood group
        $p_blood_group = trim($data['p_blood_group'] ?? '');
        $valid_blood_groups = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
        if (!in_array($p_blood_group, $valid_blood_groups)) {
            $errors['p_blood_group'] = "Valid blood group selection is required.";
        }
        // validate address 
        $p_address = trim($data['p_address'] ?? '');
        if (empty($p_address)) {
            $errors['p_address'] = "Address is required.";
        }
        // validate email
        $p_email = trim($data['p_email'] ?? '');
        if (empty($p_email)) {
            $errors['p_email'] = "Email is required.";
        } elseif (!filter_var($p_email, FILTER_VALIDATE_EMAIL)) {
            $errors['p_email'] = "Invalid email format.";
        }
        // validate phone no
        $p_phone_no = trim($data['p_phone_no'] ?? '');
        if (empty($p_phone_no)) {
            $errors['p_phone_no'] = "Phone number is required.";
        } elseif (!preg_match('/^[1-9]\d{9}$/', $p_phone_no)) {
            $errors['p_phone_no'] = "Invalid phone number format.";
        }
        // validate password
        $p_password = trim($data['p_password'] ?? '');
        if (empty($p_password)) {
            $errors['p_password'] = "Password is required.";
        } elseif (strlen($p_password) < 8) {
            $errors['p_password'] = "Password must be at least 8 characters long.";
        } elseif (!preg_match('/[A-Z]/', $p_password)) {
            $errors['p_password'] = "Password must contain at least one uppercase letter.";
        } elseif (!preg_match('/[a-z]/', $p_password)) {
            $errors['p_password'] = "Password must contain at least one lowercase letter.";
        } elseif (!preg_match('/\d/', $p_password)) {
            $errors['p_password'] = "Password must contain at least one digit.";
        } elseif (!preg_match('/[\W_]/', $p_password)) {
            $errors['p_password'] = "Password must contain at least one special character.";
        }
        return $errors;
    }
    

}