<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Travel Booking</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <div class="logo">TravelEase</div>
    <nav>
        <a href="#">Home</a>
        <a href="#packages">Packages</a>
        <a href="#booking">Booking</a>
        <a href="#">Contact</a>
    </nav>
</header>

<section class="hero">
    <h1>Explore The World With Us</h1>
    <p>Book memorable journeys with comfortable and affordable travel packages.</p>
    <a href="#booking" class="hero-btn">Book Now</a>
</section>


<section id="packages" class="packages">

<h2>Popular Packages</h2>

<div class="cards">

<div class="card">
<h3>Goa Beach Tour</h3>
<p>Enjoy beaches, resorts and beautiful coastal views.</p>
<p class="price">₹15,000</p>
</div>

<div class="card">
<h3>Kerala Backwaters</h3>
<p>Experience nature, houseboats and peaceful locations.</p>
<p class="price">₹20,000</p>
</div>

<div class="card">
<h3>Manali Adventure</h3>
<p>Explore mountains, snow and adventure activities.</p>
<p class="price">₹25,000</p>
</div>

</div>

</section>


<section id="booking" class="booking">

<div class="form-box">

<h2>Book Your Trip</h2>

<form action="booking.php" method="post">

<label>Name</label>
<input type="text" name="name" required>

<label>Email</label>
<input type="email" name="email" required>

<label>Phone</label>
<input type="text" name="phone" required>

<label>Select Package</label>

<select name="package" required>
<option value="">Select Package</option>
<option>Goa Beach Tour</option>
<option>Kerala Backwaters</option>
<option>Manali Adventure</option>
</select>

<label>Number of Travelers</label>
<input type="number" name="travelers" min="1" required>

<label>Travel Date</label>
<input type="date" name="date" required>

<button type="submit">Confirm Booking</button>

</form>

</div>

</section>


<footer>
<p>© 2026 TravelEase. All Rights Reserved.</p>
</footer>


</body>
</html>