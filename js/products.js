let shoeData = fetch("./shoes.json")
  .then((response) => response.json())
  .then((data) => createTable(data["shoes"]));

function createTable(data) {
  console.log(data);
  let shoes = groupBy(data, "type");

  for (let [shoeType, products] of Object.entries(shoes)) {
    console.log(shoeType, products);
    let table = document.createElement("table");

    // document.querySelector("table");
    let tHead = table.createTHead();
    let tHeadRow = tHead.insertRow();
    let th = document.createElement("th");
    th.textContent = "Men's " + shoeType;
    th.setAttribute("colspan", 3);
    tHeadRow.appendChild(th);

    let tbody = table.createTBody();
    let row = tbody.insertRow();
    for (let shoe of products) {
      let td = document.createElement("td");
      var anchor = document.createElement("a");
      anchor.id = "a-" + shoe["id"];
      var card = document.createElement("div");
      anchor.appendChild(card);
      card.setAttribute("class", "card");
      var title = document.createElement("div");
      title.textContent = shoe["name"];
      title.setAttribute("class", "title");

      var img = document.createElement("img");
      img.setAttribute("src", "./assets/" + shoe["id"] + "/product_0.jpg");
      img.id = "img-" + shoe["id"];

      var price = document.createElement("span");
      price.textContent = "$" + shoe["price"];
      price.setAttribute("class", "price");

      var colors = document.createElement("div");
      colors.setAttribute("class", "colors");
      for (let [index, [key, value]] of Object.entries(
        Object.entries(shoe["colors"])
      )) {
        if (index == 0) {
          anchor.setAttribute(
            "href",
            "./product.html?id=" + shoe["id"] + "&color=" + key
          );
        }
        var clr = document.createElement("div");
        clr.setAttribute("name", key);
        if (value.length == 2)
          clr.style["background-image"] = dualGradient(value[0], value[1]);
        else clr.style["background-color"] = value[0];
        clr.setAttribute("class", "circle");
        clr.addEventListener("mouseenter", (event) => {
          i = document.getElementById("img-" + shoe["id"]);

          i.setAttribute(
            "src",
            "./assets/" + shoe["id"] + "/product_" + index + ".jpg"
          );
          a = document.getElementById("a-" + shoe["id"]);
          a.setAttribute(
            "href",
            "./product.html?id=" +
              shoe["id"] +
              "&color=" +
              event.target.attributes.name.value
          );
        });
        colors.appendChild(clr);
      }

      card.appendChild(title);
      card.appendChild(img);
      card.appendChild(price);
      card.appendChild(colors);
      card.addEventListener("mouseenter", (event) => {
        event.currentTarget.style.boxShadow =
          "2px 2px 10px 3px rgba(0, 0, 0, 0.3)";
      });
      card.addEventListener("mouseleave", (event) => {
        event.currentTarget.style.boxShadow =
          "1px 2px 3px 1px rgba(0, 0, 0, 0.2), 1px 4px 4px 1px rgba(0, 0, 0, 0.19)";
      });

      td.appendChild(anchor);
      row.appendChild(td);
    }
    var cards = document.getElementsByClassName("card");
    console.log(cards);
    document.body.appendChild(table);
  }
}

function dualGradient(g1, g2) {
  return "-webkit-linear-gradient(-235deg, " + g1 + " 50%, " + g2 + " 50%)";
}

function groupBy(array, property) {
  var hash = {};
  for (var i = 0; i < array.length; i++) {
    if (!hash[array[i][property]]) hash[array[i][property]] = [];
    hash[array[i][property]].push(array[i]);
  }
  return hash;
}
