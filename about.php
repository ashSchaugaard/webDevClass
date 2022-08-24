<!DOCTYPE html>
<html lang="en">

<head>
  <title>About Page</title>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="css/index.css">
   
</head>
<body>

<!----
<body onload="promptFunction()">
  

  <script>
    function promptFunction() {
      let visitor = prompt ("Hi! What is your name?");

    let time = new Date().getHours();

    console.log("I can't believe it's " + time)

    let message = "";

    if (time < 12){
        message = "Good Morning, ";
        console.log(message);
    } else if (time < 17){
        message = "Good Afternoon, ";
        console.log(message);
    } else {
        message = "Good Night, ";
        console.log(message);

    }
    alert(message + visitor + "!" + "\nThank you for reviewing my resume site.");
}
  </script>


----->

<header>
  <div class="heading">
        <a href="index.php"><img class="pink-logo" src="images/pinkLogo.png" alt="Ashley Schaugaard Logo Image"></a>
        <a class="btn btn-floating m-2" href="about.php" role="button">
          <i class="fab fa-google">
          <img id="email-icon" src="images/bootstrapIcons/envelope.svg">
          </i>
        </a>
        <!---  <a href="about.html" class="emailMe"><strong>email me :)</strong></a>-->
      </div>
      <div class="menu">
       <div class="title">MENU</div>
        <ul class="nav">
          <li><a href="index.php"><span>home</span></a></li>
          <li ><a href="portfolio.php"><span>portfolio</span></a></li>
          <li class="active"><a href="about.php"><span>email me</span></a></li>
        </ul>
  </div>
</header>



<img id="contactInfo" src="images/ContactInfo.png" class="rounded mx-auto d-block">

    <?php
          $greeting = "Hello my name is ";
          $name = "Ashley";

          $combine = $greeting + $name;

          echo $greeting . $name;

          ?>
    
   
    <?php

		$fnameErr = $lnameErr = $emailErr = $contBackErr = "";
		$fname = $lname = $email = $contBack = $comment = "";
		$formErr = false;

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			if (empty($_POST["fname"])) {
				$fnameErr = "First name is required.";
				$formErr = true;
			} else {
				$fname = cleanInput($_POST["fname"]);
				//Use REGEX to accept only letters and white spaces
				if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
					$fnameErr = "Only letters and standard spaces allowed.";
					$formErr = true;
				}
			}
      if (empty($_POST["lname"])) {
				$lnameErr = "Last name is required.";
				$lormErr = true;
			} else {
				$lname = cleanInput($_POST["lname"]);
				//Use REGEX to accept only letters and white spaces
				if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
					$lnameErr = "Only letters and standard spaces allowed.";
					$formErr = true;
				}
			}
      
			
			if (empty($_POST["email"])) {
				$emailErr = "Email is required.";
				$formErr = true;
			} else {
				$email = cleanInput($_POST["email"]);
				// Check if e-mail address is formatted correctly
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$emailErr = "Please enter a valid email address.";
					$formErr = true;
				}
			}
			
			if (empty($_POST["contact-back"])) {
				$contBackErr = "Please let us know if we can contact you back.";
				$formErr = true;
			} else {
				$contBack = cleanInput($_POST["contact-back"]);
			}
			
			$comment = cleanInput($_POST["comments"]);
		}

		function cleanInput($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	?>



    <div class="containerAbout">

	<!-- Contact Form Start -->
      <form action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> method="POST" novalidate>
        <p><b>contact me!</b></p>
        <br/>
	<!-- First Name Field -->
        <label for="fname">First Name</label>
						<span class="text-danger">*<?php echo $fnameErr; ?></span>
						<input type="text" class="form-control" id="fname" placeholder="First Name" name="fname" value="<?php if(isset($fname)) {echo $fname;}?>" /> <br>
	<!-- Last Name Field -->
        <label for="lname">Last Name</label> <br>
            <span class="text-danger">*<?php echo $lnameErr; ?></span>
            <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname" value="<?php if(isset($lname)) {echo $lname;}?>" /> <br>
	<!-- Email Field -->
        <label for="email">Email</label> <br>
            <span class="text-danger">*<?php echo $emailErr; ?></span>
						<input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" value="<?php if(isset($email)) {echo $email;} ?>" />
        
<!-- Radio Button Field -->
<div class="form-group">
							<label class="control-label">Do you want continued correspondence?</label>
							<span class="text-danger">*<?php echo $contBackErr; ?></span>
							<div class="form-check">
								<input type="radio" class="form-check-input" name="contact-back" id="yes" value="Yes"  <?php if ((isset($contBack)) && ($contBack == "Yes")) {echo "checked";}?>/>
								<label class="form-check-label" for="yes" >Yes</label>
							</div>
							<div class="form-check">
								<input type="radio" class="form-check-input" name="contact-back" id="no" value="No" <?php if ((isset($contBack)) && ($contBack == "No")) {echo "checked";}?>/>
								<label class="form-check-label" for="no" >No</label>
							</div>
						</div>
        </select> <br>
    
        <label for="subject">Subject</label> <br>
        <textarea id="subject" name="subject" placeholder="Lets chat.." style="height:200px"></textarea> <br>
    
        <input onclick="contact()" type="submit">
      </form>
    </div>
  </div>

<h2>My Skills</h2>
        <?php

        function skills() {
        
        $skills = ["Graphic Design", "Web Design", "Adobe Creative Cloud", "HTML", "CSS", "JavaScript", "Wordpress"];

        echo 'My skills are: <br><ul>';

        foreach ($skills as $ashley) {
          echo "<li>" . $ashley . "</li>";
        }

        echo "</ul>";

        }

        // This runs the function

        skills();

        ?>


  <button id="toggle">Hide This Section</button>

  <script>


  function contact() {
      const message = document.getElementById("fname");
        message.innerHTML = "";
        
          try {
            if(contact == "") {throw "Field cannot be empty.";
              }
                else if(isNaN(contact)) 
                  {throw "This is a number";
                    contact = Number(contact);
                      }
                        else if(contact === "") {throw "That works great, thanks!";
                          }
                          }catch (error) {
                          console.log = "Input is " + error;
                          }
                          }

    $("#toggle").click(function () {
         $("table").toggle();
    });
  </script>
<br>

  <table class="table table-borderless table-hover display-1" id="references"></table>
  <tbody>
    <tr>
      <th></th>
      <th></th>
    </tr>
    <tr>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td> </td>
      <td></td>
    </tr>
    <tr>
      <td> </td>
      <td></td>
    </tr>
    <tr>
      <td> </td>
      <td></td>
    </tr>
  </tbody>
  
<script>        

let text = "<tr><th>Name</th><th>Email</th></tr>";

  var people = [
      { name: "Jessica Curran",email: "jessica.curran@slcc.edu"},
      { name: "Virag White",email: "virag.white@slcc.edu"},
      { name: "Kerry Gonzales", email: "kerry.gonzales@slcc.edu"},
      { name: "Chris Dalley", email:"cdalley@vision.com"}
  ];

  for (let i = 0; i < people.length; i++) {
      text += "<tr><td>" + people[i].name + "</td><td> " + people[i].email + "</td></tr>";
  }

  document.getElementById("references").innerHTML = text;
  
  </script>

  <br>


  <button onclick="thankYou()">Thank You!</button>

  <p id="jsThankYou"></p>
  
  <script>
  function thankYou() {
    let person = prompt("Please enter your name", "");
    if (person != null) {
      document.getElementById("jsThankYou").innerHTML =
      "Hello " + person + "! Thank you for reviewing my resume site."
    }
  }
  </script>
  
  
  <footer class=" text-center text-white" style="background-color: rgba(167, 242, 252)">
    <div class="container p-4 pb-0">
      <!-- Section: Social media -->
      <div class="mb-4">
        <!-- Google -->
        <a class="btn btn-outline-light btn-floating m-2" href="#!" role="button"><i class="fab fa-google"><img src="images/bootstrapIcons/envelope.svg"></i
        ></a>
  
        <!-- Instagram -->
        <a class="btn btn-outline-light btn-floating m-2" href="https://www.instagram.com/askow_art/" target="_blank" role="button">
          <i class="fab fa-instagram">
            <img src="images/bootstrapIcons/instagram.svg">
          </i>
        </a>
  
        <!-- Linkedin -->
        <a class="btn btn-outline-light btn-floating m-2" href="#!" role="button">
          <i class="fab fa-linkedin-in">
            <img src="images/bootstrapIcons/linkedin.svg">
            </i>
        </a>
  
        <!-- Github -->
        <a class="btn btn-outline-light btn-floating m-2" href="#!" role="button">
          <i class="fab fa-github">
            <img src="images/bootstrapIcons/github.svg">
          </i>
        </a>
      </div>
      <!-- Section: Social media -->
    </div>
   
    <!-- Copyright -->
    <div class="text-end p-2" style="background-color: rgba(69, 169, 187, 0.5);">
      <a href="AshleySchaugaardResume.pdf" target="_blank" download><p>Resume</p></a>
      <a href="https://ashannescha.wixsite.com/website" target="_blank"><p>More of my Work</p></a>
      <a href="/about.php" target="_blank"><p>Contact Me</p></a>
      <br/><br>
      <div id="copyright"> 
        © 2022 Copyright:
        <a class="text-white" >Ashley Schaugaard</a>
      </div>
  
    </div>
    <!-- Copyright -->
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</div>
</body>

</html>