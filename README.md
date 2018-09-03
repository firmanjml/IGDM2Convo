# Json2Conversation
Parse JSON data of your Instagram Direct Messages to HTML Conversation View.

How to get the JSON data?
Go to your Instagram (App/Web), under settings there will be Data Download.
Put your email and request for download. 

# How to parse the data to the HTML view?
After downloading the archive file of your Instagram data, under part 1 there will be a file called messages.json.

In order for you to filter to one participants, you can run this nodejs code that I have made. 

```
var messages = require('./messages.json')
var fs = require('fs');

var filterUsername = "firmanjml";

for (var i = 0; i < messages.length; i++) {
    if (messages[i].participants.includes(filterUsername)) {
        fs.appendFile('firmanjml.json', JSON.stringify(messages[i], null, 4), function (err) {
            if (err) throw err;
            console.log('File generated!');
          });
    }
}
```

In this case, the filtered conversation will be in a new file called firmanjml.json created by the nodejs.
Remove unnessary objects like "participants" in the json file.
Your final result will have "conversation" object only in the json file.

Now you can parse the json file into the conversation view. Be sure to rename the json file to message.json.

![Screenshot](https://i.imgur.com/9SQJxjf.png)

Credit to Mariam Massadeh https://codepen.io/MariamMassadeh/pen/LlJvg for HTML template.

