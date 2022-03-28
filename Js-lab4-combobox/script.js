const insertValue = () => {
    var select = document.getElementById("select"),
    txtVal = document.getElementById("val").value,
    newOption = document.createElement("OPTION"),
    newOptionVal = document.createTextNode(txtVal);

    if(txtVal == ""){
        alert("Empty field!");
        return;
    }
    newOption.appendChild(newOptionVal);
    select.insertBefore(newOption, select.firstChild);
}

const removeValue = () => {
    value = select.selectedIndex;
    select.removeChild(select[value])
}

const getAll = () => {
  const allOptions = document.getElementById("select");
  const optionsArray = Array.from(allOptions.options).map(item => item.text);
  const optionsString = optionsArray.join(" ");
  const collectionElement = document.getElementById("printed-collection")
  collectionElement.innerText = optionsString;
  console.log(optionsString);
}

const getAllDev = () => {
  const allOptions = document.getElementById("select");
  console.log(Array.from(allOptions.options).map(item => item.text));
}
