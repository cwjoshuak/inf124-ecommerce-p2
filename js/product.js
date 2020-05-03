let shoeData = fetch("./shoes.json")
  .then((response) => response.json())
  .then((data) => doTheThing(data["shoes"]));

function parseQuery(queryString) {
  var query = {};
  var pairs = (queryString[0] === "?"
    ? queryString.substr(1)
    : queryString
  ).split("&");
  for (var i = 0; i < pairs.length; i++) {
    var pair = pairs[i].split("=");
    query[decodeURIComponent(pair[0])] = decodeURIComponent(pair[1] || "");
  }
  return query;
}
let queryParams = parseQuery(window.location.search);

console.log(window.location);
console.log(parseQuery(window.location.search));

function doTheThing(data) {
  console.log(data);
  let shoe = data.filter((i) => i.id === queryParams["id"])[0];
  document.title = "eCrocs | " + shoe["name"];

  let colors = Object.entries(Object.entries(shoe["colors"]));
  let currentColor = colors.filter((i) => i[1][0] === queryParams["color"]);

  console.log(shoe);
  console.log(colors);
  console.log(currentColor);

  let productDiv = document.createElement("div");
  productDiv.className = "product";

  let productLeftDiv = document.createElement("div");
  productLeftDiv.className = "product-left";

  let largeImg = document.createElement("img");
  largeImg.src =
    "./assets/" + queryParams["id"] + "/product_" + currentColor[0][0] + ".jpg";
  largeImg.className = "main";
  productLeftDiv.appendChild(largeImg);

  let selectorDiv = document.createElement("div");
  selectorDiv.className = "selector center";
  let img1 = document.createElement("img");
  img1.src =
    "./assets/" + queryParams["id"] + "/product_" + currentColor[0][0] + ".jpg";
  img1.className = "active";
  let img2 = document.createElement("img");
  img2.src =
    "./assets/" + queryParams["id"] + "/color_" + currentColor[0][0] + ".jpg";

  img1.addEventListener("click", (event) => {
    let lgImg = document.getElementsByClassName("main")[0];
    lgImg.src = img1.src;
    img1.className = "active";
    img2.className = "";
  });
  img2.addEventListener("click", (event) => {
    let lgImg = document.getElementsByClassName("main")[0];
    lgImg.src = img2.src;
    img1.className = "";
    img2.className = "active";
  });

  let p = document.createElement("p");
  p.innerHTML = shoe["desc1"] + "<br />" + shoe["desc2"];

  let detailTitle = document.createElement("span");
  detailTitle.className = "bold";
  detailTitle.textContent = shoe["name"] + " Details";

  let ul = document.createElement("ul");
  for (let detail of shoe["details"]) {
    let li = document.createElement("li");
    li.textContent = detail;
    ul.appendChild(li);
  }

  selectorDiv.appendChild(img1);
  selectorDiv.appendChild(img2);
  productLeftDiv.appendChild(largeImg);
  productLeftDiv.appendChild(selectorDiv);
  productLeftDiv.appendChild(p);
  productLeftDiv.appendChild(detailTitle);
  productLeftDiv.appendChild(ul);

  let productRightDiv = document.createElement("div");
  productRightDiv.className = "product-right";

  let h2 = document.createElement("h2");
  h2.textContent = shoe["name"];
  let h4 = document.createElement("h4");
  h4.textContent = "$" + shoe["price"];

  productRightDiv.appendChild(h2);
  productRightDiv.appendChild(h4);
  productRightDiv.appendChild(document.createElement("hr"));

  let colorTextBold = document.createElement("span");
  colorTextBold.className = "color-text bold";
  colorTextBold.textContent = "Color:";

  let colorText = document.createElement("span");
  colorText.textContent = currentColor[0][1][0];
  productRightDiv.appendChild(colorTextBold);

  productRightDiv.appendChild(colorText);
  productRightDiv.appendChild(document.createElement("br"));
  productRightDiv.appendChild(document.createElement("br"));

  let colorSelector = document.createElement("div");
  colorSelector.className = "selector";
  for (let color of colors) {
    let anc = document.createElement("a");
    anc.href = "./product.html?id=" + shoe["id"] + "&color=" + color[1][0];
    let ancImg = document.createElement("img");
    ancImg.src = "./assets/" + shoe["id"] + "/color_" + color[0] + ".jpg";

    ancImg.className = "small";
    if (currentColor[0][1][0] === color[1][0]) ancImg.className += " active";
    anc.appendChild(ancImg);
    colorSelector.appendChild(anc);
  }

  let sizeText = document.createElement("span");
  sizeText.className = "size-text bold";
  sizeText.textContent = "Shoe Size:";

  let sizeSelector = document.createElement("select");
  sizeSelector.id = "size-selector";
  for (let size of shoe["sizes"]) {
    let op = document.createElement("option");
    op.value = size;
    op.textContent = size;
    sizeSelector.appendChild(op);
  }
  productRightDiv.appendChild(colorSelector);
  productRightDiv.appendChild(document.createElement("br"));
  productRightDiv.appendChild(sizeText);
  productRightDiv.appendChild(sizeSelector);
  productRightDiv.appendChild(document.createElement("br"));
  productRightDiv.appendChild(document.createElement("br"));

  let orderForm = document.createElement("div");
  orderForm.className = "order-form";
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
  <input type="text" id="state" name="state" pattern="^((AL)|(AK)|(AS)|(AZ)|(AR)|(CA)|(CO)|(CT)|(DE)|(DC)|(FM)|(FL)|(GA)|(GU)|(HI)|(ID)|(IL)|(IN)|(IA)|(KS)|(KY)|(LA)|(ME)|(MH)|(MD)|(MA)|(MI)|(MN)|(MS)|(MO)|(MT)|(NE)|(NV)|(NH)|(NJ)|(NM)|(NY)|(NC)|(ND)|(MP)|(OH)|(OK)|(OR)|(PW)|(PA)|(PR)|(RI)|(SC)|(SD)|(TN)|(TX)|(UT)|(VT)|(VI)|(VA)|(WA)|(WV)|(WI)|(WY))$" placeholder="NY" required></li>
  <li>
  <li><label for="zip">Zip</label>
  <input type="text" id="zip" name="zip" pattern="^\\d{5}(-\\d{4})?$" placeholder="10001" required></li>
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
  productRightDiv.appendChild(orderForm);
  productDiv.appendChild(productLeftDiv);
  productDiv.appendChild(productRightDiv);

  document.body.appendChild(productDiv);
  console.log();
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
