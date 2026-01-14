// document.getElementById('doctor-form').style.display = 'block';
function showDoctorForm() {
    document.getElementById('doctor-form').style.display = 'block';
    document.getElementById('patient-form').style.display = 'none';
    document.getElementById("d_Form").addEventListener("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(this);
        // console.log(ROOT);
        fetch(ROOT + "/signup/signup_doctor", {
            method: "POST",
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                // CLEAR all previous errors
                document.querySelectorAll('.error-message').forEach(el => {
                    el.innerText = "";
                });

                if (data.status === 'error') {
                    // console.log(data.errors);
                    for (let key in data.errors) {
                        document.getElementById(key + '_error').innerText = data.errors[key] || "";
                    }
                }
                if (data.status === 'success') {
                    window.location.href = ROOT + "/login";
                }

            })
            .catch(error => console.error('Error:', error));
    });
}

function showPatientForm() {
    document.getElementById('doctor-form').style.display = 'none';
    document.getElementById('patient-form').style.display = 'block';
    document.getElementById("p_Form").addEventListener("submit", function (e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        fetch(ROOT + "/signup/signup_patient", {
            method: "POST",
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                // CLEAR all previous errors
                document.querySelectorAll('.error-message').forEach(el => {
                    el.innerText = "";
                });

                if (data.status === 'error') {
                    // console.log(data.errors);
                    for (let key in data.errors) {
                        document.getElementById(key + '_error').innerText = data.errors[key] || "";
                    }
                }
                if (data.status === 'success') {
                    window.location.href = ROOT + "/login";
                }

            })
            .catch(error => console.error('Error:', error));
    });
}
// Clear error messages on input
document.querySelectorAll('input, select').forEach(input => {
    input.addEventListener('input', function () {
        const errorEl = document.getElementById(this.name + '_error');
        if (errorEl) errorEl.innerText = "";
    });
});