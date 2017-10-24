<!doctype html>
<html>
    <head>
        <script src="http://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function () {
                $("#getSettlementbutton").click(function () {
                    var prodname = $('#selproduct :selected').text();
                    $.get("getsingleprod.php", {SettlementID: prodname}, function (getresult) {
                        $("#presentprod").html(getresult);
                    });
                });
            });

        </script>
    </head>
    <body>


        <div class="content">
            <label>Select a Settlements ID </label>
            <select id="selproduct">
                <option value="7082246882">7082246882</option>
            </select>
            <button id="getSettlementbutton">Load Product Data</button>  
        </div>
        <div id="presentprod"></div> 


    </body>
</html>

