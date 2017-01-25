function generateList(url, iconSize = 64) {

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            if (xmlhttp.status == 200) {
                json = JSON.parse(xmlhttp.responseText);
                if (json["status"] == true) {
                    document.getElementById("status").innerHTML = '<p class="cover-heading">Online: <i id="online" class="fa fa-check green"></i></p>';
                    document.getElementById("status").insertAdjacentHTML('beforeend', '<p class="lead">Version: ' + json['version'] + '</p>');
                    document.getElementById("status").insertAdjacentHTML('beforeend', '<p class="lead">Players online: ' + json['players']['online'] + '/' + json['players']['max'] + '</p>');

                  

                    document.getElementById("status").insertAdjacentHTML('beforeend', '<table id=\'players-list\' class=\'players-list\'>');
                    for (var playerNumber in json['list']) {
                        player = json['list'][playerNumber]

                        var row = document.getElementById("players-list").insertRow(0);

                        // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
                        var imageCell = row.insertCell(0);
                        var playerCell = row.insertCell(1);
                        imageCell.innerHTML = '<img src="https://minotar.net/avatar/' + player + '/' + iconSize + '.png"</img>';
                        playerCell.innerHTML = player;

                    }
                    document.getElementById("status").insertAdjacentHTML('beforeend', '</table>');


                } else {
                    document.getElementById("status").innerHTML = '<p class="cover-heading">Online: <i id="online" class="fa fa-times red"></i></p>';
                    document.getElementById("status").insertAdjacentHTML('beforeend', '<p class="lead">Reason: ' + json['error'] + '</p>');
                }

            } else if (xmlhttp.status == 400) {

            } else {

            }
        }
    };

    xmlhttp.open("GET", "https://mcapi.ca/query/" + url + "/list", true);
    xmlhttp.send();

}
