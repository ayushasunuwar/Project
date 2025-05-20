<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Payment Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f8f8;
      display: flex;
      justify-content: center;
      padding: 50px;
    }
    .dashboard-container {
      display: flex;
      margin-top: 50px;
      flex-wrap: wrap;
      border: 1px solid #ccc;
      background: #fff;
      max-width: 900px;
      border:none;
    }
    .payment-methods a{
        text-decoration: none;
    }
    .payment-methods h4{
        margin-top: 20px;
    }
    .column {
      padding: 20px;
      border-right: 1px solid #eee;
      flex: 1;
    }
    .column:last-child {
      border-right: none;
    }
    .payment-methods ul {
      list-style: none;
      padding: 0;
    }
    .payment-methods li {
      margin: 10px 0;
      color: #666;
    }
    .active {
      font-weight: bold;
      color: #8bc34a;
    }
    .form-group {
      margin-bottom: 15px;
      width: 500px;
    }
    input[type="text"], input[type="email"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    input.invalid {
      border-color: red;
    }
    .pay-btn {
      background-color: #8bc34a;
      color: white;
      padding: 15px;
      width: 100%;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
    }
    .card-icons img {
      width: 40px;
      margin-right: 5px;
    }
  </style>
</head>
<body>
    <?php include 'admin_nav.php';?>

<div class="dashboard-container">
  <!-- Payment Methods -->
  <div class="payment-methods">
    <h4>Payment methods</h4>
    <ul>
      <li class="active"><a href="#">Payment by card</a></li>
      <li><a href="admin_pay_dw">Digital wallet</a></li>
    </ul>
  </div>

  <!-- Payment Form -->
  <div class="column">
    <div class="card-icons">
      <img src="https://img.icons8.com/color/48/000000/visa.png"/>
      <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png"/>
      <img src="https://img.icons8.com/color/48/000000/amex.png"/>
      <img src="https://img.icons8.com/color/48/000000/discover.png"/>
    </div>
    <div class="form-group">
      <label>Card number</label>
      <input type="text" id="cardNumber" placeholder="1234 5678 9012 3456" />
    </div>
    <div class="form-group">
      <label>Expiry date</label>
      <input type="text" id="expiry" placeholder="MM/YY" />
    </div>
  
    <div class="form-group">
      <label>Email</label>
      <input type="email" id="email" placeholder="example@email.com" />
    </div>
    <button class="pay-btn" onclick="validateForm()">PAY NOW</button>
  </div>

<script>
function validateForm() {
  const card = document.getElementById('cardNumber');
  const expiry = document.getElementById('expiry');
  const cvv = document.getElementById('cvv');
  const email = document.getElementById('email');

  let isValid = true;

  [card, expiry, cvv, email].forEach(input => input.classList.remove('invalid'));

  if (!/^\d{4} \d{4} \d{4} \d{4}$/.test(card.value)) {
    card.classList.add('invalid');
    isValid = false;
  }
  if (!/^\d{2}\/\d{2}$/.test(expiry.value)) {
    expiry.classList.add('invalid');
    isValid = false;
  }
  if (!/^\d{3,4}$/.test(cvv.value)) {
    cvv.classList.add('invalid');
    isValid = false;
  }
  if (!/^\S+@\S+\.\S+$/.test(email.value)) {
    email.classList.add('invalid');
    isValid = false;
  }

  if (isValid) {
    alert("Payment submitted!");
  } else {
    alert("Please fill all fields correctly.");
  }
}
</script>

</body>
</html>
