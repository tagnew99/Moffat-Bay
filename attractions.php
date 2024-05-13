<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="Styles/styles_Att.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<body>

 <div class="header">
    <img src="Images/logo.png" alt="Logo" /> 
    <h1>Explore Moffat Bay</h1> </div>

<div class="navbar">
  <a class="nav-item" href="HMP2.php"> <i class="fa-solid fa-house"></i> Home</a>
  <a class="nav-item" href="AP.php"> <i class="fa-solid fa-book"></i> About Us</a>
  <div class="dropdown nav-item">
    <a class="nav-item" href="#"> <i class="fa-solid fa-check"></i> Reservations</a>
    <div class="dropdown-content">
      <a class="dropdown-item" href="reservation.php">Make a Reservation</a>
      <a class="dropdown-item" href="attractions.php">Explore</a>
      <a class="dropdown-item" href="lookup.php">Reservation Confirmation</a>
      <a class="dropdown-item" href="reservationsummary.php">Reservation Summary</a>
    </div>
  </div>

    <?php
      include 'user_status.php';
    ?>
</div>


<!-- Side-by-side container for image and text -->
<div class="flex-container-1">
  <div class="image-container-1"> 
    <img src="Images/hiking2.jpg" alt="Hiking" />
    <div class="text-block-1"> 
      <h4>Explore</h4>
      <p>Hiking</p>
    </div>
  </div>
  
  <div class="side-text-1"> 
    <p>
  Explore our scenic hiking trails along the picturesque mountain paths. Whether you're an experienced hiker or a casual walker, our trails offer breathtaking views, a diverse range of flora and fauna, and a sense of serenity.</p>

  <p>To ensure the preservation of our natural environment, we require all visitors to obtain a hiking permit. This permit grants you access to the trails and helps support the maintenance of our hiking paths.</p>

  <p>Before you embark on your adventure, make sure to secure your permit. Click <a href="reservation.html">'here'</a> to purchase one and start planning your journey. Whether you prefer a leisurely stroll or a challenging hike, our trails offer something for everyone.
</p>
  </div>
</div>

<!-- Side-by-side container for image and text -->
<div class="flex-container-2">
  <div class="image-container-2"> 
    <img src="Images/Kayaking.jpeg" alt="Hiking" />
    <div class="text-block-2"> 
      <h4>Refresh</h4>
      <p>Kayaking</p>
    </div>
  </div>
  
  <div class="side-text-2"> 
    <p>
  We offer a wide selection of kayaks for rent, ranging from single-person to tandem and family-sized options. This means you can enjoy a day on the water without the hassle of bringing your own kayak, making your trip lighter and more convenient.</p>

  <p>Our rental kayaks are well-maintained and come with all the necessary equipment, including paddles and life jackets. We also provide brief safety instructions to ensure you have a fun and safe kayaking experience.</p>

  <p>To schedule your rental, simply click <a href="reservation.html">'here'</a> and choose the size and type of kayak that best suits your needs. Whether you're a beginner or an experienced kayaker, we have the perfect kayak for you.
</p>
  </div>
</div>

<!-- Side-by-side container for image and text -->
<div class="flex-container-3">
  <div class="image-container-3"> 
    <img src="Images/scuba2.jpeg" alt="Hiking" />
    <div class="text-block-3"> 
      <h4>Deep Dive</h4>
      <p>Scuba Diving</p>
    </div>
  </div>
  
  <div class="side-text-3"> 
   <p>
  Certified divers can enjoy the underwater wonders of Moffat Bay, with its diverse marine life and unique geological features. Whether you choose to bring your own diving gear or rent from our well-equipped rental shop, you're in for an unforgettable experience.</p>

  <p>Our rental shop offers high-quality diving equipment, ensuring you have everything you need for a safe and enjoyable dive. Our experienced staff can guide you through the best spots in the bay, from vibrant coral reefs to intriguing shipwrecks.</p>

  <p>To schedule your dive, click <a href="reservation.html">'here'</a>. Choose from a variety of dive packages tailored to your level of experience. Get ready to explore the beauty that lies beneath the waves at Moffat Bay.
</p>
  </div>
</div>

<!-- Side-by-side container for image and text -->
<div class="flex-container-4">
  <div class="image-container-4"> 
    <img src="Images/whalewatch.png" alt="Hiking" />
    <div class="text-block-4"> 
      <h4>Experience</h4>
      <p>Whale Watching</p>
    </div>
  </div>
  
  <div class="side-text-4"> 
    <p>
  Moffat Bay is home to some of the most magnificent whale species, and a boat tour is the perfect way to see them up close. Whether you're a seasoned whale watcher or a first-time visitor, you'll be amazed by these majestic creatures as they glide through the waters.</p>

  <p>Our guided boat tours are designed to give you the best chance to witness whales in their natural habitat. Our experienced guides will share interesting facts about the whales, the surrounding ecosystem, and the best viewing spots.</p>

 <p>Make sure to bring your camera to capture these incredible moments. To schedule your boat tour and reserve your spot, click <a href="reservation.html">'here'</a>. Get ready for an unforgettable experience as you set sail in Moffat Bay to witness the beauty of the whales.
</p>
  </div>
</div>



<div class="footer">
  <footer>&copy; 2024 Moffat Bay Lodge. All rights reserved.</footer>
</div>

</body>
</html>
