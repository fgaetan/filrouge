<?php

class ViewRegex
{

    public static function formValid()
    {
?>
        <script>
            $(document).on("click", "#inscription", function(e) {
                e.preventDefault();
                let regexListe = {
                    nom: /^[\p{L}\s]{2,}$/u,
                    tel: /^[\d]{10,}$/,
                    adr: /^[\w\-\s]{5,}$/,
                    pass: /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/,
                };

                $("small").text("");
                erreur = false;

                let formElements = $("form")[0];

                for (let i = 0; i < formElements.length - 2; i++) {
                    if ($(formElements[i]).attr("type") === "radio") {
                        if (
                            $(
                                "input[name='" +
                                $(formElements[i]).attr("name") +
                                "']:checked"
                            ).length === 0
                        ) {
                            erreur = true;
                            $(
                                "#" + $(formElements[i]).attr("aria-describedby")
                            ).html(
                                `<p class="erreurMessage">${$(
                                    formElements[i]
                              ).attr("data-message")}</p>`
                            );
                        }
                    }
                    else if ($(formElements[i]).attr("type") === "password") {
                        $("#pass").removeClass("erreurInput");
                        $("#pass2").removeClass("erreurInput");

                        const pattern = regexListe.pass;

                        if (pattern.test(formElements[i].value) === false) {
                            erreur = true;
                            $("#pass").addClass("erreurInput");
                            $("#pass2").addClass("erreurInput");
                            $(
                                "#" + $(formElements[i]).attr("aria-describedby")
                            ).html(
                                `<p class="erreurMessage">${$(
                                    formElements[i]
                              ).attr("data-message")}</p>`
                            );
                        }
                        if ($("#pass").val() !== $("#pass2").val()) {
                            erreur = true;
                            $("#pass").addClass("erreurInput");
                            $("#pass2").addClass("erreurInput");
                            $(
                                "#" + $(formElements[i]).attr("aria-describedby")
                            ).html(
                                `<p class="erreurMessage">Les deux mot de passes doivent etre identiques et au bon format</p>`
                            );
                        }
                    }
                    else if (
                        $(formElements[i]).prop("tagName").toLowerCase() === "select"
                    ) {
                        $(formElements[i]).removeClass("erreurInput");

                        if (formElements[i].value === "") {
                            erreur = true;
                            $(formElements[i]).addClass("erreurInput");
                            $(
                                "#" + $(formElements[i]).attr("aria-describedby")
                            ).html(
                                `<p class="erreurMessage">${$(
                                    formElements[i]
                              ).attr("data-message")}</p>`
                            );
                        }
                    }
                    else {
                        $(formElements[i]).removeClass("erreurInput");

                        const type = $(formElements[i]).attr("data-type");
                        const pattern = regexListe[type];

                        if (pattern.test(formElements[i].value) === false) {
                            erreur = true;
                            $(formElements[i]).addClass("erreurInput");
                            $(
                                "#" + $(formElements[i]).attr("aria-describedby")
                            ).html(
                                `<p class="erreurMessage">${$(
                                    formElements[i]
                              ).attr("data-message")}</p>`
                            );
                        }
                    }
                }
                if (!erreur) {
                    $("form").submit();
                }
            });
        </script>
<?php
    }
}
