function addItem(){

let items=document.getElementById("items");

let row=document.createElement("div");

row.className="item-row";

row.innerHTML=`
<input type="text" name="product[]" placeholder="Product Name" required>
<input type="number" name="qty[]" placeholder="Quantity" min="1" required>
<input type="number" name="price[]" placeholder="Price" min="0" required>
<button type="button" onclick="removeItem(this)">Remove</button>
`;

items.appendChild(row);

}


function removeItem(button){

let rows=document.getElementsByClassName("item-row");

if(rows.length>1){

button.parentElement.remove();

}

}