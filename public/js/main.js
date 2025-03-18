$(document).ready(function () {
    function loadContentForClient(client) {
        document.cookie = "client=" + client + "; path=/";
        var module = $(".dynamic-div").data("module");
        var script = $(".dynamic-div").data("script");
        // recuperation du script pour le client
        $.ajax({
            url: "./customs/" + client + "/modules/" + module + "/" + script + ".php",
            type: "GET",
            success: function (response) {
                $(".dynamic-div").html(response);
            },
            error: function () {
                $(".dynamic-div").html("<p>Erreur de chargement du contenu.</p>");
            }
        });
    }
    // Check du cookie pour set le contenu du client
    function checkClientCookie() {
        var client = getCookie("client");
        if (client) {
            loadContentForClient(client);
        }
    }
    // Fonction de recuperation du cookie 
    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    // Gestion des boutons clients
    $("#setClientA").click(function () {
        loadContentForClient("clienta");
    });

    $("#setClientB").click(function () {
        loadContentForClient("clientb");
    });

    $("#setClientC").click(function () {
        loadContentForClient("clientc");
    });

    checkClientCookie();

    $(document).on("click", ".viewCarDetails", function () {
        var carId = $(this).data("car-id");
        var client = getCookie("client"); // Récupérer le client actuel
        if (client) {
            $.ajax({
                url: "./customs/" + client + "/modules/cars/edit.php",
                type: "GET",
                data: { id: carId },
                success: function (response) {
                    $(".dynamic-div").html(response);
                },
                error: function () {
                    $(".dynamic-div").html("<p>Erreur de chargement des détails de la voiture.</p>");
                }
            });
        }
    });

    $(document).on("click", ".backToList", function () {
        var client = getCookie("client");
        if (client) {
            loadContentForClient(client);
        }
    });
});
