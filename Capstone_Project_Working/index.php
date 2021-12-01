<?php

//database connection
include('user_db_connection.php'); 

?>

<!DOCTYPE html>
<html lang="en">
    <head> 
        <title>Bouquet Events</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="user_styles.css">
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
        </script>
        <![endif]-->
        
        <!-- for fontawesome icons in nav bar copied from fontawesome website-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <header>
            <img src="img/Logo1.png" alt="logo" width="140" height="140">
            <div class="nav">
                <a href="index.php">Home</a>
                <a href="user_venue.php">Venues</a>
                <a href="contact.html">Contact</a>
            </div>
        </header>
        <main>
            
            <div class="back">
              <ul id="slider">
                   <li>
                      <img src="img/wedding_index1.jpg" width="100%">
                  </li>
                   <li>
                      <img src="img/wedding_index2.jpg" width="100%">
                  </li>
                  <li>
                      <img src="img/wedding_index3.jpg"  width="100%">
                  </li>
                 
                                 
                 </ul>
                 <script>
                  // Slide every slideDelay seconds
                  const slideDelay = 2000;

                  const dynamicSlider = document.getElementById("slider");

                  var curSlide = 0;
                  window.setInterval(()=>{
                    curSlide++;
                    if (curSlide === dynamicSlider.childElementCount) {
                      curSlide = 0;
                    }

                    // Actual slide
                    dynamicSlider.firstElementChild.style.setProperty("margin-left", "-" + curSlide + "00%");
                  }, slideDelay);

                </script>
            </div><br>
            
            <section>
            <div class="container">
                <h1>Over view of
                  <span
                     class="txt-rotate"
                     data-period="2000"
                     data-rotate='[ "Gallery."]'></span>
                </h1>
                </div>
                <script>
                    var TxtRotate = function(el, toRotate, period) {
                      this.toRotate = toRotate;
                      this.el = el;
                      this.loopNum = 0;
                      this.period = parseInt(period, 10) || 2000;
                      this.txt = '';
                      this.tick();
                      this.isDeleting = false;
                    };

                    TxtRotate.prototype.tick = function() {
                      var i = this.loopNum % this.toRotate.length;
                      var fullTxt = this.toRotate[i];

                      if (this.isDeleting) {
                        this.txt = fullTxt.substring(0, this.txt.length - 1);
                      } else {
                        this.txt = fullTxt.substring(0, this.txt.length + 1);
                      }

                      this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

                      var that = this;
                      var delta = 300 - Math.random() * 100;

                      if (this.isDeleting) { delta /= 2; }

                      if (!this.isDeleting && this.txt === fullTxt) {
                        delta = this.period;
                        this.isDeleting = true;
                      } else if (this.isDeleting && this.txt === '') {
                        this.isDeleting = false;
                        this.loopNum++;
                        delta = 500;
                      }

                      setTimeout(function() {
                        that.tick();
                      }, delta);
                    };

                    window.onload = function() {
                      var elements = document.getElementsByClassName('txt-rotate');
                      for (var i=0; i<elements.length; i++) {
                        var toRotate = elements[i].getAttribute('data-rotate');
                        var period = elements[i].getAttribute('data-period');
                        if (toRotate) {
                          new TxtRotate(elements[i], JSON.parse(toRotate), period);
                        }
                      }
                      // INJECT CSS
                      var css = document.createElement("style");
                      css.type = "text/css";
                      css.innerHTML = ".txt-rotate > .wrap { border-right: 0.08em solid #666 }";
                      document.body.appendChild(css);
                    };
                </script>
            
             <div>
                <div class="row">
                <div class="column">
                    <center>
                <img src="img/d1.jpg" width="155" height="135" alt="location1">
                <img src="img/d2.jpg" width="155" height="135" alt="location2">
                <img src="img/d3.jpg" width="155" height="135" alt="location3">
                <img src="img/d4.jpg" width="155" height="135" alt="location4">
                <img src="img/d5.jpg" width="155" height="135" alt="location5">
                <img src="img/d6.jpg" width="155" height="135" alt="location6">
                <img src="img/d7.jpg" width="155" height="135" alt="location7">
                <img src="img/d8.jpg" width="155" height="135" alt="location8">
                    </center>
              </div>
                
            <div class="column">
                <center>
                <img src="img/d9.jpg" width="155" height="135" alt="location9">
                <img src="img/d10.jpg" width="155" height="135" alt="location10">
                <img src="img/d11.jpg" width="155" height="135" alt="location11">
                <img src="img/d12.jpg" width="155" height="135" alt="location12">
                <img src="img/d13.jpg" width="155" height="135" alt="location13">
                <img src="img/d14.jpg" width="155" height="135" alt="location14">
                <img src="img/heart-529607_1280.jpg" width="155" height="135" alt="location15">
                <img src="img/drinks-1283608_1280.jpg" width="155" height="135" alt="location16">
                </center>
            </div>       
            </div>
                 
                 <div>
                  </section>
                 <section>
            <div class="container">
                <h1>Upcoming
                  <span
                     class="txt-rotate"
                     data-period="2000"
                     data-rotate='[ "Events."]'></span>
                </h1>

                </div>
            </section>
            </div>
            </div>

            <div class="grid">
            <?php
              $venue = $db->query("SELECT * FROM events JOIN venues ON events.id_venues = venues.id_venues");
              while($row=$venue->fetch_assoc()):
                $trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
                unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);        
              ?> 
              <div class="grid-item">
              <div class="card">
              <?php $image=$row['banner'] ?>
              <?= " <img class='card-img' src='$image' alt='Venue Image';' /> "; ?>
              <div class="card-content">
                  <h3 class="card-header"><b><?php echo ucwords($row['event']) ?><b></h3>
                  <p class="card-text">
                    <strong> <?php echo date("M d, Y h:i A",strtotime($row['schedule'])) ?></strong>
                    <br>
                    <?php echo ' Venue: '.$row['name'] ?>
                    <br>
                    <small><?php echo ' Note: '.$row['eve_description'] ?></small>
                  </p>
              </div>
              </div>
              </div>      
      <?php endwhile; ?>
        </div>
        </section>
        </main>
        <footer class="footer">
            <div class="footer-top container">
                <div class="footer-hours">
                    <h2><span>OFFICE HOURS</span></h2>
                    <p><span class="days">Monday</span> <span class="timing">10am - 6pm</span></p>
                    <p><span class="days">Tuesday</span> <span class="timing">10am - 6pm</span></p>
                    <p><span class="days">Wednesday</span> <span class="timing">8am - 6pm</span></p>
                    <p><span class="days">Thursday</span> <span class="timing">8am - 6pm</span></p>
                    <p><span class="days">Friday</span> <span class="timing">6am - 8pm</span></p>
                    <p><span class="days">Satday</span> <span class="timing">6am - 8pm</span></p>
                </div>

                <div class="footer-location">
                    <h2><span>LOCATION</span></h2>
                    <p>26 Gerber meadows drive, Wellesley, ON N0B 2T0</p>
                    
                </div>

                <div class="footer-follow-link">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-youtube"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-pinterest"></a>
                </div>
            </div>
            <div class="copyright">
                <p> &copy;Copyright 2021 – Bouquet Events. All Rights Reserved.</p>
            </div>
        </footer>
    </body>
</html>