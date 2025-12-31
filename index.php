<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Location</title>
</head>
<body>

<h2>User Location (No Popup)</h2>
<p id="location">Loading...</p>

<script>
fetch("get-location.php")
  .then(res => res.json())
  .then(data => {
    document.getElementById("location").innerHTML = `
      City: ${data.city}<br>
      Region: ${data.region}<br>
      Country: ${data.country}<br>
      IP: ${data.ip}
    `;
  })
  .catch(err => {
    document.getElementById("location").innerText = "Location unavailable";
  });
</script>

</body>
</html>
