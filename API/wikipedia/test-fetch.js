function start(){
    const btnGetdata = document.getElementById('btn_data');
    btnGetdata.onclick = getPageViewsForTopic;
    
}

function getPageViewsForTopic(){
    let searchTerm = document.getElementById('search-term').value.trim();
    let outputSpan = document.getElementById('output');
    searchTerm = searchTerm.charAt(0).toUpperCase() + searchTerm.slice(1);//making first letter capital of word
    outputSpan.innerHTML = "<h2>Result for " +searchTerm+ "</h2>";
    console.log(searchTerm);

    /*Fetch Request:

Imagine you're asking a server for some information.
In this case, you're asking Wikimedia for data about a Wikipedia page's views.
You're saying, "Hey Wikimedia, can you give me data about how many times this Wikipedia page was viewed?"
Promise Handling:

A promise is like a ticket you get when you ask someone for something. It says, "I'll get back to you with what you asked for."
When you send your request to Wikimedia (fetch()), you get a ticket (a promise) back. It's like saying, "Okay, I'll get you that data. Hang tight."
When Wikimedia responds, you get your data (the response).
The first .then() is like saying, "When you get a response, I want to do something with it."
Here, you're saying, "When you get the response, turn it into something I can read easily (JSON format)."
The second .then() is like saying, "Now that I can understand the response, let me do something with it."
You're saying, "Okay, now that I have the data in a format I can understand, let's log it to the console so I can see what I got." */
    //fetch is the new way of request REST api
    fetch(`https://wikimedia.org/api/rest_v1/metrics/pageviews/per-article/en.wikipedia/all-access/all-agents/${searchTerm}/daily/2015100100/2015103100`)
    .then((response) => response.json()).then((data) =>{
        /*The fetch() function in JavaScript is a modern way to make network requests (like fetching resources from a server) in web applications */
        /*Promise Handling: .then() is a method used to handle promises returned by the fetch() function.
The first .then() takes the response object returned by the fetch request and calls its .json() method. This method reads the response stream to completion and parses the JSON data it contains. It returns a promise that resolves with the parsed JSON.
The second .then() receives the parsed JSON data as its argument (data) and logs it to the console.
This logging statement allows you to see the fetched data in the browser console for debugging purposes.*/
        // console.log(data);
        const dataArray =data.items;//fetched data (data) contains an array named items, which likely holds the daily pageview data for the Wikipedia article specified by the user. It extracts this array into a variable named dataArray for easier handling.
        dataArray.forEach((dayData) => {//forEach() method to iterate over each element (dayData) in the dataArray.dayData is an object containing data for a single day's pageviews, 
            const dateData = dayData.timestamp;
            const year = dateData.slice(0,4);//eg: 2024
            const month = dateData.slice(5,6);//eg: 05
            const day = dateData.slice(6, 8);//eg: 26
            const dateString = `${year}-${month}-${day}`;
            
            //dispaly data 
            outputSpan.innerHTML += dateString +"&nbsp;&nbsp;";
            outputSpan.innerHTML += dayData.views +"<br>";
        });
        });
}

window.onload =start;