function addMom() {
  var momText = document.getElementById("momTextId");
  var item = momText.value;
  var momDate = document.getElementById("dateInput");
  var dateItem = momDate.value;
  console.log(item);
  if (item == "" || dateItem == "") {
    alert("Please enter some value");
    return false;
  } else {
    var textnode = document.createTextNode(item);
    var outerdiv = document.createElement("div");
    outerdiv.setAttribute("class", "card wow fadeInUp");
    outerdiv.setAttribute("data-wow-duration", "1.1s");
    outerdiv.setAttribute("data-wow-delay", ".3s");
    var innerDivOne = document.createElement("div");
    innerDivOne.setAttribute("class", "card-header");
    innerDivOne.setAttribute("id", "headingOnee");
    var h5 = document.createElement("h5");
    h5.setAttribute("class", "mb-0");

    var innerDivTwo = document.createElement("div");
    innerDivTwo.setAttribute("class", "card-body");
    var p = document.createElement("p");
    outerdiv.appendChild(innerDivOne);
    innerDivOne.appendChild(h5);
    outerdiv.appendChild(innerDivTwo);
    innerDivTwo.appendChild(p);
    p.appendChild(textnode);

    var dateNode = document.createTextNode(dateItem);
    h5.appendChild(dateNode);
    console.log(outerdiv);
    document
      .getElementById("sendNotice")
      .insertAdjacentElement("beforebegin", outerdiv);
    momText.value = " ";
    momDate.value = " ";
    return true;
  }
}
