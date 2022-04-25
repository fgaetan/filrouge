$(document).on("submit", "form", function (e) {
      let regexListe = {
            nom: /^[\p{L}\s]{2,}$/u,
            mail: /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/,
            pass: /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/,
            adresse: /^[\w\-\s]{5,}$/,
            code_post: /^(([0-8][0-9])|(9[0-5]))[0-9]{3}$/,
            tel: /^[\d]{10,}$/,
      };
      $("small").text("");
      erreur = false;
      let formElements = $("form")[0];
      for (let i = 0; i < formElements.length - 2; i++) {
            //////////////////////////////////////////////////////      BOUTONS RADIO
            if ($(formElements[i]).attr("type") === "radio") {
                  //$("#" + $(formElements[i]).attr("aria-describedby")).html("");
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
            //////////////////////////////////////////////////////      MOTS DE PASSE
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
            //////////////////////////////////////////////////////      SELECTS
            else if (
                  $(formElements[i]).prop("tagName").toLowerCase() === "select"
            ) {
                  $(formElements[i]).removeClass("erreurInput");
                  //$(formElements[i]).next().html("");
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
            //////////////////////////////////////////////////////      AUTRES INPUT
            else {
                  $(formElements[i]).removeClass("erreurInput");
                  //	$(formElements[i]).next().html("");
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
      if (erreur) {
            e.preventDefault();
      }
});
