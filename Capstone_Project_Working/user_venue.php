<?php

//database connection
include('user_db_connection.php'); 

?>

<html>
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
                      <img src="img/affair-1238428_1280.jpg" width="900">
                  </li>
                   <li>
                      <img src="img/men-1854191_1280.jpg" width="900">
                  </li>
                  <li>
                      <img src="img/audience-1853662_1280.jpg"  width="1500">
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
            
            <div class="venue"><h1 align="center">OUR VENUES</h1>
                <h3 align="center">CHOOSE FROM EITHER THE ROMANTIC, CLASSIC FEEL OF THE BALLROOM OR THE RUSTIC, CHARMING VIBE OF THE SEASONAL HIDEAWAY. </h3></div>
        
            <section>
            <div class="container">
                <h1>For your
                  <span
                     class="txt-rotate"
                     data-period="2000"
                     data-rotate='[ "Wedding.", "Birthday.", "Reception.", "Engagement.", "fun!" ]'></span>
                </h1>
                
                <img src="img/beach.jpg" alt="Snow" style="width:100%">
                  <div class="centered">Your Day. Your Choice. <br> Dream events with bouquet Events
                </div>
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
            </section>   
            <div class="tb">
                <center>
                <h3>Choose location here</h3>
            <table align="center">
              <tr>
                <th>Picture</th>
                <th>Venue</th>
                <th>Address</th>
                <th>Description</th>
                <th>Rate</th>
                <th>Guest Capacity</th>
                <th>Book</th>
              </tr>
              <?php
              $venue = $db->query("SELECT * FROM venues");
              while($row=$venue->fetch_assoc()):
                $trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
                unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);        
              ?>
              <tr>
                  <?php $image=$row['venue_image'] ?>
                  <td><?= " <img src='$image' height='200px' alt='Venue Image' width='250px';' /> "; ?></td>                  
                  <td><b><?php echo $row['name'] ?></b></td>
                  <td><?php echo $row['address'] ?></td>
                  <td><?php echo $row['description'] ?></td>
                  <td><?php echo $row['rate'].' Per hour' ?></td>
                  <td><?php echo $row['capacity'] ?></td>
                  <td><?= "<a href='user_booking_addNew.php?id_venues=$row[id_venues]' class='btn btn-primary'>Book your event now</a>"; ?></td>
              
                </tr>
              <?php endwhile; ?>
            </table>
                </center>
            </div>
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