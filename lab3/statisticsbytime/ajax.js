$("#getStatistics").on("click", function () {

    var from = $("#from").val();
    var to = $("#to").val();
    if (from != "" && to != "") {
        $.ajax({
            url: "get.php",
            method: "GET",s
            data: { from: from, to: to },
            success: function (data) {
                var parser = new DOMParser();
                var xmlDoc = parser.parseFromString(data, "text/xml");
                var html = "<table border='1'>";
                for (var i = 0; i < xmlDoc.getElementsByTagName("row").length; i++) {
                    html += "<tr>";
                    html += "<td>" + xmlDoc.getElementsByTagName("login")[i].childNodes[0].nodeValue + "</td>";
                    html += "<td>" + xmlDoc.getElementsByTagName("start")[i].childNodes[0].nodeValue + "</td>";
                    html += "<td>" + xmlDoc.getElementsByTagName("finish")[i].childNodes[0].nodeValue + "</td>";
                    html += "<td>" + xmlDoc.getElementsByTagName("in_trafic")[i].childNodes[0].nodeValue + "</td>";
                    html += "<td>" + xmlDoc.getElementsByTagName("out_trafic")[i].childNodes[0].nodeValue + "</td>";
                    html += "</tr>";
                }
                html += "</table>";
                $('#statistics').html(html);
            },
            error: function () { alert("Not found"); }

        });
    }
});