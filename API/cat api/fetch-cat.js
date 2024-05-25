
let catArray = new Array();

function start()
{
    const buttoonCatInfo = document.getElementById('get-info');
    buttoonCatInfo.onclick = handleButtonClick;
    loadCats();

}

function loadCats() 
{
    const catList = document.getElementById('cat-list');
    // selects the html select which is is like a drop down
    let newOption;

    fetch('https://api.thecatapi.com/v1/breeds?api_key=live_lZKtuRhzpExThTUrhGgKAJcjIatXxvk1o6pHBosto76fxoJKadmXKZiR2mZhGlz8')
    .then((response) => response.json())
    .then((data) => {
        data.forEach((cat) =>{
            newOption = document.createElement('option'); //eg: <option value="apple">Apple</option> ->Apple is the text
            newOption.value = cat.name;
            newOption.text = cat.name;

            catList.appendChild(newOption);//appends the option inside the select drop down

            catArray.push(cat);//stores cat data: pushing each cat object retrieved from the API into the catArray array.

        })
    })

}

function handleButtonClick()
{
    const catList = document.getElementById('cat-list');

    const index = catList.selectedIndex;//retrieves the index of the currently selected option in the catList selectedIndex is a property of the <select> element that provides the index of the currently selected option within the list of options.
    //index selection starts from 0

    const outputSpan = document.getElementById('output');
    
    let output = `<h2>${catArray[index].name}</h2>`;
    output += `<img src='${catArray[index].image.url}'><br>`;
    output += `<h3>Description</h3><p>${catArray[index].description}</p>`;
    outputSpan.innerHTML = output;//sets the HTML content of the outputSpan element to the value of the output variable.
    /*innerHTML is a property of HTML elements that allows you to get or set the HTML content within the element.
By assigning output to outputSpan.innerHTML, you are replacing any existing HTML content within the outputSpan element with the HTML content generated in the output variable. */
}

window.onload =start;