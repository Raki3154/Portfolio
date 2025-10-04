<?php
session_start();
include "database.php";
if (isset($_POST['submit'])) 
{
    // Get form data
    $name = $_POST["Name"];
    $email = $_POST["Mail"];
    $message = $_POST["Mess"];
    // Insert into DB
    $sql = "INSERT INTO user(Name, Mail, Mess) VALUES ('$name', '$email', '$message')";
    if ($conn->query($sql) === TRUE) 
	{
        // Include PHPMailer files
        require 'phpmailer/PHPMailer.php';
        require 'phpmailer/SMTP.php';
        require 'phpmailer/Exception.php';
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "rakkesh3154@gmail.com"; // Replace with your Gmail
        $mail->Password = "llbs lvgv fpna wrol"; // Gmail App Password
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;
        // -------- Send to Admin --------
        $mail->setFrom($email, $name);
        $mail->addAddress("rakkesh3154@gmail.com", "Admin");
        $mail->Subject = "New Contact Form Submission";
        $mail->Body = "Name: $name\nEmail: $email\nMessage:\n$message";
        $mail->send();

        // -------- Send to User --------
        $mail->clearAddresses();
        $mail->setFrom("rakkesh3154@gmail.com", "Admin");
        $mail->addAddress($email, $name);
        $mail->Subject = "Thank you for contacting us!";
        $mail->Body = "Dear $name,\n\nWe have received your message, Thanks for connecting with us !! \n\nWe will reply soon.";
        $mail->send();

        $_SESSION['msg'] = "Message sent successfully to both admin and user";
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } 
	else 
	{
        $_SESSION['msg'] = "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Rakkesh | Portfolio</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
	<div id="particles-js"></div>
	<nav class="navbar">
		<div class="nav-container">
			<div class="nav-logo">
				<span class="logo-text">Rakkesh</span>
				<div class="logo-glow"></div>
			</div>
			<ul class="nav-menu" id="nav-menu">
				<li><a href="#home" class="nav-link">Home</a></li>
				<li><a href="#about" class="nav-link">About</a></li>
				<li><a href="#skills" class="nav-link">Skills</a></li>
				<li><a href="#experience" class="nav-link">Experience</a></li>
				<li><a href="#education" class="nav-link">Education</a></li>
				<li><a href="#projects" class="nav-link">Projects</a></li>
				<li><a href="#contact" class="nav-link">Contact</a></li>
			</ul>
			<div class="nav-toggle" id="nav-toggle">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
	</nav>

  <!-- Hero Section -->
  <section id="home" class="hero">
    <div class="hero-content">
      <div class="hero-text">
        <h1 class="hero-title">
          <span class="title-line">Hello, I'm</span>
          <span class="title-main">Rakkesh S A</span>
          <span class="title-sub">Creative Developer</span>
        </h1>
        <p class="hero-description">
          I craft digital experiences that blend innovation with elegance. 
          <span class="typewriter" data-words='["Full Stack Developer", "UI/UX Designer", "Problem Solver"]'></span>
        </p>
        <div class="hero-buttons">
			<a href="#contact" class="btn btn-primary">
				<span>Get In Touch</span>
				<div class="btn-glow"></div>
			</a>
			<a href="images/Resume.pdf" class="btn btn-secondary" target="_blank">
				<span>Download Resume</span>
				<i class="fas fa-download"></i>
			</a>
        </div>
      </div>
      <div class="hero-visual">
        <div class="profile-container">
          <img src="images/profile.jpg" alt="Rakkesh S A" class="profile-img">
          <div class="profile-glow"></div>
        </div>
      </div>
    </div>
    <div class="scroll-indicator">
      <div class="scroll-arrow"></div>
      <span>Scroll Down</span>
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="about reveal">
    <div class="container">
      <h2 class="section-title">
        <span class="title-number">About Me</span>
      </h2>
      <div class="about-content">
        <div class="about-text">
          <p class="about-intro">I’m Rakkesh, A Computer Science Engineering student passionate about Software and Web development. I enjoy building clean, functional, and user-friendly websites and have developed and hosted several project websites.</p>
          <div class="about-details">
            <div class="detail-item">
              <i class="fas fa-graduation-cap"></i>
              <div>
                <h4>Education</h4>
                <p>Computer Science Engineering</p>
              </div>
            </div>
            <div class="detail-item">
              <i class="fas fa-map-marker-alt"></i>
              <div>
                <h4>Location</h4>
                <p>Chennai, India</p>
              </div>
            </div>
          </div>
        </div>
        <div class="about-stats">
          <div class="stat-card" data-aos="fade-up">
            <div class="stat-number" data-target="10">6</div>
            <div class="stat-label">Projects Completed</div>
          </div>
          <div class="stat-card" data-aos="fade-up" data-aos-delay="100">
            <div class="stat-number" data-target="3">8</div>
            <div class="stat-label">Programming Languages</div>
          </div>
          <div class="stat-card" data-aos="fade-up" data-aos-delay="200">
            <div class="stat-number" data-target="2">2+</div>
            <div class="stat-label">Years of Learning</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Skills Section -->
	<section id="skills" class="skills reveal">
    <div class="container">
		<h2 class="section-title">
			<span class="title-number">My Skills</span>
		</h2>
		<div class="skills-grid">
			<div data-aos="zoom-in" data-aos-delay="300">
				<div class="skill-icon">
					<i class="fab fa-cuttlefish"></i>
				</div>
				<h3>C Program</h3>
			</div>
			<div data-aos="zoom-in" data-aos-delay="300">
				<div class="skill-icon">
					<i class="fab fa-java"></i>
				</div>
				<h3>Java</h3>
			</div>
			<div data-aos="zoom-in" data-aos-delay="300">
				<div class="skill-icon">
					<i class="fab fa-python"></i>
				</div>
				<h3>Python</h3>
			</div>
			<div data-aos="zoom-in" data-aos-delay="300">
				<div class="skill-icon">
					<i class="fab fa-html5"></i>
				</div>
				<h3>HTML</h3>
			</div>
			<div data-aos="zoom-in" data-aos-delay="300">
				<div class="skill-icon">
					<i class="fab fa-bootstrap"></i>
				</div>
				<h3>BootStrap</h3>
			</div>
			<div data-aos="zoom-in" data-aos-delay="300">
				<div class="skill-icon">
					<i class="fab fa-css3-alt"></i>
				</div>
				<h3>CSS</h3>
			</div>
			<div data-aos="zoom-in" data-aos-delay="300">
				<div class="skill-icon">
					<i class="fab fa-js"></i>
				</div>
				<h3>JavaScript</h3>
			</div>
			<div data-aos="zoom-in" data-aos-delay="300">
				<div class="skill-icon">
					<i class="fas fa-database"></i>
				</div>
				<h3>SQL</h3>
			</div>	
			<div data-aos="zoom-in" data-aos-delay="300">
				<div class="skill-icon">
					<i class="fab fa-php"></i>
				</div>
				<h3>PHP</h3>
			</div>
		</div>
    </div>
	</section>
	<!-- Experience Section -->
	<section id="experience" class="about reveal">
		<div class="container">
			<h2 class="section-title">
				<span class="title-number">Experience</span>
			</h2>
			<div class="projects-grid">
			<div class="project-card" data-aos="fade-up">
				<div class="project-content">
					<h3>Internship in Web Development - Oasis Infobyte</h3>
					<p><strong>Duration:</strong> July 15 – Aug 15, 2025<br><strong>Role:</strong> Created responsive web applications.</p>
					<div class="project-tech">
						<span>HTML</span>
						<span>CSS</span>
						<span>PHP</span>
						<span>SQL</span>
					</div>
				</div>
			</div>
			<div class="project-card" data-aos="fade-up">
				<div class="project-content">
					<h3>Internship in Robotics - Evolve Robot Lab</h3>
					<p><strong>Duration:</strong> May 22 – June 09, 2023<br><strong>Role:</strong> Created Mini Robots using IoT components.</p>
					<div class="project-tech">
						<span>Arduino IDE</span>
						<span>IoT</span>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Education Section -->
	<section id="education" class="about reveal">
		<div class="container">
			<h2 class="section-title">
				<span class="title-number">Education</span>
			</h2>
			<div class="projects-grid">
				<div class="project-card" data-aos="fade-up">
					<div class="project-content">
						<h3>B.E. CSE</h3>
						<p>Meenakshi Sundararajan Engineering College<br><strong>CGPA: </strong> 8.27 (Pursuing)</p>
					</div>
				</div>
				<div class="project-card" data-aos="fade-up">
					<div class="project-content">
						<h3>Diploma in CSE</h3>
						<p>Panimalar Polytechnic College<br><strong>Percentage: </strong> 93.89% (2022–2024)</p>
					</div>
				</div>
				<div class="project-card" data-aos="fade-up">
					<div class="project-content">
						<h3>HSC</h3>
						<p>St.John's Matriculation Higher Secondary School<br><strong>Percentage: </strong> 76.83% (2022)</p>
					</div>
				</div>
				<div class="project-card" data-aos="fade-up">
					<div class="project-content">
						<h3>SSLC</h3>
						<p>St.John's Matriculation Higher Secondary School<br><strong>Percentage: </strong> 75% (2020)</p>
					</div>
				</div>	
			</div>
		</div>
	</section>
  <!-- Projects Section -->
  <section id="projects" class="projects reveal">
    <div class="container">
      <h2 class="section-title">
        <span class="title-number">My Projects</span>
      </h2>
      <div class="projects-grid">
        <div class="project-card" data-aos="fade-up">
          <div class="project-image">
            <div class="project-overlay">
				<a href="https://github.com/Raki3154/Obstacle-Avoidance-Robot" class="project-link">
					<i class="fas fa-external-link-alt"></i>
				</a>
			</div>
         </div>		  
          <div class="project-content">
            <h3>Fabrication of Obstacle Avoidance Robot</h3>
            <p>Fabrication of an Obstacle Avoidance Robot detects and navigates around obstacles using sensors and control systems.</p>
            <div class="project-tech">
              <span>Arduino IDE</span>
              <span>IoT</span>
            </div>
          </div>
        </div>
		<div class="project-card" data-aos="fade-up">
          <div class="project-image">
            <div class="project-overlay">
				<a href="https://readversehub.infinityfreeapp.com" class="project-link">
					<i class="fas fa-external-link-alt"></i>
				</a>
			</div>
         </div>		  
          <div class="project-content">
            <h3>ReadVerse</h3>
            <p>ReadVerse is a free online platform designed for seamless reading and sharing of diverse content.</p>
            <div class="project-tech">
              <span>HTML & CSS</span>
              <span>PHP</span>
			  <span>SQL</span>
            </div>
          </div>
        </div>
        <div class="project-card" data-aos="fade-up">
          <div class="project-image">
            <div class="project-overlay">
				<a href="https://keralatourism.infinityfreeapp.com" class="project-link">
					<i class="fas fa-external-link-alt"></i>
				</a>
			</div>
         </div>		  
          <div class="project-content">
            <h3>KeralaTourism</h3>
            <p>Kerala Tourism invites you to explore the serene backwaters, lush greenery, and rich culture of God's Own Country</p>
            <div class="project-tech">
              <span>HTML & CSS</span>
              <span>PHP</span>
			  <span>SQL</span>
            </div>
          </div>
        </div>
		<div class="project-card" data-aos="fade-up">
          <div class="project-image">
            <div class="project-overlay">
				<a href="https://rakkeshportfolio.infinityfreeapp.com" class="project-link">
					<i class="fas fa-external-link-alt"></i>
				</a>
			</div>
         </div>		  
          <div class="project-content">
            <h3>Personal Portfolio</h3>
            <p>A personal portfolio showcasing my skills, projects, and achievements in web development and technology.</p>
            <div class="project-tech">
              <span>HTML & CSS</span>
			  <span>JavaScript</span>
              <span>PHP</span>
			  <span>SQL</span>
            </div>
          </div>
        </div>
		<div class="project-card" data-aos="fade-up">
          <div class="project-image">
            <div class="project-overlay">
				<a href="https://bloodfinder.infinityfreeapp.com" class="project-link">
					<i class="fas fa-external-link-alt"></i>
				</a>
			</div>
         </div>		  
          <div class="project-content">
            <h3>BloodFinder</h3>
            <p>BloodFinder is a platform that connects blood donors with those in urgent need, enabling quick and life-saving matches</p>
            <div class="project-tech">
              <span>HTML & CSS</span>
              <span>PHP</span>
			  <span>SQL</span>
            </div>
          </div>
        </div>
		<div class="project-card" data-aos="fade-up">
          <div class="project-image">
            <div class="project-overlay">
				<a href="https://blockcred.infinityfreeapp.com" class="project-link">
					<i class="fas fa-external-link-alt"></i>
				</a>
			</div>
         </div>		  
          <div class="project-content">
            <h3>BlockCred</h3>
            <p>BlockCred is a blockchain-based platform for secure, verifiable, and tamper-proof academic credential management.</p>
            <div class="project-tech">
              <span>HTML & CSS</span>
			  <span>Solidity</span>
			  <span>EtheriumScript</span>
			  <span>HardHat</span>
              <span>PHP</span>
			  <span>SQL</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="contact reveal">
    <div class="container">
      <h2 class="section-title">
        <span class="title-number">Get In Touch</span>
      </h2>
      <div class="contact-content">
        <div class="contact-info">
          <h3>Let's Connect</h3>
          <div class="contact-items">
            <div class="contact-item">
              <div class="contact-icon">
                <i class="fas fa-envelope"></i>
              </div>
              <div class="contact-details">
                <h4>Email</h4>
                <p>rakkesh3154@gmail.com</p>
              </div>
            </div>
            <div class="contact-item">
              <div class="contact-icon">
                <i class="fas fa-phone"></i>
              </div>
              <div class="contact-details">
                <h4>Phone</h4>
                <p>+91 72004 35033</p>
              </div>
            </div>
            <div class="contact-item">
              <div class="contact-icon">
                <i class="fas fa-map-marker-alt"></i>
              </div>
              <div class="contact-details">
                <h4>Location</h4>
                <p>Chennai, India</p>
              </div>
            </div>
          </div>
        </div>
        <div class="contact-form">
			<h3>Send me a message</h3>
			<form method="POST" action="" class="row g-3">
				<div class="form-group">
					<input type="text" name="Name" placeholder="Your Name" required>
					<div class="form-line"></div>
				</div>
				<div class="form-group">
					<input type="email" name="Mail" placeholder="Your Email" required>
					<div class="form-line"></div>
				</div>
				<div class="form-group">
					<textarea name="Mess" rows="5" placeholder="Your Message" required></textarea>
					<div class="form-line"></div>
				</div>
				<button type="submit" class="btn btn-primary">
				  <span>Send Message</span>
				</button>
			</form>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
  <script src="script.js"></script>
</body>
</html>
