let orderForm = document.getElementById("odForm");
  let oih3 = document.createElement("h3");
  oih3.textContent = "Order Information";

  orderForm.appendChild(oih3);
  let form = document.createElement("form");
  form.action = "javascript:;";
  form.onsubmit = (ev) => submitForm(ev);

  form.innerHTML = `<ul>
  <li>
    <label for="qty">Quantity</label>
    <input type="number" id="qty" name="qty" value="1" min="1" required/>
  </li>

  <h3>Billing Address</h3>
  <li>
    <label for="fname">Full Name</label>
    <input
      type="text"
      id="fname"
      name="fname"
      placeholder="John Doe"
      required
    />
  </li>
  <li>
    <label for="phone_number">Phone Number:</label>
    <input
      type="tel"
      id="phone_number"
      name="phone_number"
      pattern="\\d{3}[\\-]?\\d{3}[\-]?\\d{4}"
      placeholder="123-456-7890"
      required
    />
  </li>
  <li>
    <label for="email">Email</label>
    <input
      type="email"
      id="email"
      name="email"
      placeholder="john@example.com"
      required
    />
  </li>
  <li>
    <label for="adr">Address</label>
    <input
      type="text"
      id="adr"
      name="address"
      placeholder="542 W. 15th Street"
      required
    />
  </li>
  <li><label for="zip">Zip</label>
  <input type = "text"  name = "zip" placeholder="10027"
  onblur = "getPlace (this.value)" />
  </li>
  <li>
    <label for="city">City</label>
    <input
      type="text"
      id="city"
      name="city"
      placeholder="New York"
      required
    />
  </li>
  <li><label for="state">State</label>

  <input type="text" id="state" name="state" pattern="^((AL)|(AK)|(AS)|(AZ)|(AR)|(CA)|(CO)|(CT)|(DE)|(DC)|(FM)|(FL)|(GA)|(GU)|(HI)|(ID)|(IL)|(IN)|(IA)|(KS)|(KY)|(LA)|(ME)|(MH)|(MD)|(MA)|(MI)|(MN)|(MS)|(MO)|(MT)|(NE)|(NV)|(NH)|(NJ)|(NM)|(NY)|(NC)|(ND)|(MP)|(OH)|(OK)|(OR)|(PW)|(PA)|(PR)|(RI)|(SC)|(SD)|(TN)|(TX)|(UT)|(VT)|(VI)|(VA)|(WA)|(WV)|(WI)|(WY))$" placeholder="NY" required>
  </li>
  
  <li>
  <label for="shipping_method">Shipping Method:</label>
    <select id="shipping-selector">
      <option value="Overnight">Overnight</option>
      <option value="2-days Expedited">2-days Expedited</option>
      <option value="6-days Ground">6-days Ground</option>
    </select>
  </li>
  <h3>Payment Information</h3>
  <li>
    <label for="cname">Name on Card</label>
    <input
      type="text"
      id="cname"
      name="cardname"
      placeholder="Tim Apple"
      required
    />
  </li>
  <li>
    <label for="ccnum">Credit card number</label>
    <input
      type="text"
      id="ccnum"
      name="cardnumber"
      pattern="[0-9]{13,16}"
      placeholder="1111222233334444"
      required
    />
  </li>
  <li>
    <label for="expmonth">Exp Month</label>
    <input
      type="text"
      id="expmonth"
      name="expmonth"
      pattern="^((0?[1-9])|(1[0-2]))$"
      placeholder="12"
      required
    />
  </li>
  <li>
    <label for="expyear">Exp Year</label>
    <input
      type="text"
      id="expyear"
      name="expyear"
      pattern="^20\\d{2}$"
      placeholder="2022"
      required
    />
  </li>
  <li class="button">
    <button type="submit">Purchase</button>
  </li>
</ul>`;
  orderForm.appendChild(form);
  
  console.log();
  
  function getPlace (zip)
{
  if (window.XMLHttpRequest)
  {  // IE7+, Firefox, Chrome, Opera, Safari
     var xhr = new XMLHttpRequest();
  }
  else
  {  // IE5, IE6
     var xhr = new ActiveXObject ("Microsoft.XMLHTTP");
  }

  // Register the embedded handler function
  // This function will be called when the server returns
  // (the "callback" function)
  xhr.onreadystatechange = function ()
  { // 4 means finished, and 200 means okay.
    if (xhr.readyState == 4 && xhr.status == 200)
    { // Data should look like "Fairfax, Virginia"
      var result = xhr.responseText;
      var place = result.split (', ');
        document.getElementById("city").value = place[0];
        document.getElementById("state").value = place[1];
        var basePrice = (document.getElementById("baseprice").textContent).substring(1);
        var taxPrice = basePrice * parseFloat(place[2]);
        var taxPer = parseFloat(place[2]) * 100
        document.getElementById("tax").textContent = taxPrice.toFixed(2);
        document.getElementById("taxfrom").textContent = place[3];
        document.getElementById("taxpercentage").textContent = taxPer.toFixed(0);
    }
  }
  // Call the response software component
  xhr.open ("GET", "getCityState.php?zip=" + zip);
  xhr.send (null);
}

function submitForm(ev) {
  ev.preventDefault();
  let form = Object.entries(ev.target);
  console.log(form);
  //   form.preventDefault();
  if (parseInt(form[0][1].value) < 1) {
    alert("Quantity should be more than 1!");
  }
  let size = document.getElementById("size-selector").value;
  console.log(size);
  let mail = document.createElement("a");
  let newLine = "%0D%0A";
  let body =
    "Full Name: " +
    form[1][1].value +
    newLine +
    "Phone Number: " +
    form[2][1].value +
    newLine +
    "Email: " +
    form[3][1].value +
    newLine +
    "Address:" +
    newLine +
    form[4][1].value +
    "," +
    newLine +
    form[5][1].value +
    "," +
    newLine +
    form[6][1].value +
    " " +
    form[7][1].value +
    newLine +
    newLine +
    "Shipping Preference: " +
    form[8][1].value +
    newLine;

  let billing =
    "Name on Card: " +
    form[9][1].value +
    newLine +
    "CC Number: " +
    form[10][1].value +
    newLine +
    "CC Expiration: " +
    form[11][1].value +
    " / " +
    form[12][1].value;
  body = body + billing + newLine + newLine;
  mail.href =
    "mailto:purchases@ecrocs.com" +
    "?subject=Purchase Order: Item #" +
    queryParams["id"] +
    " SZ-" +
    size +
    " QTY-" +
    form[0][1].value +
    "&body=" +
    body;

  mail.click();
}