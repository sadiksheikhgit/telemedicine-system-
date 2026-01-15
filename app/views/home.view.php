<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="<?php echo ROOT ?>/assets/css/home.css">
</head>
<body>

<?php require_once  'C:\xampp\htdocs\telemedicine-system-\app\views\components\navbar.php'; ?>
<section class = "container">
    <div class="slider-wrapper">
        <div class="slider">
            <img id="slide-1" src = "<?php echo ROOT ?>/assets/images/home/slider_1.png" alt="Welcome">
            <img id="slide-2" src = "<?php echo ROOT ?>/assets/images/home/slider_2.png" alt="Welcome">
        </div>
        <div class="slider-nav">
            <a href="#slide-1"></a>
            <a href="#slide-2"></a>
        </div>
    </div>

</section>
<section class="services">

    <div class = "serHeader">
        <h1> Please Contacts us with your needs! </h1>
    </div>

    <div class = "serGrid">
        <a href = "<?php echo ROOT ?>/doctors" class="card">
            <img src="<?php echo ROOT ?>/assets/images/home/appointment.png" alt="take doctor appointment">
            <h3> Take Appointments</h3>
            <p>Consult with our Doctors and Specialists accordingly to your need. </p>
        </a>



        <a href = "<?php echo ROOT ?>/medicines" class="card">
            <img src="<?php echo ROOT ?>/assets/images/home/get_medicine.png" alt="take doctor appointment" >
            <h3> Buy Medicine</h3>
            <p>Buy medicine online with instant delivery. </p>
        </a>



        <a href = "<?php echo ROOT ?>/labTest" class="card">
            <img src="<?php echo ROOT ?>/assets/images/home/labtest.png" alt="take doctor appointment">
            <h3> Book Lab test</h3>
            <p>Book your lab tests and recieve your lab reports online . </p>
        </a>
    </div>
</section>

<section class="partners">

    <div class = "partner-container">
        <div class ="partnertext">
            <h1> Our Bussiness Partners </h1>
            <p>Telemedicine++ is trusted by our partners</p>
        </div>
    <div class = "partnerGrid">
            <img src="<?php echo ROOT ?>/assets/images/home/alok.png" alt="partner">
            <img src="<?php echo ROOT ?>/assets/images/home/care.png" alt="partner">
            <img src="<?php echo ROOT ?>/assets/images/home/ibn.png" alt="partner">
            <img src="<?php echo ROOT ?>/assets/images/home/popular.png" alt="partner">
            <img src="<?php echo ROOT ?>/assets/images/home/public.png" alt="partner">
            <img src="<?php echo ROOT ?>/assets/images/home/square.png" alt="partner">
    </div>
</section>
<section class ="faqSec"></section>
    <div class="wrapper">
        <h1>Frequently aasked question</h1>

        <div class="faq"> 
            <button class="accordian">
                What is Telemedicine++?
                <span class="icon">+</span>
            </button>
            <div class="pannel">
                <p>Telemedicine++ is a Healthcare App to help people with their health, providing care,medicines,lab reults and so on online</p>
            </div>
            </div>

        <div class="faq"> 
            <button class="accordian">
                How does Telemedicine++ work?
                <span class="icon">+</span>

            </button>
            <div class="pannel">
                <p>You create an account, select a doctor, schedule an appointment, or order medicine,labtest.</p>
            </div>
        </div>
        
        <div class="faq"> 
            <button class="accordian">
                Who can use Telemedicine++?
                <span class="icon">+</span>
            </button>
            <div class="pannel">
                <p>Anyone with a device and internet access can set up a valid account and use this App.</p>
            </div>
        </div>

        <div class="faq"> 
            <button class="accordian">
                Why should someone choose Telemedicine++?
            <span class="icon">+</span>
            </button>
            <div class="pannel">
                <p>Every services in this App is verified, and we are trusted by many Hospitals and Healthcare services all over the country.</p>
            </div>
        </div>
    </div>
</section>
<script>
      var acc = document.getElementsByClassName("accordian");

      for (var i = 0; i < acc.length; i++) {

        acc[i].addEventListener("click", function () {


        for (var j=0;j<acc.length;j++){
            if(acc[j] !== this ){
                acc[j].classList.remove("active");
                acc[j].parentElement.classList.remove("active");
                acc[j].nextElementSibling.style.display="none";
                acc[j].querySelector(".icon").textContent="+";
            }
        }
        
        
        //   this.classList.toggle("active");

        //   this.parentElement.classList.toggle("active");

          var pannel = this.nextElementSibling;
          var isOpen =pannel.style.display === "block";

         if (isOpen){
            this.classList.remove("active");
            this.parentElement.classList.remove("active");
            pannel.style.display="none";
            this.querySelector(".icon").textContent="+";
         }else{
            this.classList.add("active");
            this.parentElement.classList.add("active");
            pannel.style.display="block";
            this.querySelector(".icon").textContent="-";
         }
        });
      }
    </script>


<?php require_once  'C:\xampp\htdocs\telemedicine-system-\app\views\components\footer.php'; ?>
</body>
</html>

